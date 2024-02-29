const config = require('../config/env');
const axios = require('axios');
const jwt = require('jsonwebtoken');
var formidable = require('formidable');
var fs = require('fs');
const util = require('util');

exports.checkParam = function(param) {
    var code = config.returncode;
    var result = { code: code.success.code, msg: code.success.msg };

    for (var i = 0; i < param.length; i++) {
        if (param[i] === undefined) {
            result.code = code.missing_param.code;
            result.msg = code.missing_param.msg;
            break;
        }
    }
    
    return result;
}

exports.verifyToken = async function(req, res, next) {
    // Get auth header value
    
    const bearerHeader = req.headers['authorization'];
    var isTokenExist = false;
    var jwtSecret = "";

    // Check if bearer is undefined
    if (typeof bearerHeader !== 'undefined') {
        // Split at the space
        const bearer = bearerHeader.split(' ');
        // Get token from array
        const bearerToken = bearer[1];
        // set the token
        req.token = bearerToken;

        var contype = req.headers['content-type'];

        if (contype !== undefined && contype.indexOf('multipart/form-data') >= 0) {
            req = await addDataInBody(req, res);

            if (!req.formidable.uploadSuccess) {
                res.json(req.formidable.responseError);
                return 0;
            }

        }
        jwt.verify(req.token, config.jwtSecret, (err, authData) => {
            if (err) {
                res.json(config.returncode.tokenid_not_exist);
            }else {
                let check_nexts = check_next(req.path);
                if (check_nexts) {
                    // insert logs access
                    client_access_api(req, authData, 1001);
                    res.json(authData);
                }else{
                    req.body.authData = authData;
                    next();
                }
            }
        });

    } else {
        res.json(config.returncode.not_allow);
    }
}

exports.logs_access_api = async function (req, authData, code) {
    client_access_api(req, authData, code);
}

async function client_access_api(req, authData, code){
    const method = req.body.method ? req.body.method : req?.route?.path?.split('/')?.pop();

    // db tables
    let config_array_db = new Array();
    config_array_db['md_logs'] = config.fieldDB.main.md_logs

    var setime_zone = new Date().toLocaleString('de-DE', {timeZone: 'Asia/Bangkok'}).split(' ');
    var date_now = setime_zone[0].split('.');
    date_now = date_now[2].replace(',', '') + "-" + ("0" + date_now[1]).slice(-2) + "-" + ("0" + date_now[0]).slice(-2);
    var time_now = setime_zone[1].split(':');
    time_now = ("0" + time_now[0]).slice(-2) + ":" + ("0" + time_now[1]).slice(-2) + ":" + ("0" + time_now[2]).slice(-2);
    
    let conn = config.configDB.connectDB();
    const query = util.promisify(conn.query).bind(conn);

    let insert = new Array();
    insert[`${config_array_db['md_logs']}_action`] = `'${method}'`;
    insert[`${config_array_db['md_logs']}_sid`] = `'${code ? code : 404}'`; //status code
    insert[`${config_array_db['md_logs']}_sname`] = `'${authData.appInfo.app_token}'`; // site name
    insert[`${config_array_db['md_logs']}_time`] = `'${date_now} ${time_now}'`;
    insert[`${config_array_db['md_logs']}_token`] = `'${req.token}'`;
    // Construct SQL query
    let columns = Object.keys(insert).join(",");
    let values = Object.values(insert).join(",");
    let queryData = `INSERT INTO ${config_array_db['md_logs']} (${columns}) VALUES (${values})`;
    const insert_data = await query(queryData);
}

