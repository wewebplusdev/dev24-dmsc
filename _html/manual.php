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
                    คู่มือ
                  </a>
                </li>
              </ol>
            </div>
            <h1 class="title">
              คู่มือ
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
                      <div class="title">คู่มือ</div>
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
        <div class="container">
          <div class="manual-list">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
              <div class="item">
                <a href="" class="link">
                  <div class="thumbnail">
                    <figure class="cover">
                      <img src="<?php echo $core_template; ?>/img/uploads/manual-thumbnail.jpg" alt="" class="img-cover">
                    </figure>
                  </div>
                  <div class="content">
                    <div class="content-wrapper">
                      <div class="title">
                        คู่มือการตรวจวินิจฉัยโรคติดเชื้อไวรัสโคโรนา 2019
                        คู่มือการตรวจวินิจฉัยโรคติดเชื้อไวรัสโคโรนา 2019
                      </div>
                      <div class="file-type">
                        <ul class="item-list">
                          <li>
                            <span>ชนิดไฟล์ :</span> <span>.pdf</span>
                          </li>
                          <li>
                            <span>จำนวนการเข้าชม :</span> <span>150</span> ครั้ง
                          </li>
                        </ul>
                      </div>
                      <div class="read-more">
                        อ่านเพิ่มเติม
                        <span class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14.25" height="14.25" viewBox="0 0 14.25 14.25">
                            <g id="Icon_ionic-ios-arrow-dropright" data-name="Icon ionic-ios-arrow-dropright" transform="translate(-3.375 -3.375)">
                              <path id="Path_25" data-name="Path 25" d="M14.609,10.175a.664.664,0,0,1,.935,0l3.268,3.278a.66.66,0,0,1,.021.911l-3.22,3.23a.66.66,0,1,1-.935-.932l2.737-2.778-2.805-2.778A.653.653,0,0,1,14.609,10.175Z" transform="translate(-5.661 -3.389)" fill="#2ab170" />
                              <path id="Path_26" data-name="Path 26" d="M3.375,10.5A7.125,7.125,0,1,0,10.5,3.375,7.124,7.124,0,0,0,3.375,10.5Zm1.1,0a6.035,6.035,0,1,1,1.768,4.261A5.977,5.977,0,0,1,4.471,10.5Z" fill="#2ab170" />
                            </g>
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
        <?php include('inc/pagination.php'); ?>
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

    $('.layout-view button').click(function() {
      if ($(this).hasClass('btn-grid')) {
        $('.layout-view').removeClass('layout-list');
        $('.layout-view').addClass('layout-grid');

        $('#download-list').removeClass('-layout-list');
        $('#download-list').addClass('-layout-grid');

        $('.col-thumb').removeClass('col-auto').addClass('col-12');
        $('.col-head').removeClass('col').addClass('col-12');
      } else {
        $('.layout-view').removeClass('layout-grid');
        $('.layout-view').addClass('layout-list');

        $('#download-list').removeClass('-layout-grid');
        $('#download-list').addClass('-layout-list');

        $('.col-thumb').removeClass('col-12').addClass('col-auto');
        $('.col-head').removeClass('col-12').addClass('col');
      }
    });
  </script>
</body>

</html>