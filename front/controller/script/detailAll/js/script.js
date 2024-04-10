
var downloadSwiper = new Swiper(".document-download-list .swiper", {
    // slidesPerView: "auto",
    slidesPerView: 2,
    // freeMode: true,
    spaceBetween: 40,
    watchSlidesProgress: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1200: {
            slidesPerView: 2,
        }
    }
});

var newsAreaSwiper = new Swiper(".news-area .swiper", {
    // slidesPerView: "auto",
    slidesPerView: 3,
    // freeMode: true,
    spaceBetween: 30,
    watchSlidesProgress: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1200: {
            slidesPerView: 3,
        }
    }

});
