let downloadSwiper = new Swiper(".document-download-list .swiper", {
  // slidesPerView: "auto",
  slidesPerView: 2,
  // freeMode: true,
  spaceBetween: 35,
  watchSlidesProgress: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    991: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    1199: {
      slidesPerView: 2,
      spaceBetween: 35,
    },
  },
});

let newsAreaSwiper = new Swiper(".news-area .swiper", {
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
      slidesPerView: 1,
      spaceBetween: 15,
    },
    767: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    991: {
      spaceBetween: 15,
    },
    1199: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});
