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

      <!-- <span class="material-symbols-rounded">
        chevron_right
      </span> -->
      <div class="top-graphic">
        <div class="swiper default-swiper">
          <div class="swiper-wrapper">
            <?php for ($i = 1; $i <= 3; $i++) { ?>
              <div class="swiper-slide">
                <div class="item">
                  <figure class="cover">
                    <picture>
                      <source srcset="<?php echo $core_template; ?>/img/static/top-graphic.webp" type="image/webp">
                      <img src="<?php echo $core_template; ?>/img/static/top-graphic.jpg" alt="" class="lazy">
                    </picture>
                  </figure>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <div class="section">
        <div class="wg-services lazy" data-bg="<?php echo $core_template; ?>/img/background/bg-services.webp" data-bg-hidpi="<?php echo $core_template; ?>/img/background/bg-services@2x.webp">
          <div class="container">
            <div class="row align-items-center">
              <div class="col">
                <div class="whead">
                  <h2 class="title">บริการ</h2>
                  <p class="desc">Services</p>
                </div>
              </div>
              <div class="col-auto">
                <div class="action">
                  <a href="" class="btn btn-primary">ดูทั้งหมด</a>
                </div>
              </div>
            </div>
            <div class="service-category">
              <div class="service-category-list">
                <div class="swiper default-swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="item">
                        <button type="button" class="btn selected">การแพทย์</button>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <button type="button" class="btn">งานวิจัย</button>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <button type="button" class="btn selected">นวัตกรรม</button>
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
                    <!-- <div class="swiper-slide">
                      <div class="item">
                        <button type="button" class="btn">Lorem ipsum dolor sit amet consec</button>
                      </div>
                    </div> -->
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                </div>
              </div>
            </div>
            <div class="service-list">
              <div class="service-slide">
                <div class="swiper default-swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
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
                              <h5 class="title">ระบบรับส่งตัวอย่างเพื่อตรวจวิเคราะห์</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-02.svg" alt="service-02" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-02-hover.svg" alt="service-02" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ระบบทดสอบความชำนาญทางห้องปฏิบัติการ</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-03.svg" alt="service-03" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-03-hover.svg" alt="service-03" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ค้นหาอัตราค่าบำรุงการตรวจวิเคราะห์</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-04.svg" alt="service-04" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-04-hover.svg" alt="service-04" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">รายชื่อห้องปฏิบัติการเครือข่ายที่ผ่านการรับรอง</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-05.svg" alt="service-05" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-05-hover.svg" alt="service-05" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ระบบสนับสนุนพระราชบัญญัติเชื้อโรคและพิษจากสัตว์ออนไลน์</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-06.svg" alt="service-06" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-06-hover.svg" alt="service-06" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">การตรวจวิเคราะห์แอลกอฮอล์ในเลือด</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-07.svg" alt="service-07" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-07-hover.svg" alt="service-07" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">การตรวจทางห้องปฏิบัติการทางการแพทย์อย่างสมเหตุสมผล</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="'" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-08.svg" alt="service-08" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-08-hover.svg" alt="service-08" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ข้อมูลวิจัย นวัตกรรม กรมวิทยาศาสตร์การแพทย์</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-09.svg" alt="service-09" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-09-hover.svg" alt="service-09" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ข้อมูลการตรวจ COVID-19 และสายพันธุ์ของเชื้อ SAR-CoV-2</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-10.svg" alt="service-10" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-10-hover.svg" alt="service-10" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">การขึ้นทะเบียนหน่วยบริการเจาะเลือด</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-11.svg" alt="service-11" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-11-hover.svg" alt="service-11" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">บริการตรวจยีนแพ้ยา</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-12.svg" alt="service-12" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-12-hover.svg" alt="service-12" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ศูนย์ไข้หวัดใหญ่แห่งชาติ</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-13.svg" alt="service-13" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-13-hover.svg" alt="service-13" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ศูนย์เฝ้าระวังเชื้อดื้อยา</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-14.svg" alt="service-14" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-14-hover.svg" alt="service-14" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">กรมวิทย์ With You</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-15.svg" alt="service-15" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-15-hover.svg" alt="service-15" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ระบบรับรองห้องปฏิบัติการออนไลน์</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <a href="" class="link">
                          <div class="card">
                            <div class="card-body">
                              <div class="thumbnail">
                                <figure class="contain">
                                  <img src="<?php echo $core_template; ?>/img/static/service-15.svg" alt="service-15" class="thumb-img lazy">
                                  <img src="<?php echo $core_template; ?>/img/static/service-15-hover.svg" alt="service-15" class="thumb-hover lazy">
                                </figure>
                              </div>
                              <h5 class="title">ระบบรับรองห้องปฏิบัติการออนไลน์</h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-pagination"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <?php include('inc/footer.php'); ?>
  </div>

  <?php include('inc/loadscript.php'); ?>
  <?php include('inc/modal.php'); ?>

  <script>
    var tpgSwiper = new Swiper(".top-graphic .swiper", {
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    var scSwiper = new Swiper(".service-category-list .swiper", {
      slidesPerView: 5,
      watchSlidesProgress: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    var serviceSwiper = new Swiper(".service-slide .swiper", {
      slidesPerView: 5,
      watchSlidesProgress: true,
      grid: {
        rows: 3,
        // fill: "row"
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    // $('#popupModal').modal('show');
  </script>
</body>

</html>