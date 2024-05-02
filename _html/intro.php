<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('inc/metatag.php'); ?>
  <?php include('inc/loadstyle.php'); ?>
</head>

<body>
  <div class="global-container">

    <div class="intro-page">
      <div class="intro-slider">
        <div class="swiper swiper-default">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="item" data-media="video">
                <div class="video-container">
                  <video class="slide-video slide-media" loop muted autoplay style="pointer-events: none;">
                    <source src="<?php echo $core_template; ?>/video/petri-dish-pandas.mp4" type="video/mp4">
                  </video>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="item" data-media="image">
                <figure class="cover">
                  <img src="https://picsum.photos/id/684/2000/1000" alt="">
                </figure>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="item" data-media="video">
                <div class="video-container">
                  <video class="slide-video slide-media" loop muted autoplay style="pointer-events: none;">
                    <source src="<?php echo $core_template; ?>/video/mitten-astronaut.mp4" type="video/mp4">
                  </video>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="item" data-media="image">
                <figure class="cover">
                  <img src="https://picsum.photos/id/600/2000/1000" alt="">
                </figure>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <div class="intro-content">
        <div class="container">
          <div class="row row-0 height">
            <div class="col-md">
              <div class="logo">
                <div class="symbol">
                  <picture>
                    <source srcset="<?php echo $core_template; ?>/img/static/brand.webp" type="image/webp">
                    <img src="<?php echo $core_template; ?>/img/static/brand.png" alt="DMSC LOGO" class="lazy">
                  </picture>
                </div>
                <div class="txt">
                  <strong>กรมวิทยาศาสตร์การแพทย์<br> กระทรวงสาธารณสุข </strong><br>
                  <span>Department of Medical Sciences<br> Ministry of Public Health</span>
                </div>
              </div>
            </div>
            <div class="col-md-auto">
              <div class="action">
                <div class="row row-20">
                  <div class="col-auto">
                    <a href="#" class="btn btn-light" title="ลงนามถวายพระพร">ลงนามถวายพระพร</a>
                  </div>
                  <div class="col-auto">
                    <a href="index.php" class="btn btn-primary" title="เข้าสู่เว็บไซต์">เข้าสู่เว็บไซต์</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php include('inc/loadscript.php'); ?>
  <script>
    var introSwiper = new Swiper(".intro-slider .swiper", {
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
</body>

</html>