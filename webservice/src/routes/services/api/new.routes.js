const axios = require('axios');
const general = require('../../../middlewares/general.middleware');

var serviceName = "api";
var api_api = require('../../../controllers/api/api.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, api_api.init);
}