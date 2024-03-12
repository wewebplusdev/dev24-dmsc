
export const auth_webservice = async (env) => {
    const settings = {
        "url": `${env.config.web_api}/service-api/v1/gettoken`,
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": `application/json`,
        },
        "data": JSON.stringify({
            "apptoken": env.config.apptoken,
            "user": env.config.user,
            "secretkey": env.config.secretkey
        }),
    };

    const result = await $.ajax(settings);
    $.removeCookie('web_token', { path: '/' }); // token
    if (result?.code === 1001) {
        $.cookie('web_token', btoa(result.tokenid), {
            expires: result.expire_at,
            path: '/'
        });
    } else {
        console.log('Authorization API fail.');
    }
    return result;
}

export const load_setting_web = async (env, core) => {
    const settings = {
        "url": `${env.config.web_api}/service-api/v1/setting`,
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": `application/json`,
            "Authorization": `Bearer ${core.getToken('web_token', 1)}`
        },
        "data": JSON.stringify({
            "method": "getWebSetting",
            "language": core.getToken('web_language')
        }),
    };

    const result = await $.ajax(settings);
    $.removeCookie('web_language', { path: '/' }); // uniqid pdpa
    if (result?.code === 1001) {
        let date = new Date();
        let day = 7;
        let hour = 24;
        let minutes = 60;
        date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
        $.cookie('web_language', result.item.current_lang, {
            expires: date,
            path: '/'
        });
    }
    return result;
}