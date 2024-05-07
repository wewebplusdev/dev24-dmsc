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
        "getAgency": "getAgency",
        "getService": "getService",
    });
}

async function getAgency(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const contentid = req.body.contentid;
    const incode_masterkey = req.body.masterkey;
    const result = general.checkParam([method, language, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_ag'] = config.fieldDB.main.md_ag
    config_array_db['md_agl'] = config.fieldDB.main.md_agl
    config_array_db['md_agg'] = config.fieldDB.main.md_agg
    config_array_db['md_aggl'] = config.fieldDB.main.md_aggl
    // db masterkey
    let config_array_masterkey = new Array();
    if (incode_masterkey?.length>=1) {
        config_array_masterkey['masterkey'] = incode_masterkey;
    }else{
        config_array_masterkey['masterkey'] = config.fieldDB.masterkey.agif;
    }

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            let sql_list = `SELECT 
                ${config_array_db['md_ag']}_id as id 
                ,${config_array_db['md_ag']}_masterkey as masterkey 
                ,${config_array_db['md_ag']}_sdate as sdate 
                ,${config_array_db['md_ag']}_edate as edate 
                ,${config_array_db['md_ag']}_credate as credate 
                ,${config_array_db['md_ag']}_gid as gid 
                ,${config_array_db['md_agg']}_order as group_order 
                ,${config_array_db['md_agl']}_subject as subject 
                ,${config_array_db['md_agl']}_address as address 
                ,${config_array_db['md_agl']}_tel as tel 
                ,${config_array_db['md_agl']}_fax as fax 
                ,${config_array_db['md_agl']}_email as email 
                ,${config_array_db['md_agl']}_lat as lat 
                ,${config_array_db['md_agl']}_long as lng 
                ,${config_array_db['md_agl']}_id as lid 
                ,${config_array_db['md_aggl']}_subject as group_subject 
                FROM ${config_array_db['md_ag']} 
                INNER JOIN ${config_array_db['md_agl']} ON ${config_array_db['md_agl']}_cid = ${config_array_db['md_ag']}_id
                LEFT JOIN ${config_array_db['md_agg']} ON ${config_array_db['md_agg']}_id = ${config_array_db['md_ag']}_gid
                LEFT JOIN ${config_array_db['md_aggl']} ON ${config_array_db['md_aggl']}_cid = ${config_array_db['md_agg']}_id
                WHERE ${config_array_db['md_ag']}_masterkey = '${config_array_masterkey['masterkey']}' 
                AND ${config_array_db['md_ag']}_status != 'Disable' 
                AND ${config_array_db['md_agg']}_status != 'Disable' 
                AND ${config_array_db['md_agl']}_language = '${language}' 
                AND ${config_array_db['md_aggl']}_language = '${language}' 
                `;
                if (contentid > 0) {
                    sql_list = sql_list + ` AND ${config_array_db['md_ag']}_id = '${contentid}' `;
                }
                sql_list = sql_list + `
                ORDER BY ${config_array_db['md_ag']}_order ${order} 
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
                        arr_data[i].gid = select[i].gid;
                        arr_data[i].group_order = select[i].group_order;
                        arr_data[i].group = select[i].group_subject;
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].address = select[i].address;
                        arr_data[i].tel = select[i].tel;
                        arr_data[i].fax = select[i].fax;
                        arr_data[i].email = select[i].email;
                        arr_data[i].lat = select[i].lat;
                        arr_data[i].lng = select[i].lng;
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

async function getService(req, res) {
    const method = req.body.method;
    const language = req.body.language;
    const order = req.body.order;
    const page = req.body.page;
    const limit = req.body.limit;
    const contentid = req.body.contentid;
    const incode_masterkey = req.body.masterkey;
    const result = general.checkParam([method, language, order, page, limit]);
    const code = config.returncode;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_ag'] = config.fieldDB.main.md_ag
    config_array_db['md_agl'] = config.fieldDB.main.md_agl
    config_array_db['md_agg'] = config.fieldDB.main.md_agg
    config_array_db['md_aggl'] = config.fieldDB.main.md_aggl
    // db masterkey
    let config_array_masterkey = new Array();
    if (incode_masterkey?.length>=1) {
        config_array_masterkey['masterkey'] = incode_masterkey;
    }else{
        config_array_masterkey['masterkey'] = config.fieldDB.masterkey.agif;
    }

    if (result.code == code.success.code) {
        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);
        try {
            result.code = code.success.code;
            result.msg = code.success.msg;
            let sql_list = `SELECT 
                ${config_array_db['md_ag']}_id as id 
                ,${config_array_db['md_ag']}_masterkey as masterkey 
                ,${config_array_db['md_ag']}_sdate as sdate 
                ,${config_array_db['md_ag']}_edate as edate 
                ,${config_array_db['md_ag']}_credate as credate 
                ,${config_array_db['md_agl']}_subject as subject 
                ,${config_array_db['md_agl']}_title as title 
                ,${config_array_db['md_agl']}_tel as tel 
                ,${config_array_db['md_agl']}_id as lid 
                ,${config_array_db['md_agl']}_picType as picType 
                ,${config_array_db['md_agl']}_picDefault as picDefault 
                ,${config_array_db['md_agl']}_pic as pic 
                FROM ${config_array_db['md_ag']} 
                INNER JOIN ${config_array_db['md_agl']} ON ${config_array_db['md_agl']}_cid = ${config_array_db['md_ag']}_id
                WHERE ${config_array_db['md_ag']}_masterkey = '${config_array_masterkey['masterkey']}' 
                AND ${config_array_db['md_ag']}_status != 'Disable' 
                AND ${config_array_db['md_agl']}_language = '${language}' 
                `;
                if (contentid > 0) {
                    sql_list = sql_list + ` AND ${config_array_db['md_ag']}_id = '${contentid}' `;
                }
                sql_list = sql_list + `
                ORDER BY ${config_array_db['md_ag']}_order ${order} 
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
                        arr_data[i].subject = select[i].subject;
                        arr_data[i].title = select[i].title;
                        arr_data[i].tel = select[i].tel;
                        arr_data[i].createDate = {
                            full: new Date(select[i].credate),
                            style: new Intl.DateTimeFormat(short_language, { dateStyle: 'long', }).format(new Date(select[i].credate))
                        };
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