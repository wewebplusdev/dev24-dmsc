const general = require('../../../middlewares/general.middleware');

var serviceName = "home";
var home_api = require('../../../controllers/home/home.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, home_api.init);
}