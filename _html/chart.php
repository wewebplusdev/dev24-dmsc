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
                    เกี่ยวกับหน่วยงาน
                  </a>
                </li>
                <li>
                  <a href="#" class="link">
                    โครงสร้างองค์กร
                  </a>
                </li>
                <li>
                  <a href="#" class="link">
                    โครงสร้างหน่วยงาน
                  </a>
                </li>
              </ol>
            </div>
            <h1 class="title">
              โครงสร้างหน่วยงาน
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
        <!-- ck editor -->
        <div class="editor-content">
          <div class="container">
            <div class="text-center">
              <div class="organizational-chart line-h-100">
                <div class="chart-section I">
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-secondary">
                        <div class="txt txt-main text-secondary">อธิบดีกรมวิทยาศาสตร์การแพทย์</div>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="chart-section II">
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt txt-main text-primary">รองอธิบดี</div>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="chart-section III needs-line-chart">
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">กลุ่มตรวจสอบภายใน</div>
                        <span class="dot -right"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">สำนักวิชาการวิทยาศาสตร์การแพทย์</div>
                        <span class="dot -left"></span>
                      </a>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">กลุ่มพัฒนาระบบริหาร</div>
                        <span class="dot -right"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">กลุ่มงานจริธรรม</div>
                        <span class="dot -left"></span>
                      </a>
                    </li>
                  </ul>
                  <ul>
                    <li class="chart-hidden">
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary"></div>
                        <span class="dot -left"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">สำนักสนับสนุนนโยบาย</div>
                        <span class="dot -left"></span>
                      </a>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-secondary-light borde-dashed">
                        <div class="txt text-secondary-light">
                          ศูนย์ทดสอบผลิตภัณฑ์สุขภาพตามระบบ
                          <br>
                          OECD GLP กรมวิทยาศาสตร์การแพทย์
                        </div>
                        <span class="dot dot-secondary -right"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-secondary-light borde-dashed">
                        <div class="txt text-secondary-light">
                          สำนักงานคณะกรรมการพิจารณา
                          <br>
                          ศึกษาวิจัยในคน กรมวิทยาศาสตร์การแพทย์
                        </div>
                        <span class="dot dot-secondary -left"></span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="chart-section IV needs-multi-line-chart">
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">กลุ่มพัฒนาระบบริหาร</div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">กองแผนงานและวิชาการ</div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">สถาบันวิจัยสมุนไพร</div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">สำนักรังสีและเครื่องมือแพทย์</div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">
                          สำนักงานมาตรฐาน
                          <br>
                          ห้องปฏิบัติการ
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">
                          สถาบันวิจัย
                          <br>
                          วิทยาศาสตร์สาธารณสุข
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">
                          สถาบันชีววัตถุ
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">
                          สำนักเครื่องสำอาง
                          <br>
                          และวัตถุอันตราย
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">
                          สำนักคุณภาพและ
                          <br>
                          ความปลอดภัยอาหาร
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">สำนักยาและวัตถุเสพติด</div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">
                          ศูนย์เทคโนโลยี
                          <br>
                          สารสนเทศ
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">
                          สถาบันชีววิทยาศาสตร์
                          <br>
                          ทางการแพทย์
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary">
                        <div class="txt text-primary">
                          ศูนย์วิทยาศาสตร์การแพทย์
                          <br>
                          12 แห่ง
                          <br>
                          เชียงใหม่ พิษณุโลก นครสวรรค์
                          <br>
                          สระบุรี สมุทรสงคราม ชลบุรี
                          <br>
                          ขอนแก่น อุดรธานี นครราชสีมา
                          <br>
                          อุบลราชธานี สุราษฎร์ธานี สงขลา
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">
                          ศูนย์วิทยาศาสตร์การแพทย์
                          <br>
                          เชียงราย ภูเก็ต ตรัง
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">
                          กองทดสอบความชำนาญ
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">
                          กองความร่วมมือ
                          <br>
                          ระหว่างประเทศ
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="chart-box chart-box-primary borde-dashed">
                        <div class="txt text-primary">
                          ศูนย์รวมบริการ
                        </div>
                        <span class="dot -top"></span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="parallelogram-container">
                  <div class="parallelogram"></div>
                  <div class="parallelogram-vertical-borders"></div>
                  <div class="small-parallelogram"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ck editor -->
      </div>
    </section>

    <?php include('inc/footer.php'); ?>
  </div>

  <?php include('inc/loadscript.php'); ?>

</body>

</html>