const axios = require('axios');
const general = require('../../../middlewares/general.middleware');

var serviceName = "news";
var news_api = require('../../../controllers/news/news.controller');

module.exports = function(app) {
    app.all('/service-api/' + serviceName, general.verifyToken, news_api.init);
}