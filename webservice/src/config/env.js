const dotenv = require('dotenv');
dotenv.config();

let NODE_ENV = process.env.NODE_ENV;
let core_pathname_folderlocal = process.env.core_pathname_folderlocal;
let core_protocal = process.env.HTTP;

// production
let hostBackend = `${core_protocal}://${process.env.hostBackend}${core_pathname_folderlocal}`; // backend
let containerBackend = `${core_protocal}://${process.env.containerBackend}${core_pathname_folderlocal}`; // backend
let hostFrontend = `${core_protocal}://${process.env.hostFrontend}${core_pathname_folderlocal}`; // frontend
let containerFrontend = `${core_protocal}://${process.env.containerFrontend}${core_pathname_folderlocal}`; // frontend
let containerFrontend_http = `http://${process.env.containerFrontend}${core_pathname_folderlocal}`; // frontend

// development
if (NODE_ENV == 'development') {
    hostBackend = `${core_protocal}://${process.env.hostBackend_dev}${core_pathname_folderlocal}`; // backend
    containerBackend = `${core_protocal}://${process.env.containerBackend_dev}${core_pathname_folderlocal}`; // backend
    hostFrontend = `${core_protocal}://${process.env.hostFrontend_dev}${core_pathname_folderlocal}`; // frontend
    containerFrontend = `${core_protocal}://${process.env.containerFrontend_dev}${core_pathname_folderlocal}`; // frontend
}

let configDB = require('./databases/connect.db');
let returncode = require('./returncode');
let fieldDB = require('./databases/field_db');

module.exports = {
    core_pathname_folderlocal: core_pathname_folderlocal,
    listenPort: process.env.PORT,
    NODE_ENV: NODE_ENV,
    configDB: configDB,
    returncode: returncode,
    fieldDB: fieldDB,
    hostUpload: hostFrontend + '/upload',
    containerBackend: containerBackend,
    containerFrontend: containerFrontend,
    containerFrontend_http: containerFrontend_http,
    hostFrontend: hostFrontend,
    hostBackend: hostBackend,
    jwtToken: process.env.JWTTOKEN,
    jwtTokenExpireIn: '7d',
    jwtSecret: 'B[r)ZV6a%GP5R#F3urYL',
    tokenAlgorithms: 'HS256',
};