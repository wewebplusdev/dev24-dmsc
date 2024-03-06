const axios = require('axios');
const general = require('../../../middlewares/general.middleware');

var serviceName = "service";
var service_api = require('../../../controllers/service/service.controller');

module.exports = function(app) {
    app.all('/service-api/' + serviceName, general.verifyToken, service_api.init);
}