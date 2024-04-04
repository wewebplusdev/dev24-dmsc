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
                    ข่าว
                  </a>
                </li>
                <li>
                  <a href="#" class="link">
                    ข่าวประชาสัมพันธ์
                  </a>
                </li>
              </ol>
            </div>
            <h1 class="title">
              ข่าว
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
        <div class="event-calendar">
          <div class="container">
            <div class="calendar-card">
              <div class="header">
                <form action="" class="form-default">
                  <div class="top">
                    <div class="row justify-content-between">
                      <div class="col-auto">
                        <div class="row gutters-20 align-items-center">
                          <div class="col-auto">
                            <div class="typo-md fw-bold text-light">กลุ่ม</div>
                          </div>
                          <div class="col">
                            <div class="form-group form-select form-group-calendar -group">
                              <label class="control-label visually-hidden" for="group">กลุ่ม</label>
                              <div class="select-wrapper">
                                <select class="select-calendar" name="group" id="group" style="width: 100%;">
                                  <option value="">เลือกทั้งหมด</option>
                                  <option value="">เลือกทั้งหมด</option>
                                  <option value="">เลือกทั้งหมด</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="row gutters-20">
                          <div class="col">
                            <div class="form-group form-select form-group-calendar -year">
                              <label class="control-label" for="year">ปี :</label>
                              <div class="select-wrapper">
                                <select class="select-calendar" name="year" id="year" style="width: 100%;">
                                  <option value="">2567</option>
                                  <option value="">2568</option>
                                  <option value="">2569</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group form-select form-group-calendar -month">
                              <label class="control-label" for="month">เดือน :</label>
                              <div class="select-wrapper">
                                <select class="select-calendar" name="month" id="month" style="width: 100%;">
                                  <option value="">มีนาคม</option>
                                  <option value="">เมษายน</option>
                                  <option value="">พฤษภาคม</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="middle">
                    <div class="row align-items-center">
                      <div class="col">
                        <div class="month-topic">
                          <span>มีนาคม</span> <span>2024</span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="row gutters-20">
                          <div class="col">
                            <div class="select">
                              <a href="#" class="link active">
                                วันนี้
                              </a>
                            </div>
                          </div>
                          <div class="col">
                            <div class="calendar-nav">
                              <a href="" class="link">
                                <span class="icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="13.503" height="23.616" viewBox="0 0 13.503 23.616">
                                    <path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward" d="M15.317,18l8.937-8.93a1.681,1.681,0,0,0,0-2.384,1.7,1.7,0,0,0-2.391,0L11.738,16.8a1.685,1.685,0,0,0-.049,2.327L21.856,29.32a1.688,1.688,0,0,0,2.391-2.384Z" transform="translate(-11.246 -6.196)" fill="#e6e6e6" />
                                  </svg>
                                </span>
                              </a>
                              <a href="" class="link">
                                <span class="icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="13.503" height="23.616" viewBox="0 0 13.503 23.616">
                                    <path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward" d="M20.679,18,11.742,9.07a1.681,1.681,0,0,1,0-2.384,1.7,1.7,0,0,1,2.391,0L24.258,16.8a1.685,1.685,0,0,1,.049,2.327L14.14,29.32a1.688,1.688,0,0,1-2.391-2.384Z" transform="translate(-11.246 -6.196)" fill="#e6e6e6" />
                                  </svg>
                                </span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="body">
                <!-- append -->
                <table>
                  <tr>
                    <th>อาทิตย์</th>
                    <th>จันทร์</th>
                    <th>อังคาร</th>
                    <th>พุธ</th>
                    <th>พฤหัสบดี</th>
                    <th>ศุกร์</th>
                    <th>เสาร์</th>
                  </tr>
                  <?php for ($i = 1; $i <= 3; $i++) { ?>
                    <tr>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">1</div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">22</div>
                          <div class="event-group">
                            <a href="" class="link event-item">
                              <span>สัมนาการแพทย์ภายในองค์กร</span>
                            </a>
                            <div class="action">
                              <div class="link event-more">
                                + <span>2</span> เพิ่มเติม
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">1</div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">22</div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">1</div>
                          <div class="event-group">
                            <a href="" class="link event-item">
                              <span>สัมนาการแพทย์ภายในองค์กร</span>
                            </a>
                            <div class="action">
                              <a href="javascript:void(0);" class="link -more">
                                + <span>2</span> เพิ่มเติม
                              </a>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">22</div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">1</div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td>
                      <div class="box" onclick="">
                        <div class="num">1</div>
                      </div>
                    </td>
                    <td>
                      <div class="box" onclick="">
                        <div class="num">22</div>
                        <div class="event-group">
                          <a href="" class="link event-item">
                            <span>สัมนาการแพทย์ภายในองค์กร</span>
                          </a>
                          <div class="action">
                            <div class="link event-more">
                              + <span>2</span> เพิ่มเติม
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="box" onclick="">
                        <div class="num">1</div>
                      </div>
                    </td>
                    <td>
                      <div class="box" onclick="">
                        <div class="num">22</div>
                      </div>
                    </td>
                    <td>
                      <div class="box" onclick="">
                        <div class="num">1</div>
                        <div class="event-group">
                          <a href="" class="link event-item">
                            <span>สัมนาการแพทย์ภายในองค์กร</span>
                          </a>
                          <div class="action">
                            <a href="javascript:void(0);" class="link -more">
                              + <span>2</span> เพิ่มเติม
                            </a>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="box" onclick="">
                        <div class="num">23</div>
                        <div class="event-group">
                          <a href="" class="link event-item">
                            <span>สัมนาการแพทย์ภายในองค์กร</span>
                          </a>
                          <div class="action">
                            <div class="link event-more">
                              + <span>2</span> เพิ่มเติม
                              <div class="event-drop-show visually-hidden">
                                <div class="date-current">
                                  <div class="today">
                                    <small>ศ.</small>
                                    <div class="day">23</div>
                                  </div>
                                  <span class="material-symbols-rounded close-event">cancel</span>
                                </div>
                                <a href="" class="link event-item">
                                  <span>สัมนาการแพทย์ภายในองค์กร</span>
                                </a>
                                <a href="" class="link event-item">
                                  <span>สัมนาการแพทย์ภายในองค์กร</span>
                                </a>
                                <a href="" class="link event-item">
                                  <span>สัมนาการแพทย์ภายในองค์กร</span>
                                </a>
                                <a href="" class="link event-item">
                                  <span>สัมนาการแพทย์ภายในองค์กร</span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="box" onclick="">
                        <div class="num">22</div>
                      </div>
                    </td>
                  </tr>
                  <?php for ($i = 1; $i <= 2; $i++) { ?>
                    <tr>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">1</div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">22</div>
                          <div class="event-group">
                            <a href="" class="link event-item">
                              <span>สัมนาการแพทย์ภายในองค์กร</span>
                            </a>
                            <div class="action">
                              <div class="link event-more">
                                + <span>2</span> เพิ่มเติม
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">1</div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">22</div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">1</div>
                          <div class="event-group">
                            <a href="" class="link event-item">
                              <span>สัมนาการแพทย์ภายในองค์กร</span>
                            </a>
                            <div class="action">
                              <div class="link event-more">
                                + <span>2</span> เพิ่มเติม
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">22</div>
                          <div class="event-group">
                            <a href="" class="link event-item">
                              <span>สัมนาการแพทย์ภายในองค์กร</span>
                            </a>
                            <div class="action">
                              <div class="link event-more">
                                + <span>2</span> เพิ่มเติม
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="box" onclick="">
                          <div class="num">22</div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
            <div class="calendar-note">
              <div class="whead">
                <h2 class="title">หมายเหตุ</h2>
              </div>
              <ul class="item-list">
                <li>
                  <div class="note">
                    <div class="box bg-current"></div>
                    <div class="txt">วันที่ปัจจุบัน</div>
                  </div>
                </li>
                <li>
                  <div class="note">
                    <div class="box bg-all"></div>
                    <div class="txt">ทั้งหมด</div>
                  </div>
                </li>
                <li>
                  <div class="note">
                    <div class="box bg-event"></div>
                    <div class="txt">กิจกรรมกรมวิทยาศาสตร์การแพทย์</div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="event-list">
          <div class="container">
            <div class="title">รายการกิจกรรม</div>
            <?php for ($i = 1; $i <= 10; $i++) { ?>
              <div class="item">
                <a href="" class="link">
                  <div class="row no-gutters align-items-end">
                    <div class="col-auto mb-auto">
                      <div class="dot"></div>
                    </div>
                    <div class="col">
                      <div class="date">27 มีนาคม 2567</div>
                      <div class="desc">สัมนากรมวิทยาศาสตร์การแพทย์ นิทรรศการงานวิจัยของประเทศไทย</div>
                    </div>
                    <div class="col-auto">
                      <div class="read-more">
                        อ่านต่อ
                        <span class="material-symbols-rounded">expand_circle_right</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <?php include('inc/footer.php'); ?>
  </div>

  <?php include('inc/loadscript.php'); ?>

  <script>
    $('.close-event').click(function() {
      $('.event-drop-show').toggleClass('visually-hidden');
      // $(this).closest('event-drop-show').addClass('visually-hidden');
      // $(this).addClass('test')
    })

    $('.event-more').click(function() {
      $('.event-drop-show').removeClass('visually-hidden');
    })
  </script>

</body>

</html>