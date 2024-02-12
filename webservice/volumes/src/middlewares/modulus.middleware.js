const config = require('../config/env');
const util = require('util');
const e = require('express');
var fs = require('fs');
const axios = require('axios');

exports.getPicturePath = function (masterKey = null, type = null, picture = null) {
    return config.hostUpload + "/" + masterKey + "/" + type + "/" + picture;
}

exports.fncEmpty = async function (variable = "", req = 0) {
    if (variable == "") {
        return 0;
    } else {
        return req;
    }
}
// end new detail area