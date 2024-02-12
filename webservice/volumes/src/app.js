var config = require('./config/env');
var express = require('./config/express');
var app = express();

app.listen(config.listenPort,function(){
    console.log('Port is open at '+ config.listenPort);
});

module.exports = app;