const config = require('../config/env');
const os = require('os');

module.exports = function(app) {
    app.all("/", function(req, res) {
        if (config.NODE_ENV == 'DEV') {
            res.json({ code: config.returncode.success.code, msg: `Welcome to service-api Respones from ${os.hostname}`});
        }else{
            res.json({ code: config.returncode.success.code, msg: `Welcome to service-api`});
        }
    });

    app.all("*", function(req, res) {
        res.json({ code: config.returncode.service_not_available.code, msg: config.returncode.service_not_available.msg }); //
    });
}