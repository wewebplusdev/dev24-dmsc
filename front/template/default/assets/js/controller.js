// /*!
//  * modules javascipt
//  * version 24.02
//  */

// // import setup controller
// import * as env from "./modules/env.js";
// import * as core from "./modules/core.js";
// // import * as url from "./modules/url.js";

// // import setting API
// import * as route from "./modules/setting-web.js";

// // authentication web api & setting website
// const initialize_controller = (async () => {
//     "use strict";
//     try {
//         let tokenid,settings;

//         if ($.cookie("web_token") === undefined) {
//             const auth_webservices = await route.auth_webservice(env);
//             tokenid = auth_webservices.tokenid;
//         }else{
//             tokenid = core.getToken('web_token', 1);
//         }

//         if (!!tokenid) {
//             settings = await route.load_setting_web(env, core);
//         }

//         tokenid = core.getToken('web_token', 1);
//         if (!!tokenid) {
//             settings = await route.load_setting_web(env, core);
//         }
        
//         return {
//             token:tokenid ? tokenid : undefined,
//             setting:settings?.item ? settings?.item : undefined
//         }


//     } catch (error) {
//         console.log(`controller API has been error. ${error}`);
//     }
// })();

// // init controller
// const initialize_controllers = await initialize_controller;
// const token = initialize_controllers.token;
// const settingWeb = initialize_controllers.setting;

// export {
//     token,
//     settingWeb,
//     env,
//     core,
// };
  