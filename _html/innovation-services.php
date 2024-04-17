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
        <div class="innovation-area mb-xl-4 mb-lg-3">
          <div class="container">
            <div class="innovation-list">
              <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="item">
                  <div class="item-wrapper">
                    <div class="body">
                      <div class="thumbnail">
                        <figure class="contain">
                          <img src="<?php echo $core_template; ?>/img/static/innovation-01.svg" alt="">
                        </figure>
                      </div>
                    </div>
                    <div class="content">
                      <div class="title">องค์ความรู้</div>
                      <div class="qty">
                        <span class="icon mr-1">
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
                        <span class="fw-bold text-dark">จำนวน : </span><span>1,264</span> รายการ
                      </div>
                      <div class="action">
                        <span class="icon mr-2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <g id="ARROW_48" data-name="ARROW 48" transform="translate(-0.006)">
                              <path id="Path_452117" data-name="Path 452117" d="M19.062,10.662a.938.938,0,0,0-.938.938v3.775a2.753,2.753,0,0,1-2.75,2.75H4.632a2.753,2.753,0,0,1-2.75-2.75V4.632a2.753,2.753,0,0,1,2.75-2.75H8.407a.938.938,0,0,0,0-1.876H4.632A4.631,4.631,0,0,0,.006,4.632V15.374A4.631,4.631,0,0,0,4.632,20H15.374A4.631,4.631,0,0,0,20,15.374V11.6a.938.938,0,0,0-.938-.938Z" fill="#2ab170" />
                              <path id="Path_452118" data-name="Path 452118" d="M19.042,0h-5.83a.938.938,0,0,0-.938.92.955.955,0,0,0,.959.956H16.8L9.333,9.347a.938.938,0,0,0,1.326,1.326L18.131,3.2V6.786a.938.938,0,1,0,1.876,0V.964A.964.964,0,0,0,19.042,0Z" fill="#2ab170" />
                            </g>
                          </svg>
                        </span>
                        <a href="" class="link">
                          ไปยังลิงก์
                        </a>
                      </div>
                    </div>
                  </div>
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

</body>

</html>