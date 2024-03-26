const general = require('../../../middlewares/general.middleware');

var serviceName = "agency";
var agency_api = require('../../../controllers/agency/agency.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, agency_api.init);
}