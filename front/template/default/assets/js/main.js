const path = $("base").attr("href");
const language = $("html").attr("lang");

(function ($) {
  $(window).on("load", function () {
    $(".mCustomScrollbar").mCustomScrollbar({
      theme: "dark"
    });
  });
})(jQuery);

$(document).ready(function () {

  $('.full-dropdown-menu').on('click', function (event) {
    event.stopPropagation();
  });

  $('.main-menu > ul > li > .link').click(function () {
    $('.sub1menu').removeClass('hide-mobile');
    $('.sub2menu').removeClass('hide-mobile');
  });

  $('.sub1menu .link').click(function () {
    $('.sub1menu .link').removeClass('active');
    $('.sub2menu .link').removeClass('active');
    $('.sub1menu').addClass('hide-mobile');
    $(this).addClass('active');
    $('.sub2menu').removeClass('open');
    $('.sub3menu').removeClass('open');
    $('.sub2menu[data-submenu-parent="' + this.id + '"').addClass('open');
  });

  $('.sub2menu .link').click(function () {
    $('.sub2menu .link').removeClass('active');
    $('.sub2menu').addClass('hide-mobile');
    $(this).addClass('active');
    // $('.sub2menu').removeClass('open');
    $('.sub3menu').removeClass('open');
    $('.sub3menu[data-submenu-parent="' + this.id + '"').addClass('open');
  });

  $('.sub2menu .back-menu').click(function () {
    $('.sub1menu').removeClass('hide-mobile');
    $('.sub2menu').removeClass('open');
    $('.sub1menu .link').removeClass('active');
  });

  $('.sub3menu .back-menu').click(function () {
    $('.sub2menu').removeClass('hide-mobile');
    $('.sub3menu').removeClass('open');
    $('.sub2menu .link').removeClass('active');
  });

  var layoutHeader = $('.layout-header').height();
  // var topBar = $('.layout-header .top-bar').height();
  var windowWidth = $(window).width();

  $(window).scroll(function () {
    if ($(window).scrollTop() > layoutHeader && windowWidth > 992) {
      $(".layout-header").addClass("tiny");
      // $('.layout-header').css('transform', 'translateY(' + topBar + ')');
    } else {
      $(".layout-header").removeClass("tiny");
    }
  });

  $('.full-dropdown-menu').css('top', layoutHeader);
  $('.submenu-col').css('height', `calc(100vh - ${layoutHeader})`);
  $('.layout-body').css('margin-top', layoutHeader);

  $('.nav-search .btn-link').click(function () {
    $('.nav-search').addClass('open')
  });
  $('.nav-search .close-search').click(function () {
    $('.nav-search').removeClass('open')
  });

  var lazyLoadInstance = new LazyLoad({});

  // const progressCircle = document.querySelector(".autoplay-progress svg");
  // const progressContent = document.querySelector(".autoplay-progress span");
  var popupSwiper = new Swiper(".popup-slide .swiper", {
    // effect: "fade",
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    },
    navigation: {
      nextEl: ".popup-slide .swiper-button-next",
      prevEl: ".popup-slide .swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    // on: {
    //   autoplayTimeLeft(s, time, progress) {
    //     progressCircle.style.setProperty("--progress", 1 - progress);
    //     progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    //   }
    // }
  });
});