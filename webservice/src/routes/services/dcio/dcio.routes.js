const general = require('../../../middlewares/general.middleware');

var serviceName = "dcio";
var dcio_api = require('../../../controllers/dcio/dcio.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, dcio_api.init);
}