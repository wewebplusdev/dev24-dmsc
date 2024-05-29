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

const preloadNextTG = (n) => {
  tpgSwiper.slides
    .slice(swiper.activeIndex, swiper.activeIndex + n + 1)
    .map((slide) => slide.querySelector("img"))
    .forEach((s) => s.setAttribute("loading", "eager"));
};

// preload the next 2 images immediately
preloadNextTG(2);

// preload the next 2 images after changing slides
tpgSwiper.on("slideChange", () => preloadNextTG(2));

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
  },
});

const preloadNextSC = (n) => {
  scSwiper.slides
    .slice(swiper.activeIndex, swiper.activeIndex + n + 1)
    .map((slide) => slide.querySelector("img"))
    .forEach((s) => s.setAttribute("loading", "eager"));
};

// preload the next 2 images immediately
preloadNextSC(2);

// preload the next 2 images after changing slides
scSwiper.on("slideChange", () => preloadNextSC(2));

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
  },
});

const preloadNextR = (n) => {
  researchSwiper.slides
    .slice(swiper.activeIndex, swiper.activeIndex + n + 1)
    .map((slide) => slide.querySelector("img"))
    .forEach((s) => s.setAttribute("loading", "eager"));
};

// preload the next 2 images immediately
preloadNextR(2);

// preload the next 2 images after changing slides
researchSwiper.on("slideChange", () => preloadNextR(2));

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
    },
  },
});

const preloadNext = (n) => {
  newsSwiper.slides
    .slice(swiper.activeIndex, swiper.activeIndex + n + 1)
    .map((slide) => slide.querySelector("img"))
    .forEach((s) => s.setAttribute("loading", "eager"));
};

// preload the next 2 images immediately
preloadNext(2);

// preload the next 2 images after changing slides
newsSwiper.on("slideChange", () => preloadNext(2));

