const jwt = require('jsonwebtoken');
const config = require('../config/env');
const util = require('util');
const general = require('../middlewares/general.middleware');

exports.auth = async function (req, res) {
    const apptoken = req.body.apptoken;
    const controllkey = req.body.user;
    const secretkey = req.body.secretkey;
    var result = general.checkParam([apptoken, controllkey, secretkey]);
    // param
    let config_array_param = new Array();
    config_array_param['controllkey'] = controllkey;
    config_array_param['secretkey'] = secretkey;
    // db tables
    let config_array_db = new Array();
    config_array_db['md_usk'] = config.fieldDB.main.md_usk

    const code = config.returncode;
    if (result.code == code.success.code) {

        var timeStampNow = Date.now() / 1000 | 0;
        var timeStampExpire = timeStampNow + (((60 * 60) * 24) * parseInt(config.jwtTokenExpireIn.split("d")[0]));

        let conn = config.configDB.connectDB();
        const query = util.promisify(conn.query).bind(conn);

        try {
            let sql = `SELECT 
            ${config_array_db['md_usk']}_id as id 
            ,${config_array_db['md_usk']}_masterkey as masterkey 
            ,${config_array_db['md_usk']}_controlkey as controlkey 
            ,${config_array_db['md_usk']}_secretkey as secretkey 
            ,${config_array_db['md_usk']}_credate as credate 
            FROM ${config_array_db['md_usk']} WHERE ${config_array_db['md_usk']}_controlkey = '${config_array_param['controllkey']}' 
            AND ${config_array_db['md_usk']}_secretkey = '${config_array_param['secretkey']}'
            AND ${config_array_db['md_usk']}_status != 'Disable'
            `;
            let sql_permis = sql;
            const select_permis = await query(sql_permis);
            if (select_permis.length == 1) {
                if (apptoken == config.jwtToken) {
                    const appInfo = {
                        app_token: config_array_param['controllkey'],
                    }
                    // const appInfo = {
                    //     app_token: apptoken,
                    // }
                    var tokenid = await generateToken(appInfo);
                    result.tokenid = tokenid;
                    
                    result.create_at = timeStampNow;
                    result.expire_at = timeStampExpire;

                    // logs
                    const authData = {
                        appInfo: {app_token:config_array_param['controllkey']},
                        tokenid: tokenid,
                        code: result.code,
                        msg: result.msg
                    }
                    general.logs_access_api(req, authData, result.code);
                } else {
                    result.code = code.unsuccess.code;
                    result.msg = "Invalid App Token.";

                    // logs
                    const authData = {
                        appInfo: {app_token:config_array_param['controllkey']},
                        tokenid: "",
                        code: result.code,
                        msg: result.msg
                    }
                    general.logs_access_api(req, authData, result.code);
                }
            } else {
                result.code = code.unsuccess.code;
                result.msg = "Invalid User.";

                // logs
                const authData = {
                    appInfo: {app_token:'Unknown User'},
                    tokenid: "",
                    code: result.code,
                    msg: result.msg
                }
                general.logs_access_api(req, authData, result.code);
            }
        } catch (error) {
            result.code = code.error_wrong.code;
            result.msg = code.error_wrong.msg;
        }
    }

    res.json(result);
}

function generateToken(appInfo) {
    return new Promise(function (resolve, reject) {
        jwt.sign({ appInfo: appInfo }, config.jwtSecret, { expiresIn: config.jwtTokenExpireIn }, (err, token) => {
            resolve(token);
        });
    });
}
