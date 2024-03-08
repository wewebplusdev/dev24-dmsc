let config = require('./config/env');
let express = require('./config/express');
let app = express();

app.listen(config.listenPort,function(){
    console.log('Port is open at '+ config.listenPort);
});

module.exports = app;