<section class="layout-body">
  <div class="default-header">
    <div class="wrapper">
      <div class="container">
        <div class="breadcrumb-block">
          <ol class="breadcrumb">
            <li>
              <a href="{$ul}/home" class="link">
                <span class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15.856" height="15.857" viewBox="0 0 15.856 15.857">
                    <path id="home-3"
                      d="M15.43,6.9h0L8.96.428A1.459,1.459,0,0,0,6.9.428L.43,6.893.424,6.9A1.459,1.459,0,0,0,1.4,9.386l.045,0H1.7v4.76a1.71,1.71,0,0,0,1.709,1.708H5.937a.465.465,0,0,0,.465-.465V11.661a.78.78,0,0,1,.779-.779H8.674a.78.78,0,0,1,.779.779v3.732a.465.465,0,0,0,.465.465h2.531a1.71,1.71,0,0,0,1.709-1.708V9.389H14.4A1.46,1.46,0,0,0,15.43,6.9Zm0,0"
                      transform="translate(0)" fill="#fff" />
                  </svg>
                </span>
                {$languageFrontWeb->homepage->display->$currentLangWeb}
              </a>
            </li>
            <li>
              <a href="{$ul}/{$menuActive}/{$masterkey}" class="link">
                {$language_modules.breadcrumb1}
              </a>
            </li>
          </ol>
        </div>
        <h1 class="title">
          {$language_modules.breadcrumb1}
        </h1>
        <div class="graphic">
          <div class="obj">
            <img src="{$template}/assets/img/uploads/obj-banner-about.png" alt="obj-banner-about"
              class="lazy img-cover">
          </div>
        </div>
      </div>
    </div>
    <figure class="cover">
      <img src="{$template}/assets/img/static/banner.jpg" alt="" class="lazy img-cover">
    </figure>
  </div>

  {include file="front/controller/script/contact/template/footer-contact.tpl"}

  <div class="default-body pt-lg-3 pt-0">
    <div class="contact-map">
      <div class="container">
        <ul class="nav">
          <li>
            <a href="#nav-01" data-toggle="tab" class="link active">Google map</a>
          </li>
          <li>
            <a href="#nav-02" data-toggle="tab" class="link">Graphic map</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active show" id="nav-01">
            <div class="iframe-container">
              <iframe class="responsive-iframe" src="https://maps.google.com/maps?q={$settingWeb['contact']->glati},{$settingWeb['contact']->glongti}&hl=es;z=20&amp;output=embed" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-02">
            <figure class="cover">
              <img src="{$template}/assets/img/static/graphic-map.jpg" alt="" class="img-cover">
            </figure>
          </div>
        </div>
      </div>
    </div>
    <div class="contact-section">
      <div class="contact-center">
        <div class="container">
          <div class="whead">
            <h2 class="title">ส่วนกลาง</h2>
          </div>
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php for ($i = 1; $i <= 6; $i++) { ?>
              <div class="swiper-slide">
                <div class="item">
                  <div class="contact-card">
                    <div class="head">สำนักงานเลขานุการกรม</div>
                    <div class="body">
                      <div class="desc">
                        สำนักงานเลขานุการกรม กรมวิทยาศาสตร์การแพทย์
                        <br>
                        88/7 บำราศนราดูร ถ.ติวานนท์ ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี 11000
                        <br>
                        โทรศัพท์กลาง : 0-2951-0000 | ฝ่ายประชาสัมพันธ์ : ต่อ 99017,99081
                        <br>
                        โทรสาร: 0-2591-1707 | E-mail: prdmsc@dmsc.mail.go.th Map
                      </div>
                      <div class="action">
                        <span class="text">Google map</span>
                        <a href="" class="link">
                          ดูแผนที่
                          <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14.25" height="14.25"
                              viewBox="0 0 14.25 14.25">
                              <g id="Icon_ionic-ios-arrow-dropright" data-name="Icon ionic-ios-arrow-dropright"
                                transform="translate(-3.375 -3.375)">
                                <path id="Path_25" data-name="Path 25"
                                  d="M14.609,10.175a.664.664,0,0,1,.935,0l3.268,3.278a.66.66,0,0,1,.021.911l-3.22,3.23a.66.66,0,1,1-.935-.932l2.737-2.778-2.805-2.778A.653.653,0,0,1,14.609,10.175Z"
                                  transform="translate(-5.661 -3.389)" fill="#2ab170" />
                                <path id="Path_26" data-name="Path 26"
                                  d="M3.375,10.5A7.125,7.125,0,1,0,10.5,3.375,7.124,7.124,0,0,0,3.375,10.5Zm1.1,0a6.035,6.035,0,1,1,1.768,4.261A5.977,5.977,0,0,1,4.471,10.5Z"
                                  fill="#2ab170" />
                              </g>
                            </svg>
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
      <div class="contact-center">
        <div class="container">
          <div class="whead">
            <h2 class="title">ส่วนภูมิภาค</h2>
          </div>
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php for ($i = 1; $i <= 6; $i++) { ?>
              <div class="swiper-slide">
                <div class="item">
                  <div class="contact-card">
                    <div class="head">สำนักงานเลขานุการกรม</div>
                    <div class="body">
                      <div class="desc">
                        สำนักงานเลขานุการกรม กรมวิทยาศาสตร์การแพทย์
                        <br>
                        88/7 บำราศนราดูร ถ.ติวานนท์ ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี 11000
                        <br>
                        โทรศัพท์กลาง : 0-2951-0000 | ฝ่ายประชาสัมพันธ์ : ต่อ 99017,99081
                        <br>
                        โทรสาร: 0-2591-1707 | E-mail: prdmsc@dmsc.mail.go.th Map
                      </div>
                      <div class="action">
                        <span class="text">Google map</span>
                        <a href="" class="link">
                          ดูแผนที่
                          <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14.25" height="14.25"
                              viewBox="0 0 14.25 14.25">
                              <g id="Icon_ionic-ios-arrow-dropright" data-name="Icon ionic-ios-arrow-dropright"
                                transform="translate(-3.375 -3.375)">
                                <path id="Path_25" data-name="Path 25"
                                  d="M14.609,10.175a.664.664,0,0,1,.935,0l3.268,3.278a.66.66,0,0,1,.021.911l-3.22,3.23a.66.66,0,1,1-.935-.932l2.737-2.778-2.805-2.778A.653.653,0,0,1,14.609,10.175Z"
                                  transform="translate(-5.661 -3.389)" fill="#2ab170" />
                                <path id="Path_26" data-name="Path 26"
                                  d="M3.375,10.5A7.125,7.125,0,1,0,10.5,3.375,7.124,7.124,0,0,0,3.375,10.5Zm1.1,0a6.035,6.035,0,1,1,1.768,4.261A5.977,5.977,0,0,1,4.471,10.5Z"
                                  fill="#2ab170" />
                              </g>
                            </svg>
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
      <div class="contact-bg"></div>
    </div>
    <div class="contact-service">
      <div class="container">
        <div class="whead">
          <h2 class="title">บริการ</h2>
        </div>
        <div class="contact-service-list">
          <?php for ($i = 1; $i <= 9; $i++) { ?>
          <div class="item">
            <div class="row no-gutters align-items-start mb-3">
              <div class="col-auto">
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22.741" height="25" viewBox="0 0 22.741 25">
                    <g id="customer-service" transform="translate(-1.13)">
                      <path id="Path_452614" data-name="Path 452614"
                        d="M21.561,18.14l-.028-.033a9.6,9.6,0,0,0-5.318-3.171A6.618,6.618,0,0,0,18.6,11.765h1.675a1.7,1.7,0,0,0,1.7-1.7v-.5a9.559,9.559,0,1,0-19.118,0v.5a1.7,1.7,0,0,0,1.7,1.7H6.177A6.619,6.619,0,0,0,8.62,14.974a9.587,9.587,0,0,0-5.153,3.133l-.028.033A9.293,9.293,0,0,0,1.13,24.265V25H23.87v-.735a9.293,9.293,0,0,0-2.309-6.125ZM12.39,14.692a5.123,5.123,0,0,1-4.624-2.928H11.44V10.294H7.324a5.117,5.117,0,1,1,5.066,4.4Zm8.119-4.629a.231.231,0,0,1-.231.231h-1.34a6.574,6.574,0,0,0,0-1.471h1.541c.022.242.034.487.034.735ZM12.421,1.471A8.1,8.1,0,0,1,20.2,7.353H18.591a6.587,6.587,0,0,0-12.4,0H4.638a8.1,8.1,0,0,1,7.782-5.882ZM4.564,10.294a.231.231,0,0,1-.231-.231v-.5c0-.248.012-.493.034-.735h1.48a6.574,6.574,0,0,0,0,1.471ZM2.634,23.529a7.936,7.936,0,0,1,1.928-4.44l.028-.033a8.266,8.266,0,0,1,6.353-2.879h3.114a8.266,8.266,0,0,1,6.353,2.88l.028.033a7.937,7.937,0,0,1,1.928,4.44Z"
                        fill="#fff" />
                    </g>
                  </svg>
                </div>
              </div>
              <div class="col">
                <div class="title">สอบถามข้อมูลทั่วไป</div>
              </div>
            </div>
            <div class="tel">
              <span class="fw-bold">เบอร์โทรศัพท์ :</span>
              <a href="tel:0 2589 9850-7" class="link">0 2589 9850-7</a>
              <br>
              Operator กด 0, ฝ่ายประชาสัมพันธ์
              <br>
              ต่อ 99081
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>