const general = require('../../../middlewares/general.middleware');

var serviceName = "about";
var about_api = require('../../../controllers/about/about.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, about_api.init);
}