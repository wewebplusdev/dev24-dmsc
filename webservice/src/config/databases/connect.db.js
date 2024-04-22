let mysql = require('mysql2');
let util = require('util');

exports.connectDB = function() {
    return mysql.createConnection({
        host: process.env.hostname,
        user: process.env.userdb, 
        password: process.env.pwddb,
        database: process.env.dbname,
        port: process.env.dbport,
    });
}