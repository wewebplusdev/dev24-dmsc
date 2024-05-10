function reload_swiper() {
    (function () {
        new Swiper(".service-category-list .swiper", {
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
    })();
}
reload_swiper();
