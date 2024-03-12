const axios = require('axios');
const general = require('../../../middlewares/general.middleware');

var serviceName = "setting";
var setting_api = require('../../../controllers/_setting/setting.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, setting_api.init);
}