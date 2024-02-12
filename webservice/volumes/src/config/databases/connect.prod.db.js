var mysql = require('mysql');
var util = require('util');

exports.connectDB = function() {
    return mysql.createConnection({
        host: "db",
        user: "root", 
        password: "MYSQL_ROOT_PASSWORD",
        database: "2023_dmcr_eslip"
    });
}