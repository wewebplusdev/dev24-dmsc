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
        "acceptLogsPDPA": "acceptLogsPDPA",
        "getPolicy": "getPolicy",
        "getPolicyDetail": "getPolicyDetail",
        "getHelp": "getHelp",
        "getHelpDetail": "getHelpDetail",
        "LogsViewWebsite": "LogsViewWebsite",
    });
}

async function getWebSetting(req, res) {
    const method = req.body.method;
    let language = req.body.language ? req.body.language : 'Thai';
    const result = general.checkParam([method]);
    const code = config.returncode;

    // db tables
    let config_array_db = new Array();
    config_array_db['md_sit'] = config.fieldDB.main.md_sit
    config_array_db['md_sitl'] = config.fieldDB.main.md_sitl
    config_array_db['sy_lang'] = config.fieldDB.main.sy_lang
    config_array_db['sy_langfront'] = config.fieldDB.main.sy_langfront
    config_array_db['md_ab'] = config.fieldDB.main.md_ab
    config_array_db['md_abl'] = config.fieldDB.main.md_abl
    config_array_db['md_logs_view'] = config.fieldDB.main.md_logs_view

    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['sy_lang'] = config.fieldDB.masterkey.sm
    config_array_masterkey['lcf'] = config.fieldDB.masterkey.lcf
    config_array_masterkey['set'] = config.fieldDB.masterkey.set
    config_array_masterkey['cmf'] = config.fieldDB.masterkey.cmf
    
    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        result.item = {};
        let arr_data_language = [];

        // ################## Start Set Default Language ##################
        let sql_lang_set = `SELECT 
        ${config_array_db['sy_lang']}_id as id 
        ,${config_array_db['sy_lang']}_subject as subject 
        ,${config_array_db['sy_lang']}_short as short 
        ,${config_array_db['sy_lang']}_display as display 
        FROM ${config_array_db['sy_lang']} WHERE ${config_array_db['sy_lang']}_status != 'Disable' 
        AND ${config_array_db['sy_lang']}_subject = '${language}' 
        `;
        const select_lang_set = await query(sql_lang_set);
        if (select_lang_set.length == 1) {
            result.item.current_lang = select_lang_set[0]['subject'];
        }else{
            language = 'Thai'
            result.item.current_lang = 'Thai';
        }
        // ################## Start Set Default Language ##################

        // ################## Start Setting ##################
        try {
            let sql_setting = `SELECT 
            ${config_array_db['md_sit']}_id as id 
            ,${config_array_db['md_sit']}_masterkey as masterkey 
            ,${config_array_db['md_sitl']}_subject as subject 
            ,${config_array_db['md_sitl']}_title as title 
            ,${config_array_db['md_sitl']}_description as description 
            ,${config_array_db['md_sitl']}_keywords as keywords 
            ,${config_array_db['md_sitl']}_metatitle as metatitle 
            ,${config_array_db['md_sitl']}_social as social 
            ,${config_array_db['md_sitl']}_config as config 
            ,${config_array_db['md_sitl']}_subjectoffice as subjectoffice 
            FROM ${config_array_db['md_sit']} 
            INNER JOIN ${config_array_db['md_sitl']} ON ${config_array_db['md_sitl']}_containid = ${config_array_db['md_sit']}_id
            WHERE ${config_array_db['md_sit']}_masterkey = '${config_array_masterkey['set']}' 
            AND ${config_array_db['md_sitl']}_language = '${language}' 
            AND ${config_array_db['md_sitl']}_subject != '' 
            `;
            const select_setting = await query(sql_setting);
            if (select_setting.length > 0) {
                result.code = code.success.code;
                result.msg = code.success.msg;
                let arr_data_setting = {};

                for (let i = 0; i < select_setting.length; i++) {
                    arr_data_setting.subject = select_setting[i].subject;
                    arr_data_setting.subjectoffice = select_setting[i].subjectoffice;
                    arr_data_setting.metatitle = select_setting[i].metatitle;
                    arr_data_setting.keywords = select_setting[i].keywords;
                    arr_data_setting.description = select_setting[i].description;
                    let social = PHPUnserialize.unserialize(select_setting[i].social);
                    for (const [key, value] of Object.entries(social)) {
                        // Create a new display object if it doesn't exist
                        if (!arr_data_setting.social) {
                            arr_data_setting.social = {};
                        }
                        arr_data_setting.social[key] = value;
                    }
                    let config = PHPUnserialize.unserialize(select_setting[i].config);
                    for (const [key, value] of Object.entries(config)) {
                        // Create a new display object if it doesn't exist
                        if (!arr_data_setting.config) {
                            arr_data_setting.config = {};
                        }
                        arr_data_setting.config[key] = value;
                    }
                }
                result.item.setting = arr_data_setting;
            } else {
                result.item.setting = null;
            }
        } catch (error) {
            result.item.setting = null;
        }
        // ################## End Setting ##################

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
            AND ${config_array_db['md_ab']}_masterkey = '${config_array_masterkey['lcf']}' 
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

        // ################## Start Comment Facebook ##################
        try {
            let sql_cmfacebook = `SELECT 
            ${config_array_db['md_ab']}_id as id 
            ,${config_array_db['md_ab']}_masterkey as masterkey 
            ,${config_array_db['md_abl']}_language as language 
            ,${config_array_db['md_abl']}_subject as subject 
            ,${config_array_db['md_abl']}_title as title 
            FROM ${config_array_db['md_ab']} 
            INNER JOIN ${config_array_db['md_abl']} ON ${config_array_db['md_abl']}_cid = ${config_array_db['md_ab']}_id
            WHERE ${config_array_db['md_ab']}_status != 'Disable' 
            AND ${config_array_db['md_ab']}_masterkey = '${config_array_masterkey['cmf']}' 
            `;
            const select_cmfacebook = await query(sql_cmfacebook);
            if (select_cmfacebook.length > 0) {
                result.item.cmfacebook = select_cmfacebook[0].title;
            }else{
                result.item.cmfacebook = null;
            }
        } catch (error) {
            result.item.cmfacebook = null;
        }
        // ################## End Comment Facebook ##################

        // ################## Start View Website ##################
        try {
            let sql_count_view = `SELECT 
            count(${config_array_db['md_logs_view']}_id) as count_row 
            FROM ${config_array_db['md_logs_view']} 
            WHERE 1=1
            `;
            const select_count_view = await query(sql_count_view);
            if (select_count_view.length > 0) {
                result.item.count_view = select_count_view[0].count_row;
            }else{
                result.item.count_view = 0;
            }
        } catch (error) {
            result.item.count_view = 0;
        }
        // ################## End View Website ##################
        conn.destroy();
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
            ,${config_array_db['md_intl']}_type as type 
            ,${config_array_db['md_intl']}_urlc as urlc 
            ,${config_array_db['md_intl']}_title as title 
            ,${config_array_db['md_intl']}_filevdo as filevdo 
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
                    arr_data[i].type = select_intro[i].type;
                    arr_data[i].title = select_intro[i].title;
                    if (select_intro[i].type == 1) {
                        arr_data[i].pic = {
                            'real': modulus.getUploadPath(select_intro[i].masterkey, 'real', select_intro[i].pic),
                            'pictures': modulus.getUploadPath(select_intro[i].masterkey, 'pictures', select_intro[i].pic),
                            'office': modulus.getUploadPath(select_intro[i].masterkey, 'office', select_intro[i].pic),
                        }
                    }else if(select_intro[i].type == 2){
                        arr_data[i].video = select_intro[i].urlc;
                    }else{
                        arr_data[i].video = {
                            'real': modulus.getUploadPath(select_intro[i].masterkey, 'vdo', select_intro[i].filevdo),
                        }
                    }
                    arr_data[i].url = select_intro[i].url;
                    arr_data[i].target = (select_intro[i].target == 2) ? '_blank' : '_self';
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
        conn.destroy();
    }
    res.json(result);
}

