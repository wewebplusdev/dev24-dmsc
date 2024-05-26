

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

        let guid_data = {
            init: {
                html: `
                <div class="layout-guide guide-1">
                    <div class="card step-1 text-center">
                        <div class="progress-line"></div>
                        <div class="close-guide" onclick="close_guides();">
                        <span class="material-symbols-outlined"> close </span>
                        </div>
                        <div class="content text-center">
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
            },
            navlang: {
                element: '.guide-nav-lang',
                html: `
                <div class="layout-guide guide-2">
                    <div class="card step-2">
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
                `,
                func_addon: 'guid_addon',
                // func_addon: 'guid_addon_test'
            },
            mainHeader: {
                element: $('.guide-main-header'),
                html: `
                <div class="layout-guide guide-3">
                    <div class="card step-3">
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
                `,
                // func_addon: 'guid_addon'
                // func_addon: 'guid_addon_test'
                
            },
            search: {
                element: $('.guide-search'),
                html: `
                <div class="layout-guide guide-4">
                    <div class="card step-4">
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
                `,
                
            },
            banner: {
                element: $('#banner'),
                html: `
                <div class="layout-guide guide-5">
                    <div class="card step-5">
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
                `,
                func_addon: 'guid_addon'
            },
            wcag: {
                element: $('.wcag'),
                html: `
                <div class="layout-guide guide-6">
                    <div class="card step-6">
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
                  <div class="guide-pointer"></div>
                
                `,
                func_addon: 'guid_addon'
            },
            ipv6: {
                element: $('.guide-ipv6'),
                html: `
                <div class="layout-guide guide-7">
                    <div class="card step-7">
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
                `,
                func_addon: 'guid_addon'
            },
            sitemap: {
                element: $('.guide-sitemap'),
                html: `
                <div class="layout-guide guide-8">
                    <div class="card step-8">
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
                `,
                func_addon: 'guid_addon'
            },
            visitors: {
                element: $('.guide-visitors'),
                html: `
                <div class="layout-guide guide-9">
                    <div class="card step-9">
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
                `,
                func_addon: 'guid_addon',
            },
        };

        const settings = {
            "url": `${path}${language}/reverse_proxy`,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": `application/json`,
            },
            "data": JSON.stringify({
                "Controller": 'home',
                "method": 'getGuidWebsite',
                "order": 'DESC',
                "page": 1,
                "limit": 15,
            }),
        };
        const result = await $.ajax(settings);
        if (result?.code == 1001) {
            let data_set = [];
            result?.item.map((value) => {
                if (value.section in guid_data) {
                    data_set.push(guid_data[value.section]);
                }
            });

            const init_guides = (data) => {
                $('.top-graphic').guides({ guides: data });
            }

            if (typeof $.cookie("TOUR_WEBSITE") === "undefined") {
                init_guides(data_set);
                $('.top-graphic').click();
            }
            // save session
            guid_session();
        }


    } catch (error) {
        console.error("error tour website.", error);
    }
})();

// function guid_addon(res) {
//     $('.layout-header .top-bar').removeClass('guides-current-element');
//     // $('.layout-header .guide-main-header').removeClass('guides-current-element');
//     $('.navbar-collapse').removeClass('show');
//     $('.navbar-toggler').addClass('collapsed');
   

    
//     if (!!res?.element) {
//         switch (res?.element) {

            
//             case '.guide-nav-lang':
//                 $('.layout-header .top-bar').addClass('guides-current-element');
//                 // $('.layout-header .guide-main-header').addClass('guides-current-element');
//                 $('.navbar-collapse').addClass('show');
//                 $('.navbar-toggler').removeClass('collapsed');
//                 // console.log("1")
//                 break;
                
//             // case '.guide-main-header':
//             //     console.log('banner');
//             //     $('.layout-header .top-bar').addClass('guides-current-element');
//             //     $('.navbar-toggler').addClass('collapsed');
//             //     $('.navbar-collapse').removeClass('show');
//             //     break;
        
//             default:
//                 break;
//         }
//     }
// }

// function guid_addon_open_menu (menuMobile) {

// }





function guid_addon(res) {
  $('.layout-header .top-bar').removeClass('guides-current-element');
  $('.layout-body-home .guides-overlay-custom').removeClass('d-block-custom');
  $('.navbar-collapse').removeClass('show');
  $('.navbar-toggler').addClass('collapsed');
  $('.wcag .asw-widget.-mb').removeClass('guides-current-element');
  
  if (!!res?.element) {
    switch (res?.element) {
      case '.guide-nav-lang':
          $('.layout-header .top-bar').addClass('guides-current-element');
          $('.layout-body-home .guides-overlay-custom').addClass('d-block-custom');
          $('.navbar-collapse').addClass('show');
          $('.navbar-toggler').removeClass('collapsed');
          // console.log("1")
          break;
          
      case '.guide-main-header':
          $('.layout-header .top-bar').removeClass('guides-current-element');
          $('.layout-body-home .guides-overlay-custom').removeClass('d-block-custom');
          break;

      case '.guide-search':
        $('.layout-body-home .guides-overlay-custom').removeClass('d-block-custom');
          break;

      case '.wcag':
        $('.wcag .asw-widget.-mb').addClass('guides-current-element');
          break;
  
      default:
          break;
    }
  }
}

// function guid_addon_test(res) {
//   $('.layout-header .top-bar').removeClass('guides-current-element');
  
//   if (!!res?.element) {
//     switch (res?.element) {
//       case '.guide-nav-lang':
//           $('.layout-header .top-bar').addClass('guides-current-element');
//           break;
//       default:
//           break;
//     }
//   }
// }

function reset_addon(){
    // $('.layout-header .top-bar').removeClass('top-bar');
    $('.guides-overlay-custom').addClass('d-none');
}

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



// $('.layout-header').addClass('guides-overlay-custom');
// $('.layout-body').addClass('guides-overlay-custom');
// $('.guide-nav-lang.guides-current-element').togleClass('test');


// $( document ).ready(function() {
//   $('.layout-guide.guide-1 .btn').click(function(){
//     $('.layout-header .top-bar').addClass('guides-current-element');
//     console.log( $('.layout-guide.guide-1 .btn'));
//   })
// });