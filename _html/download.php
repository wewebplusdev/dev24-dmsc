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
        <div class="default-filter">
          <div class="container">
            <form action="" class="form-default">
              <div class="row gutters-20 align-items-end">
                <div class="col">
                  <div class="form-group form-search">
                    <label class="control-label" for="">ค้นหา</label>
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
                <div class="col-auto">
                  <div class="form-group form-select">
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
            </form>
          </div>
        </div>
        <div class="document-download-list">
          <div class="container">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
              <div class="item">
                <a href="" class="link">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="head">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="46.602" height="60" viewBox="0 0 46.602 60">
                                <g id="copy" transform="translate(-6.699)">
                                  <path id="Path_452239" data-name="Path 452239" d="M48.184,7.656H45.644V5.117A5.123,5.123,0,0,0,40.527,0H19.473a1.289,1.289,0,0,0-.911.378L7.077,11.862a1.289,1.289,0,0,0-.378.911V47.226a5.123,5.123,0,0,0,5.117,5.117h2.539v2.539A5.119,5.119,0,0,0,19.473,60H48.183A5.123,5.123,0,0,0,53.3,54.883V12.773a5.123,5.123,0,0,0-5.117-5.117ZM20.007,2.578H20.1v8.281A2.542,2.542,0,0,1,17.559,13.4H9.277v-.091ZM9.277,47.226V15.976h8.281a5.123,5.123,0,0,0,5.117-5.117V2.578H40.527a2.542,2.542,0,0,1,2.539,2.539V47.226a2.542,2.542,0,0,1-2.539,2.539H11.816A2.542,2.542,0,0,1,9.277,47.226Zm41.445,7.656a2.542,2.542,0,0,1-2.539,2.539H19.473a2.54,2.54,0,0,1-2.539-2.539V52.344H40.527a5.123,5.123,0,0,0,5.117-5.117V10.234h2.539a2.542,2.542,0,0,1,2.539,2.539V54.883Z" />
                                  <g id="Group_90180" data-name="Group 90180">
                                    <path id="Path_452240" data-name="Path 452240" d="M34.785,25.547H17.559a1.289,1.289,0,0,1,0-2.578H34.785a1.289,1.289,0,0,1,0,2.578Z" fill="#2ab170" />
                                  </g>
                                  <g id="Group_90181" data-name="Group 90181">
                                    <path id="Path_452241" data-name="Path 452241" d="M34.785,33.2H17.559a1.289,1.289,0,0,1,0-2.578H34.785a1.289,1.289,0,0,1,0,2.578Z" />
                                  </g>
                                  <g id="Group_90182" data-name="Group 90182">
                                    <path id="Path_452242" data-name="Path 452242" d="M27.129,40.859h-9.57a1.289,1.289,0,0,1,0-2.578h9.57a1.289,1.289,0,1,1,0,2.578Z" fill="#2ab170" />
                                  </g>
                                </g>
                              </svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="title">แผนกลยุทธ์กรมวิทยาศาสตร์การแพทย์ 2562 - 2565</div>
                            <div class="date">20.04.2564</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="content">
                        <div class="row">
                          <div class="col">
                            <div class="row">
                              <div class="col-auto">
                                <div class="box">
                                  <div class="d-flex align-items-center mb-2">
                                    <span class="icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                        <defs>
                                          <clipPath id="clip-path">
                                            <rect id="Rectangle_17108" data-name="Rectangle 17108" width="20" height="20" transform="translate(1059 971)" fill="#2ab170" />
                                          </clipPath>
                                        </defs>
                                        <g id="Mask_Group_343" data-name="Mask Group 343" transform="translate(-1059 -971)" clip-path="url(#clip-path)">
                                          <g id="document-3" transform="translate(1059 971)">
                                            <path id="Path_452390" data-name="Path 452390" d="M16.945,4.151,13.179.588A2.14,2.14,0,0,0,11.7,0H4.531A2.151,2.151,0,0,0,2.383,2.148v15.7A2.151,2.151,0,0,0,4.531,20H15.469a2.151,2.151,0,0,0,2.148-2.148V5.712A2.157,2.157,0,0,0,16.945,4.151Zm-1.138.536H12.891a.2.2,0,0,1-.2-.2V1.744Zm-.338,14.141H4.531a.978.978,0,0,1-.977-.977V2.148a.978.978,0,0,1,.977-.977h6.992v3.32a1.369,1.369,0,0,0,1.367,1.367h3.555V17.852A.978.978,0,0,1,15.469,18.828Z" fill="#2ab170" />
                                            <path id="Path_452391" data-name="Path 452391" d="M14.18,7.813H5.586a.586.586,0,0,0,0,1.172H14.18a.586.586,0,0,0,0-1.172Z" fill="#2ab170" />
                                            <path id="Path_452392" data-name="Path 452392" d="M14.18,10.938H5.586a.586.586,0,0,0,0,1.172H14.18a.586.586,0,0,0,0-1.172Z" fill="#2ab170" />
                                            <path id="Path_452393" data-name="Path 452393" d="M8.427,14.063H5.586a.586.586,0,0,0,0,1.172H8.427a.586.586,0,0,0,0-1.172Z" fill="#2ab170" />
                                          </g>
                                        </g>
                                      </svg>
                                    </span>
                                    <div class="txt">ชนิดไฟล์</div>
                                  </div>
                                  <div class="type">.pdf</div>
                                </div>
                              </div>
                              <div class="col-auto">
                                <div class="box">
                                  <div class="d-flex align-items-center mb-2">
                                    <span class="icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.75" viewBox="0 0 20 18.75">
                                        <path id="Download" d="M20,10.156a4.38,4.38,0,0,1-4.375,4.375H12.5a.625.625,0,0,1,0-1.25h3.125a3.125,3.125,0,0,0,0-6.25H15a.625.625,0,0,1-.625-.625,4.375,4.375,0,0,0-8.75,0A.625.625,0,0,1,5,7.031H4.375a3.125,3.125,0,0,0,0,6.25H7.5a.625.625,0,0,1,0,1.25H4.375a4.375,4.375,0,0,1,0-8.75H4.41a5.625,5.625,0,0,1,11.18,0h.035A4.38,4.38,0,0,1,20,10.156Zm-7.942,5.808L10.625,17.4V9.531a.625.625,0,0,0-1.25,0V17.4L7.942,15.964a.625.625,0,1,0-.884.884l2.5,2.5a.625.625,0,0,0,.884,0l2.5-2.5a.625.625,0,1,0-.884-.884Z" transform="translate(0 -0.781)" fill="#2ab170" />
                                      </svg>
                                    </span>
                                    <div class="txt">ดาวน์โหลด</div>
                                  </div>
                                  <div class="type">120 ครั้ง</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto">
                            <div class="box -download">
                              <div class="d-flex align-items-center mb-2">
                                <span class="icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="18.947" height="20" viewBox="0 0 18.947 20">
                                    <g id="download-2" transform="translate(-3.828 -3.158)">
                                      <path id="Path_452394" data-name="Path 452394" d="M4.881,16.842a1.053,1.053,0,0,1,1.053,1.053V20a1.053,1.053,0,0,0,.308.744h0a1.053,1.053,0,0,0,.744.308H19.618A1.053,1.053,0,0,0,20.67,20V17.895a1.053,1.053,0,0,1,2.105,0V20a3.158,3.158,0,0,1-3.158,3.158H6.986A3.158,3.158,0,0,1,3.828,20V17.895a1.053,1.053,0,0,1,1.053-1.053Z" fill="#2ab170" fill-rule="evenodd" />
                                      <path id="Path_452395" data-name="Path 452395" d="M7.294,10.835a1.053,1.053,0,0,1,1.489,0L13.3,15.353l4.519-4.519a1.053,1.053,0,0,1,1.489,1.489l-5.263,5.263a1.053,1.053,0,0,1-1.489,0L7.294,12.323A1.053,1.053,0,0,1,7.294,10.835Z" fill="#2ab170" fill-rule="evenodd" />
                                      <path id="Path_452396" data-name="Path 452396" d="M13.3,3.158a1.053,1.053,0,0,1,1.053,1.053V16.842a1.053,1.053,0,0,1-2.105,0V4.211A1.053,1.053,0,0,1,13.3,3.158Z" fill="#2ab170" fill-rule="evenodd" />
                                    </g>
                                  </svg>
                                </span>
                                <div class="txt text-primary">ดาวน์โหลด</div>
                              </div>
                              <div class="type">25 Mb</div>
                            </div>
                          </div>
                        </div>
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
  </script>
</body>

</html>