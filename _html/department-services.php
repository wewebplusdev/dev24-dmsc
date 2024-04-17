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
                    คลังความรู้
                  </a>
                </li>
                <li>
                  <a href="#" class="link">
                    บริการของกรมฯ
                  </a>
                </li>
              </ol>
            </div>
            <h1 class="title">
              บริการของกรมฯ
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
        <div class="service-category mt-0">
          <div class="service-category-list mb-xl-4">
            <div class="container">
              <div class="swiper swiper-default">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="item">
                      <button type="button" class="btn active">การแพทย์</button>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="item">
                      <button type="button" class="btn">งานวิจัย</button>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="item">
                      <button type="button" class="btn active">นวัตกรรม</button>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="item">
                      <button type="button" class="btn">ห้องปฏิบัติการ</button>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="item">
                      <button type="button" class="btn">ระบบออนไลน์</button>
                    </div>
                  </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="default-filter">
          <div class="container">
            <form action="" class="form-default">
              <div class="head">
                <div class="form-group form-search mb-0">
                  <label class="control-label visually-hidden" for="">ค้นหา</label>
                  <div class="block-control">
                    <input class="form-control" type="search" id="" placeholder="พิมพ์คำค้นหา">
                    <div class="search">
                      <a href="" class="link">
                        <span class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="33.621" height="33.621" viewBox="0 0 33.621 33.621">
                            <g id="Icon_feather-search" data-name="Icon feather-search" transform="translate(1.5 1.5)">
                              <path id="Path_41" data-name="Path 41" d="M31.167,17.833A13.333,13.333,0,1,1,17.833,4.5,13.333,13.333,0,0,1,31.167,17.833Z" transform="translate(-4.5 -4.5)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                              <path id="Path_42" data-name="Path 42" d="M32.225,32.225l-7.25-7.25" transform="translate(-2.225 -2.225)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </g>
                          </svg>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="body">
                <div class="row align-items-center">
                  <div class="col-md mb-md-0 mb-3">
                    <div class="whead my-0">
                      <div class="title">บริการของกรมฯ</div>
                    </div>
                  </div>
                  <div class="col-md-auto">
                    <div class="form-group form-select mb-0">
                      <label class="control-label" for="selectFilter">จัดเรียง :</label>
                      <div class="select-wrapper">
                        <select class="select-filter" name="selectFilter" id="selectFilter" style="width: 100%;">
                          <option value="">เลือกการจัดเรียง</option>
                          <option value="">ล่าสุด</option>
                          <option value="">ลำดับ</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="service-area">
          <div class="container">
            <div class="service-list" data-aos="fade-up">
              <?php for ($i = 1; $i <= 15; $i++) { ?>
                <div class="item">
                  <a href="" class="link">
                    <div class="card">
                      <div class="card-body">
                        <div class="thumbnail">
                          <figure class="contain">
                            <img src="<?php echo $core_template; ?>/img/static/service-01.svg" alt="service-01" class="thumb-img lazy">
                            <img src="<?php echo $core_template; ?>/img/static/service-01-hover.svg" alt="service-01" class="thumb-hover lazy">
                          </figure>
                        </div>
                        <h4 class="title">ระบบรับส่งตัวอย่างเพื่อตรวจวิเคราะห์</h4>
                      </div>
                    </div>
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php include('inc/pagination.php'); ?>
      </div>
    </section>

    <?php include('inc/footer.php'); ?>
  </div>

  <?php include('inc/loadscript.php'); ?>

  <script>
    var scSwiper = new Swiper(".service-category-list .swiper", {
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
      }
    });

    // var serviceSwiper = new Swiper(".service-slide .swiper", {
    //   slidesPerView: 5,
    //   watchSlidesProgress: true,
    //   grid: {
    //     rows: 3,
    //     // fill: "row"
    //   },
    //   navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev",
    //   },
    //   pagination: {
    //     el: ".swiper-pagination",
    //     clickable: true,
    //   },
    //   breakpoints: {
    //     0: {
    //       slidesPerView: 2,
    //       grid: {
    //         rows: 2,
    //       },
    //     },
    //     576: {
    //       slidesPerView: 2,
    //       grid: {
    //         rows: 3,
    //       },
    //     },
    //     768: {
    //       slidesPerView: 3,
    //     },
    //     1024: {
    //       slidesPerView: 4,
    //     },
    //     1200: {
    //       slidesPerView: 5,
    //     },
    //   }
    // });
  </script>

</body>

</html>