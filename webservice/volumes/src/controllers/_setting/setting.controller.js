const config = require('../../config/env');
const util = require('util');
const general = require('../../middlewares/general.middleware');
const modulus = require('../../middlewares/modulus.middleware');
const code = config.returncode;
const ip = require("ip");
const axios = require('axios');
const { base64encode, base64decode } = require('nodejs-base64');
var fs = require('fs');
const PHPUnserialize = require('php-unserialize');

exports.init = function (req, res) {
    funcRoute(req, res, {
        "getWebSetting": "getWebSetting",
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
            if (select_lang.length > 1) {
                result.code = code.success.code;
                result.msg = code.success.msg;

                for (let i = 0; i < select_lang.length; i++) {
                    arr_data_language[i] = {};
                    arr_data_language[i].subject = select_lang[i]['subject'];
                    arr_data_language[i].short = select_lang[i]['short'];
                    let language = PHPUnserialize.unserialize(select_lang[0].display);
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
            FROM ${config_array_db['sy_langfront']} WHERE ${config_array_db['sy_langfront']}_status != 'Disable'
            `;
            const select_lang_front = await query(sql_lang_front);
            if (select_lang_front.length > 1) {
                result.code = code.success.code;
                result.msg = code.success.msg;

                let arr_data_langfront = [];
                for (let i = 0; i < select_lang_front.length; i++) {
                    arr_data_langfront[i] = {};
                    arr_data_langfront[i].subject = select_lang_front[i]['subject'];
                    arr_data_langfront[i].short = select_lang_front[i]['short'];
                    let language = PHPUnserialize.unserialize(select_lang_front[0].display);
                    for (const [key, value] of Object.entries(language)) {
                        // // Create a new display object if it doesn't exist
                        // if (!arr_data_langfront[i].display) {
                        //     arr_data_langfront[i].display = {};
                        // }
                        // arr_data_langfront[i].display[key] = value;
                    }
                }
                // console.log(arr_data_langfront);
                // console.log('xxx');
                // result.item.language_front = arr_data_langfront;

                let language = [
                    {
                        subject: 'Thai',
                        short: 'th',
                        display: { Thai: 'ไทย', Eng: 'อังกฤษ' }
                    },
                    {
                        subject: 'Eng',
                        short: 'en',
                        display: { Thai: 'ไทย', Eng: 'อังกฤษ' }
                    }
                ];
                
                let target = [
                    {
                        subject: 'view2',
                        short: 'en',
                        display: {
                            Thai: 'หน้าแรก',
                            Eng: 'Home',
                            Chi: '主頁',
                            Rus: 'Главная страница',
                            Jp: '',
                            Fri: ''
                        }
                    }
                ];
                
                // Function to get the display value based on language
                function getDisplayValue(languageShort, languageSubject, targetObject) {
                    // Find the language object in the language array
                    let lang = language.find(lang => lang.short === languageShort && lang.subject === languageSubject);
                    
                    // If language object is found and the target object contains the language display
                    if (lang && targetObject.display && targetObject.display[languageSubject]) {
                        console.log(languageSubject); // Output: Home
                        console.log(targetObject.display[languageSubject]); // Output: Home
                        // return targetObject.display[languageSubject];
                    } else {
                        // Return a default value or handle the case where the display value is not found
                        return 'Display value not found';
                    }
                }
                
                // // Example usage
                // let displayValue = getDisplayValue(target[0].short, language[1].subject, target[0]);
                // console.log(displayValue); // Output: Home

                
            } else {
                result.item.language_front = null;
            }
        } catch (error) {
            result.item.language_front = null;
        }
        // ################## End Variable Language ##################

        // result.code = code.error_wrong.code;
        // result.msg = code.error_wrong.msg;
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

    if (!foundFunction)
        res.json({ code: code.unknown_method.code, msg: code.unknown_method.msg });

}

