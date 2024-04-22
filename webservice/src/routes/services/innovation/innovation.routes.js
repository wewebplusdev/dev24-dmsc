const general = require('../../../middlewares/general.middleware');

var serviceName = "innovation";
var service_api = require('../../../controllers/innovation/innovation.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, service_api.init);
}