const general = require('../../../middlewares/general.middleware');

var serviceName = "search";
var search_api = require('../../../controllers/search/search.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, search_api.init);
}