var contactMap = new Swiper(".contact-center .swiper", {
  // slidesPerView: "auto",
  slidesPerView: 2,
  // freeMode: true,
  spaceBetween: 23,
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
    // 1199: {
    //   slidesPerView: 2,
    //   spaceBetween: 15,
    // }
  }
});


function load_recaptch() {
  grecaptcha.ready(function () {
    // do request for recaptcha token
    // response is promise with passed token
    grecaptcha.execute($('#g-recaptcha-response').data('secret'), { action: 'validate_captcha' })
      .then(function (token) {
        // add token value to form
        document.getElementById('g-recaptcha-response').value = token;
      });
  });
}