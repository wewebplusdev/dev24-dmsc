const config = require('../config/env');
const util = require('util');
const e = require('express');
var fs = require('fs');
const axios = require('axios');

exports.getUploadPath = function (masterKey = null, type = null, file = null, typeUrl = 0) {
    if (typeUrl == 1) {
        return config.containerFrontend + "/upload/" + masterKey + "/" + type + "/" + file;
    }else{
        return config.hostUpload + "/" + masterKey + "/" + type + "/" + file;
    }
}

exports.fncEmpty = async function (variable = "", req = 0) {
    if (variable == "") {
        return 0;
    } else {
        return req;
    }
}

exports.getCoreLanguage = async function (lang) {
    let conn = config.configDB.connectDB();
    const query = util.promisify(conn.query).bind(conn);
    // db tables
    let config_array_db = new Array();
    config_array_db['sy_lang'] = config.fieldDB.main.sy_lang

    try {
        let sql_lang = `SELECT 
        ${config_array_db['sy_lang']}_id as id 
        ,${config_array_db['sy_lang']}_subject as subject 
        ,${config_array_db['sy_lang']}_short as short 
        ,${config_array_db['sy_lang']}_display as display 
        FROM ${config_array_db['sy_lang']} 
        WHERE ${config_array_db['sy_lang']}_status != 'Disable' 
        AND ${config_array_db['sy_lang']}_subject = '${lang}'
        `;
        const select_lang = await query(sql_lang);
        conn.destroy();
        if (select_lang.length > 0) {
            return select_lang[0].short;
        } else {
            return 'th';
        }
    } catch (error) {
        conn.destroy();
        return 'th';
    }
}

exports.getDefaultPic = async function () {
    let conn = config.configDB.connectDB();
    const query = util.promisify(conn.query).bind(conn);
    // db tables
    let config_array_db = new Array();
    config_array_db['md_nopic'] = config.fieldDB.main.md_nopic
    // db masterkey
    let config_array_masterkey = new Array();
    config_array_masterkey['nopic'] = config.fieldDB.masterkey.nopic

    try {
        let sql_nopic = `SELECT 
        ${config_array_db['md_nopic']}_id as id 
        ,${config_array_db['md_nopic']}_subject as subject 
        ,${config_array_db['md_nopic']}_masterkey as masterkey 
        ,${config_array_db['md_nopic']}_file as file 
        FROM ${config_array_db['md_nopic']} 
        WHERE ${config_array_db['md_nopic']}_status != 'Disable' 
        AND ${config_array_db['md_nopic']}_masterkey = '${config_array_masterkey['nopic']}'
        `;
        const select_nopic = await query(sql_nopic);
        conn.destroy();
        if (select_nopic.length > 0) {
            let arr_data = [];
            for (let i = 0; i < select_nopic.length; i++) {
                // Initialize arr_data element if it's undefined
                if (!arr_data[select_nopic[i].id]) {
                    arr_data[select_nopic[i].id] = {};
                }
                // Assign properties to the initialized element
                arr_data[select_nopic[i].id].id = select_nopic[i].id;
                arr_data[select_nopic[i].id].subject = select_nopic[i].subject;
                arr_data[select_nopic[i].id].masterkey = select_nopic[i].masterkey;
                arr_data[select_nopic[i].id].file = select_nopic[i].file;
            }
            return arr_data;
        } else {
            return false;
        }
    } catch (error) {
        conn.destroy();
        return false;
    }
}

exports.getUrlWebsite = async function (masterkey, type, short_language = '') {
    try {
        if (config.fieldDB.url_page[masterkey][type] !== undefined) {
            if (!!short_language.trim()) {
                console.log(`${config.hostFrontend}/${short_language}/${config.fieldDB.url_page[masterkey][type]}`);
                return `${config.hostFrontend}/${short_language}/${config.fieldDB.url_page[masterkey][type]}`;
            }else{
                return `${config.hostFrontend}/${config.fieldDB.url_page[masterkey][type]}`;
            }
        } else {
            return "";
        }
    } catch (error) {
        return "";
    }
}

exports.getContentFromUrl = async function (url) {
    try {
        const response = await axios.get(url);
        return response.data;
    } catch (error) {
        return "";
    }
}

exports.getTextReplace = async function (data) {
    let result = data;
    if (config.core_pathname_folderlocal != '') {
        result = result.replace(`${config.core_pathname_folderlocal}`, ``);
    }
    result = result.replace(`/ckeditor/upload/`, `${config.hostFrontend}/ckeditor/upload/`);
    result = result.replace(`\\`, ``);
    return result;
}

exports.getClientIP = function(req){
    return req.headers['x-forwarded-for'] || req.connection.remoteAddress.split(":").pop();
}