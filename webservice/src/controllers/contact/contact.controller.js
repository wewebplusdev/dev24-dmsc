const config = require('../../config/env');
const util = require('util');
const general = require('../../middlewares/general.middleware');
const modulus = require('../../middlewares/modulus.middleware');
const code = config.returncode;
const ip = require("ip");
const { base64encode, base64decode } = require('nodejs-base64');
var fs = require('fs');

exports.init = function (req, res) {
    funcRoute(req, res, {
        "insertContact": "insertContact",
        "insertCorruption": "insertCorruption",
    });
}

async function insertContact(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const subject = req.body.inputTopic;
    const title = req.body.inputDesc;
    const tel = req.body.inputTel;
    const email = req.body.inputEmail;
    const name = req.body.inputName;
    const address = req.body.inputAddress;
    const ip = req.body.ip;

    const result = general.checkParam([method, language, subject, title, tel, email, name, address, ip]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_cus'] = config.fieldDB.main.md_cus
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['cum'] = config.fieldDB.masterkey.cum

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            
            let setime_zone = new Date().toLocaleString('de-DE', {timeZone: 'Asia/Bangkok'}).split(' ');
            let date_now = setime_zone[0].split('.');
            date_now = date_now[2].replace(',', '') + "-" + ("0" + date_now[1]).slice(-2) + "-" + ("0" + date_now[0]).slice(-2);
            let time_now = setime_zone[1].split(':');
            time_now = ("0" + time_now[0]).slice(-2) + ":" + ("0" + time_now[1]).slice(-2) + ":" + ("0" + time_now[2]).slice(-2);
            
            let insert = new Array();
            insert[`${config_array_db['md_cus']}_masterkey`] = `'${config_array_masterkey['cum']}'`;
            insert[`${config_array_db['md_cus']}_language`] = `'${language}'`;
            insert[`${config_array_db['md_cus']}_subject`] = `'${subject}'`;
            insert[`${config_array_db['md_cus']}_title`] = `'${title}'`;
            insert[`${config_array_db['md_cus']}_tel`] = `'${tel}'`;
            insert[`${config_array_db['md_cus']}_email`] = `'${email}'`;
            insert[`${config_array_db['md_cus']}_name`] = `'${name}'`;
            insert[`${config_array_db['md_cus']}_address`] = `'${address}'`;

            insert[`${config_array_db['md_cus']}_ip`] = `'${ip}'`;
            insert[`${config_array_db['md_cus']}_status`] = `'Unread'`;
            insert[`${config_array_db['md_cus']}_credate`] = `'${date_now} ${time_now}'`;

            // Construct SQL query
            let columns = Object.keys(insert).join(",");
            let values = Object.values(insert).join(",");
            let queryData = `INSERT INTO ${config_array_db['md_cus']} (${columns}) VALUES (${values})`;
            await query(queryData);

        } catch (error) {
            result.code = code.error_wrong.code;
            result.msg = code.error_wrong.msg;
        }
        conn.destroy();
    }
    res.json(result);
}

