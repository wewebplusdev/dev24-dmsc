let eachYearSwiper = new Swiper(".each-year .swiper", {
  // slidesPerView: "auto",
  slidesPerView: 4,
  // freeMode: true,
  spaceBetween: 30,
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
    },
  },
});

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

$(".layout-view button").click(function () {
  if ($(this).hasClass("btn-grid")) {
    $(".layout-view").removeClass("layout-list");
    $(".layout-view").addClass("layout-grid");

    $("#download-list").removeClass("-layout-list");
    $("#download-list").addClass("-layout-grid");

    $(".col-thumb").removeClass("col-auto").addClass("col-12");
    $(".col-head").removeClass("col").addClass("col-12");
  } else {
    $(".layout-view").removeClass("layout-grid");
    $(".layout-view").addClass("layout-list");

    $("#download-list").removeClass("-layout-grid");
    $("#download-list").addClass("-layout-list");

    $(".col-thumb").removeClass("col-12").addClass("col-auto");
    $(".col-head").removeClass("col-12").addClass("col");
  }
});
$(".filter-form").on("click", async function () {
  $("#filter-form").submit();
});

$(".select-filter").on("change", async function () {
  $("#filter-form").submit();
});
