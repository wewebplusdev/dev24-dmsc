let tpgSwiper = new Swiper(".top-graphic .swiper", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    // on: {
    //   slideChange: function() {
    //     $('.swiper-slide').each(function() {
    //       let youtubePlayer = $(this).find('iframe').get(0);
    //       if (youtubePlayer) {
    //         youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    //       }
    //     });
    //   },
    // }
});

let scSwiper = new Swiper(".service-category-list .swiper", {
    slidesPerView: 5,
    watchSlidesProgress: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        },
        1200: {
            slidesPerView: 5,
        },
    }
});



let researchSwiper = new Swiper(".wg-research-list .swiper", {
    slidesPerView: 3,
    watchSlidesProgress: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        576: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
    }
});

let newsSwiper = new Swiper(".wg-news-slide .swiper", {
    // slidesPerView: "auto",
    slidesPerView: 2,
    // freeMode: true,
    watchSlidesProgress: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        992: {
            slidesPerView: 2,
        }
    }
});


let serviceSwiper;
function reload_swiper() {
    if (typeof serviceSwiper !== 'undefined') {
        serviceSwiper.destroy();
    }

    serviceSwiper = new Swiper(".service-slide .swiper", {
        slidesPerView: 5,
        watchSlidesProgress: true,
        grid: {
            rows: 3,
            fill:"row"
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                },
            },
            576: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                },
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 5,
            },
        }
    });
}

