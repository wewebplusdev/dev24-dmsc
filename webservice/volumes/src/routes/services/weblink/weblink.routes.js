const axios = require('axios');
const general = require('../../../middlewares/general.middleware');

var serviceName = "weblink";
var weblink_api = require('../../../controllers/weblink/weblink.controller');

module.exports = function(app) {
    app.all('/service-api/' + serviceName, general.verifyToken, weblink_api.init);
}