function addDataInBody(req, res) {
    return new Promise(async function(resolve, reject) {

        if (req.formidable === undefined)
            req.formidable = {};

        if (req.formidable.maxFieldsSize === undefined)
            req.formidable.maxFieldsSize = 5 * 1024 * 1024;

        if (req.formidable.fileTypeSupport === undefined)
            req.formidable.fileTypeSupport = ['jpeg', 'jpg', 'png', 'gif'];

        var form = new formidable.IncomingForm();
        form.maxFieldsSize = req.formidable.maxFieldsSize;
        form.parse(req, function(err, fields, files) {
            req.formidable.uploadSuccess = true;
            req.body = fields;
            req.files = files;
            resolve(req);
        });

        form.on('fileBegin', function(name, file) {
            var fileType = file.type.split('/').pop();
            if (req.formidable.fileTypeSupport.indexOf(fileType) < 0) {
                form._error(new Error('File type is not supported'));
            }
        });

        form.on("error", function(err) {
            req.formidable.uploadSuccess = false;
            var tmpError = err + "";
            tmpError = tmpError.indexOf("maxFieldsSize");
            var responseError = {};

            if (tmpError >= 0) {
                responseError.code = config.returncode.maxmum_file_size.code;
                responseError.maxFileSizeSupport = req.formidable.maxFieldsSize + "bytes";
            } else {
                responseError.code = config.returncode.upload_error.code;
            }

            responseError.msg = err.message;
            req.formidable.responseError = responseError;

            resolve(req);
        });

    });
}

exports.getIP = function(){
    var result = '';
    const { networkInterfaces } = require('os');

    const nets = networkInterfaces();
    const results = Object.create(null); // Or just '{}', an empty object

    for (const name of Object.keys(nets)) {
        for (const net of nets[name]) {
            // Skip over non-IPv4 and internal (i.e. 127.0.0.1) addresses
            if (net.family === 'IPv4' && !net.internal) {
                if (!results[name]) {
                    results[name] = [];
                }
                results[name].push(net.address);
            }
        }
    }

    result = results.Ethernet;

    return result
        
}

exports.getNameMonth = function(month){
    var name = "";
    if (month == 1 || month == "1" || month == "01") {
        name = "January";
    }
    if (month == 2 || month == "2" || month == "02") {
        name = "February";
    }
    if (month == 3 || month == "3" || month == "03") {
        name = "March";
    }
    if (month == 4 || month == "4" || month == "04") {
        name = "April";
    }
    if (month == 5 || month == "5" || month == "05") {
        name = "May";
    }
    if (month == 6 || month == "6" || month == "06") {
        name = "June";
    }
    if (month == 7 || month == "7" || month == "07") {
        name = "July";
    }
    if (month == 8 || month == "8" || month == "08") {
        name = "August";
    }
    if (month == 9 || month == "9" || month == "09") {
        name = "September";
    }
    if (month == 10 || month == "10") {
        name = "October";
    }
    if (month == 11 || month == "11") {
        name = "November";
    }
    if (month == 12 || month == "12") {
        name = "December";
    }

    return name;
}

exports.dateTimeFormat = async function(year,month,day){
    var date = new Date(Date.UTC(year,month,day));
    var date_format = new Intl.DateTimeFormat('en-GB', { dateStyle: 'long', }).format(date);

    return date_format;
}

exports.getNameMonthTh = function(month){
    var name = "";
    if (month == 1 || month == "1" || month == "01") {
        name = "มกราคม";
    }
    if (month == 2 || month == "2" || month == "02") {
        name = "กุมภาพันธ์";
    }
    if (month == 3 || month == "3" || month == "03") {
        name = "มีนาคม";
    }
    if (month == 4 || month == "4" || month == "04") {
        name = "เมษายน";
    }
    if (month == 5 || month == "5" || month == "05") {
        name = "พฤษภาคม";
    }
    if (month == 6 || month == "6" || month == "06") {
        name = "มิถุนายน";
    }
    if (month == 7 || month == "7" || month == "07") {
        name = "กรกฏาคม";
    }
    if (month == 8 || month == "8" || month == "08") {
        name = "สิงหาคม";
    }
    if (month == 9 || month == "9" || month == "09") {
        name = "กันยายน";
    }
    if (month == 10 || month == "10") {
        name = "ตุลาคม";
    }
    if (month == 11 || month == "11") {
        name = "พฤศจิกายน";
    }
    if (month == 12 || month == "12") {
        name = "ธันวาคม";
    }

    return name;
}

function check_next(req) {
    let arr_path = req.split("/");
    return !!(arr_path[(arr_path.length)-1] == 'getuser')
}