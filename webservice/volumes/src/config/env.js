var NODE_ENV = 'DEV';
if (NODE_ENV == 'DEV') {
    var configDB = require('./databases/connect.dev.db');
    var hostBackend = 'http://localhost:8080'; // backend
    var hostFrontend = 'http://localhost:8080'; // frontend
}else{
    var configDB = require('./databases/connect.prod.db');
    var hostBackend = 'http://localhost:8080'; // backend
    var hostFrontend = 'http://localhost:8080'; // frontend
}
var returncode = require('./returncode');
var fieldDB = require('./databases/field_db');

module.exports = {
    listenPort: 3500,
    NODE_ENV: NODE_ENV,
    configDB: configDB,
    returncode: returncode,
    fieldDB: fieldDB,
    hostUpload: hostBackend + '/upload',
    hostFrontend: hostFrontend,
    hostBackend: hostBackend,
    jwtToken: 'website-token-api',
    jwtTokenExpireIn: '7d',
    jwtSecret: 'B[r)ZV6a%GP5R#F3urYL',
    tokenAlgorithms: 'HS256',
};