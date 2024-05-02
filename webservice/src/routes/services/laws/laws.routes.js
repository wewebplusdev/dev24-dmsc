const general = require('../../../middlewares/general.middleware');

var serviceName = "laws";
var laws_api = require('../../../controllers/laws/laws.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, laws_api.init);
}