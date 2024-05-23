
const path = $("base").attr("href");
const language = $("html").attr("lang");

$(function () {
  AOS.init({
    duration: 1000,
    once: true,
    // offset: 0,
    // anchorPlacement: 'top-bottom',
  });
});

document.querySelectorAll('img')
.forEach((img) =>
    img.addEventListener('load', () =>
        AOS.refresh()
    )
);

(function ($) {
  $(window).on("load", function () {
    if ($(window).width() < 992) {
      $(".submenu-col .mCustomScrollbar").mCustomScrollbar("destroy");
    }

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

  $(".select-filter").select2({ 
    minimumResultsForSearch: Infinity,
    theme: 'option-filter'
  });
  $(".select-document").select2({ 
    minimumResultsForSearch: Infinity,
    theme: 'option-document'
  });
  $(".select-pagination").select2({ 
    minimumResultsForSearch: Infinity,
    theme: 'option-pagination'
  });
  $(".select-calendar").select2({ 
    minimumResultsForSearch: Infinity,
    theme: 'option-calendar'
  });
  $(".select-control").select2({ minimumResultsForSearch: Infinity });

  var layoutHeader = $('.layout-header').height();
  // var topBar = $('.layout-header .top-bar').height();
  var windowWidth = $(window).width();

  $(window).scroll(function () {
    if ($(window).scrollTop() > layoutHeader && windowWidth > 992) {
      $(".layout-header:not(.layout-header-fullmap)").addClass("tiny");
      // $('.layout-header').css('transform', 'translateY(' + topBar + ')');
    } else {
      $(".layout-header:not(.layout-header-fullmap)").removeClass("tiny");
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

  // $('.nav-default .swiper .nav-link').click(function () {
  //   $('.nav-default .swiper .nav-link').removeClass('active');
  //   $(this).addClass('active');
  // });

  $(".asw-widget").click(function () {
    $(".asw-wrapper").addClass("active");
  });
  $(".asw-menu-btn-mobile").click(function () {
    $(".asw-wrapper").addClass("active");
    $(".asw-widget.-mb ~ div").addClass("bg-asw-popup");
  });
  $(".asw-menu-close").click(function () {
    $(".asw-wrapper").removeClass("active");
    $(".asw-widget.-mb ~ div").removeClass("bg-asw-popup");
  });

  Fancybox.bind('[data-fancybox="gallery"]', {
    Toolbar: {
      display: {
        left: ["infobar"],
        middle: [
          "zoomIn",
          "zoomOut",
          "toggle1to1",
          "rotateCCW",
          "rotateCW",
          "flipX",
          "flipY",
        ],
        right: ["slideshow", "thumbs", "close"],
      },
    },
  });

 

  var gallerySwiper = new Swiper(".gallery-swiper-", {
    slidesPerView: 4,
    spaceBetween: 10,
    freeMode: true,
    loop: false,
    watchSlidesProgress: true,
    breakpoints: {
      0: {
        slidesPerView: 3,
        spaceBetween: 8,
      },
      991: {
        slidesPerView: 4,
        // spaceBetween: 8,
      },
    },
  });
  
  var gallerySwiper2 = new Swiper(".gallery-swiper-2", {
    spaceBetween: 0,
    speed: 800,
    loop: false,
    navigation: {
      nextEl: ".gallery-slide .swiper-button-next",
      prevEl: ".gallery-slide .swiper-button-prev",
    },
    thumbs: {
      swiper: gallerySwiper,
    },
  });


  $('.sitemap').click(function(){
    $('.sitmap-full').toggleClass('show');
  })

  $('.sitmap-full .close').click(function(){
    $('.sitmap-full').removeClass('show');
  })


  $("a").each(function () {
    if ($(this).attr("title")?.length > 0) {
      strHTML = `
        <span class="fontContantTbManage" style="display:none;">${$(this).attr(
          "title"
        )}</span>
      `;
      $(this).append(strHTML);
    }
  });

  // $("img").each(function () {
  //   if ($(this).attr("alt")?.length > 0) {
  //     strHTML = `
  //       <figcaption class="visually-hidden">${$(this).attr(
  //         "alt"
  //       )}</figcaption>
  //     `;
  //     $(this).append(strHTML);
  //   }
  // });

  $('.layout-guide.guide-1 .btn').click(function(){
    $('.layout-header .top-bar').addClass('guides-current-element');
    console.log( $('.layout-guide.guide-1 .btn'));
  })

});