const axios = require('axios');
const general = require('../../../middlewares/general.middleware');

var serviceName = "help";
var help_api = require('../../../controllers/help/help.controller');

module.exports = function(app) {
    app.all('/service-api/' + serviceName, general.verifyToken, help_api.init);
}