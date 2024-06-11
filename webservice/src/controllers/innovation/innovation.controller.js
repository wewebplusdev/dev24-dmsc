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
        "getInnovation": "getInnovation",
        "getInnovationGroup": "getInnovationGroup",
    });
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
                FROM ${config_array_db['md_cmg']} 
                INNER JOIN ${config_array_db['md_cmgl']} ON ${config_array_db['md_cmgl']}_cid = ${config_array_db['md_cmg']}_id
                WHERE ${config_array_db['md_cmg']}_masterkey = '${config_array_masterkey['rein']}' 
                AND ${config_array_db['md_cmg']}_status != 'Disable' 
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
                        // const getUrlWeb = await modulus.getUrlWebsite(select[i].masterkey, 'group');
                        // arr_data[i].url = `${getUrlWeb}/${select[i].masterkey}/${select[i].id}`;
                        // arr_data[i].target = `_self`;
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

async function getInnovation(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const tid = req.body.tid;
    const search_keyword = req.body.keyword;
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
    config_array_masterkey['rein'] = config.fieldDB.masterkey.rein
    
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
                ,${config_array_db['md_cmsl']}_pic2 as pic2 
                ,${config_array_db['md_cmsl']}_urlc as urlc 
                ,${config_array_db['md_cmsl']}_target as target 
                FROM ${config_array_db['md_cms']} 
                INNER JOIN ${config_array_db['md_cmsl']} ON ${config_array_db['md_cmsl']}_cid = ${config_array_db['md_cms']}_id
                WHERE ${config_array_db['md_cms']}_masterkey = '${config_array_masterkey['rein']}' 
                AND ${config_array_db['md_cms']}_status != 'Disable' 
                AND ${config_array_db['md_cmsl']}_language = '${language}' `;
                if (tid.length > 0) {
                    let values = Object.values(tid).join(",");
                    sql_list = sql_list + ` AND ${config_array_db['md_cms']}_gid IN (${values})`;
                }
                if (search_keyword !== null && search_keyword !== undefined) {
                    sql_list = sql_list + ` AND 
                    (
                        ${config_array_db['md_cmsl']}_subject LIKE '%${search_keyword}%' OR
                        ${config_array_db['md_cmsl']}_title LIKE '%${search_keyword}%'
                    ) `;
                }
                sql_list = sql_list + ` AND 
                (
                    (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND ${config_array_db['md_cms']}_edate ='0000-00-00 00:00:00') OR
                    (${config_array_db['md_cms']}_sdate = '0000-00-00 00:00:00' AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW())) OR
                    (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND ${config_array_db['md_cms']}_edate = '0000-00-00 00:00:00') OR
                    (TO_DAYS(${config_array_db['md_cms']}_sdate)<=TO_DAYS(NOW()) AND TO_DAYS(${config_array_db['md_cms']}_edate)>=TO_DAYS(NOW()))
                )
                ORDER BY ${config_array_db['md_cms']}_order ${order} 
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
                        arr_data[i].group = select[i].group_subject;
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].title = select[i].title;
                        arr_data[i].typec = select[i].typec;
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
                            // let defaultPic = default_pic[select[i].picDefault];
                            let defaultPic = (default_pic[select[i].picDefault] !== undefined) ? default_pic[select[i].picDefault] : default_pic[0];
                            arr_data[i].pic = {
                                'real': modulus.getUploadPath(defaultPic.masterkey, 'real', defaultPic.file),
                                'pictures': modulus.getUploadPath(defaultPic.masterkey, 'pictures', defaultPic.file),
                                'office': modulus.getUploadPath(defaultPic.masterkey, 'office', defaultPic.file),
                            }
                            arr_data[i].pic2 = {
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
                            arr_data[i].pic2 = {
                                'real': modulus.getUploadPath(select[i].masterkey, 'real', select[i].pic2),
                                'pictures': modulus.getUploadPath(select[i].masterkey, 'pictures', select[i].pic2),
                                'office': modulus.getUploadPath(select[i].masterkey, 'office', select[i].pic2),
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