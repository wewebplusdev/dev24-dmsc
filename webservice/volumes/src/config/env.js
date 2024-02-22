var NODE_ENV = 'DEV';
if (NODE_ENV == 'DEV') {
    var core_pathname_folderlocal = '/dev24-dmsc';
    var configDB = require('./databases/connect.dev.db');
    var hostBackend = 'http://localhost:8080/dev24-dmsc'; // backend
    var containerBackend = 'http://php-apache-environment/dev24-dmsc'; // backend
    var hostFrontend = 'http://localhost:8080/dev24-dmsc'; // frontend
    var containerFrontend = 'http://php-apache-environment/dev24-dmsc'; // frontend
}else{
    var core_pathname_folderlocal = '';
    var configDB = require('./databases/connect.prod.db');
    var hostBackend = 'http://localhost:8080/dev24-dmsc'; // backend
    var containerBackend = 'http://php-apache-environment/dev24-dmsc'; // backend
    var hostFrontend = 'http://localhost:8080/dev24-dmsc'; // frontend
    var containerFrontend = 'http://php-apache-environment/dev24-dmsc'; // frontend
}
var returncode = require('./returncode');
var fieldDB = require('./databases/field_db');

module.exports = {
    core_pathname_folderlocal: core_pathname_folderlocal,
    listenPort: 3500,
    NODE_ENV: NODE_ENV,
    configDB: configDB,
    returncode: returncode,
    fieldDB: fieldDB,
    hostUpload: hostFrontend + '/upload',
    containerBackend: containerBackend,
    containerFrontend: containerFrontend,
    hostFrontend: hostFrontend,
    hostBackend: hostBackend,
    jwtToken: 'website-token-api',
    jwtTokenExpireIn: '7d',
    jwtSecret: 'B[r)ZV6a%GP5R#F3urYL',
    tokenAlgorithms: 'HS256',
};