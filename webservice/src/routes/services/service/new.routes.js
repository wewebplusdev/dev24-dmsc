const general = require('../../../middlewares/general.middleware');

var serviceName = "service";
var service_api = require('../../../controllers/service/service.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, service_api.init);
}