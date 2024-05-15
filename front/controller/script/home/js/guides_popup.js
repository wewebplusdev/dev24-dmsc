
// checkbox popup
$('#checkbox-popup').on('change', function () {
    let ischeck = $(this).is(':checked');
    if (!ischeck) {
        $.removeCookie('POPUP', { path: '/' });
    } else {
        let date = new Date();
        let day = 1;
        let hour = 24;
        let minutes = 60;
        (async () => {
            date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
            $.cookie('POPUP', true, {
                expires: date,
                path: '/'
            });
        })().catch(() => { });
    }
});

function close_guides() {
    $('.top-graphic').guides('destroy');
    onComplete();
}

function onComplete() {
    $('html,body').animate({
        scrollTop: 0
    }, 1000);
    // check condition popup
    if (typeof $.cookie("POPUP") === "undefined") {
        $('#popupModal').modal('show');
    } else {
        $('#popupModal').modal('hide');
    }
}

(async () => {
    try {
        let content_web;
        content_web = await $.getJSON("./webservice_json/content_language_web.json");
        const init_guides = () => {
            $('.top-graphic').guides({
                guides: [{
                    html: `
                    <div class="layout-guide guide-1">
                        <div class="card step-1 text-center">
                            <div class="progress-line"></div>
                            <div class="close-guide" onclick="close_guides();">
                            <span class="material-symbols-outlined"> close </span>
                            </div>
                            <div class="content">
                            <div class="title">${content_web?.tour_step1_welcome?.display[language]}</div>
                            <div class="desc">
                                ${content_web?.tour_step1_title?.display[language]}
                            </div>
                            <div class="desc text-primary">
                                ${content_web?.tour_step1_desc?.display[language]}
                            </div>
                            <div class="action">
                                <a href="javascript:void(0);" class="btn btn-primary">${content_web?.tour_step1_btn?.display[language]}</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    `
                }, {
                    element: $('.nav-lang'),
                    html: `
                    <div class="layout-guide guide-2">
                        <div class="card step-2">
                            <div class="guide-pointer"></div>
                            <div class="head">
                            <div class="title">${content_web?.tour_step2_language?.display[language]}</div>
                            <div class="close-guide" onclick="close_guides();">
                                <span class="material-symbols-outlined"> close </span>
                            </div>
                            </div>
                            <div class="progress-line"></div>
                            <div class="content">
                            <div class="desc">
                                ${content_web?.tour_step2_desc?.display[language]}
                            </div>
                            <div class="action">
                                <a href="javascript:void(0);" class="btn btn-primary">${content_web?.contact_next?.display[language]}</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    `
                }, {
                    element: $('#mainHeader'),
                    html: `
                    <div class="layout-guide guide-3">
                        <div class="card step-3">
                            <div class="guide-pointer"></div>
                            <div class="head">
                                <div class="title">${content_web?.tour_step3_menu?.display[language]}</div>
                                <div class="close-guide" onclick="close_guides();"> <span class="material-symbols-outlined"> close </span>
                                </div>
                            </div>
                            <div class="progress-line"></div>
                            <div class="content">
                                <div class="desc">
                                    ${content_web?.tour_step3_desc?.display[language]}
                                </div>
                                <div class="action"> <a href="javascript:void(0);" class="btn btn-primary">${content_web?.contact_next?.display[language]}</a> </div>
                            </div>
                        </div>
                    </div>
                    `
                }, {
                    element: $('#search'),
                    html: `
                    <div class="layout-guide guide-4">
                        <div class="card step-4">
                            <div class="guide-pointer"></div>
                            <div class="head">
                                <div class="title">${content_web?.tour_step4_search?.display[language]}</div>
                                <div class="close-guide" onclick="close_guides();"> <span class="material-symbols-outlined"> close </span>
                                </div>
                            </div>
                            <div class="progress-line"></div>
                            <div class="content">
                                <div class="desc">${content_web?.tour_step5_desc?.display[language]}</div>
                                <div class="action"> <a href="javascript:void(0);" class="btn btn-primary">${content_web?.contact_next?.display[language]}</a> </div>
                            </div>
                        </div>
                    </div>
                    `
                },
                {
                    element: $('#banner'),
                    html: `
                    <div class="layout-guide guide-5">
                        <div class="card step-5">
                            <div class="guide-pointer"></div>
                            <div class="head">
                                <div class="title">${content_web?.tour_step6_banner?.display[language]}</div>
                                <div class="close-guide" onclick="close_guides();"> <span class="material-symbols-outlined"> close </span>
                                </div>
                            </div>
                            <div class="progress-line"></div>
                            <div class="content">
                                <div class="desc">${content_web?.tour_step6_desc?.display[language]}</div>
                                <div class="action"> <a href="javascript:void(0);" class="btn btn-primary">${content_web?.contact_next?.display[language]}</a> </div>
                            </div>
                        </div>
                    </div>
                    `
                },
                {
                    element: $('.asw-menu-btn'),
                    html: `
                    <div class="layout-guide guide-6">
                        <div class="card step-6">
                            <div class="guide-pointer"></div>
                            <div class="head">
                                <div class="title">${content_web?.tour_step7_wcag?.display[language]}</div>
                                <div class="close-guide" onclick="close_guides();"> <span class="material-symbols-outlined"> close </span>
                                </div>
                            </div>
                            <div class="progress-line"></div>
                            <div class="content">
                                <div class="desc">
                                    ${content_web?.tour_step7_desc?.display[language]}
                                </div>
                                <div class="action"> <a href="javascript:void(0);" class="btn btn-primary">${content_web?.contact_next?.display[language]}</a> </div>
                            </div>
                        </div>
                    </div>
                    `
                },
                {
                    element: $('.ipv6'),
                    html: `
                    <div class="layout-guide guide-7">
                        <div class="card step-7">
                            <div class="guide-pointer"></div>
                            <div class="head">
                                <div class="title">${content_web?.tour_step8_ipv6?.display[language]}</div>
                                <div class="close-guide" onclick="close_guides();"> <span class="material-symbols-outlined"> close </span>
                                </div>
                            </div>
                            <div class="progress-line"></div>
                            <div class="content">
                                <div class="desc">
                                    ${content_web?.tour_step8_desc?.display[language]}
                                </div>
                                <div class="action"> <a href="javascript:void(0);" class="btn btn-primary">${content_web?.contact_next?.display[language]}</a> </div>
                            </div>
                        </div>
                    </div>
                    `
                },
                {
                    element: $('.sitemap'),
                    html: `
                    <div class="layout-guide guide-7">
                        <div class="card step-7">
                            <div class="guide-pointer"></div>
                            <div class="head">
                                <div class="title">${content_web?.tour_step9_sitemap?.display[language]}</div>
                                <div class="close-guide" onclick="close_guides();"> <span class="material-symbols-outlined"> close </span>
                                </div>
                            </div>
                            <div class="progress-line"></div>
                            <div class="content">
                                <div class="desc">${content_web?.tour_step9_desc?.display[language]}</div>
                                <div class="action"> <a href="javascript:void(0);" class="btn btn-primary">${content_web?.contact_next?.display[language]}</a> </div>
                            </div>
                        </div>
                    </div>
                    `
                },
                {
                    element: $('.visitors'),
                    html: `
                    <div class="layout-guide guide-7">
                        <div class="card step-7">
                            <div class="guide-pointer"></div>
                            <div class="head">
                                <div class="title">${content_web?.tour_step10_stat?.display[language]}</div>
                                <div class="close-guide" onclick="close_guides();"> <span class="material-symbols-outlined"> close </span>
                                </div>
                            </div>
                            <div class="progress-line"></div>
                            <div class="content">
                                <div class="desc">${content_web?.tour_step10_desc?.display[language]}</div>
                                <div class="action"> <a href="javascript:void(0);" onclick="onComplete();" class="btn btn-primary">${content_web?.contact_next?.display[language]}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                },
                ]
            });
        }
    
        if (typeof $.cookie("TOUR_WEBSITE") === "undefined") {
            init_guides();
            $('.top-graphic').click();
        }
        // save session
        guid_session();

    } catch (error) {
        console.error("error tour website.", error);
    }
})();

function guid_session() {
    // 365 days
    let date = new Date();
    let day = 365;
    let hour = 24;
    let minutes = 60;
    (async () => {
        // date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
        // $.cookie('TOUR_WEBSITE', true, {
        //     expires: date,
        //     path: '/'
        // });
    })().catch(() => { });
}
