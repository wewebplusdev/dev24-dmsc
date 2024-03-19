const general = require('../../../middlewares/general.middleware');

var serviceName = "announcer";
var announcer_api = require('../../../controllers/announcer/announcer.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, announcer_api.init);
}