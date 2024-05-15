var sitename = "unknown-browser";
if (navigator.userAgent.indexOf("MSIE") != -1 || navigator.userAgent.indexOf("rv:11.0") != -1) {
    sitename = "msie";
} else if (navigator.userAgent.indexOf("Edge") != -1) {
    sitename = "microsoft-edge";
} else if (navigator.userAgent.indexOf("Firefox") != -1) {
    sitename = "firefox";
} else if (navigator.userAgent.indexOf("Opera") != -1) {
    sitename = "opera";
} else if (navigator.userAgent.indexOf("Chrome") != -1) {
    sitename = "chrome";
} else if (navigator.userAgent.indexOf("Safari") != -1) {
    sitename = "safari";
}

// Logs Website
if ($.cookie("UNIQID_LOGS") === undefined) {
    (async () => {
        const uniq_id = $.cookie("PHPSESSID") + "" + Math.floor(Math.random() * 999) + Date.now();
        const settings = {
            "url": `${path}${language}/reverse_proxy`,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": `application/json`,
            },
            "data": JSON.stringify({
                "case": 'logs_Website',
                "Controller": 'setting',
                "method": 'LogsViewWebsite',
                "browser": sitename,
                "uniqid": uniq_id,
            }),
        };
        const result = await $.ajax(settings);
        if (result?.code === 1001) {
            var date = new Date();
            var hour = 1;
            var minutes = 60;
            date.setTime(date.getTime() + (hour * minutes * 60 * 1000));
            $.cookie('UNIQID_LOGS', uniq_id, {
                expires: date,
                path: '/'
            });
        }
    })().catch(() => {});
}

// add active menu header
(() => {
    let menu = $('.global-container').data('menu');
    if (menu?.length > 0) {
        $('#navbarSupportedContent').find(`.${menu}`).addClass('active');
    }
})();


// checkbox popup
$('#checkbox-popup').on('change', function(){
    let ischeck = $(this).is(':checked');
    if (!ischeck) {
        $.removeCookie('POPUP', { path: '/' });
    }else{
        var date = new Date();
        var day = 1;
        var hour = 24;
        var minutes = 60;
        (async () => {
            date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
            $.cookie('POPUP', true, {
                expires: date,
                path: '/'
            });
        })().catch(() => { });
    }
});

// check condition popup
(() => {
    if (typeof $.cookie("POPUP") === "undefined") {
        $('#popupModal').modal('show');
    } else {
        $('#popupModal').modal('hide');
    }
});