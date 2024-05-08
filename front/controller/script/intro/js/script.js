var introSwiper = new Swiper(".intro-slider .swiper", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  on: {
    slideChange: function() {
      // Get the index of the currently active slide
      var activeIndex = this.activeIndex;

      // Get a reference to the active slide element
      var activeSlide = this.slides[activeIndex];

      console.log($(activeSlide).data('title'));
      console.log($(activeSlide).data('url'));
      console.log($(activeSlide).data('target'));

      if ($(activeSlide).data('title').length > 0) {
        $('.-intro-action').text($(activeSlide).data('title'));
        $('.-intro-action').attr('title', $(activeSlide).data('title'));
        $('.-intro-action').show();
      }else{
        $('.-intro-action').hide();
      }
      $('.-intro-action').attr('href', ($(activeSlide).data('url') != "#" && $(activeSlide).data('url') != "") ? $(activeSlide).data('url') : 'javascript:void(0);');
      $('.-intro-action').attr('target', ($(activeSlide).data('url') != "#" && $(activeSlide).data('url') != "") ? $(activeSlide).data('target') : '_self');
    }
  }
});
