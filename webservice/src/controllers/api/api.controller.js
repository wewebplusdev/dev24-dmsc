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
    config_array_db['md_mnug'] = config.fieldDB.main.md_mnug
    config_array_db['md_mnugl'] = config.fieldDB.main.md_mnugl
    config_array_db['md_mnusg'] = config.fieldDB.main.md_mnusg
    config_array_db['md_mnusgl'] = config.fieldDB.main.md_mnusgl
    config_array_db['md_mnu'] = config.fieldDB.main.md_mnu
    config_array_db['md_mnul'] = config.fieldDB.main.md_mnul

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
                    ,${config_array_db['md_cms']}_gid as gid 
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
                            }else{
                                const getUrlWeb = await modulus.getUrlWebsite(select_list[0].masterkey, select_list[0].typec, language);
                                arr_data.url = `${getUrlWeb}/${select_list[0].id}/${select_list[0].masterkey}/${select_list[0].gid}`;
                            }
                        }
                        let update = new Array;
                        update.push(`${config_array_db['md_cms']}_view = ${config_array_db['md_cms']}_view + 1`);
                        let sql_update = `UPDATE ${config_array_db['md_cms']} SET ${Object.values(update).join(",")} WHERE ${config_array_db['md_cms']}_id = '${id}' `;
                        await query(sql_update);
                        
                        result.item = arr_data;
                    }
            }else if(table === config.fieldDB.main.md_mnug){
                result.code = code.success.code;
                result.msg = code.success.msg;
                let sql_list = `SELECT 
                    ${config_array_db['md_mnug']}_id as id 
                    ,${config_array_db['md_mnug']}_masterkey as masterkey 
                    ,${config_array_db['md_mnug']}_credate as credate 
                    ,${config_array_db['md_mnugl']}_subject as subject 
                    ,${config_array_db['md_mnugl']}_url as url 
                    FROM ${config_array_db['md_mnug']} 
                    INNER JOIN ${config_array_db['md_mnugl']} ON ${config_array_db['md_mnugl']}_cid = ${config_array_db['md_mnug']}_id
                    WHERE ${config_array_db['md_mnug']}_masterkey = '${masterkey}' 
                    AND ${config_array_db['md_mnug']}_status != 'Disable' 
                    AND ${config_array_db['md_mnugl']}_language = '${language}' 
                    AND ${config_array_db['md_mnug']}_id = '${id}' 
                    AND ${config_array_db['md_mnugl']}_subject != '' 
                    `;
                    const select_list = await query(sql_list);
                    if (select_list.length > 0) {
                        let arr_data = {};
                        if (action == 'link') {
                            arr_data.url = select_list[0].url;
                        }
                        let update = new Array;
                        update.push(`${config_array_db['md_mnug']}_view = ${config_array_db['md_mnug']}_view + 1`);
                        let sql_update = `UPDATE ${config_array_db['md_mnug']} SET ${Object.values(update).join(",")} WHERE ${config_array_db['md_mnug']}_id = '${id}' `;
                        await query(sql_update);
                        
                        result.item = arr_data;
                    }
            }else if(table === config.fieldDB.main.md_mnusg){
                result.code = code.success.code;
                result.msg = code.success.msg;
                let sql_list = `SELECT 
                    ${config_array_db['md_mnusg']}_id as id 
                    ,${config_array_db['md_mnusg']}_masterkey as masterkey 
                    ,${config_array_db['md_mnusg']}_credate as credate 
                    ,${config_array_db['md_mnusgl']}_subject as subject 
                    ,${config_array_db['md_mnusgl']}_url as url 
                    FROM ${config_array_db['md_mnusg']} 
                    INNER JOIN ${config_array_db['md_mnusgl']} ON ${config_array_db['md_mnusgl']}_cid = ${config_array_db['md_mnusg']}_id
                    WHERE ${config_array_db['md_mnusg']}_masterkey = '${masterkey}' 
                    AND ${config_array_db['md_mnusg']}_status != 'Disable' 
                    AND ${config_array_db['md_mnusgl']}_language = '${language}' 
                    AND ${config_array_db['md_mnusg']}_id = '${id}' 
                    AND ${config_array_db['md_mnusgl']}_subject != '' 
                    `;
                    const select_list = await query(sql_list);
                    if (select_list.length > 0) {
                        let arr_data = {};
                        if (action == 'link') {
                            arr_data.url = select_list[0].url;
                        }
                        let update = new Array;
                        update.push(`${config_array_db['md_mnusg']}_view = ${config_array_db['md_mnusg']}_view + 1`);
                        let sql_update = `UPDATE ${config_array_db['md_mnusg']} SET ${Object.values(update).join(",")} WHERE ${config_array_db['md_mnusg']}_id = '${id}' `;
                        await query(sql_update);
                        
                        result.item = arr_data;
                    }
                }else if(table === config.fieldDB.main.md_mnu){
                    result.code = code.success.code;
                    result.msg = code.success.msg;
                    let sql_list = `SELECT 
                        ${config_array_db['md_mnu']}_id as id 
                        ,${config_array_db['md_mnu']}_masterkey as masterkey 
                        ,${config_array_db['md_mnu']}_credate as credate 
                        ,${config_array_db['md_mnul']}_subject as subject 
                        ,${config_array_db['md_mnul']}_url as url 
                        FROM ${config_array_db['md_mnu']} 
                        INNER JOIN ${config_array_db['md_mnul']} ON ${config_array_db['md_mnul']}_cid = ${config_array_db['md_mnu']}_id
                        WHERE ${config_array_db['md_mnu']}_masterkey = '${masterkey}' 
                        AND ${config_array_db['md_mnu']}_status != 'Disable' 
                        AND ${config_array_db['md_mnul']}_language = '${language}' 
                        AND ${config_array_db['md_mnu']}_id = '${id}' 
                        AND ${config_array_db['md_mnul']}_subject != '' 
                        `;
                        const select_list = await query(sql_list);
                        if (select_list.length > 0) {
                            let arr_data = {};
                            if (action == 'link') {
                                arr_data.url = select_list[0].url;
                            }
                            let update = new Array;
                            update.push(`${config_array_db['md_mnu']}_view = ${config_array_db['md_mnu']}_view + 1`);
                            let sql_update = `UPDATE ${config_array_db['md_mnu']} SET ${Object.values(update).join(",")} WHERE ${config_array_db['md_mnu']}_id = '${id}' `;
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