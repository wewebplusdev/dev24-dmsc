<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('inc/metatag.php'); ?>
  <?php include('inc/loadstyle.php'); ?>
</head>

<body>

  <div class="global-container">
    <?php include('inc/header.php'); ?>

    <section class="layout-body">
      <div class="default-header">
        <div class="wrapper">
          <div class="container">
            <div class="breadcrumb-block">
              <ol class="breadcrumb">
                <li>
                  <a href="#" class="link">
                    <span class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15.856" height="15.857" viewBox="0 0 15.856 15.857">
                        <path id="home-3" d="M15.43,6.9h0L8.96.428A1.459,1.459,0,0,0,6.9.428L.43,6.893.424,6.9A1.459,1.459,0,0,0,1.4,9.386l.045,0H1.7v4.76a1.71,1.71,0,0,0,1.709,1.708H5.937a.465.465,0,0,0,.465-.465V11.661a.78.78,0,0,1,.779-.779H8.674a.78.78,0,0,1,.779.779v3.732a.465.465,0,0,0,.465.465h2.531a1.71,1.71,0,0,0,1.709-1.708V9.389H14.4A1.46,1.46,0,0,0,15.43,6.9Zm0,0" transform="translate(0)" fill="#fff" />
                      </svg>
                    </span>
                    หน้าหลัก
                  </a>
                </li>
                <li>
                  <a href="#" class="link">
                    แผนกลยุทธ์
                  </a>
                </li>
              </ol>
            </div>
            <h1 class="title">
              เกี่ยวกับหน่วยงาน
            </h1>
            <div class="graphic">
              <div class="obj">
                <img src="<?php echo $core_template; ?>/img/uploads/obj-banner-about.png" alt="obj-banner-about" class="lazy img-cover">
              </div>
            </div>
          </div>
        </div>
        <figure class="cover">
          <img src="<?php echo $core_template; ?>/img/static/banner.jpg" alt="" class="lazy img-cover">
        </figure>
      </div>
      <div class="default-body">
        <div class="whead">
          <h2 class="title text-center">แผนกลยุทธ์</h2>
        </div>
      </div>
    </section>

    <?php include('inc/footer.php'); ?>
  </div>

  <?php include('inc/loadscript.php'); ?>

  <script>
    var eachYearSwiper = new Swiper(".each-year .swiper", {
      // slidesPerView: "auto",
      slidesPerView: 4,
      // freeMode: true,
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
        }
      }
    });
  </script>
</body>

</html>