let serviceSwiper;
function reload_swiper() {
  if (typeof serviceSwiper !== "undefined") {
    serviceSwiper.destroy();
  }

  serviceSwiper = new Swiper(".service-slide .swiper", {
    slidesPerView: 5,
    watchSlidesProgress: true,
    grid: {
      rows: 3,
      fill: "row",
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

let aboutGroupListSwiper = new Swiper(".wg-about-group-list .swiper", {
  // slidesPerView: "auto",
  slidesPerView: 1,
  // freeMode: true,
  // watchSlidesProgress: true,
  // navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev",
  // },
  // breakpoints: {
  //     0: {
  //         slidesPerView: 2,
  //     },
  //     768: {
  //         slidesPerView: 3,
  //     },
  //     992: {
  //         slidesPerView: 2,
  //     }
  // }
});

$(".layout-body-home")
  .closest(".global-container")
  .addClass("global-container-home");

// reload_swiper();

// // mock for adjust poistion
$("body").click(function () {
  $(".layout-guide.guide-1")
    .closest(".guides-fade-in")
    .toggleClass("guide-welcome");
  $(".layout-guide.guide-2")
    .closest(".guides-fade-in")
    .toggleClass("guide-lang");
  $(".layout-guide.guide-3")
    .closest(".guides-fade-in")
    .toggleClass("guide-main-header");
  $(".layout-guide.guide-5")
    .closest(".guides-fade-in")
    .toggleClass("guide-banner");
  $(".layout-guide.guide-6")
    .closest(".guides-fade-in")
    .toggleClass("guide-wcag");
  $(".layout-guide.guide-7")
    .closest(".guides-fade-in")
    .toggleClass("guide-ipv6");
  $(".layout-guide.guide-7").closest("body").removeClass("wcag-fix-z");
  $(".layout-guide.guide-8")
    .closest(".guides-fade-in")
    .toggleClass("guide-visitors");
  $(".layout-guide.guide-9")
    .closest(".guides-fade-in")
    .toggleClass("guide-view");
  $(".guide-wcag").closest("body").toggleClass("wcag-fix-z");
});

$(".layout-guide.guide-4 .btn").click(function () {
  $(".layout-guide.guide-5")
    .closest(".guides-fade-in")
    .toggleClass("guide-banner");
});

$(".layout-guide.guide-5").click(function () {
  $(".wcag-fix-z .asw-widget.-mb").toggleClass("guides-current-element");
  // $('.layout-guide.guide-5').closest('.guides-fade-in').toggleClass('guide-banner');
});

{
  /* <svg xmlns="http://www.w3.org/2000/svg" width="39.767" height="29.282" viewBox="0 0 39.767 29.282">
  <g id="phone_1_" data-name="phone (1)" transform="translate(0 -67.5)">
    <path id="Path_46" data-name="Path 46" d="M158.233,172.5a8.233,8.233,0,1,0,8.233,8.233A8.242,8.242,0,0,0,158.233,172.5Zm0,15.3a7.068,7.068,0,1,1,7.068-7.068A7.076,7.076,0,0,1,158.233,187.8Z" transform="translate(-138.349 -96.845)" fill="#2ab170"/>
    <path id="Path_47" data-name="Path 47" d="M213.573,239.646A3.573,3.573,0,1,0,210,236.073,3.577,3.577,0,0,0,213.573,239.646Zm0-5.981a2.408,2.408,0,1,1-2.408,2.408A2.411,2.411,0,0,1,213.573,233.665Z" transform="translate(-193.689 -152.184)" fill="#2ab170"/>
    <path id="Path_48" data-name="Path 48" d="M38.232,73.3l-4.26-4.26A5.209,5.209,0,0,0,30.264,67.5H9.5A5.209,5.209,0,0,0,5.8,69.036L1.536,73.3A5.208,5.208,0,0,0,0,77v2.73a1.75,1.75,0,0,0,1.748,1.748H9.279a4.063,4.063,0,0,1-.643,1.679L5.541,87.8a5.226,5.226,0,0,0-.881,2.908v3.159a2.916,2.916,0,0,0,2.913,2.913H32.194a2.916,2.916,0,0,0,2.913-2.913V90.711a5.226,5.226,0,0,0-.881-2.908L31.132,83.16a4.063,4.063,0,0,1-.643-1.679H38.02a1.75,1.75,0,0,0,1.748-1.748V77A5.208,5.208,0,0,0,38.232,73.3ZM2.359,74.12l4.26-4.26A4.051,4.051,0,0,1,9.5,68.665H30.264a4.051,4.051,0,0,1,2.883,1.194l4.26,4.26a4.047,4.047,0,0,1,1.184,2.61H30.447v-.492a2.918,2.918,0,0,0-2.33-2.854V71.611a1.762,1.762,0,0,0-1.664-1.779A1.744,1.744,0,0,0,24.723,71H15.037a1.743,1.743,0,0,0-3.387.582v1.806a2.918,2.918,0,0,0-2.33,2.854v.492H1.175a4.047,4.047,0,0,1,1.184-2.61Zm12.786-1.96h9.476v1.165H15.146ZM1.165,79.733V77.895H9.32v2.421H1.748A.583.583,0,0,1,1.165,79.733Zm32.092,8.716a4.064,4.064,0,0,1,.685,2.262v3.159a1.75,1.75,0,0,1-1.748,1.748H7.573a1.75,1.75,0,0,1-1.748-1.748V90.711a4.065,4.065,0,0,1,.685-2.262L9.6,83.806a5.225,5.225,0,0,0,.881-2.908v-4.66a1.75,1.75,0,0,1,1.748-1.748.582.582,0,0,0,.583-.583v-2.33A.582.582,0,0,1,13.4,71h.029a.606.606,0,0,1,.554.615v2.3a.582.582,0,0,0,.583.583H25.2a.582.582,0,0,0,.583-.583v-2.33A.583.583,0,0,1,26.4,71a.606.606,0,0,1,.554.615v2.3a.582.582,0,0,0,.583.583,1.75,1.75,0,0,1,1.748,1.748V80.9a5.226,5.226,0,0,0,.881,2.908Zm4.763-8.133H30.447V77.895H38.6v1.838A.583.583,0,0,1,38.02,80.316Z" fill="#2ab170"/>
    <path id="Path_49" data-name="Path 49" d="M185.9,202.5a5.885,5.885,0,0,0-3.153.913.583.583,0,1,0,.623.984,4.74,4.74,0,1,1-1.476,1.476.583.583,0,0,0-.984-.623,5.9,5.9,0,1,0,4.99-2.75Z" transform="translate(-166.019 -124.514)" fill="#2ab170"/>
  </g>
</svg> */
}
