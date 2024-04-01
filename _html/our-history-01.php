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
                      <svg xmlns="http://www.w3.org/2000/svg" width="20.681" height="20.684" viewBox="0 0 20.681 20.684">
                        <path id="home" d="M20.626,9l0,0L12.187.558a1.9,1.9,0,0,0-2.693,0L1.061,8.99,1.052,9a1.9,1.9,0,0,0,1.267,3.244l.059,0h.336v6.209a2.231,2.231,0,0,0,2.229,2.228h3.3a.606.606,0,0,0,.606-.606V15.21a1.018,1.018,0,0,1,1.017-1.017h1.947a1.018,1.018,0,0,1,1.017,1.017v4.868a.606.606,0,0,0,.606.606h3.3a2.231,2.231,0,0,0,2.229-2.228V12.246h.312A1.9,1.9,0,0,0,20.626,9Zm-.858,1.835a.688.688,0,0,1-.49.2H18.36a.606.606,0,0,0-.606.606v6.815a1.018,1.018,0,0,1-1.017,1.017H14.042V15.21a2.231,2.231,0,0,0-2.229-2.229H9.867A2.231,2.231,0,0,0,7.638,15.21v4.262H4.943a1.018,1.018,0,0,1-1.017-1.017V11.64a.606.606,0,0,0-.606-.606H2.39a.691.691,0,0,1-.477-1.181h0l8.437-8.437a.692.692,0,0,1,.979,0L19.765,9.85l0,0A.694.694,0,0,1,19.767,10.831Zm0,0" transform="translate(-0.499)" fill="#fff" />
                      </svg>
                    </span>
                    หน้าหลัก
                  </a>
                </li>
                <li>
                  <a href="#" class="link">
                    เกี่ยวกับเรา
                  </a>
                </li>
                <li>
                  <a href="#" class="link">
                    ประวัติความเป็นมา
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
          <h2 class="title text-center">ประวัติความเป็นมา</h2>
        </div>
        <div class="our-history-info">
          <div class="container">
            <div class="row align-items-end">
              <div class="col-auto">
                <div class="thumbnails">
                  <img src="<?php echo $core_template; ?>/img/static/graphic-the-story.png" alt="graphic-the-story">
                </div>
              </div>
              <div class="col-auto">
                <div class="content">
                  <div class="title">กรมวิทยาศาสตร์การแพทย์</div>
                  <div class="subtitle">ก่อตั้งขึ้นเป็นเวลา 81 ปี</div>
                  <div class="desc">
                    มีการปรับปรุงเปลี่ยนแปลงโครงสร้างหลายครั้ง เพื่อให้เกิดความเหมาะสมกับภาระหน้าที่
                    <br>
                    และให้ทันต่อสภาพความเปลี่ยนแปลงทางด้านเทคโนโลยี สังคม และสิ่งแวดล้อม
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="nav-default each-year">
          <div class="container">
            <div class="title typo-md fw-bold text-secondary mb-3">ความเป็นมา</div>
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="our-history-01.php" class="nav-link active">2565 - ปัจจุบัน</a>
                </div>
                <div class="swiper-slide">
                  <a href="our-history-02.php" class="nav-link">2564 - 2545</a>
                </div>
                <div class="swiper-slide">
                  <a href="our-history-02.php" class="nav-link">2540 - 2526</a>
                </div>
                <div class="swiper-slide">
                  <a href="our-history-02.php" class="nav-link">2517 - 2485</a>
                </div>
              </div>
            </div>
            <!-- ck editor -->
            <div class="editor-content">
              <div class="history-timeline">
                <div class="row">
                  <div class="col-6 timeline-dot">
                    <div class="timeline-layout">
                      <div class="h-bigger">ปัจจุบัน</div>
                      <ul class="timeline-list">
                        <li>
                          <p>
                            กรมวิทยาศาสตร์การแพทย์มีหน่วยงานทั้งหมด 34 หน่วยงาน
                            <br>
                            แบ่งออกเป็นหน่วยงานตามกฎกระทรวง
                            <br>
                            แบ่งส่วนราชการกรมวิทยาศาสตร์การแพทย์ กระทรวง
                            <br>
                            สาธารณสุข
                          </p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="thumbnails">
                      <img src="<?php echo $core_template; ?>/img/uploads/img-history-01.jpg" alt="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col order-lg-2">
                    <div class="h-bigger">2552</div>
                    <ul class="timeline-list">
                      <li>
                        <p>
                          พ.ศ. 2552 แบ่งส่วนราชการออกเป็น 24 หน่วยงาน
                        </p>
                      </li>
                      <li>
                        <p>
                          หน่วยงานที่ได้จัดตั้งขึ้นเป็นการภายใน 10 หน่วยงาน
                          <br>
                          โดยนำกองการแพทย์จีโนมิกส์ และสนับสนุนนวัตกรรม
                          <br>
                          ไปรวมกับสถาบันชีววิทยาศาสตร์ทางการแพทย์
                        </p>
                      </li>
                      <li>
                        <p>
                          เนื่องจากมีภาระงานที่ใกล้เคียงกัน และเปลี่ยนชื่อกลุ่มงาน
                          <br>
                          คุ้มครองจริยธรรม เป็น กลุ่มงานจริยธรรม
                        </p>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6 order-lg-1 timeline-dot">
                    <div class="timeline-layout">
                      <div class="thumbnails">
                        <img src="<?php echo $core_template; ?>/img/uploads/img-history-02.jpg" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ck editor -->
          </div>
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