// $('body').guides({
//   guides: [{
//     // welcome
//     html: '<div class="layout-guide guide-1"> <div class="card step-1 text-center"> <div class="progress-line"></div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> <div class="content"> <div class="title">สวัสดี</div> <div class="desc"> this is Bei from the Usetiful sales team. It’s great to see that you are interested in learning more about Usetiful. Our <b>interactive product tours</b> allow you to: </div> <div class="desc text-primary"> Improve user retention & activation Guide with tailored onboarding experience Reduce support tickets Measure engagement & collect feedback </div> <div class="action"> <a href="#" class="btn btn-primary">Discover more</a> </div> </div> </div> </div>'
//   }, {
//     element: $('.nav-lang'),
//     html: '<div class="layout-guide guide-2"> <div class="card step-2"> <div class="guide-pointer"></div> <div class="head"> <div class="title">เลือกภาษา</div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> </div> <div class="progress-line"></div> <div class="content"> <div class="desc"> <b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum. </div> <div class="action"> <a href="#" class="btn btn-primary">Next</a> </div> </div> </div> </div>'
//   }, {
//     element: $('#mainHeader'),
//     html: '<div class="layout-guide guide-3"> <div class="card step-3"> <div class="guide-pointer"></div> <div class="head"> <div class="title">เมนูหลัก</div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> </div> <div class="progress-line"></div> <div class="content"> <div class="desc"> <b>ส่วนบน (Header)</b> คือ ส่วนที่จะติดไปทุก ๆ หน้าของเว็บไซต์ เป็นส่วนที่แสดงโลโก้ แสดงเมนูของเว็บไซต์ เป็นต้นโดยเมนูส่วนบนจะมีเมนูย่อยแบ่งออกเป็น 5 หัวข้อ คือ <ol> <li>เมนูส่วนบน</li> <li>โลโก้</li> <li>วิดเจ็ต</li> <li>พื้นหลัง</li> <li>รูปแบบ</li> </ol> </div> <div class="action"> <a href="#" class="btn btn-primary">Next</a> </div> </div> </div> </div>'
//   }, {
//     element: $('#search'),
//     html: '<div class="layout-guide guide-4"> <div class="card step-4"> <div class="guide-pointer"></div> <div class="head"> <div class="title">ค้นหา</div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> </div> <div class="progress-line"></div> <div class="content"> <div class="desc"> <b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum. </div> <div class="action"> <a href="#" class="btn btn-primary">Next</a> </div> </div> </div> </div>'
//   },
//   {
//     element: $('#banner'),
//     // fnc: 'test', 
//     html: '<div class="layout-guide guide-5"> <div class="card step-5"> <div class="guide-pointer"></div> <div class="head"> <div class="title">Banner</div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> </div> <div class="progress-line"></div> <div class="content"> <div class="desc"> <b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum. </div> <div class="action"> <a href="#" class="btn btn-primary">Next</a> </div> </div> </div> </div>'
//   },
//   {
//     element: $('.wcag'),
//     html: '<div class="layout-guide guide-6"> <div class="card step-6"> <div class="guide-pointer"></div> <div class="head"> <div class="title">WCAG</div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> </div> <div class="progress-line"></div> <div class="content"> <div class="desc"> <b>Web Content Accessibility Guidelines</b> เป็นส่วนหนึ่งของความสามารถใน การเข้าถึงเว็บไซต์ มี 4 หลักการตามวัตถุประสงค์ในการออกแบบเว็บไซต์ <p>หลักการที่ 1 - ผู้อ่านต้องสามารถรับรู้เนื้อหาได้</p> <p>หลักการที่ 2 - องค์ประกอบต่าง ๆ ของการอินเตอร์เฟสกับเนื้อหาจะต้องใช้งานได้</p> <p>หลักการที่ 3 - ผู้ใช้สามารถเข้าใจเนื้อหา และส่วนควบคุมการทำงานต่างๆ ได้</p> <p>หลักการที่ 4 - เนื้อหาต้องมีความยืดหยุ่นที่จะทำงานกับเทคโนโลยีเว็บในปัจจุบันและ อนาคตได้ (รวมถึงเทคโนโลยีสิ่งอำนวยความสะดวก)</p> </div> <div class="action"> <a href="#" class="btn btn-primary">Next</a> </div> </div> </div> </div><div class="guide-pointer"></div>'
//   },
//   {
//     element: $('#ipv6'),
//     html: '<div class="layout-guide guide-7"> <div class="card step-7"> <div class="guide-pointer"></div> <div class="head"> <div class="title">IPv6 Ready</div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> </div> <div class="progress-line"></div> <div class="content"> <div class="desc"> <b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum. </div> <div class="action"> <a href="#" class="btn btn-primary">Next</a> </div> </div> </div> </div>'
//   },
//   {
//     element: $('.guide-sitemap'),
//     html: '<div class="layout-guide guide-8"> <div class="card step-8"> <div class="guide-pointer"></div> <div class="head"> <div class="title">เเผนผังเว็บไซต์</div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> </div> <div class="progress-line"></div> <div class="content"> <div class="desc"> <b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum. </div> <div class="action"> <a href="#" class="btn btn-primary">Next</a> </div> </div> </div> </div>'
//   },
//   {
//     element: $('.guide-visitors'),
//     html: '<div class="layout-guide guide-9"> <div class="card step-9"> <div class="guide-pointer"></div> <div class="head"> <div class="title">จำนวนผู้เข้าชม</div> <div class="close-guide"> <span class="material-symbols-outlined"> close </span> </div> </div> <div class="progress-line"></div> <div class="content"> <div class="desc"> <b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum. </div> <div class="action"> <a href="#" class="btn btn-primary">Next</a> </div> </div> </div> </div>'
//   },
// ]
// });
reload_swiper();


// // mock for adjust poistion

$('body').click(function(){
  $('.layout-guide.guide-5').closest('.guides-fade-in').toggleClass('guide-banner');
  $('.layout-guide.guide-6').closest('.guides-fade-in').toggleClass('guide-wcag');
  $('.layout-guide.guide-7').closest('.guides-fade-in').toggleClass('guide-ipv6');
  $('.layout-guide.guide-7').closest('.guides-canvas').removeClass('wcag-fix-z');
  $('.layout-guide.guide-8').closest('.guides-fade-in').toggleClass('guide-visitors');
  $('.guide-wcag').closest('.guides-canvas').toggleClass('wcag-fix-z');
})

$('.layout-guide.guide-4 .btn').click(function(){
  $('.layout-guide.guide-5').closest('.guides-fade-in').toggleClass('guide-banner');
});