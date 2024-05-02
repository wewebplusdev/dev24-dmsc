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
                    ติดต่อเรา
                  </a>
                </li>
                <li>
                  <a href="#" class="link">
                    ข้อมูลการติดต่อ
                  </a>
                </li>
              </ol>
            </div>
            <h1 class="title">
              ข้อมูลการติดต่อ
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
      <?php include('inc/footer-contact.php'); ?>
      <div class="default-body pt-lg-3 pt-0">
        <div class="container">
          <div class="layout-form">
            <form action="" class="form-default form-contact">
              <div class="form-head">
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="35.19" height="36.35" viewBox="0 0 35.19 36.35">
                        <g id="Layer_10" transform="translate(-1.574 -1.1)">
                          <path id="Path_451728" data-name="Path 451728" d="M8.887,12.535a1.1,1.1,0,1,0,0,2.2H20.658a1.1,1.1,0,0,0,0-2.2Z" transform="translate(1.366 2.513)" fill="#fff" />
                          <path id="Path_451729" data-name="Path 451729" d="M14.179,17.644H8.887a1.1,1.1,0,1,0,0,2.2h5.293a1.1,1.1,0,1,0,0-2.2Z" transform="translate(1.366 3.636)" fill="#fff" />
                          <path id="Path_451730" data-name="Path 451730" d="M15.383,35.254H7.028a3.266,3.266,0,0,1-3.257-3.269V9.748A3.266,3.266,0,0,1,7.028,6.479H9.3v.276a2.906,2.906,0,0,0,2.9,2.9H22.69a2.906,2.906,0,0,0,2.9-2.9V6.479h2.257a3.227,3.227,0,0,1,3.256,3.269v6.258a1.1,1.1,0,1,0,2.2,0V9.748a5.465,5.465,0,0,0-5.452-5.465H25.593V4a2.906,2.906,0,0,0-2.9-2.9H12.2A2.906,2.906,0,0,0,9.294,4v.281H7.028A5.466,5.466,0,0,0,1.574,9.748V31.985A5.466,5.466,0,0,0,7.028,37.45h8.356a1.1,1.1,0,1,0,0-2.2ZM11.492,4A.708.708,0,0,1,12.2,3.3H22.69A.708.708,0,0,1,23.4,4V6.754a.708.708,0,0,1-.707.707H12.2a.708.708,0,0,1-.707-.707Z" transform="translate(0)" fill="#fff" />
                          <path id="Path_451731" data-name="Path 451731" d="M32.447,17.561a4.076,4.076,0,0,0-5.631,0l-9.733,9.733a2.118,2.118,0,0,0-.593,1.149L15.956,31.6a2.127,2.127,0,0,0,2.449,2.448l3.157-.533a2.118,2.118,0,0,0,1.149-.593l9.733-9.733a3.986,3.986,0,0,0,0-5.629ZM21.2,31.352l-3.075.614.515-3.119,6.976-6.976L28.139,24.4Zm9.695-9.714-1.2,1.205-2.525-2.525,1.2-1.2a1.785,1.785,0,0,1,2.524,2.524Z" transform="translate(3.155 3.37)" fill="#fff" />
                        </g>
                      </svg>
                    </div>
                  </div>
                  <div class="col">
                    <h2 class="title">รับข้อเสนอแนะ / ข้อร้องเรียน</h2>
                  </div>
                </div>
              </div>
              <div class="form-body">
                <div class="form-group">
                  <label for="topic" class="control-label">หัวข้อ<span>*</span></label>
                  <input type="text" id="topic" value="" name="topic" placeholder="หัวข้อ" class="form-control">
                </div>
                <div class="form-group">
                  <label for="detail" class="control-label">ข้อความ<span>*</span></label>
                  <textarea id="detail" name="detail" placeholder="รายละเอียด" class="form-control form-textarea"></textarea>
                </div>
                <div class="row gutters-40">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="fullname" class="control-label">ชื่อ - นามสกุล<span>*</span></label>
                      <input type="text" id="fullname" value="" name="fullname" placeholder="ชื่อ - นามสกุล" class="form-control">
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="address" class="control-label">ที่อยู่<span>*</span></label>
                      <input type="text" id="address" value="" name="address" placeholder="ที่อยู่" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row gutters-40">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="tell" class="control-label">เบอร์โทร<span>*</span></label>
                      <input type="text" id="tell" value="" name="tell" placeholder="เบอร์โทร" class="form-control">
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="email" class="control-label">อีเมล์<span>*</span></label>
                      <input type="text" id="email" value="" name="email" placeholder="อีเมล์" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="action">
                  <button type="submit" class="btn btn-primary disabled">ส่งข้อความ</button>
                  <button type="button" class="btn btn-primary btn-cancel">ยกเลิก</button>
                </div>
              </div>
            </form>
          </div>
          <div class="layout-service-info">
            <div class="whead">
              <h2 class="title">แนวปฏิบัติแจ้งเรื่องร้องเรียน</h2>
            </div>
            <div class="info-card-full">
              <div class="row no-gutters align-items-md-center">
                <div class="col-auto">
                  <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="37.636" height="40.509" viewBox="0 0 37.636 40.509">
                      <path id="megaphone" d="M43.5,30.436l-.716-1.751a.723.723,0,0,0-1.339.548l.715,1.748a.328.328,0,0,1-.18.425l-2.019.817a.336.336,0,0,1-.432-.181l-.4-.986c-.007-.018-.014-.036-.022-.053L29.6,7.773a.658.658,0,0,0-.022-.063l-.409-.991a.325.325,0,0,1,.179-.428l2.018-.818a.336.336,0,0,1,.433.175l3.426,8.382.007.017,5.024,12.291a.723.723,0,1,0,1.34-.547l-1.391-3.4,2.065-2.841a1.866,1.866,0,0,0,.267-1.806l-1.36-3.325a1.917,1.917,0,0,0-1.712-1.134L36.406,13.1,33.134,5.1a1.788,1.788,0,0,0-2.313-.962L28.8,4.951a1.78,1.78,0,0,0-.976,2.314l.306.741a17.64,17.64,0,0,1-3.2,5.107.724.724,0,0,0,1.083.96,19.928,19.928,0,0,0,2.875-4.217l8.19,20.021c-4.045-1.448-9.161-.7-12.436.063h-.007l-.008,0c-.947.222-1.738.444-2.3.615L17.858,19.64a20.834,20.834,0,0,0,5.281-2.9.723.723,0,0,0-.877-1.15,19.512,19.512,0,0,1-5.578,2.949c-.34.113-8.343,2.829-10.274,7.5a5.357,5.357,0,0,0,.184,4.565c.184.7,1.359,4.222,6.294,4.222.275,0,.573-.021.872-.044a16.058,16.058,0,0,1,3.984,3.347.723.723,0,1,0,1.1-.939,17.614,17.614,0,0,0-2.964-2.743,22.891,22.891,0,0,0,3.307-1.036,7.653,7.653,0,0,1,2.687,2.608A25.725,25.725,0,0,1,23.954,39.7a1.283,1.283,0,0,0,1.638.641.92.92,0,0,1,1.15.49.855.855,0,0,1,0,.661.87.87,0,0,1-.477.473l-2.416.974A1.714,1.714,0,0,1,22.712,43a1.731,1.731,0,0,1-1.17-1.13,13.1,13.1,0,0,0-.674-1.632.723.723,0,0,0-1.3.639,11.628,11.628,0,0,1,.6,1.452,3.17,3.17,0,0,0,2.142,2.061,3.039,3.039,0,0,0,.873.124,3.274,3.274,0,0,0,1.2-.233l2.426-.978a2.324,2.324,0,0,0-.888-4.475,2.145,2.145,0,0,0-.719.118A28.279,28.279,0,0,0,23.469,35.8a5.328,5.328,0,0,0,2.108-4.6c3.5-.763,8.711-1.363,12.292.608l.318.781a1.8,1.8,0,0,0,1.653,1.1,1.753,1.753,0,0,0,.66-.129l2.026-.821a1.787,1.787,0,0,0,.969-2.309ZM39.377,14.728a.51.51,0,0,1,.458.237L41.2,18.29a.444.444,0,0,1-.1.407l-1.538,2.116-2.545-6.227ZM18.934,31.964a18.552,18.552,0,0,1-5.072,1.368c-5.093.495-5.845-2.966-5.874-3.109a.718.718,0,0,0-.064-.192A3.934,3.934,0,0,1,7.747,26.6c1.39-3.365,6.873-5.722,8.757-6.446l4.461,10.907C20.253,31.4,19.581,31.706,18.934,31.964Zm3.7,2.65a10.344,10.344,0,0,0-1.815-1.887c.355-.162.711-.329,1.069-.509.01,0,.091-.034.244-.083.374-.123,1.082-.345,2.013-.586a3.838,3.838,0,0,1-1.511,3.065Z" transform="translate(-5.987 -4.004)" fill="#fff" />
                    </svg>
                  </div>
                </div>
                <div class="col">
                  <div class="title">แนวทางดำเนินการต่อเรื่องร้องเรียนการทุจริและประพฤติมิชอบของเจ้าหน้าที่กรมวิทยาศาสตร์การแพทย์</div>
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
</body>

</html>