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
        "getFeed": "getFeed",
    });
}

async function getFeed(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const contentid = req.body.contentid;
    const result = general.checkParam([method, language, contentid]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_js'] = config.fieldDB.main.md_js
    config_array_db['md_jsl'] = config.fieldDB.main.md_jsl
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['masterkey'] = config.fieldDB.masterkey.jsw;
    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            let sql_list = `SELECT 
                ${config_array_db['md_js']}_id as id 
                ,${config_array_db['md_js']}_masterkey as masterkey 
                ,${config_array_db['md_js']}_credate as credate 
                ,${config_array_db['md_jsl']}_subject as subject 
                ,${config_array_db['md_jsl']}_url as url 
                FROM ${config_array_db['md_js']} 
                INNER JOIN ${config_array_db['md_jsl']} ON ${config_array_db['md_jsl']}_cid = ${config_array_db['md_js']}_id
                WHERE ${config_array_db['md_js']}_masterkey = '${config_array_masterkey['masterkey']}' 
                AND ${config_array_db['md_js']}_status != 'Disable' 
                AND ${config_array_db['md_jsl']}_language = '${language}' 
                AND ${config_array_db['md_jsl']}_subject != '' `;
            if (parseInt(contentid) > 0) {
                sql_list = sql_list + ` AND ${config_array_db['md_js']}_id = '${contentid}' `;
            }
            // console.log(sql_list);
            const select = await query(sql_list);
            if (select.length > 0) {
                let arr_data = [];
                result.code = code.success.code;
                result.msg = code.success.msg;
                const short_language = await modulus.getCoreLanguage(language);
                for (let i = 0; i < select.length; i++) {
                    arr_data[i] = {};
                    arr_data[i].id = select[i].id;
                    arr_data[i].masterkey = select[i].masterkey;
                    arr_data[i].subject = select[i].subject;
                    // const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, 'group', short_language);
                    const getUrlWeb = await modulus.getUrlWebsiteCmsg('group', short_language);
                    arr_data[i].url = `${getUrlWeb}/${select[i].masterkey}/${select[i].id}`;
                    arr_data[i].api = `${select[i].url}`;
                    arr_data[i].target = `_self`;
                    arr_data[i].createDate = {
                        full: new Date(select[i].credate),
                        style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select[i].credate))
                    };
                }
                result.item = arr_data;
            } else {
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