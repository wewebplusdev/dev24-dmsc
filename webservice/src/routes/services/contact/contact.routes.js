const general = require('../../../middlewares/general.middleware');

var serviceName = "contact";
var contact_api = require('../../../controllers/contact/contact.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, contact_api.init);
}