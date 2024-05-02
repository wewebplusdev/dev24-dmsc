var eachYearSwiper = new Swiper(".each-year .swiper", {
    // slidesPerView: "auto",
    slidesPerView: 4,
    // freeMode: true,
    spaceBetween: 45,
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
        1200: {
            slidesPerView: 4,
        }
    }
});