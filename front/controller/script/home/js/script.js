var tpgSwiper = new Swiper(".top-graphic .swiper", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  // on: {
  //   slideChange: function() {
  //     $('.swiper-slide').each(function() {
  //       var youtubePlayer = $(this).find('iframe').get(0);
  //       if (youtubePlayer) {
  //         youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
  //       }
  //     });
  //   },
  // }
});

var scSwiper = new Swiper(".service-category-list .swiper", {
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
  },
});

var serviceSwiper = reload_swiper();

var researchSwiper = new Swiper(".wg-research-list .swiper", {
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
  },
});

var newsSwiper = new Swiper(".wg-news-slide .swiper", {
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
    },
  },
});

// $('#popupModal').modal('show');

function reload_swiper() {
  if (typeof serviceSwiper != "undefined") {
    serviceSwiper.destroy();
  }

  serviceSwiper = new Swiper(".service-slide .swiper", {
    slidesPerView: 5,
    watchSlidesProgress: true,
    grid: {
      rows: 3,
      // fill: "row"
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
    },
  });
}

$(document).ready(function () {
  // guides tour

  // $("body").guides({
  //   guides: [
  //     {
  //       // element: $("#title"),
  //       html: "Welcome to Guides.js",
  //       render: function () {
  //         // called before rendering
  //       },
  //     },
  //     {
  //       element: $("#cta"),
  //       html: "An intro",
  //     },
  //     {
  //       element: $("#action"),
  //       html: "An intro",
  //     },
  //     {
  //       element: $("#footer"),
  //       html: "Footer",
  //     },
  //   ],
  // });

  // try {
  //   fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
  //     return true;
  //   }).catch(function(e) {
  //     var carbonScript = document.createElement("script");
  //     carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
  //     carbonScript.id = "_carbonads_js";
  //     document.getElementById("carbon-block").appendChild(carbonScript);
  //   });
  // } catch (error) {
  //   console.log(error);
  // }

});
