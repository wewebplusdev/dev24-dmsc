var mysql = require('mysql');
var util = require('util');

exports.connectDB = function() {
    return mysql.createConnection({
        // host: "192.168.1.129",
        // user: "root", 
        // password: "IySY?Pk7!!mH",
        // database: "2024_web_api"
        host: "db",
        user: "root", 
        password: "MYSQL_ROOT_PASSWORD",
        database: "template_website",
    });
}