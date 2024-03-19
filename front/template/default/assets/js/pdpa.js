// ######################################################################################### Start Cookie ##################################################################################################
if (typeof $.cookie("CONSENT") === "undefined") {
    $('.pdpa').show();
    $.removeCookie('CONSENT', { path: '/' });
} else {
    $('.pdpa').hide();
}

$(document).on('click', '.acceptCookie', function () {
    var date = new Date();
    var day = 90;
    var hour = 24;
    var minutes = 60;
    var Accept = $(this).data('accept');
    if (Accept == 'Accept') {
        (async () => {
            const results = await accept_cookieconsent(Accept);
            if (results?.code == 1001) {
                date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
                $.cookie('CONSENT', true, {
                    expires: date,
                    path: '/'
                });
                $('.pdpa').hide();
            } else {
                return false;
            }
        })().catch(() => { });
    }
});

async function accept_cookieconsent() {
    const uniq_id = $.cookie("PHPSESSID") + "" + Math.floor(Math.random() * 999) + Date.now();
    const settings = {
        "url": `${path}${language}/reverse_proxy`,
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": `application/json`,
        },
        "data": JSON.stringify({
            "case": 'logs_pdpa',
            "controller": 'setting',
            "method": 'acceptLogsPDPA',
            "browser": sitename,
            "uniqid": uniq_id,
        }),
    };
    const result = await $.ajax(settings);
    return result
}