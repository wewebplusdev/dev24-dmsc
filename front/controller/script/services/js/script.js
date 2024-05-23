let serviceSwiper = reload_swiper();

function reload_swiper() {
  return new Swiper(".service-category-list .swiper", {
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
}
$(".filter-form").on("click", async function () {
  $("#filter-form").submit();
});
$(".select-filter").on("change", async function () {
  $("#filter-form").submit();
});
