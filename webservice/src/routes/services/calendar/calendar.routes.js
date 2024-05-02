const general = require('../../../middlewares/general.middleware');

var serviceName = "calendar";
var calendar_api = require('../../../controllers/calendar/calendar.controller');

module.exports = function(app) {
    app.all('/service-api/v1/' + serviceName, general.verifyToken, calendar_api.init);
}