async function acceptLogsPDPA(req, res) {
    const method = req.body.method;
    const browser = req.body.browser;
    const client = req.body.user;
    const secretkey = req.body.secretkey;
    const uniqid = req.body.uniqid;
    const result = general.checkParam([method, browser, client, secretkey]);
    const code = config.returncode;

    // db tables
    let config_array_db = new Array();
    config_array_db['md_pdpa'] = config.fieldDB.main.md_pdpa
    config_array_db['md_usk'] = config.fieldDB.main.md_usk

    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['accept'] = config.fieldDB.masterkey.accept

    var setime_zone = new Date().toLocaleString('de-DE', {timeZone: 'Asia/Bangkok'}).split(' ');
    var date_now = setime_zone[0].split('.');
    date_now = date_now[2].replace(',', '') + "-" + ("0" + date_now[1]).slice(-2) + "-" + ("0" + date_now[0]).slice(-2);
    var time_now = setime_zone[1].split(':');
    time_now = ("0" + time_now[0]).slice(-2) + ":" + ("0" + time_now[1]).slice(-2) + ":" + ("0" + time_now[2]).slice(-2);

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            let sql_usk = `SELECT 
            ${config_array_db['md_usk']}_id as id 
            ,${config_array_db['md_usk']}_masterkey as masterkey 
            ,${config_array_db['md_usk']}_controlkey as controlkey 
            ,${config_array_db['md_usk']}_secretkey as secretkey 
            ,${config_array_db['md_usk']}_credate as credate 
            FROM ${config_array_db['md_usk']} WHERE ${config_array_db['md_usk']}_controlkey = '${client}' 
            AND ${config_array_db['md_usk']}_secretkey = '${secretkey}'
            AND ${config_array_db['md_usk']}_status != 'Disable'
            `;
            const select_lang = await query(sql_usk);
            if (select_lang.length > 0) {
                let insert = new Array();
                insert[`${config_array_db['md_pdpa']}_masterkey`] = `'${config_array_masterkey['accept']}'`;
                insert[`${config_array_db['md_pdpa']}_credate`] = `'${date_now} ${time_now}'`;
                let ipAddress = modulus.getClientIP(req);
                insert[`${config_array_db['md_pdpa']}_ipaddress`] = `'${ipAddress ? ipAddress : ''}'`;
                insert[`${config_array_db['md_pdpa']}_accesstoken`] = `'${uniqid}'`;
                insert[`${config_array_db['md_pdpa']}_browser`] = `'${browser}'`;
                // Construct SQL query
                let columns = Object.keys(insert).join(",");
                let values = Object.values(insert).join(",");
                let queryData = `INSERT INTO ${config_array_db['md_pdpa']} (${columns}) VALUES (${values})`;
    
                const insert_data = await query(queryData);
                if (insert_data?.insertId > 0) {
                    result.code = code.success.code;
                    result.msg = code.success.msg;
                }else{
                    result.code = 400;
                    result.msg = 'Insert data fail.';
                }
            }else{
                result.code = 400;
                result.msg = 'Permission Access denie.';
            }
        } catch (error) {
            result.code = code.error_wrong.code;
            result.msg = code.error_wrong.msg;
        }
        conn.destroy();
    }
    res.json(result);
}

