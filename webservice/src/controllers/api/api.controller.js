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
        "loadRedirect": "loadRedirect",
    });
}

async function loadRedirect(req, res) {
    const method = req.body.method;
    const table = req.body.table;
    const id = req.body.id;
    const masterkey = req.body.masterkey;
    const language = req.body.language;
    const action = req.body.action;
    const result = general.checkParam([method, table, id, masterkey, language]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_cms'] = config.fieldDB.main.md_cms
    config_array_db['md_cmsl'] = config.fieldDB.main.md_cmsl

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            if (table === config.fieldDB.main.md_cms) {
                result.code = code.success.code;
                result.msg = code.success.msg;
                let sql_list = `SELECT 
                    ${config_array_db['md_cms']}_id as id 
                    ,${config_array_db['md_cms']}_masterkey as masterkey 
                    ,${config_array_db['md_cms']}_credate as credate 
                    ,${config_array_db['md_cmsl']}_subject as subject 
                    ,${config_array_db['md_cmsl']}_title as title 
                    ,${config_array_db['md_cmsl']}_typec as typec 
                    ,${config_array_db['md_cmsl']}_urlc as urlc 
                    FROM ${config_array_db['md_cms']} 
                    INNER JOIN ${config_array_db['md_cmsl']} ON ${config_array_db['md_cmsl']}_cid = ${config_array_db['md_cms']}_id
                    WHERE ${config_array_db['md_cms']}_masterkey = '${masterkey}' 
                    AND ${config_array_db['md_cms']}_status != 'Disable' 
                    AND ${config_array_db['md_cmsl']}_language = '${language}' 
                    AND ${config_array_db['md_cms']}_id = '${id}' 
                    AND ${config_array_db['md_cmsl']}_subject != '' 
                    `;
                    const select_list = await query(sql_list);
                    if (select_list.length > 0) {
                        let arr_data = {};
                        if (action == 'link') {
                            if (select_list[0].typec == 3) {
                                arr_data.url = select_list[0].urlc;
                            }
                        }
                        let update = new Array;
                        update.push(`${config_array_db['md_cms']}_view = ${config_array_db['md_cms']}_view + 1`);
                        let sql_update = `UPDATE ${config_array_db['md_cms']} SET ${Object.values(update).join(",")} WHERE ${config_array_db['md_cms']}_id = '${id}' `;
                        await query(sql_update);
                        
                        result.item = arr_data;
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