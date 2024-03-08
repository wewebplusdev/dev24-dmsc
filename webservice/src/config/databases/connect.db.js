let mysql = require('mysql');
let util = require('util');

exports.connectDB = function() {
    return mysql.createConnection({
        host: process.env.hostname,
        user: process.env.userdb, 
        password: process.env.pwddb,
        database: process.env.dbname,
    });
}