const config = require('../../config/env');
const util = require('util');
const general = require('../../middlewares/general.middleware');
const modulus = require('../../middlewares/modulus.middleware');
const code = config.returncode;
const PHPUnserialize = require('php-unserialize');

exports.init = function (req, res) {
    funcRoute(req, res, {
        "getWebSetting": "getWebSetting",
        "getIntro": "getIntro",
    });
}

async function getWebSetting(req, res) {
    const method = req.body.method;
    const result = general.checkParam([method]);
    const code = config.returncode;

    // db tables
    let config_array_db = new Array();
    config_array_db['sy_lang'] = config.fieldDB.main.sy_lang
    config_array_db['sy_langfront'] = config.fieldDB.main.sy_langfront
    config_array_db['md_ab'] = config.fieldDB.main.md_ab
    config_array_db['md_abl'] = config.fieldDB.main.md_abl

    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['sy_lang'] = config.fieldDB.masterkey.sm

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        result.item = {};
        let arr_data_language = [];
        // ################## Start Language ##################
        try {
            let sql_lang = `SELECT 
            ${config_array_db['sy_lang']}_id as id 
            ,${config_array_db['sy_lang']}_subject as subject 
            ,${config_array_db['sy_lang']}_short as short 
            ,${config_array_db['sy_lang']}_display as display 
            FROM ${config_array_db['sy_lang']} WHERE ${config_array_db['sy_lang']}_status != 'Disable'
            `;
            const select_lang = await query(sql_lang);
            if (select_lang.length > 0) {
                result.code = code.success.code;
                result.msg = code.success.msg;

                for (let i = 0; i < select_lang.length; i++) {
                    arr_data_language[i] = {};
                    arr_data_language[i].subject = select_lang[i].subject;
                    arr_data_language[i].short = select_lang[i].short;
                    let language = PHPUnserialize.unserialize(select_lang[i].display);
                    for (const [key, value] of Object.entries(language)) {
                        // Create a new display object if it doesn't exist
                        if (!arr_data_language[i].display) {
                            arr_data_language[i].display = {};
                        }
                        arr_data_language[i].display[key] = value;
                    }
                }
                result.item.language = arr_data_language;
            } else {
                result.item.language = null;
            }
        } catch (error) {
            result.item.language = null;
        }
        // ################## End Language ##################

        // ################## Start Variable Language ##################
        try {
            let sql_lang_front = `SELECT 
            ${config_array_db['sy_langfront']}_id as id 
            ,${config_array_db['sy_langfront']}_subject as subject 
            ,${config_array_db['sy_langfront']}_display as display 
            ,${config_array_db['sy_langfront']}_inputtype as inputtype 
            FROM ${config_array_db['sy_langfront']} WHERE ${config_array_db['sy_langfront']}_status != 'Disable'
            `;
            const select_lang_front = await query(sql_lang_front);
            if (select_lang_front.length > 0) {
                result.code = code.success.code;
                result.msg = code.success.msg;

                let arr_data_langfront = {};
                for (let i = 0; i < select_lang_front.length; i++) {
                    arr_data_langfront[select_lang_front[i].subject] = {};
                    let language = PHPUnserialize.unserialize(select_lang_front[i].display);
                    if (select_lang_front[i].inputtype == 1) {
                        arr_data_langfront[select_lang_front[i].subject].type = 'upload';
                    }else{
                        arr_data_langfront[select_lang_front[i].subject].type = 'text';
                    }
                    for (const [key, value] of Object.entries(arr_data_language)) {
                        // Create a new display object if it doesn't exist
                        if (!arr_data_langfront[select_lang_front[i].subject].display) {
                            arr_data_langfront[select_lang_front[i].subject].display = {};
                        }
                        let displayValueThai = getDisplayValue(value.subject, language);
                        if (select_lang_front[i].inputtype == 1) {
                            displayValueThai = `${config.hostUpload}/site/real/${displayValueThai}`;
                        }
                        arr_data_langfront[select_lang_front[i].subject].display[value.subject] = displayValueThai;
                    }
                }
                result.item.language_front = arr_data_langfront;
            } else {
                result.item.language_front = null;
            }
        } catch (error) {
            result.item.language_front = null;
        }
        // ################## End Variable Language ##################

        // ################## Start Sitemap ##################
        try {
            const json = await fetch(`${config.containerFrontend}/webservice_json/sitemap.json`).then(res => res.json());
            result.item.sitemap = json;
        } catch (error) {
            result.item.sitemap = null;
        }
        // ################## End Sitemap ##################

        // ################## Start Live Chat Facebook ##################
        try {
            let sql_facebook = `SELECT 
            ${config_array_db['md_ab']}_id as id 
            ,${config_array_db['md_ab']}_masterkey as masterkey 
            ,${config_array_db['md_abl']}_language as language 
            ,${config_array_db['md_abl']}_subject as subject 
            ,${config_array_db['md_abl']}_title as title 
            FROM ${config_array_db['md_ab']} 
            INNER JOIN ${config_array_db['md_abl']} ON ${config_array_db['md_abl']}_cid = ${config_array_db['md_ab']}_id
            WHERE ${config_array_db['md_ab']}_status != 'Disable'
            `;
            const select_facebook = await query(sql_facebook);
            if (select_facebook.length > 0) {
                result.item.facebook = select_facebook[0].title;
            }else{
                result.item.facebook = null;
            }
        } catch (error) {
            result.item.facebook = null;
        }
        // ################## End Live Chat Facebook ##################
    }
    res.json(result);
}

