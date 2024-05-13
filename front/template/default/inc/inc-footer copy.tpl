<footer class="layout-footer">
    <div class="footer-content lazy" data-bg="{$template}/assets/img/background/bg-footer.webp"
        data-bg-hidpi="{$template}/assets/img/background/bg-footer@2x.webp">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md col-left" data-aos="fade-left">
                        <div class="title">{$languageFrontWeb->department->display->$currentLangWeb}</div>
                        <div class="subtitle">{$languageFrontWeb->ministry->display->$currentLangWeb}</div>
                    </div>
                    {if $settingWeb.contact->tel2 neq ""}
                        <div class="col-auto col-right" data-aos="fade-right">
                            <div class="title"><a href="tel:{$settingWeb.contact->tel2}" class="link">{$settingWeb.contact->tel2}</a></div>
                            <div class="subtitle"><img src="{$template}/assets/img/icon/contact-icon-call.svg" alt="" class="icon"> Call Center</div>
                        </div>
                    {/if}
                </div>
            </div>
            <div class="footer-middle">
                <div class="row justify-content-lg-between">
                    <div class="col-md-auto" data-aos="fade-up">
                        <div class="contact">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="{$template}/assets/img/icon/contact-icon-address.svg" alt=""
                                        class="icon">
                                </div>
                                <div class="col">
                                    <p class="desc">
                                        {$settingWeb.contact->address}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {if $settingWeb.contact->tel neq ""}
                        <div class="col-md-auto" data-aos="fade-up">
                            <div class="contact">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-telephone.svg" alt=""
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">{$languageFrontWeb->contactinformation->display->$currentLangWeb}</span>
                                            <a href="tel:{" "|str_replace:"":$settingWeb.contact->tel}" class="link">{$settingWeb.contact->tel}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if $settingWeb.contact->fax neq ""}
                        <div class="col-md-auto" data-aos="fade-up">
                            <div class="contact">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-fax.svg" alt=""
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">{$languageFrontWeb->fax->display->$currentLangWeb}</span>
                                            <a href="javascript:void(0);" class="link">{$settingWeb.contact->fax}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if $settingWeb.contact->email2 neq "" && $settingWeb.contact->email neq ""}
                        <div class="col-md-auto" data-aos="fade-up">
                            <div class="contact">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt=""
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">{$languageFrontWeb->email->display->$currentLangWeb}</span>
                                            <a href="mailto:{$settingWeb.contact->email2}" class="link"><span
                                                    class="d-block">{$settingWeb.contact->email2}</span></a>
                                            <a href="mailto:{$settingWeb.contact->email}" class="link"><span
                                                    class="d-block">{$settingWeb.contact->email}</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if $settingWeb.contact->email2 neq ""}
                        <!-- Force next columns to break to new line -->
                        <div class="w-100 p-0 d-xl-block d-none"></div>
                        <div class="col-md" data-aos="fade-up">
                            <div class="contact pt-md-3">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-fax.svg" alt=""
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">{$languageFrontWeb->idso->display->$currentLangWeb}</span>
                                            <span class="d-block">E-mail : <a href="{$settingWeb.contact->email2}"
                                                    class="link">{$settingWeb.contact->email2}</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                    <div class="w-100 p-0 d-lg-none"></div>
                    <div class="col-sm-auto" data-aos="fade-up">
                        <div class="ipv6">
                            <picture>
                                <source srcset="{$template}/assets/img/static/ipv6.webp" type="image/webp">
                                <img src="{$template}/assets/img/static/ipv6.png" alt="" class="icon">
                            </picture>
                        </div>
                    </div>
                    <div class="col-lg col-sm-auto" data-aos="fade-up">
                        <div class="followus pt-md-3">
                            <div class="row no-gutters align-items-center justify-content-md-end">
                                <div class="col-auto">
                                    Follow us:
                                </div>
                                <div class="col-auto">
                                    <div class="social">
                                        <ul class="item-list">
                                            {if $settingWeb.social->Tel->link neq "" && $settingWeb.social->Tel->link neq "#"}
                                                <li>
                                                    <a href="tel:{$settingWeb.social->Tel->link}" class="link tele" title="Telephone">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/old-typical-phone.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                            {if $settingWeb.social->Facebook->link neq "" && $settingWeb.social->Facebook->link neq "#"}
                                                <li>
                                                    <a href="{$settingWeb.social->Facebook->link}" class="link fb"
                                                        title="Facebook" target="_blank">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/facebook.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                            {if $settingWeb.social->Twitter->link neq "" && $settingWeb.social->Twitter->link neq "#"}
                                                <li>
                                                    <a href="{$settingWeb.social->Twitter->link}" class="link tw" title="X"
                                                        target="_blank">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/twitter.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                            {if $settingWeb.social->Youtube->link neq "" && $settingWeb.social->Youtube->link neq "#"}
                                                <li>
                                                    <a href="{$settingWeb.social->Youtube->link}" class="link yt"
                                                        title="YouTube" target="_blank">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/youtube.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                            {if $settingWeb.social->Line->link neq "" && $settingWeb.social->Line->link neq "#"}
                                                <li>
                                                    <a href="{$settingWeb.social->Line->link}" class="link line"
                                                        title="Line" target="_blank">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/line.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    {if $loadPolicy->_numOfRows gte 1}
                    <div class="col-md" data-aos="fade-left">
                        <div class="policy">
                            <ul class="item-list">
                                {foreach $loadPolicy->item as $keyPolicy => $valuePolicy}
                                {assign var="checkUrl" value="{$valuePolicy->url|checkUrl}"}
                                {assign var="target" value="_self"}
                                    {if $checkUrl}
                                        {assign var="news_url" value="{$ul}/pageredirect/{$valuePolicy->tb|pageRedirect:$valuePolicy->masterkey:$valuePolicy->id:$valuePolicy->language}"}
                                        {$target = $valuePolicy->target}
                                    {else}
                                        {assign var="news_url" value="javascript:void(0);"}
                                    {/if}
                                    <li>
                                        <a href="{$news_url}" class="link" target="{$target}">{$valuePolicy->subject}</a>
                                    </li>
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                    {/if}
                    <div class="col-md-auto" data-aos="fade-right">
                        {* <a href="javascript:void(0);" class="link sitemap">{$languageFrontWeb->sitemap->display->$currentLangWeb}</a> *}
                        <a href="javascript:void(0);" class="link sitemap">แผนผังเว็บไซต์</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bar" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg">
                    <p class="copyright">{$languageFrontWeb->copyrightweb->display->$currentLangWeb}</p>
                </div>
                <div class="col-lg-auto">
                    <div class="visitors">{$languageFrontWeb->logsviewWeb->display->$currentLangWeb} <div class="box">{$logsView|number_format}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{if count((array)$sitemapWeb) gte 1}
  <div class="sitmap-full">
    <div class="close">
      <svg xmlns="http://www.w3.org/2000/svg" width="37.993" height="37.993" viewBox="0 0 37.993 37.993">
        <g id="Group_882" data-name="Group 882" transform="translate(-11556.55 148.45)">
          <line id="Line_9" data-name="Line 9" x2="28.093" y2="28.093" transform="translate(11561.5 -143.5)" fill="none" stroke="#229972" stroke-linecap="round" stroke-width="7" />
          <line id="Line_10" data-name="Line 10" x1="28.093" y2="28.093" transform="translate(11561.5 -143.5)" fill="none" stroke="#229972" stroke-linecap="round" stroke-width="7" />
        </g>
      </svg>
    </div>
    <h1 class="h-title">แผนผังเว็บไซต์</h1>
    <div class="sitmap-menu">
      <div class="sitmap-row">
        <div class="sitmap-col">
          <div class="title">
            <a href="" class="link">หน้าหลัก</a>
          </div>
        </div>
        <div class="sitmap-col">
          <div class="title">
            <a href="" class="link">เกี่ยวกับหน่วยงาน</a>
          </div>
          <div class="row">
            <div class="col-xl-4">
              <div class="submenu">
                <div class="subtitle">
                  <a href="" class="link">เกี่ยวกับเรา</a>
                </div>
                <ul class="list-group">
                  <li class="item">
                    <a href="" class="link">
                      วิสัยทัศน์ & พันธกิจ &

                      ยุทธศาสตร์
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      ภารกิจ และหน้าที่รับ

                      ผิดชอบของหน่วยงาน
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      อัตราค่าบำรุงการ

                      ตรวจวิเคราะห์และให้บริการ
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      PDPA
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      Mobile Application

                      กรมวิทยาศาสตร์การแพทย์
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      แผนกลยุทธ์
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      ตราสัญลักษณ์
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="submenu">
                <div class="subtitle">
                  <a href="" class="link">เว็บไซต์ส่วนกลางและส่วนภูมิภาค</a>
                </div>
                <ul class="list-group">
                  <li class="item">
                    <a href="" class="link">
                      ส่วนกลาง
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      ส่วนภูมิภาค
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="submenu">
                <div class="subtitle">
                  <a href="" class="link">โครงสร้างองค์กร</a>
                </div>
                <ul class="list-group">
                  <li class="item">
                    <a href="" class="link">
                      โครงสร้างหน่วยงาน
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      ทำเนียบผู้บริการ
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      ทำเนียบผู้ทรงคุณวุฒิ
                    </a>
                  </li>
                </ul>
              </div>
              <div class="submenu">
                <div class="subtitle">
                  <a href="" class="link">เอกสารเผยแพร่</a>
                </div>
                <ul class="list-group">
                  <li class="item">
                    <a href="" class="link">
                      แผนการปฏิบัติราชการและ

                      แผนการใช้จ่ายงบประมาณ
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      รายงานประจำปี
                    </a>
                  </li>
                  <li class="item">
                    <a href="" class="link">
                      กฏหมาย ระเบียบ

                      และข้อบังคับที่เกี่ยวข้อง
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sitmap-row">
        <div class="sitmap-col">
          <div class="submenu">
            <div class="title">
              <a href="" class="link">ซีไอโอ</a>
            </div>
            <ul class="list-group">
              <li class="item">
                <a href="" class="link">
                  รายละเอียด

                  เกี่ยวกับซีไอโอ
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  วิสัยทัศน์

                  และนโยบายต่างๆ
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  ‌การบริหารงาน

                  ด้าน ICT
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  ผู้บริหารเทคโนโลยี

                  สารสนเทศระดับกอง
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  เจ้าหน้าที่ประสานงาน

                  คุ้มครองข้อมูลส่วนบุคคล
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="sitmap-col">
          <div class="submenu">
            <div class="title">
              <a href="" class="link">ข่าว</a>
            </div>
            <ul class="list-group">
              <li class="item">
                <a href="" class="link">
                  ข่าวประชาสัมพันธ์
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  ข่าวประกาศ
                  br
                  ของหน่วยงาน
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="sitmap-col">
          <div class="submenu">
            <div class="title">
              <a href="" class="link">คลังความรู้</a>
            </div>
            <ul class="list-group">
              <li class="item">
                <a href="" class="link">
                  ข้อมูลนวัตกรรม
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  ระบบจัดการ

                  องค์ความรู้
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  สืบค้นข้อมูล

                  Green Book
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  คู่มือ
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  e-Learning

                  ทักษะดิจิทัล
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="sitmap-col">
          <div class="submenu">
            <div class="title">
              <a href="" class="link">บริการ</a>
            </div>
            <ul class="list-group">
              <li class="item">
                <a href="" class="link">
                  อัตราค่าบำรุงการตรวจ

                  วิเคราะห์และให้บริการ
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  งานบริการ
                </a>
                <ul class="list-sub-group">
                  <li>
                    <a href="" class="link">
                      อัตราค่าบำรุงการตรวจ

                      วิเคราะห์และให้บริการ
                    </a>
                  </li>
                  <li>
                    <a href="" class="link">
                      ข้อมูลสถิติการให้บริการ
                    </a>
                  </li>
                  <li>
                    <a href="" class="link">
                      คู่มือการตรวจทางห้องปฏิบัติการ

                      กลุ่มอาการดาวน์ในหญิงตั้งครรภ์
                    </a>
                  </li>
                  <li>
                    <a href="" class="link">
                      การให้บริการของสำนักคุณภาพและ

                      ความปลอดภัยอาหาร
                    </a>
                  </li>
                  <li>
                    <a href="" class="link">
                      ขั้นตอนการสั่งซื้อชุดทดสอบและ

                      ผลิตภัณฑ์สำหรับบุคคลทั่วไป
                    </a>
                  </li>
                  <li>
                    <a href="" class="link">
                      ตรวจบริการศูนย์

                      การแพทย์จีโนมิกส์
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="sitmap-row">
        <div class="sitmap-col">
          <div class="submenu">
            <div class="title">
              <a href="" class="link">ติดต่อ</a>
            </div>
            <ul class="list-group">
              <li class="item">
                <a href="" class="link">
                  ข้อมูลการติดต่อ
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  ช่องทางรับข้อเสนอแนะ

                  /ข้อร้องเรียน
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="sitmap-col">
          <div class="submenu">
            <div class="title">
              <a href="" class="link">ระบบสารสนเทศ</a>
            </div>
            <ul class="list-group">
              <li class="item">
                <a href="" class="link">
                  บริการประชาชน
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  สำหรับผู้บริหาร
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  สำหรับเจ้าหน้าที่
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="sitmap-col">
          <div class="submenu">
            <div class="title">
              <a href="" class="link">Big Data</a>
            </div>
            <ul class="list-group">
              <li class="item">
                <a href="" class="link">
                  DMSc Data Center
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  Open Data
                </a>
              </li>
              <li class="item">
                <a href="" class="link">
                  Data Catalog
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
{/if}