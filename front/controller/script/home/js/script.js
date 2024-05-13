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
$('#popupModal').modal('show');

