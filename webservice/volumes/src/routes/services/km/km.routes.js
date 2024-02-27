const axios = require('axios');
const general = require('../../../middlewares/general.middleware');

var serviceName = "km";
var km_api = require('../../../controllers/km/km.controller');

module.exports = function(app) {
    app.all('/service-api/' + serviceName, general.verifyToken, km_api.init);
}