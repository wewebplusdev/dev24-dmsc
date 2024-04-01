const general = require('../../../middlewares/general.middleware');

var serviceName = "god";
var god_api = require('../../../controllers/god/god.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, god_api.init);
}