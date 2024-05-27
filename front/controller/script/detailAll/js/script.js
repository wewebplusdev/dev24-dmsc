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

//history
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
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 2,
    },
    1200: {
      slidesPerView: 4,
    }
  }
});


//organization
Fancybox.bind("[data-fancybox]", {});