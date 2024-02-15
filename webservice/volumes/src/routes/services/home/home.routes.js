const axios = require('axios');
const general = require('../../../middlewares/general.middleware');

var serviceName = "home";
var home_api = require('../../../controllers/home/home.controller');

module.exports = function(app) {
    app.all('/service-api/' + serviceName, general.verifyToken, home_api.init);
}