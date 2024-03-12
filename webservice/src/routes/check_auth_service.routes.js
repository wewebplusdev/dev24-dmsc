
module.exports = function(app) {
    const general = require('../middlewares/general.middleware');
    app.post('/service-api/v1/getuser', general.verifyToken);
}