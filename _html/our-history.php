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
        <div class="container">
          <div class="whead">
            <h2 class="title text-center">ประวัติความเป็นมา</h2>
          </div>
          <div class="our-history-info">

          </div>
        </div>
      </div>
    </section>

    <?php include('inc/footer.php'); ?>
  </div>

  <?php include('inc/loadscript.php'); ?>

</body>

</html>