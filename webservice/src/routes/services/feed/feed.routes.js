const general = require('../../../middlewares/general.middleware');

var serviceName = "feed";
var feed_api = require('../../../controllers/feed/feed.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, feed_api.init);
}