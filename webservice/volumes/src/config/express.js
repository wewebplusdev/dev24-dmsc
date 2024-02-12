
var express = require('express');
var compression = require('compression');
var bodyParser = require('body-parser');
var fs = require('fs');
var cors = require('cors');

module.exports = function() {
    var app = express();

    const servicesRoute = './routes/services';
    app.use(compression());
    app.use(cors());

    app.use(bodyParser.urlencoded({
        extended: true
    }));

    app.use(bodyParser.json({limit: "500mb"}));
    app.use(bodyParser.urlencoded({limit: "500mb", extended: true, parameterLimit:500000}));

    app.use(bodyParser.json());
    require('../routes/auth_service.routes')(app);
    require('../routes/check_auth_service.routes')(app);

    fs.readdirSync(servicesRoute).forEach(file => {
        if (file.includes(".routes.js")) {
            if (fs.lstatSync(servicesRoute + "/" + file).isFile()) {
                require('../routes/services/' + file)(app);
            }
        } else {
            if (fs.lstatSync(servicesRoute + "/" + file).isDirectory()) {
                fs.readdirSync(servicesRoute + "/" + file).forEach(file2 => {
                    if (file2.includes(".routes.js")) {
                        require('../routes/services/' + file + '/' + file2)(app);
                    }
                });
            }
        }
    });
    require('../routes/missing-route')(app);
    app.use(express.static('./public'));

    return app;
}