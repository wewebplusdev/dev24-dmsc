let contactMap = new Swiper(".contact-center .swiper", {
    // slidesPerView: "auto",
    slidesPerView: 2,
    // freeMode: true,
    spaceBetween: 23,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
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
      // 1199: {
      //   slidesPerView: 2,
      //   spaceBetween: 15,
      // }
    }
  });
window.addEventListener('DOMContentLoaded', function() {
  let contactService = new Swiper(".contact-service-list .swiper", {
    // slidesPerView: "auto",
    // freeMode: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    breakpoints: {
      0: {
        spaceBetween: 15,
        slidesPerView: 1,
      },
      767: {
        spaceBetween: 0,
        slidesPerView: 2,
        grid: {
          rows: 2,
        },
      },
      991: {
        spaceBetween: 0,
        slidesPerView: 3,
        grid: {
          rows: 2,
        },
      },
      1199: {
        spaceBetween: 0,
        slidesPerView: 4,
        grid: {
          rows: 2,
        },
      }
    }
  });
});