async function insertCorruption(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const subject = req.body.inputTopic;
    const title = req.body.inputDesc;
    const tel = req.body.inputTel;
    const email = req.body.inputEmail;
    const name = req.body.inputName;
    const address = req.body.inputAddress;

    const complaint_name = req.body.inputComplaintName;
    const complaint_time = req.body.inputComplaintTime;
    const complaint_fac = req.body.inputComplaintFac;
    const complaint_desc1 = req.body.inputComplaintDesc1;
    const complaint_desc2 = req.body.inputComplaintDesc2;
    const complaint_confirm = req.body.inputComplaintConfirm;

    const ip = req.body.ip;

    const result = general.checkParam([method, language, subject, title, tel, email, name, address, complaint_name, complaint_time, complaint_fac, complaint_desc1, complaint_desc2, complaint_confirm, ip]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_cus'] = config.fieldDB.main.md_cus
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['rec'] = config.fieldDB.masterkey.rec

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            
            let setime_zone = new Date().toLocaleString('de-DE', {timeZone: 'Asia/Bangkok'}).split(' ');
            let date_now = setime_zone[0].split('.');
            date_now = date_now[2].replace(',', '') + "-" + ("0" + date_now[1]).slice(-2) + "-" + ("0" + date_now[0]).slice(-2);
            let time_now = setime_zone[1].split(':');
            time_now = ("0" + time_now[0]).slice(-2) + ":" + ("0" + time_now[1]).slice(-2) + ":" + ("0" + time_now[2]).slice(-2);
            
            let insert = new Array();
            insert[`${config_array_db['md_cus']}_masterkey`] = `'${config_array_masterkey['rec']}'`;
            insert[`${config_array_db['md_cus']}_language`] = `'${language}'`;
            insert[`${config_array_db['md_cus']}_subject`] = `'${subject}'`;
            insert[`${config_array_db['md_cus']}_title`] = `'${title}'`;
            insert[`${config_array_db['md_cus']}_tel`] = `'${tel}'`;
            insert[`${config_array_db['md_cus']}_email`] = `'${email}'`;
            insert[`${config_array_db['md_cus']}_name`] = `'${name}'`;
            insert[`${config_array_db['md_cus']}_address`] = `'${address}'`;

            insert[`${config_array_db['md_cus']}_complaint_name`] = `'${complaint_name}'`;
            insert[`${config_array_db['md_cus']}_complaint_time`] = `'${complaint_time}'`;
            insert[`${config_array_db['md_cus']}_complaint_fac`] = `'${complaint_fac}'`;
            insert[`${config_array_db['md_cus']}_complaint_desc1`] = `'${complaint_desc1}'`;
            insert[`${config_array_db['md_cus']}_complaint_desc2`] = `'${complaint_desc2}'`;
            insert[`${config_array_db['md_cus']}_complaint_confirm`] = `'${complaint_confirm}'`;

            insert[`${config_array_db['md_cus']}_ip`] = `'${ip}'`;
            insert[`${config_array_db['md_cus']}_status`] = `'Unread'`;
            insert[`${config_array_db['md_cus']}_credate`] = `'${date_now} ${time_now}'`;

            // Construct SQL query
            let columns = Object.keys(insert).join(",");
            let values = Object.values(insert).join(",");
            let queryData = `INSERT INTO ${config_array_db['md_cus']} (${columns}) VALUES (${values})`;
            await query(queryData);

        } catch (error) {
            result.code = code.error_wrong.code;
            result.msg = code.error_wrong.msg;
        }
        conn.destroy();
    }
    res.json(result);
}

function funcRoute(req, res, mapFuncs) {
    if (req.body.method === undefined && (req.method === "POST" || req.method === "PUT" || req.method === "DELETE")) {
        // logs
        const authData = {
            appInfo: {app_token:req.body.authData.appInfo.app_token},
            tokenid: req.token,
            code: code.missing_method.code,
            msg: code.missing_method.msg
        }
        general.logs_access_api(req, authData, code.missing_method.code);

        res.json({ code: code.missing_method.code, msg: code.missing_method.msg });
        return 0;
    } else if (req.query.method === undefined && req.method === "GET") {
        // logs
        const authData = {
            appInfo: {app_token:req.body.authData.appInfo.app_token},
            tokenid: req.token,
            code: code.missing_method.code,
            msg: code.missing_method.msg
        }
        general.logs_access_api(req, authData, code.missing_method.code);
        
        res.json({ code: code.missing_method.code, msg: code.missing_method.msg });
        return 0;
    }
    var foundFunction = false;
    for (var mapFunc in mapFuncs) {
        var paramas = req.body;
        if (req.method == "GET") {
            paramas = req.query;
        }

        if (paramas.method == mapFunc) {
            eval(mapFuncs[mapFunc])(req, res);
            foundFunction = true;
            break;
        }
    }

    if (!foundFunction){
        // logs
        const authData = {
            appInfo: {app_token:req.body.authData.appInfo.app_token},
            tokenid: req.token,
            code: code.unknown_method.code,
            msg: code.unknown_method.msg
        }
        general.logs_access_api(req, authData, code.unknown_method.code);

        res.json({ code: code.unknown_method.code, msg: code.unknown_method.msg });
    }

    // logs
    const authData = {
        appInfo: {app_token:req.body.authData.appInfo.app_token},
        tokenid: req.token,
        code: code.success.code,
        msg: code.success.msg
    }
    general.logs_access_api(req, authData, code.success.code);
}