function getDisplayValue(languageSubject, targetObject) {
    if (targetObject[languageSubject]) {
        return targetObject[languageSubject];
    } else {
        return '';
    }
}

async function getIntro(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const result = general.checkParam([method, language]);
    const code = config.returncode;

    // db tables
    let config_array_db = new Array();
    config_array_db['md_int'] = config.fieldDB.main.md_int
    config_array_db['md_intl'] = config.fieldDB.main.md_intl

    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['intro'] = config.fieldDB.masterkey.int

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        let arr_data = [];
        try {
            let sql_intro = `SELECT 
            ${config_array_db['md_int']}_id as id 
            ,${config_array_db['md_int']}_credate as credate 
            ,${config_array_db['md_intl']}_masterkey as masterkey 
            ,${config_array_db['md_intl']}_subject as subject 
            ,${config_array_db['md_intl']}_pic as pic 
            ,${config_array_db['md_intl']}_url as url 
            ,${config_array_db['md_intl']}_target as target 
            FROM ${config_array_db['md_int']} 
            INNER JOIN ${config_array_db['md_intl']} ON ${config_array_db['md_intl']}_cid = ${config_array_db['md_int']}_id
            WHERE ${config_array_db['md_int']}_status != 'Disable' 
            AND ${config_array_db['md_intl']}_language = '${language}' 
            AND 
            (
                (${config_array_db['md_int']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_int']}_edate ='0000-00-00 00:00:00') OR
                (${config_array_db['md_int']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_int']}_edate)>=TO_DAYS(NOW())) OR
                (TO_DAYS(${config_array_db['md_int']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_int']}_edate = '0000-00-00 00:00:00') OR
                (TO_DAYS(${config_array_db['md_int']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_int']}_edate)>=TO_DAYS(NOW()))
            )
            ORDER BY ${config_array_db['md_int']}_order DESC 
            `;
            const select_intro = await query(sql_intro);
            if (select_intro.length > 0) {
                result.code = code.success.code;
                result.msg = code.success.msg;
                for (let i = 0; i < select_intro.length; i++) {
                    arr_data[i] = {};
                    arr_data[i].masterkey = select_intro[i].masterkey;
                    arr_data[i].subject = select_intro[i].subject;
                    arr_data[i].pic = {
                        'real': modulus.getUploadPath(select_intro[i].masterkey, 'real', select_intro[i].pic),
                        'pictures': modulus.getUploadPath(select_intro[i].masterkey, 'pictures', select_intro[i].pic),
                        'office': modulus.getUploadPath(select_intro[i].masterkey, 'office', select_intro[i].pic),
                    }
                    arr_data[i].createDate = {
                        full: new Date(select_intro[i].credate),
                        style: new Intl.DateTimeFormat('th', { dateStyle: 'long', }).format(new Date(select_intro[i].credate))
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