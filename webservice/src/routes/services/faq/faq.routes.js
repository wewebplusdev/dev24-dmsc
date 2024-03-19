const general = require('../../../middlewares/general.middleware');

var serviceName = "faq";
var faq_api = require('../../../controllers/faq/faq.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, faq_api.init);
}