async function getPolicy(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const result = general.checkParam([method, language, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_cms'] = config.fieldDB.main.md_cms
    config_array_db['md_cmsl'] = config.fieldDB.main.md_cmsl
    config_array_db['md_cmg'] = config.fieldDB.main.md_cmg
    config_array_db['md_cmgl'] = config.fieldDB.main.md_cmgl
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['plc'] = config.fieldDB.masterkey.plc

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            let sql_list = `SELECT 
                ${config_array_db['md_cms']}_id as id 
                ,${config_array_db['md_cms']}_masterkey as masterkey 
                ,${config_array_db['md_cms']}_sdate as sdate 
                ,${config_array_db['md_cms']}_edate as edate 
                ,${config_array_db['md_cms']}_credate as credate 
                ,${config_array_db['md_cms']}_gid as gid 
                ,${config_array_db['md_cmsl']}_subject as subject 
                ,${config_array_db['md_cmsl']}_title as title 
                ,${config_array_db['md_cmsl']}_typec as typec 
                ,${config_array_db['md_cmsl']}_picType as picType 
                ,${config_array_db['md_cmsl']}_picDefault as picDefault 
                ,${config_array_db['md_cmsl']}_pic as pic 
                ,${config_array_db['md_cmsl']}_urlc as urlc 
                ,${config_array_db['md_cmsl']}_target as target 
                ,'${config_array_db['md_cms']}' as tb 
                FROM ${config_array_db['md_cms']} 
                INNER JOIN ${config_array_db['md_cmsl']} ON ${config_array_db['md_cmsl']}_cid = ${config_array_db['md_cms']}_id
                WHERE ${config_array_db['md_cms']}_masterkey = '${config_array_masterkey['plc']}' 
                AND ${config_array_db['md_cms']}_status != 'Disable' 
                AND ${config_array_db['md_cmsl']}_language = '${language}' 
                AND ${config_array_db['md_cmsl']}_subject != '' 
                AND 
                (
                    (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_cms']}_edate ='0000-00-00 00:00:00') OR
                    (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW())) OR
                    (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_cms']}_edate = '0000-00-00 00:00:00') OR
                    (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW()))
                )
                ORDER BY ${config_array_db['md_cms']}_order ${order} 
                `;
            const select_list = await query(sql_list);
            if (select_list.length > 0) {
                let count_totalrecord;
                let module_pagesize = limit;
                // Find total data
                if (select_list.length >= 1) {
                    total_data = select_list.length;
                    count_totalrecord = total_data;
                }
                // Find max page size
                let numberofpage;
                if (count_totalrecord > limit) {
                    numberofpage = Math.ceil(count_totalrecord / limit);
                } else {
                    numberofpage = 1;
                }
                // Recover page show into range
                let module_pageshow = page;
                if (module_pageshow > numberofpage) {
                    module_pageshow = numberofpage;
                } else {
                    module_pageshow = page;
                }
                // Select only paging range
                let recordstart = (module_pageshow - 1) * module_pagesize;
                limit_order = recordstart + "," + module_pagesize;
                sql_list += `LIMIT ${limit_order}`
                const select = await query(sql_list);
                if (select.length > 0) {
                    let arr_data = [];
                    result.code = code.success.code;
                    result.msg = code.success.msg;
                    const short_language = await modulus.getCoreLanguage(language);
                    const default_pic = await modulus.getDefaultPic();
                    for (let i = 0; i < select.length; i++) {
                        arr_data[i] = {};
                        arr_data[i].id = select[i].id;
                        arr_data[i].masterkey = select[i].masterkey;
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].title = select[i].title;
                        arr_data[i].language = language;
                        arr_data[i].tb = select[i].tb;
                        arr_data[i].typec = select[i].typec;
                        if (select[i].typec == 2) {
                            const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                            arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}`;
                            arr_data[i].target = `_blank`;
                        } else if (select[i].typec == 3) {
                            arr_data[i].url = (select[i].urlc != "" && select[i].urlc != "#") ? select[i].urlc : "#";
                            arr_data[i].target = (select[i].target == 1) ? '_self' : '_blank';
                        } else {
                            const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                            arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}`;
                            arr_data[i].target = `_self`;
                        }
                        if (select[i].picType == 1) {
                            let defaultPic = default_pic[select[i].picDefault];
                            arr_data[i].pic = {
                                'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                                'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                                'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                            }
                        } else {
                            arr_data[i].pic = {
                                'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                            }
                        }
                        arr_data[i].createDate = {
                            full: new Date(select[i].credate),
                            style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select[i].credate))
                        };
                    }
                    result._currentPage = parseInt(module_pageshow);
                    result._currentLimit = parseInt(module_pagesize);
                    result._numOfRows = select.length;
                    result._maxRecordCount = select_list.length;
                    let currentReMain = parseInt(select_list.length) - (parseInt(module_pagesize) * parseInt(module_pageshow));
                    result._currentRemain = (currentReMain > 0) ? currentReMain : 0;
                    result._maxPage = numberofpage;
                    result.item = arr_data;
                } else {
                    result.code = code.missing_data.code;
                    result.msg = code.missing_data.msg;
                }
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

async function getPolicyDetail(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const contentid = req.body.contentid;
    const result = general.checkParam([method, language, contentid]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_cms'] = config.fieldDB.main.md_cms
    config_array_db['md_cmsl'] = config.fieldDB.main.md_cmsl
    config_array_db['md_cmg'] = config.fieldDB.main.md_cmg
    config_array_db['md_cmgl'] = config.fieldDB.main.md_cmgl
    config_array_db['md_cma'] = config.fieldDB.main.md_cma
    config_array_db['md_cmf'] = config.fieldDB.main.md_cmf
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['plc'] = config.fieldDB.masterkey.plc

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            let sql_list = `SELECT 
                *,
                (
                    SELECT ${config_array_db['md_cms']}_id
                    FROM ${config_array_db['md_cms']}
                    WHERE ${config_array_db['md_cms']}_id < t.id
                    ORDER BY ${config_array_db['md_cms']}_id DESC
                    LIMIT 1
                ) AS previous_id,
                (
                    SELECT ${config_array_db['md_cms']}_id
                    FROM ${config_array_db['md_cms']}
                    WHERE ${config_array_db['md_cms']}_id > t.id
                    ORDER BY ${config_array_db['md_cms']}_id ASC
                    LIMIT 1
                ) AS next_id
                FROM (
                    SELECT 
                    ${config_array_db['md_cms']}_id as id 
                    ,${config_array_db['md_cms']}_masterkey as masterkey 
                    ,${config_array_db['md_cms']}_sdate as sdate 
                    ,${config_array_db['md_cms']}_edate as edate 
                    ,${config_array_db['md_cms']}_credate as credate 
                    ,${config_array_db['md_cms']}_gid as gid 
                    ,${config_array_db['md_cmsl']}_id as lid 
                    ,${config_array_db['md_cmsl']}_subject as subject 
                    ,${config_array_db['md_cmsl']}_title as title 
                    ,${config_array_db['md_cmsl']}_typec as typec 
                    ,${config_array_db['md_cmsl']}_picType as picType 
                    ,${config_array_db['md_cmsl']}_picDefault as picDefault 
                    ,${config_array_db['md_cmsl']}_pic as pic 
                    ,${config_array_db['md_cmsl']}_urlc as urlc 
                    ,${config_array_db['md_cmsl']}_target as target 
                    ,${config_array_db['md_cmsl']}_htmlfilename as htmlfilename 
                    ,${config_array_db['md_cmsl']}_url as url 
                    ,${config_array_db['md_cmsl']}_description as description 
                    ,${config_array_db['md_cmsl']}_keywords as keywords 
                    ,${config_array_db['md_cmsl']}_metatitle as metatitle 
                    FROM ${config_array_db['md_cms']} 
                    INNER JOIN ${config_array_db['md_cmsl']} ON ${config_array_db['md_cmsl']}_cid = ${config_array_db['md_cms']}_id
                    WHERE ${config_array_db['md_cms']}_masterkey = '${config_array_masterkey['plc']}' 
                    AND ${config_array_db['md_cms']}_status != 'Disable' 
                    AND ${config_array_db['md_cms']}_id = '${contentid}' 
                    AND ${config_array_db['md_cmsl']}_language = '${language}' 
                    AND ${config_array_db['md_cmsl']}_subject != '' 
                    AND 
                    (
                        (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_cms']}_edate ='0000-00-00 00:00:00') OR
                        (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW())) OR
                        (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_cms']}_edate = '0000-00-00 00:00:00') OR
                        (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW()))
                    )
                ) as t`;
            const select = await query(sql_list);
            if (select.length > 0) {
                let arr_data = [];
                result.code = code.success.code;
                result.msg = code.success.msg;
                const short_language = await modulus.getCoreLanguage(language);
                const default_pic = await modulus.getDefaultPic();
                for (let i = 0; i < select.length; i++) {
                    arr_data[i] = {};
                    arr_data[i].id = select[i].id;
                    arr_data[i].masterkey = select[i].masterkey;
                    arr_data[i].subject = select[i].subject;
                    arr_data[i].title = select[i].title;
                    arr_data[i].typec = select[i].typec;
                    if (select[i].picType == 1) {
                        let defaultPic = default_pic[select[i].picDefault];
                        arr_data[i].pic = {
                            'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                            'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                            'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                        }
                    } else {
                        arr_data[i].pic = {
                            'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                            'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                            'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                        }
                    }
                    arr_data[i].createDate = {
                        full: new Date(select[i].credate),
                        style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select[i].credate))
                    };
                    if (select[i].typec == 2) {
                        // attachments
                        let sql_video = `SELECT 
                        ${config_array_db['md_cmf']}_id as id
                        ,${config_array_db['md_cmf']}_contantid as contantid
                        ,${config_array_db['md_cmf']}_filename as filename
                        ,${config_array_db['md_cmf']}_name as name 
                        ,${config_array_db['md_cmf']}_download as download 
                        FROM ${config_array_db['md_cmf']} 
                        WHERE ${config_array_db['md_cmf']}_contantid = '${select[i].lid}' 
                        AND ${config_array_db['md_cmf']}_language = '${language}' 
                        `;
                        const select_attachments = await query(sql_video);
                        if (select_attachments.length > 0) {
                            for (let index = 0; index < select_attachments.length; index++) {
                                arr_data[i].url = modulus.getUploadPath(select[i].masterkey, 'file', select_attachments[index].filename);
                            }
                        }else{
                            arr_data[i].url = ``;
                        }
                        arr_data[i].target = `_self`;
                    } else if (select[i].typec == 3) {
                        arr_data[i].url = (select[i].urlc != "" && select[i].urlc != "#") ? select[i].urlc : "#";
                        arr_data[i].target = (select[i].target == 1) ? '_self' : '_blank';
                    } else {
                        const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                        arr_data[i].target = `_self`;
                        arr_data[i].htmllink = modulus.getUploadPath(select[i].masterkey, 'html', select[i].htmlfilename);
                        let html_url = modulus.getUploadPath(select[i].masterkey, 'html', select[i].htmlfilename, 1);
                        let contentHTML = await modulus.getContentFromUrl(html_url);
                        contentHTML = await modulus.getTextReplace(contentHTML);
                        arr_data[i].html = contentHTML;

                        // album
                        let sql_album = `SELECT 
                        ${config_array_db['md_cma']}_id as id
                        ,${config_array_db['md_cma']}_contantid as contantid
                        ,${config_array_db['md_cma']}_filename as filename
                        ,${config_array_db['md_cma']}_name as name 
                        FROM ${config_array_db['md_cma']} 
                        WHERE ${config_array_db['md_cma']}_contantid = '${select[i].lid}' 
                        AND ${config_array_db['md_cma']}_language = '${language}' 
                        `;
                        const select_album = await query(sql_album);
                        if (select_album.length > 0) {
                            let array_album = [];
                            for (let index = 0; index < select_album.length; index++) {
                                array_album[index] = {};
                                array_album[index].name = select_album[index].name;
                                array_album[index].filename = select_album[index].filename;
                                array_album[index].link = modulus.getUploadPath(select[i].masterkey, 'album', select_album[index].filename);
                            }
                            arr_data[i].album = array_album;
                        }else{
                            arr_data[i].album = ``;
                        }
                        // attachments
                        let sql_video = `SELECT 
                        ${config_array_db['md_cmf']}_id as id
                        ,${config_array_db['md_cmf']}_contantid as contantid
                        ,${config_array_db['md_cmf']}_filename as filename
                        ,${config_array_db['md_cmf']}_name as name 
                        ,${config_array_db['md_cmf']}_download as download 
                        FROM ${config_array_db['md_cmf']} 
                        WHERE ${config_array_db['md_cmf']}_contantid = '${select[i].lid}' 
                        AND ${config_array_db['md_cmf']}_language = '${language}' 
                        `;
                        const select_attachments = await query(sql_video);
                        if (select_attachments.length > 0) {
                            let array_attachments = [];
                            for (let index = 0; index < select_attachments.length; index++) {
                                array_attachments[index] = {};
                                array_attachments[index].name = select_attachments[index].name;
                                array_attachments[index].filename = select_attachments[index].filename;
                                array_attachments[index].link = modulus.getUploadPath(select[i].masterkey, 'file', select_attachments[index].filename);
                                array_attachments[index].download = select_attachments[index].download;
                            }
                            arr_data[i].attachment = array_attachments;
                        }else{
                            arr_data[i].attachment = ``;
                        }
                        arr_data[i].video = select[i].url;
                        arr_data[i].metadescription = select[i].description;
                        arr_data[i].metakeywords = select[i].keywords;
                        arr_data[i].metatitle = select[i].metatitle;
                    }
                    arr_data[i].next_id = select[i].next_id ? select[i].next_id : 0;
                    arr_data[i].previous_id = select[i].previous_id ? select[i].previous_id : 0;
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

async function getHelp(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const result = general.checkParam([method, language, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_cms'] = config.fieldDB.main.md_cms
    config_array_db['md_cmsl'] = config.fieldDB.main.md_cmsl
    config_array_db['md_cmg'] = config.fieldDB.main.md_cmg
    config_array_db['md_cmgl'] = config.fieldDB.main.md_cmgl
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['hc'] = config.fieldDB.masterkey.hc

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            let sql_list = `SELECT 
                ${config_array_db['md_cms']}_id as id 
                ,${config_array_db['md_cms']}_masterkey as masterkey 
                ,${config_array_db['md_cms']}_sdate as sdate 
                ,${config_array_db['md_cms']}_edate as edate 
                ,${config_array_db['md_cms']}_credate as credate 
                ,${config_array_db['md_cms']}_gid as gid 
                ,${config_array_db['md_cmsl']}_subject as subject 
                ,${config_array_db['md_cmsl']}_title as title 
                ,${config_array_db['md_cmsl']}_typec as typec 
                ,${config_array_db['md_cmsl']}_picType as picType 
                ,${config_array_db['md_cmsl']}_picDefault as picDefault 
                ,${config_array_db['md_cmsl']}_pic as pic 
                ,${config_array_db['md_cmsl']}_urlc as urlc 
                ,${config_array_db['md_cmsl']}_target as target 
                FROM ${config_array_db['md_cms']} 
                INNER JOIN ${config_array_db['md_cmsl']} ON ${config_array_db['md_cmsl']}_cid = ${config_array_db['md_cms']}_id
                WHERE ${config_array_db['md_cms']}_masterkey = '${config_array_masterkey['hc']}' 
                AND ${config_array_db['md_cms']}_status != 'Disable' 
                AND ${config_array_db['md_cmsl']}_language = '${language}' 
                AND ${config_array_db['md_cmsl']}_subject != '' 
                AND 
                (
                    (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_cms']}_edate ='0000-00-00 00:00:00') OR
                    (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW())) OR
                    (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_cms']}_edate = '0000-00-00 00:00:00') OR
                    (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW()))
                )
                ORDER BY ${config_array_db['md_cms']}_order ${order} 
                `;
            const select_list = await query(sql_list);
            if (select_list.length > 0) {
                let count_totalrecord;
                let module_pagesize = limit;
                // Find total data
                if (select_list.length >= 1) {
                    total_data = select_list.length;
                    count_totalrecord = total_data;
                }
                // Find max page size
                let numberofpage;
                if (count_totalrecord > limit) {
                    numberofpage = Math.ceil(count_totalrecord / limit);
                } else {
                    numberofpage = 1;
                }
                // Recover page show into range
                let module_pageshow = page;
                if (module_pageshow > numberofpage) {
                    module_pageshow = numberofpage;
                } else {
                    module_pageshow = page;
                }
                // Select only paging range
                let recordstart = (module_pageshow - 1) * module_pagesize;
                limit_order = recordstart + "," + module_pagesize;
                sql_list += `LIMIT ${limit_order}`
                const select = await query(sql_list);
                if (select.length > 0) {
                    let arr_data = [];
                    result.code = code.success.code;
                    result.msg = code.success.msg;
                    const short_language = await modulus.getCoreLanguage(language);
                    const default_pic = await modulus.getDefaultPic();
                    for (let i = 0; i < select.length; i++) {
                        arr_data[i] = {};
                        arr_data[i].id = select[i].id;
                        arr_data[i].masterkey = select[i].masterkey;
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].title = select[i].title;
                        arr_data[i].typec = select[i].typec;
                        if (select[i].typec == 2) {
                            const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                            arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}`;
                            arr_data[i].target = `_blank`;
                        } else if (select[i].typec == 3) {
                            arr_data[i].url = (select[i].urlc != "" && select[i].urlc != "#") ? select[i].urlc : "#";
                            arr_data[i].target = (select[i].target == 1) ? '_self' : '_blank';
                        } else {
                            const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                            arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}`;
                            arr_data[i].target = `_self`;
                        }
                        if (select[i].picType == 1) {
                            let defaultPic = default_pic[select[i].picDefault];
                            arr_data[i].pic = {
                                'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                                'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                                'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                            }
                        } else {
                            arr_data[i].pic = {
                                'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                            }
                        }
                        arr_data[i].createDate = {
                            full: new Date(select[i].credate),
                            style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select[i].credate))
                        };
                    }
                    result._currentPage = parseInt(module_pageshow);
                    result._currentLimit = parseInt(module_pagesize);
                    result._numOfRows = select.length;
                    result._maxRecordCount = select_list.length;
                    let currentReMain = parseInt(select_list.length) - (parseInt(module_pagesize) * parseInt(module_pageshow));
                    result._currentRemain = (currentReMain > 0) ? currentReMain : 0;
                    result._maxPage = numberofpage;
                    result.item = arr_data;
                } else {
                    result.code = code.missing_data.code;
                    result.msg = code.missing_data.msg;
                }
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

async function getHelpDetail(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const contentid = req.body.contentid;
    const result = general.checkParam([method, language, contentid]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_cms'] = config.fieldDB.main.md_cms
    config_array_db['md_cmsl'] = config.fieldDB.main.md_cmsl
    config_array_db['md_cmg'] = config.fieldDB.main.md_cmg
    config_array_db['md_cmgl'] = config.fieldDB.main.md_cmgl
    config_array_db['md_cma'] = config.fieldDB.main.md_cma
    config_array_db['md_cmf'] = config.fieldDB.main.md_cmf
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['hc'] = config.fieldDB.masterkey.hc

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            let sql_list = `SELECT 
                *,
                (
                    SELECT ${config_array_db['md_cms']}_id
                    FROM ${config_array_db['md_cms']}
                    WHERE ${config_array_db['md_cms']}_id < t.id
                    ORDER BY ${config_array_db['md_cms']}_id DESC
                    LIMIT 1
                ) AS previous_id,
                (
                    SELECT ${config_array_db['md_cms']}_id
                    FROM ${config_array_db['md_cms']}
                    WHERE ${config_array_db['md_cms']}_id > t.id
                    ORDER BY ${config_array_db['md_cms']}_id ASC
                    LIMIT 1
                ) AS next_id
                FROM (
                    SELECT 
                    ${config_array_db['md_cms']}_id as id 
                    ,${config_array_db['md_cms']}_masterkey as masterkey 
                    ,${config_array_db['md_cms']}_sdate as sdate 
                    ,${config_array_db['md_cms']}_edate as edate 
                    ,${config_array_db['md_cms']}_credate as credate 
                    ,${config_array_db['md_cms']}_gid as gid 
                    ,${config_array_db['md_cmsl']}_id as lid 
                    ,${config_array_db['md_cmsl']}_subject as subject 
                    ,${config_array_db['md_cmsl']}_title as title 
                    ,${config_array_db['md_cmsl']}_typec as typec 
                    ,${config_array_db['md_cmsl']}_picType as picType 
                    ,${config_array_db['md_cmsl']}_picDefault as picDefault 
                    ,${config_array_db['md_cmsl']}_pic as pic 
                    ,${config_array_db['md_cmsl']}_urlc as urlc 
                    ,${config_array_db['md_cmsl']}_target as target 
                    ,${config_array_db['md_cmsl']}_htmlfilename as htmlfilename 
                    ,${config_array_db['md_cmsl']}_url as url 
                    ,${config_array_db['md_cmsl']}_description as description 
                    ,${config_array_db['md_cmsl']}_keywords as keywords 
                    ,${config_array_db['md_cmsl']}_metatitle as metatitle 
                    FROM ${config_array_db['md_cms']} 
                    INNER JOIN ${config_array_db['md_cmsl']} ON ${config_array_db['md_cmsl']}_cid = ${config_array_db['md_cms']}_id
                    WHERE ${config_array_db['md_cms']}_masterkey = '${config_array_masterkey['hc']}' 
                    AND ${config_array_db['md_cms']}_status != 'Disable' 
                    AND ${config_array_db['md_cms']}_id = '${contentid}' 
                    AND ${config_array_db['md_cmsl']}_language = '${language}' 
                    AND ${config_array_db['md_cmsl']}_subject != '' 
                    AND 
                    (
                        (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_cms']}_edate ='0000-00-00 00:00:00') OR
                        (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW())) OR
                        (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_cms']}_edate = '0000-00-00 00:00:00') OR
                        (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW()))
                    )
                ) as t`;
            const select = await query(sql_list);
            if (select.length > 0) {
                let arr_data = [];
                result.code = code.success.code;
                result.msg = code.success.msg;
                const short_language = await modulus.getCoreLanguage(language);
                const default_pic = await modulus.getDefaultPic();
                for (let i = 0; i < select.length; i++) {
                    arr_data[i] = {};
                    arr_data[i].id = select[i].id;
                    arr_data[i].masterkey = select[i].masterkey;
                    arr_data[i].subject = select[i].subject;
                    arr_data[i].title = select[i].title;
                    arr_data[i].typec = select[i].typec;
                    if (select[i].picType == 1) {
                        let defaultPic = default_pic[select[i].picDefault];
                        arr_data[i].pic = {
                            'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                            'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                            'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                        }
                    } else {
                        arr_data[i].pic = {
                            'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                            'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                            'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                        }
                    }
                    arr_data[i].createDate = {
                        full: new Date(select[i].credate),
                        style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select[i].credate))
                    };
                    if (select[i].typec == 2) {
                        // attachments
                        let sql_video = `SELECT 
                        ${config_array_db['md_cmf']}_id as id
                        ,${config_array_db['md_cmf']}_contantid as contantid
                        ,${config_array_db['md_cmf']}_filename as filename
                        ,${config_array_db['md_cmf']}_name as name 
                        ,${config_array_db['md_cmf']}_download as download 
                        FROM ${config_array_db['md_cmf']} 
                        WHERE ${config_array_db['md_cmf']}_contantid = '${select[i].lid}' 
                        AND ${config_array_db['md_cmf']}_language = '${language}' 
                        `;
                        const select_attachments = await query(sql_video);
                        if (select_attachments.length > 0) {
                            for (let index = 0; index < select_attachments.length; index++) {
                                arr_data[i].url = modulus.getUploadPath(select[i].masterkey, 'file', select_attachments[index].filename);
                            }
                        }else{
                            arr_data[i].url = ``;
                        }
                        arr_data[i].target = `_self`;
                    } else if (select[i].typec == 3) {
                        arr_data[i].url = (select[i].urlc != "" && select[i].urlc != "#") ? select[i].urlc : "#";
                        arr_data[i].target = (select[i].target == 1) ? '_self' : '_blank';
                    } else {
                        const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                        arr_data[i].target = `_self`;
                        arr_data[i].htmllink = modulus.getUploadPath(select[i].masterkey, 'html', select[i].htmlfilename);
                        let html_url = modulus.getUploadPath(select[i].masterkey, 'html', select[i].htmlfilename, 1);
                        let contentHTML = await modulus.getContentFromUrl(html_url);
                        contentHTML = await modulus.getTextReplace(contentHTML);
                        arr_data[i].html = contentHTML;

                        // album
                        let sql_album = `SELECT 
                        ${config_array_db['md_cma']}_id as id
                        ,${config_array_db['md_cma']}_contantid as contantid
                        ,${config_array_db['md_cma']}_filename as filename
                        ,${config_array_db['md_cma']}_name as name 
                        FROM ${config_array_db['md_cma']} 
                        WHERE ${config_array_db['md_cma']}_contantid = '${select[i].lid}' 
                        AND ${config_array_db['md_cma']}_language = '${language}' 
                        `;
                        const select_album = await query(sql_album);
                        if (select_album.length > 0) {
                            let array_album = [];
                            for (let index = 0; index < select_album.length; index++) {
                                array_album[index] = {};
                                array_album[index].name = select_album[index].name;
                                array_album[index].filename = select_album[index].filename;
                                array_album[index].link = modulus.getUploadPath(select[i].masterkey, 'album', select_album[index].filename);
                            }
                            arr_data[i].album = array_album;
                        }else{
                            arr_data[i].album = ``;
                        }
                        // attachments
                        let sql_video = `SELECT 
                        ${config_array_db['md_cmf']}_id as id
                        ,${config_array_db['md_cmf']}_contantid as contantid
                        ,${config_array_db['md_cmf']}_filename as filename
                        ,${config_array_db['md_cmf']}_name as name 
                        ,${config_array_db['md_cmf']}_download as download 
                        FROM ${config_array_db['md_cmf']} 
                        WHERE ${config_array_db['md_cmf']}_contantid = '${select[i].lid}' 
                        AND ${config_array_db['md_cmf']}_language = '${language}' 
                        `;
                        const select_attachments = await query(sql_video);
                        if (select_attachments.length > 0) {
                            let array_attachments = [];
                            for (let index = 0; index < select_attachments.length; index++) {
                                array_attachments[index] = {};
                                array_attachments[index].name = select_attachments[index].name;
                                array_attachments[index].filename = select_attachments[index].filename;
                                array_attachments[index].link = modulus.getUploadPath(select[i].masterkey, 'file', select_attachments[index].filename);
                                array_attachments[index].download = select_attachments[index].download;
                            }
                            arr_data[i].attachment = array_attachments;
                        }else{
                            arr_data[i].attachment = ``;
                        }
                        arr_data[i].video = select[i].url;
                        arr_data[i].metadescription = select[i].description;
                        arr_data[i].metakeywords = select[i].keywords;
                        arr_data[i].metatitle = select[i].metatitle;
                    }
                    arr_data[i].next_id = select[i].next_id ? select[i].next_id : 0;
                    arr_data[i].previous_id = select[i].previous_id ? select[i].previous_id : 0;
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

async function LogsViewWebsite(req, res) {
    const method = req.body.method;
    const browser = req.body.browser;
    const client = req.body.user;
    const secretkey = req.body.secretkey;
    const uniqid = req.body.uniqid;
    const result = general.checkParam([method, browser, client, secretkey]);
    const code = config.returncode;

    // db tables
    let config_array_db = new Array();
    config_array_db['md_logs_view'] = config.fieldDB.main.md_logs_view
    config_array_db['md_usk'] = config.fieldDB.main.md_usk

    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['accept'] = config.fieldDB.masterkey.accept

    var setime_zone = new Date().toLocaleString('de-DE', {timeZone: 'Asia/Bangkok'}).split(' ');
    var date_now = setime_zone[0].split('.');
    date_now = date_now[2].replace(',', '') + "-" + ("0" + date_now[1]).slice(-2) + "-" + ("0" + date_now[0]).slice(-2);
    var time_now = setime_zone[1].split(':');
    time_now = ("0" + time_now[0]).slice(-2) + ":" + ("0" + time_now[1]).slice(-2) + ":" + ("0" + time_now[2]).slice(-2);

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            let sql_usk = `SELECT 
            ${config_array_db['md_usk']}_id as id 
            ,${config_array_db['md_usk']}_masterkey as masterkey 
            ,${config_array_db['md_usk']}_controlkey as controlkey 
            ,${config_array_db['md_usk']}_secretkey as secretkey 
            ,${config_array_db['md_usk']}_credate as credate 
            FROM ${config_array_db['md_usk']} WHERE ${config_array_db['md_usk']}_controlkey = '${client}' 
            AND ${config_array_db['md_usk']}_secretkey = '${secretkey}'
            AND ${config_array_db['md_usk']}_status != 'Disable'
            `;
            const select_lang = await query(sql_usk);
            if (select_lang.length > 0) {
                let insert = new Array();
                insert[`${config_array_db['md_logs_view']}_credate`] = `'${date_now} ${time_now}'`;
                let ipAddress = modulus.getClientIP(req);
                insert[`${config_array_db['md_logs_view']}_ipaddress`] = `'${ipAddress ? ipAddress : ''}'`;
                insert[`${config_array_db['md_logs_view']}_accesstoken`] = `'${uniqid}'`;
                insert[`${config_array_db['md_logs_view']}_browser`] = `'${browser}'`;
                // Construct SQL query
                let columns = Object.keys(insert).join(",");
                let values = Object.values(insert).join(",");
                let queryData = `INSERT INTO ${config_array_db['md_logs_view']} (${columns}) VALUES (${values})`;
    
                const insert_data = await query(queryData);
                if (insert_data?.insertId > 0) {
                    result.code = code.success.code;
                    result.msg = code.success.msg;
                }else{
                    result.code = 400;
                    result.msg = 'Insert data fail.';
                }
            }else{
                result.code = 400;
                result.msg = 'Permission Access denie.';
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