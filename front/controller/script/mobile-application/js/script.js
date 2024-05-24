// Function to initialize Swiper
function initializeSwiper(selector, config) {
  return new Swiper(selector, config);
}

// Swiper configuration
const swiperConfig = {
  slidesPerView: 4,
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
    },
  },
};

// Initialize Swiper
let eachYearSwiper = initializeSwiper(".each-year .swiper", swiperConfig);

// Function to toggle layout classes
function toggleLayout(
  viewClass,
  listClass,
  gridClass,
  listId,
  gridId,
  thumbClass,
  headClass
) {
  $(viewClass).toggleClass(listClass).toggleClass(gridClass);
  $(listId).toggleClass(listClass).toggleClass(gridClass);
  $(thumbClass).toggleClass("col-auto col-12");
  $(headClass).toggleClass("col col-12");
}

// Event listener for layout view buttons
$(".layout-view button").click(function () {
  if ($(this).hasClass("btn-grid")) {
    toggleLayout(
      ".layout-view",
      "layout-list",
      "layout-grid",
      "#download-list",
      "-layout-list",
      ".col-thumb",
      ".col-head"
    );
  } else {
    toggleLayout(
      ".layout-view",
      "layout-grid",
      "layout-list",
      "#download-list",
      "-layout-grid",
      ".col-thumb",
      ".col-head"
    );
  }
});
$(".select-filter").on("change", async function () {
  $("#filter-form").submit();
});
$(".btnSearch").on("click", async function () {
  $("#filter-form").submit();
});

$(".select-filter").on("change", async function () {
  $("#filter-form").submit();
});

$(".btnSearch").on("click", async function () {
  $("#filter-form").submit();
});
