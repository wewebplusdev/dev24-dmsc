const general = require('../../../middlewares/general.middleware');

var serviceName = "news-people";
var news_people_api = require('../../../controllers/news_people/news_people.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, news_people_api.init);
}