const config = require('../../config/env');
const util = require('util');
const general = require('../../middlewares/general.middleware');
const modulus = require('../../middlewares/modulus.middleware');
const code = config.returncode;
const ip = require("ip");
const { base64encode, base64decode } = require('nodejs-base64');
var fs = require('fs');
const PHPUnserialize = require('php-unserialize');

exports.init = function (req, res) {
    funcRoute(req, res, {
        "getPopup": "getPopup",
        "getTopgraphic": "getTopgraphic",
        "getNews": "getNews",
        "getHtmlMainpageAbout": "getHtmlMainpageAbout",
        "getService": "getService",
        "getInnovationGroup": "getInnovationGroup",
        "getAbout": "getAbout",
        "getGuidWebsite": "getGuidWebsite",
    });
}

async function getPopup(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const result = general.checkParam([method, language, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_tgp'] = config.fieldDB.main.md_tgp
    config_array_db['md_tgpl'] = config.fieldDB.main.md_tgpl
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['popup'] = config.fieldDB.masterkey.popup

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        let arr_data = [];
        try {
            let sql = `SELECT 
            ${config_array_db['md_tgp']}_id as id 
            ,${config_array_db['md_tgp']}_masterkey as masterkey 
            ,${config_array_db['md_tgp']}_sdate as sdate 
            ,${config_array_db['md_tgp']}_edate as edate 
            ,${config_array_db['md_tgp']}_credate as credate 
            ,${config_array_db['md_tgpl']}_subject as subject 
            ,${config_array_db['md_tgpl']}_pic as pic 
            ,${config_array_db['md_tgpl']}_url as url 
            ,${config_array_db['md_tgpl']}_target as target 
            ,${config_array_db['md_tgpl']}_type as type 
            ,${config_array_db['md_tgpl']}_urlc as urlc 
            ,${config_array_db['md_tgpl']}_filevdo as filevdo 
            FROM ${config_array_db['md_tgp']} 
            INNER JOIN ${config_array_db['md_tgpl']} ON ${config_array_db['md_tgpl']}_cid = ${config_array_db['md_tgp']}_id
            WHERE ${config_array_db['md_tgp']}_masterkey = '${config_array_masterkey['popup']}' 
            AND ${config_array_db['md_tgp']}_status != 'Disable' 
            AND ${config_array_db['md_tgpl']}_language = '${language}' 
            AND ${config_array_db['md_tgpl']}_subject != '' 
            AND 
            (
                (${config_array_db['md_tgp']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_tgp']}_edate ='0000-00-00 00:00:00') OR
                (${config_array_db['md_tgp']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_tgp']}_edate)>=TO_DAYS(NOW())) OR
                (TO_DAYS(${config_array_db['md_tgp']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_tgp']}_edate = '0000-00-00 00:00:00') OR
                (TO_DAYS(${config_array_db['md_tgp']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_tgp']}_edate)>=TO_DAYS(NOW()))
            )
            ORDER BY ${config_array_db['md_tgp']}_order ${order} 
            `;
            let sql_total = sql;
            const select_total = await query(sql_total);
            if (select_total.length > 0) {
                let count_totalrecord;
                let module_pagesize = limit;
                // Find total data
                if (select_total.length >= 1) {
                    total_data = select_total.length;
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
                sql += `LIMIT ${limit_order}`
                const select = await query(sql);
                if (select.length > 0) {
                    result.code = code.success.code;
                    result.msg = code.success.msg;
                    const short_language = await modulus.getCoreLanguage(language);
                    for (let i = 0; i < select.length; i++) {
                        arr_data[i] = {};
                        arr_data[i].id = select[i].id;
                        arr_data[i].masterkey = select[i].masterkey;
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].type = select[i].type;
                        if (select[i].type == 1) {
                            let type_file = select[i]?.pic?.split(".");
                            if (type_file[type_file?.length-1] == 'svg') {
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                    'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                    'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                    'webp': modulus.getUploadPath(select[i].masterkey, 'pictures', `${select[i].pic}`),
                                }
                            }else{
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                    'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                    'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                    'webp': modulus.getUploadPath(select[i].masterkey, 'webp', `${select[i].pic}.webp`),
                                }
                            }
                        }else if(select[i].type == 2){
                            arr_data[i].video = select[i].urlc;
                        }else{
                            arr_data[i].video = modulus.getUploadPath(select[i].masterkey, 'vdo', select[i].filevdo);
                        }
                        arr_data[i].url = select[i].url;
                        arr_data[i].target = (select[i].target == 2) ? '_blank' : '_self';
                        arr_data[i].createDate = {
                            full: new Date(select[i].credate),
                            style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select[i].credate))
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

async function getTopgraphic(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const result = general.checkParam([method, language, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_tgp'] = config.fieldDB.main.md_tgp
    config_array_db['md_tgpl'] = config.fieldDB.main.md_tgpl
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['tg'] = config.fieldDB.masterkey.tg

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        let arr_data = [];
        try {
            let sql = `SELECT 
            ${config_array_db['md_tgp']}_id as id 
            ,${config_array_db['md_tgp']}_masterkey as masterkey 
            ,${config_array_db['md_tgp']}_sdate as sdate 
            ,${config_array_db['md_tgp']}_edate as edate 
            ,${config_array_db['md_tgp']}_credate as credate 
            ,${config_array_db['md_tgpl']}_subject as subject 
            ,${config_array_db['md_tgpl']}_pic as pic 
            ,${config_array_db['md_tgpl']}_url as url 
            ,${config_array_db['md_tgpl']}_target as target 
            ,${config_array_db['md_tgpl']}_type as type 
            ,${config_array_db['md_tgpl']}_urlc as urlc 
            ,${config_array_db['md_tgpl']}_filevdo as filevdo 
            FROM ${config_array_db['md_tgp']} 
            INNER JOIN ${config_array_db['md_tgpl']} ON ${config_array_db['md_tgpl']}_cid = ${config_array_db['md_tgp']}_id
            WHERE ${config_array_db['md_tgp']}_masterkey = '${config_array_masterkey['tg']}' 
            AND ${config_array_db['md_tgp']}_status != 'Disable' 
            AND ${config_array_db['md_tgpl']}_language = '${language}' 
            AND ${config_array_db['md_tgpl']}_subject != '' 
            AND 
            (
                (${config_array_db['md_tgp']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_tgp']}_edate ='0000-00-00 00:00:00') OR
                (${config_array_db['md_tgp']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_tgp']}_edate)>=TO_DAYS(NOW())) OR
                (TO_DAYS(${config_array_db['md_tgp']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_tgp']}_edate = '0000-00-00 00:00:00') OR
                (TO_DAYS(${config_array_db['md_tgp']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_tgp']}_edate)>=TO_DAYS(NOW()))
            )
            ORDER BY ${config_array_db['md_tgp']}_order ${order} 
            `;
            let sql_total = sql;
            const select_total = await query(sql_total);
            if (select_total.length > 0) {
                let count_totalrecord;
                let module_pagesize = limit;
                // Find total data
                if (select_total.length >= 1) {
                    total_data = select_total.length;
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
                sql += `LIMIT ${limit_order}`
                const select = await query(sql);
                if (select.length > 0) {
                    result.code = code.success.code;
                    result.msg = code.success.msg;
                    const short_language = await modulus.getCoreLanguage(language);
                    for (let i = 0; i < select.length; i++) {
                        arr_data[i] = {};
                        arr_data[i].id = select[i].id;
                        arr_data[i].masterkey = select[i].masterkey;
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].type = select[i].type;
                        if (select[i].type == 1) {
                            let type_file = select[i]?.pic?.split(".");
                            if (type_file[type_file?.length-1] == 'svg') {
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                    'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                    'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                    'webp': modulus.getUploadPath(select[i].masterkey, 'pictures', `${select[i].pic}`),
                                }
                            }else{
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                    'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                    'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                    'webp': modulus.getUploadPath(select[i].masterkey, 'webp', `${select[i].pic}.webp`),
                                }
                            }
                        }else if(select[i].type == 2){
                            arr_data[i].video = select[i].urlc;
                        }else{
                            arr_data[i].video = {
                                'real': modulus.getUploadPath(select[i].masterkey, 'vdo', select[i].filevdo),
                            }
                        }
                        arr_data[i].url = select[i].url;
                        arr_data[i].target = (select[i].target == 2) ? '_blank' : '_self';
                        arr_data[i].createDate = {
                            full: new Date(select[i].credate),
                            style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select[i].credate))
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

async function getNews(req, res) {
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
    config_array_masterkey['nw'] = config.fieldDB.masterkey.nw

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            let sql_group = `SELECT 
            ${config_array_db['md_cmg']}_id as id 
            ,${config_array_db['md_cmg']}_masterkey as masterkey 
            ,${config_array_db['md_cmg']}_credate as credate 
            ,${config_array_db['md_cmgl']}_subject as subject 
            ,${config_array_db['md_cmgl']}_title as title 
            FROM ${config_array_db['md_cmg']} 
            INNER JOIN ${config_array_db['md_cmgl']} ON ${config_array_db['md_cmgl']}_cid = ${config_array_db['md_cmg']}_id
            WHERE ${config_array_db['md_cmg']}_masterkey = '${config_array_masterkey['nw']}' 
            AND ${config_array_db['md_cmg']}_status = 'Home' 
            AND ${config_array_db['md_cmgl']}_language = '${language}' 
            AND ${config_array_db['md_cmgl']}_subject != '' 
            ORDER BY ${config_array_db['md_cmg']}_order ${order} 
            `;
            const select_group = await query(sql_group);
            if (select_group.length > 0) {
                let arr_data_group = [];
                result.code = code.success.code;
                result.msg = code.success.msg;
                const short_language = await modulus.getCoreLanguage(language);
                for (let i = 0; i < select_group.length; i++) {
                    arr_data_group[i] = {};
                    arr_data_group[i].id = select_group[i].id;
                    arr_data_group[i].masterkey = select_group[i].masterkey;
                    arr_data_group[i].subject = select_group[i].subject;
                    arr_data_group[i].title = select_group[i].title;
                    arr_data_group[i].createDate = {
                        full: new Date(select_group[i].credate),
                        style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select_group[i].credate))
                    };
                }
                result.item = {};
                result.item.group = arr_data_group;

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
                WHERE ${config_array_db['md_cms']}_masterkey = '${config_array_masterkey['nw']}' 
                AND ${config_array_db['md_cms']}_status = 'Home' 
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
                            arr_data[i].language = language;
                            arr_data[i].tb = select[i].tb;
                            arr_data[i].subject = select[i].subject;
                            arr_data[i].title = select[i].title;
                            arr_data[i].gid = select[i].gid;
                            arr_data[i].typec = select[i].typec;
                            if (select[i].typec == 2) {
                                // const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                                const getUrlWeb = await modulus.getUrlWebsiteCmsg(select[i].typec, short_language);
                                arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}/${select[i].gid}`;
                                arr_data[i].target = `_blank`;
                            } else if (select[i].typec == 3) {
                                arr_data[i].url = (select[i].urlc != "" && select[i].urlc != "#") ? select[i].urlc : "#";
                                arr_data[i].target = (select[i].target == 1) ? '_self' : '_blank';
                            } else {
                                // const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                                const getUrlWeb = await modulus.getUrlWebsiteCmsg(select[i].typec, short_language);
                                arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}/${select[i].gid}`;
                                arr_data[i].target = `_self`;
                            }
                            if (select[i].picType == 1) {
                                let defaultPic = default_pic[select[i].picDefault];
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                                    'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                                    'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                                    'webp': modulus.getUploadPath(defaultPic.masterkey, 'pictures', `${defaultPic.file}`),
                                }
                            } else {
                                let type_file = select[i]?.pic?.split(".");
                                if (type_file[type_file?.length-1] == 'svg') {
                                    arr_data[i].pic = {
                                        'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                        'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                        'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                        'webp': modulus.getUploadPath(select[i].masterkey, 'pictures', `${select[i].pic}`),
                                    }
                                }else{
                                    arr_data[i].pic = {
                                        'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                        'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                        'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                        'webp': modulus.getUploadPath(select[i].masterkey, 'webp', `${select[i].pic}.webp`),
                                    }
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
                        result.item.list = arr_data;
                    } else {
                        result.code = code.missing_data.code;
                        result.msg = code.missing_data.msg;
                    }
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

async function getHtmlMainpageAbout(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const result = general.checkParam([method, language, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_ab'] = config.fieldDB.main.md_ab
    config_array_db['md_abl'] = config.fieldDB.main.md_abl
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['mph'] = config.fieldDB.masterkey.mph

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        let arr_data = [];
        try {
            let sql = `SELECT 
            ${config_array_db['md_ab']}_id as id 
            ,${config_array_db['md_ab']}_masterkey as masterkey 
            ,${config_array_db['md_ab']}_sdate as sdate 
            ,${config_array_db['md_ab']}_edate as edate 
            ,${config_array_db['md_ab']}_credate as credate 
            ,${config_array_db['md_abl']}_subject as subject 
            ,${config_array_db['md_abl']}_htmlfilename as htmlfilename 
            FROM ${config_array_db['md_ab']} 
            INNER JOIN ${config_array_db['md_abl']} ON ${config_array_db['md_abl']}_cid = ${config_array_db['md_ab']}_id
            WHERE ${config_array_db['md_ab']}_masterkey = '${config_array_masterkey['mph']}' 
            AND ${config_array_db['md_ab']}_status != 'Disable' 
            AND ${config_array_db['md_abl']}_language = '${language}' 
            AND ${config_array_db['md_abl']}_subject != '' 
            AND 
            (
                (${config_array_db['md_ab']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_ab']}_edate ='0000-00-00 00:00:00') OR
                (${config_array_db['md_ab']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_ab']}_edate)>=TO_DAYS(NOW())) OR
                (TO_DAYS(${config_array_db['md_ab']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_ab']}_edate = '0000-00-00 00:00:00') OR
                (TO_DAYS(${config_array_db['md_ab']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_ab']}_edate)>=TO_DAYS(NOW()))
            )
            ORDER BY ${config_array_db['md_ab']}_order ${order} 
            `;
            let sql_total = sql;
            const select = await query(sql_total);
            if (select.length > 0) {
                result.code = code.success.code;
                result.msg = code.success.msg;
                const short_language = await modulus.getCoreLanguage(language);
                for (let i = 0; i < select.length; i++) {
                    arr_data[i] = {};
                    arr_data[i].id = select[i].id;
                    arr_data[i].masterkey = select[i].masterkey;
                    arr_data[i].subject = select[i].subject;
                    arr_data[i].htmllink = modulus.getUploadPath(select[i].masterkey, 'html', select[i].htmlfilename);
                    let html_url = modulus.getUploadPath(select[i].masterkey, 'html', select[i].htmlfilename, 1);
                    let contentHTML = await modulus.getContentFromUrl(html_url);
                    contentHTML = await modulus.getTextReplace(contentHTML);
                    arr_data[i].html = contentHTML;
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

async function getService(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const gid = req.body.gid;
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
    config_array_masterkey['sv'] = config.fieldDB.masterkey.sv

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            let sql_group = `SELECT 
            ${config_array_db['md_cmg']}_id as id 
            ,${config_array_db['md_cmg']}_masterkey as masterkey 
            ,${config_array_db['md_cmg']}_credate as credate 
            ,${config_array_db['md_cmgl']}_subject as subject 
            ,${config_array_db['md_cmgl']}_title as title 
            FROM ${config_array_db['md_cmg']} 
            INNER JOIN ${config_array_db['md_cmgl']} ON ${config_array_db['md_cmgl']}_cid = ${config_array_db['md_cmg']}_id
            WHERE ${config_array_db['md_cmg']}_masterkey = '${config_array_masterkey['sv']}' 
            AND ${config_array_db['md_cmg']}_status = 'Home' 
            AND ${config_array_db['md_cmgl']}_language = '${language}' 
            AND ${config_array_db['md_cmgl']}_subject != '' 
            ORDER BY ${config_array_db['md_cmg']}_order ${order} 
            `;
            const select_group = await query(sql_group);
            if (select_group.length > 0) {
                let arr_data_group = [];
                result.code = code.success.code;
                result.msg = code.success.msg;
                const short_language = await modulus.getCoreLanguage(language);
                for (let i = 0; i < select_group.length; i++) {
                    arr_data_group[i] = {};
                    arr_data_group[i].id = select_group[i].id;
                    arr_data_group[i].masterkey = select_group[i].masterkey;
                    arr_data_group[i].subject = select_group[i].subject;
                    arr_data_group[i].title = select_group[i].title;
                    arr_data_group[i].createDate = {
                        full: new Date(select_group[i].credate),
                        style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select_group[i].credate))
                    };
                }
                result.item = {};
                result.item.group = arr_data_group;

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
                ,${config_array_db['md_cmsl']}_pic2 as pic2 
                ,${config_array_db['md_cmsl']}_urlc as urlc 
                ,${config_array_db['md_cmsl']}_target as target 
                ,${config_array_db['md_cms']}_tid as tid 
                ,'${config_array_db['md_cms']}' as tb 
                FROM ${config_array_db['md_cms']} 
                INNER JOIN ${config_array_db['md_cmsl']} ON ${config_array_db['md_cmsl']}_cid = ${config_array_db['md_cms']}_id
                WHERE ${config_array_db['md_cms']}_masterkey = '${config_array_masterkey['sv']}' 
                AND ${config_array_db['md_cms']}_status = 'Home' 
                AND ${config_array_db['md_cmsl']}_language = '${language}' 
                AND ${config_array_db['md_cmsl']}_subject != '' 
                AND 
                (
                    (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_cms']}_edate ='0000-00-00 00:00:00') OR
                    (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW())) OR
                    (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_cms']}_edate = '0000-00-00 00:00:00') OR
                    (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW()))
                ) `;
                if (typeof gid?.length == 'number' && gid?.length > 0) {
                    // sql_list = sql_list + `AND ${config_array_db['md_cms']}_gid IN (${gid.join(',')}) `;

                    let text = "";
                    gid.map((v)=>{
                        text = text + ` ${config_array_db['md_cms']}_tid REGEXP '.*;s:[0-9]+:"${v}".*' OR`;
                    });
                    // Find the last occurrence of "OR":
                    let lastOrIndex = text.lastIndexOf(" OR");
                    // Remove the last "OR" and everything after it:
                    let modifiedText = text.slice(0, lastOrIndex);
                    sql_list = sql_list + ` AND (${modifiedText}) `;

                }
                sql_list = sql_list + `ORDER BY ${config_array_db['md_cms']}_order ${order} 
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
                            arr_data[i].language = language;
                            arr_data[i].tb = select[i].tb;
                            arr_data[i].subject = select[i].subject;
                            arr_data[i].title = select[i].title;
                            arr_data[i].gid = select[i].gid;
                            arr_data[i].typec = select[i].typec;
                            let tid = PHPUnserialize.unserialize(select[i].tid);
                            for (const [key, value] of Object.entries(tid)) {
                                // Create a new display object if it doesn't exist
                                if (!arr_data[i].tid) {
                                    arr_data[i].tid = {};
                                }
                                arr_data[i].tid[key] = parseInt(value);
                            }
                            if (select[i].typec == 2) {
                                const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                                arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}/${select[i].gid}`;
                                arr_data[i].target = `_blank`;
                            } else if (select[i].typec == 3) {
                                arr_data[i].url = (select[i].urlc != "" && select[i].urlc != "#") ? select[i].urlc : "#";
                                arr_data[i].target = (select[i].target == 1) ? '_self' : '_blank';
                            } else {
                                const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                                arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}/${select[i].gid}`;
                                arr_data[i].target = `_self`;
                            }
                            
                            if (select[i].picType == 1) {
                                let defaultPic = default_pic[select[i].picDefault];
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                                    'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                                    'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                                    'webp': modulus.getUploadPath(defaultPic.masterkey, 'pictures', `${defaultPic.file}`),
                                }
                                arr_data[i].pic2 = {
                                    'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                                    'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                                    'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                                    'webp': modulus.getUploadPath(defaultPic.masterkey, 'pictures', `${defaultPic.file}`),
                                }
                            } else {
                                let type_file = select[i]?.pic?.split(".");
                                if (type_file[type_file?.length-1] == 'svg') {
                                    arr_data[i].pic = {
                                        'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                        'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                        'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                        'webp': modulus.getUploadPath(select[i].masterkey, 'pictures', `${select[i].pic}`),
                                    }
                                }else{
                                    arr_data[i].pic = {
                                        'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                        'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                        'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                        'webp': modulus.getUploadPath(select[i].masterkey, 'webp', `${select[i].pic}.webp`),
                                    }
                                }

                                let type_file2 = select[i]?.pic2?.split(".");
                                if (type_file2[type_file2?.length-1] == 'svg') {
                                    arr_data[i].pic2 = {
                                        'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic2),
                                        'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic2),
                                        'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic2),
                                        'webp': modulus.getUploadPath(select[i].masterkey, 'pictures', `${select[i].pic2}`),
                                    }
                                }else{
                                    arr_data[i].pic2 = {
                                        'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic2),
                                        'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic2),
                                        'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic2),
                                        'webp': modulus.getUploadPath(select[i].masterkey, 'webp', `${select[i].pic2}.webp`),
                                    }
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
                        result.item.list = arr_data;
                    } else {
                        result.code = code.missing_data.code;
                        result.msg = code.missing_data.msg;
                    }
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

async function getInnovationGroup(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const result = general.checkParam([method, language, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_cmg'] = config.fieldDB.main.md_cmg
    config_array_db['md_cmgl'] = config.fieldDB.main.md_cmgl
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['rein'] = config.fieldDB.masterkey.rein

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            let sql_list = `SELECT 
                ${config_array_db['md_cmg']}_id as id 
                ,${config_array_db['md_cmg']}_masterkey as masterkey 
                ,${config_array_db['md_cmg']}_credate as credate 
                ,${config_array_db['md_cmgl']}_subject as subject 
                ,${config_array_db['md_cmgl']}_title as title 
                ,${config_array_db['md_cmgl']}_pic as pic 
                ,${config_array_db['md_cmgl']}_desc as des 
                ,${config_array_db['md_cmgl']}_number as number 
                ,${config_array_db['md_cmgl']}_suffix as suffix 
                FROM ${config_array_db['md_cmg']} 
                INNER JOIN ${config_array_db['md_cmgl']} ON ${config_array_db['md_cmgl']}_cid = ${config_array_db['md_cmg']}_id
                WHERE ${config_array_db['md_cmg']}_masterkey = '${config_array_masterkey['rein']}' 
                AND ${config_array_db['md_cmg']}_status = 'Home' 
                AND ${config_array_db['md_cmgl']}_language = '${language}' 
                AND ${config_array_db['md_cmgl']}_subject != '' 
                ORDER BY ${config_array_db['md_cmg']}_order ${order} 
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
                        arr_data[i].des = select[i].des;
                        arr_data[i].number = select[i].number;
                        arr_data[i].suffix = select[i].suffix;
                        if (select[i]?.pic.length > 0) {
                            let type_file = select[i]?.pic?.split(".");
                            if (type_file[type_file?.length-1] == 'svg') {
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                    'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                    'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                    'webp': modulus.getUploadPath(select[i].masterkey, 'pictures', `${select[i].pic}`),
                                }
                            }else{
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                    'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                    'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                    'webp': modulus.getUploadPath(select[i].masterkey, 'webp', `${select[i].pic}.webp`),
                                }
                            }
                        }else{
                            let defaultPic = default_pic[0];
                            arr_data[i].pic = {
                                'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                                'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                                'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                                'webp': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                            }
                        }
                        // const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, 'group', short_language);
                        const getUrlWeb = await modulus.getUrlWebsiteCmsg('service', short_language);
                        arr_data[i].url = `${getUrlWeb}/${select[i].masterkey}/${select[i].id}`;
                        arr_data[i].target = `_self`;
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

async function getAbout(req, res) {
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
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['abs'] = config.fieldDB.masterkey.abs

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
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
            ,${config_array_db['md_cms']}_tid as tid 
            ,'${config_array_db['md_cms']}' as tb 
            FROM ${config_array_db['md_cms']} 
            INNER JOIN ${config_array_db['md_cmsl']} ON ${config_array_db['md_cmsl']}_cid = ${config_array_db['md_cms']}_id
            WHERE ${config_array_db['md_cms']}_masterkey = '${config_array_masterkey['abs']}' 
            AND ${config_array_db['md_cms']}_status = 'Home' 
            AND ${config_array_db['md_cmsl']}_language = '${language}' 
            AND ${config_array_db['md_cmsl']}_subject != '' 
            AND 
            (
                (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_cms']}_edate ='0000-00-00 00:00:00') OR
                (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW())) OR
                (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_cms']}_edate = '0000-00-00 00:00:00') OR
                (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW()))
            ) `;
            sql_list = sql_list + `ORDER BY ${config_array_db['md_cms']}_order ${order} 
            `;
            // console.log(sql_list);
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
                        arr_data[i].language = language;
                        arr_data[i].tb = select[i].tb;
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].title = select[i].title;
                        arr_data[i].typec = select[i].typec;
                        if (select[i].typec == 2) {
                            // const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                            const getUrlWeb = await modulus.getUrlWebsiteCmsg(select[i].typec, short_language);
                            arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}/${select[i].gid}`;
                            arr_data[i].target = `_blank`;
                        } else if (select[i].typec == 3) {
                            arr_data[i].url = (select[i].urlc != "" && select[i].urlc != "#") ? select[i].urlc : "#";
                            arr_data[i].target = (select[i].target == 1) ? '_self' : '_blank';
                        } else {
                            // const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, select[i].typec, short_language);
                            const getUrlWeb = await modulus.getUrlWebsiteCmsg(select[i].typec, short_language);
                            arr_data[i].url = `${getUrlWeb}/${select[i].id}/${select[i].masterkey}/${select[i].gid}`;
                            arr_data[i].target = `_self`;
                        }
                        if (select[i].picType == 1) {
                            // let defaultPic = default_pic[select[i].picDefault];
                            let defaultPic = (default_pic[select[i].picDefault] !== undefined) ? default_pic[select[i].picDefault] : default_pic[0];
                            arr_data[i].pic = {
                                'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                                'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                                'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                                'webp': modulus.getUploadPath(defaultPic.masterkey, 'pictures', `${defaultPic.file}`),
                            }
                        } else {
                            let type_file = select[i]?.pic?.split(".");
                            if (type_file[type_file?.length-1] == 'svg') {
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                    'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                    'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                    'webp': modulus.getUploadPath(select[i].masterkey, 'pictures', `${select[i].pic}`),
                                }
                            }else{
                                arr_data[i].pic = {
                                    'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic),
                                    'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic),
                                    'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic),
                                    'webp': modulus.getUploadPath(select[i].masterkey, 'webp', `${select[i].pic}.webp`),
                                }
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


async function getGuidWebsite(req, res) {
    const method = req.body.method;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const result = general.checkParam([method, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_js'] = config.fieldDB.main.md_js
    config_array_db['md_jsl'] = config.fieldDB.main.md_jsl
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['gw'] = config.fieldDB.masterkey.gw

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            let sql_list = `SELECT 
            ${config_array_db['md_js']}_id as id 
            ,${config_array_db['md_js']}_masterkey as masterkey 
            ,${config_array_db['md_js']}_credate as credate 
            ,${config_array_db['md_jsl']}_subject as subject 
            ,${config_array_db['md_jsl']}_title as title 
            ,${config_array_db['md_jsl']}_section as section 
            FROM ${config_array_db['md_js']} 
            INNER JOIN ${config_array_db['md_jsl']} ON ${config_array_db['md_jsl']}_cid = ${config_array_db['md_js']}_id
            WHERE ${config_array_db['md_js']}_masterkey = '${config_array_masterkey['gw']}' 
            AND ${config_array_db['md_js']}_status != 'Disable' 
            AND ${config_array_db['md_jsl']}_language = 'Thai' 
            AND ${config_array_db['md_jsl']}_subject != '' 
            `;
            sql_list = sql_list + `ORDER BY ${config_array_db['md_js']}_order ${order} 
            `;
            // console.log(sql_list);
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
                    const short_language = await modulus.getCoreLanguage('Thai');
                    for (let i = 0; i < select.length; i++) {
                        arr_data[i] = {};
                        arr_data[i].id = select[i].id;
                        arr_data[i].masterkey = select[i].masterkey;
                        arr_data[i].language = 'Thai';
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].title = select[i].title;
                        arr_data[i].section = select[i].section;
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
    }else{
        // logs
        const authData = {
            appInfo: {app_token:req.body.authData.appInfo.app_token},
            tokenid: req.token,
            code: code.success.code,
            msg: code.success.msg
        }
        general.logs_access_api(req, authData, code.success.code);
    }

}