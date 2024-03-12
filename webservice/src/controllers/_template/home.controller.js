const config = require('../../config/env');
const util = require('util');
const general = require('../../middlewares/general.middleware');
const modulus = require('../../middlewares/modulus.middleware');
const code = config.returncode;
const ip = require("ip");
const axios = require('axios');
const { base64encode, base64decode } = require('nodejs-base64');
var fs = require('fs');

exports.init = function(req, res) {
    funcRoute(req, res, {
        "test": "test",
        "getTopgraphic": "getTopgraphic",
    });
}

async function test(req, res) {
    const method = req.body.method;
    const result = general.checkParam([method]);
    res.json(result);
}

async function getTopgraphic(req, res) {
    const method = req.body.method;
    const result = general.checkParam([method]);
    const code = config.returncode;
    // param
    let config_array_param = new Array();
    config_array_param['masterkey'] = req.body.masterkey;
    config_array_param['lang'] = req.body.lang ? req.body.lang : 'th';
    config_array_param['order'] = req.body.order;
    config_array_param['page'] = req.body.page ? req.body.page : 1 ;
    config_array_param['limit'] = req.body.limit ? req.body.limit : 15 ;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_tgp'] = config.fieldDB.main.md_tgp

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        let arr_data = [];
        try {
            let sql = `SELECT 
            ${config_array_db['md_tgp']}_id as id 
            ,${config_array_db['md_tgp']}_masterkey as masterkey 
            ,${config_array_db['md_tgp']}_subject as subject 
            ,${config_array_db['md_tgp']}_title as title 
            ,${config_array_db['md_tgp']}_pic as pic 
            ,${config_array_db['md_tgp']}_sdate as sdate 
            ,${config_array_db['md_tgp']}_edate as edate 
            ,${config_array_db['md_tgp']}_credate as credate 
            FROM ${config_array_db['md_tgp']} WHERE ${config_array_db['md_tgp']}_masterkey = '${config_array_param['masterkey']}' 
            AND ${config_array_db['md_tgp']}_status != 'Disable' 
            AND 
            (
                (${config_array_db['md_tgp']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_tgp']}_edate ='0000-00-00 00:00:00') OR
                (${config_array_db['md_tgp']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_tgp']}_edate)>=TO_DAYS(NOW())) OR
                (TO_DAYS(${config_array_db['md_tgp']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_tgp']}_edate = '0000-00-00 00:00:00') OR
                (TO_DAYS(${config_array_db['md_tgp']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_tgp']}_edate)>=TO_DAYS(NOW()))
            )
            ORDER BY ${config_array_db['md_tgp']}${config_array_param['order']} 
            `;
            let sql_total = sql;
            const select_total = await query(sql_total);
            if (select_total.length > 0) {
                let count_totalrecord;
                let module_pagesize = config_array_param['limit'];
                // Find total data
                if (select_total.length >= 1) {
                    total_data = select_total.length;
                    count_totalrecord = total_data;
                }
                // Find max page size
                let numberofpage;
                if (count_totalrecord > config_array_param['limit']) {
                    numberofpage = Math.ceil(count_totalrecord/config_array_param['limit']);
                }else{
                    numberofpage = 1;
                }
                // Recover page show into range
                let module_pageshow = config_array_param['page'];
                if (module_pageshow > numberofpage) {
                    module_pageshow = numberofpage;
                } else {
                    module_pageshow = config_array_param['page'];
                }
                // Select only paging range
                let recordstart = (module_pageshow-1)*module_pagesize;
                limit_order = recordstart+","+module_pagesize;
                sql += `LIMIT ${limit_order}`
                
                const select = await query(sql);
                if (select.length > 0) {
                    result.code = code.success.code;
                    result.msg = code.success.msg;
                    for (let i = 0; i < select.length; i++) {
                        arr_data[i] = {};
                        arr_data[i].id = select[i]['id'];
                        arr_data[i].subject = select[i]['masterkey'];
                        arr_data[i].title = select[i]['subject'];
                        arr_data[i].pic = {
                            'real' : modulus.getUploadPath(select[i]['masterkey'], 'real', select[i]['pic']),
                            'pictures' : modulus.getUploadPath(select[i]['masterkey'], 'pictures', select[i]['pic']),
                            'office' : modulus.getUploadPath(select[i]['masterkey'], 'office', select[i]['pic']),
                        }
                        arr_data[i].createDate = {
                            full : new Date(select[i]['credate']),
                            style : new Intl.DateTimeFormat(config_array_param['lang'], { dateStyle: 'long', }).format(new Date(select[i]['credate']))
                        };
                    }
                    result._currentPage = parseInt(module_pageshow);
                    result._currentLimit = parseInt(module_pagesize);
                    result._numOfRows = select.length;
                    result._maxRecordCount = select_total.length;
                    let currentReMain = parseInt(select_total.length) - (parseInt(module_pagesize) * parseInt(module_pageshow));
                    result._currentRemain = (currentReMain > 0) ? currentReMain : 0;
                    result._maxPage = numberofpage;
                    result.item = arr_data;
                }else{
                    result.code = code.missing_data.code;
                    result.msg = code.missing_data.msg;
                }
            }else{
                result.code = code.missing_data.code;
                result.msg = code.missing_data.msg; 
            }
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
        res.json({ code: code.missing_method.code, msg: code.missing_method.msg });
        return 0;
    } else if (req.query.method === undefined && req.method === "GET") {
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
        res.json({ code: code.unknown_method.code, msg: code.unknown_method.msg });
    }
}