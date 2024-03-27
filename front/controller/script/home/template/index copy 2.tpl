<section class="layout-body">

    {if $load_topgraphic->_numOfRows gte 1}
    <div class="top-graphic" data-aos="fade-down">
        <div class="swiper swiper-default">
            <div class="swiper-wrapper">
                {foreach $load_topgraphic->item as $keyTgp => $valueTgp}
                    {if $valueTgp->type eq 1}
                        <div class="swiper-slide">
                            <div class="item">
                                <figure class="cover">
                                    <picture>
                                        <img src="{$valueTgp->pic->pictures}" alt="" class="lazy">
                                    </picture>
                                </figure>
                            </div>
                        </div>
                    {else}
                    {/if}
                {/foreach}
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    {/if}

    {if $load_services->_numOfRows gte 1}
    <div class="section section-i overflow-hidden" data-aos="fade-up">
        <div class="wg-services lazy" data-bg="{$template}/assets/img/background/bg-services.webp"
            data-bg-hidpi="{$template}/assets/img/background/bg-services@2x.webp">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="whead mb-0" data-aos="fade-right">
                            <h2 class="title">บริการ</h2>
                            <p class="subtitle">Services</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="action" data-aos="fade-left">
                            <a href="{$ul}/service" class="btn btn-primary">ดูทั้งหมด</a>
                        </div>
                    </div>
                </div>
                <div class="service-category" data-aos="fade-left" data-aos-delay="400">
                    <div class="service-category-list">
                        <div class="swiper swiper-default">
                            <div class="swiper-wrapper">
                                {foreach $load_services->item->group as $keyload_services_group => $load_services_group}
                                <div class="swiper-slide">
                                    <div class="item">
                                        <button type="button" class="btn services-filter" data-id="{$load_services_group->id}">{$load_services_group->subject}</button>
                                    </div>
                                </div>
                                {/foreach}
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="service-list" data-aos="fade-up">
                    <div class="service-slide">
                        <div class="swiper swiper-default">
                            <div class="swiper-wrapper" id="service-append">
                                {foreach $load_services->item->list as $keyload_services_list => $valueload_services_list}
                                    {assign var="checkUrl" value="{$valueload_services_list->url|check_url}"}
                                    {assign var="target" value="_self"}
                                    {if $checkUrl}
                                        {assign var="news_url" value="{$ul}/pageredirect/{$valueload_services_list->tb|page_redirect:$valueload_services_list->masterkey:$valueload_services_list->id:$valueload_services_list->language}"}
                                        {$target = $valueload_services_list->target}
                                    {else}
                                        {assign var="news_url" value="javascript:void(0);"}
                                    {/if}
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <a href="{$news_url}" class="link" target="{$target}">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="thumbnail">
                                                            <figure class="contain">
                                                                <img src="{$template}/assets/img/static/service-01.svg"
                                                                    alt="service-01" class="thumb-img lazy">
                                                                <img src="{$template}/assets/img/static/service-01-hover.svg"
                                                                    alt="service-01" class="thumb-hover lazy">
                                                            </figure>
                                                        </div>
                                                        <h5 class="title">{$valueload_services_list->subject}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                {/foreach}
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
    {/if}

    {if $load_innovation->_numOfRows gte 1}
    <div class="section section-ii">
        <div class="wg-research">
            <div class="wg-research-main" data-aos="fade-up">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="whead mb-0">
                                <h2 class="title">งานวิจัยและนวัตกรรม</h2>
                                <p class="subtitle">Research & Innovation</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="action">
                                <a href="{$ul}/innovation" class="btn btn-primary">ดูทั้งหมด</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                {foreach $load_innovation as $keyload_innovation => $valueload_innovation}
                    {if $keyload_innovation < 2}
                        {if $keyload_innovation eq 0}
                            {$fade_action = "right"}
                            {$fade_action_converse = "left"}
                        {else}
                            {$fade_action = "left"}
                            {$fade_action_converse = "right"}
                        {/if}
                        <div class="col-lg" data-aos="fade-{$fade_action}">
                            <a href="" class="link">
                                <div class="wg-research-group -{$fade_action_converse}">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <div class="whead">
                                                <h3 class="title">การทดสอบความชำนาญ</h3>
                                                <p class="subtitle">DMSC PT</p>
                                                <div class="total">120</div>
                                                <div class="unit">แผนการทดสอบ</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="graphic">
                                                <picture>
                                                    <source
                                                        srcset="{$template}/assets/img/static/wg-research-graphic-01.webp"
                                                        data-srcset="{$template}/assets/img/static/wg-research-graphic-01@2x.webp"
                                                        type="image/webp">
                                                    <img src="{$template}/assets/img/static/wg-research-graphic-01.png"
                                                        data-src="{$template}/assets/img/static/wg-research-graphic-01@2x.png"
                                                        alt="" class="lazy">
                                                </picture>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-obj">
                                        <img src="{$template}/assets/img/background/bg-test-tube.svg" alt=""
                                            class="lazy">
                                    </div>
                                </div>
                            </a>
                        </div>
                    {else}
                        {break}
                    {/if}
                {/foreach}
                {* <div class="col-lg" data-aos="fade-left">
                    <a href="" class="link">
                        <div class="wg-research-group -right">
                            <div class="row no-gutters">
                                <div class="col">
                                    <div class="whead">
                                        <h3 class="title">รายการให้บริการตรวจวิเคราะห์</h3>
                                        <p class="subtitle">Analysis service</p>
                                        <div class="total">1,873</div>
                                        <div class="unit">รายการ</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="graphic">
                                        <picture>
                                            <source
                                                srcset="{$template}/assets/img/static/wg-research-graphic-02.webp"
                                                data-srcset="{$template}/assets/img/static/wg-research-graphic-02@2x.webp"
                                                type="image/webp">
                                            <img src="{$template}/assets/img/static/wg-research-graphic-02.png"
                                                data-src="{$template}/assets/img/static/wg-research-graphic-02@2x.png"
                                                alt="" class="lazy">
                                        </picture>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-obj">
                                <img src="{$template}/assets/img/background/bg-microscope.svg" alt=""
                                    class="lazy">
                            </div>
                        </div>
                    </a>
                </div> *}
            </div>
            <div class="wg-research-list lazy"
                data-bg="{$template}/assets/img/background/bg-wg-research.webp"
                data-bg-hidpi="{$template}/assets/img/background/bg-wg-research@2x.webp">
                <div class="container">
                    <div class="swiper swiper-default">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="item">
                                    <a href="" class="link">
                                        <div class="wg-research-group" data-aos="fade-down" data-aos-delay="400">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="whead">
                                                        <h3 class="title">องค์ความรู้</h3>
                                                        <p class="subtitle">Knowledge</p>
                                                        <div class="total">1,262</div>
                                                        <div class="unit">
                                                            รายการ
                                                            <span
                                                                class="material-symbols-rounded">expand_circle_right</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-obj">
                                                <img src="{$template}/assets/img/background/bg-math.svg"
                                                    alt="" class="lazy">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <a href="" class="link">
                                        <div class="wg-research-group" data-aos="fade-down" data-aos-delay="400">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="whead">
                                                        <h3 class="title">นวัตกรรม</h3>
                                                        <p class="subtitle">Innovation</p>
                                                        <div class="total">233</div>
                                                        <div class="unit">
                                                            รายการ
                                                            <span
                                                                class="material-symbols-rounded">expand_circle_right</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-obj">
                                                <img src="{$template}/assets/img/background/bg-science.svg"
                                                    alt="" class="lazy">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <a href="" class="link">
                                        <div class="wg-research-group" data-aos="fade-down" data-aos-delay="400">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="whead">
                                                        <h3 class="title">เทคโนโลยี</h3>
                                                        <p class="subtitle">Technology</p>
                                                        <div class="total">40</div>
                                                        <div class="unit">
                                                            รายการ
                                                            <span
                                                                class="material-symbols-rounded">expand_circle_right</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-obj">
                                                <img src="{$template}/assets/img/background/bg-experiment.svg"
                                                    alt="" class="lazy">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <a href="" class="link">
                                        <div class="wg-research-group" data-aos="fade-down" data-aos-delay="400">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="whead">
                                                        <h3 class="title">เทคโนโลยี</h3>
                                                        <p class="subtitle">Technology</p>
                                                        <div class="total">40</div>
                                                        <div class="unit">
                                                            รายการ
                                                            <span
                                                                class="material-symbols-rounded">expand_circle_right</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-obj">
                                                <img src="{$template}/assets/img/background/bg-experiment.svg"
                                                    alt="" class="lazy">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {/if}

    <div class="section section-iii" data-aos="fade-up">
        <div class="wg-about lazy" data-bg="{$template}/assets/img/background/bg-wg-about.webp"
            data-bg-hidpi="{$template}/assets/img/background/bg-wg-about@2x.webp">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg" data-aos="fade-right">
                        <div class="content">
                            <div class="whead">
                                <h2 class="title">กรมวิทยาศาสตร์การแพทย์</h2>
                                <p class="subtitle">กระทรวงสาธารณสุข</p>
                                <div class="line"></div>
                                <p class="desc">
                                    กรมวิทยาศาสตร์การแพทย์มีภารกิจด้านการวิจัย
                                    และพัฒนาเพื่อสร้างองค์ความรู้และสารสนเทศ
                                    ด้านวิทยาศาสตร์การแพทย์ ในการเฝ้าระวัง
                                    ป้องกันรักษาโรค
                                </p>
                            </div>
                            <div class="action">
                                <a href="" class="btn btn-primary">อ่านต่อ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div class="wg-about-group-list">
                            <div class="row no-gutters">
                                <div class="col-6">
                                    <a href="" class="link">
                                        <div class="wg-about-group" data-aos="fade-down-left" data-aos-delay="200">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="title">ประวัติ<br>ความเป็นมา</h3>
                                                    <div class="grphic-obj">
                                                        <div class="contain">
                                                            <img src="{$template}/assets/img/static/wg-about-feather-pen.svg"
                                                                alt="" class="img-contain lazy">
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        อ่านต่อ
                                                        <span
                                                            class="material-symbols-rounded">expand_circle_right</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="" class="link">
                                        <div class="wg-about-group" data-aos="fade-down-left" data-aos-delay="200">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="title">วิสัยทัศน์ & พันธกิจ & ยุทธศาสตร์</h3>
                                                    <div class="grphic-obj">
                                                        <div class="contain">
                                                            <img src="{$template}/assets/img/static/wg-about-flag.svg"
                                                                alt="" class="img-contain lazy">
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        อ่านต่อ
                                                        <span
                                                            class="material-symbols-rounded">expand_circle_right</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="" class="link">
                                        <div class="wg-about-group" data-aos="fade-down-left" data-aos-delay="200">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="title">โครงสร้าง<br>หน่วยงาน</h3>
                                                    <div class="grphic-obj">
                                                        <div class="contain">
                                                            <img src="{$template}/assets/img/static/wg-about-flow.svg"
                                                                alt="" class="img-contain lazy">
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        อ่านต่อ
                                                        <span
                                                            class="material-symbols-rounded">expand_circle_right</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="graphic" data-aos="fade-up" data-aos-delay="400">
                    <picture>
                        <source srcset="{$template}/assets/img/static/wg-about-graphic.webp"
                            data-srcset="{$template}/assets/img/static/wg-about-graphic@2x.webp"
                            type="image/webp">
                        <img src="{$template}/assets/img/static/wg-about-graphic.png"
                            data-src="{$template}/assets/img/static/wg-about-graphic@2x.png" alt=""
                            class="lazy">
                    </picture>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-iv overflow-hidden">
        <div class="wg-news lazy" data-bg="{$template}/assets/img/background/bg-wg-news.webp"
            data-bg-hidpi="{$template}/assets/img/background/bg-wg-news@2x.webp">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg">
                        <div class="wg-news-nav" data-aos="fade-left" data-aos-delay="200">
                            <div class="whead">
                                <h2 class="title">ข่าวสาร</h2>
                                <p class="subtitle">NEWS</p>
                                <div class="line"></div>
                            </div>
                            <div class="nav nav-default flex-column" id="news-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="news-01-tab" data-toggle="pill"
                                    data-target="#news-01" type="button" role="tab" aria-controls="news-01"
                                    aria-selected="true">ข่าวประชาสัมพันธ์</button>
                                <button class="nav-link" id="news-02-tab" data-toggle="pill" data-target="#news-02"
                                    type="button" role="tab" aria-controls="news-02"
                                    aria-selected="false">ข่าวประกาศ</button>
                                <button class="nav-link" id="news-03-tab" data-toggle="pill" data-target="#news-03"
                                    type="button" role="tab" aria-controls="news-03"
                                    aria-selected="false">เครือข่ายประชาสัมพันธ์</button>
                                <button class="nav-link" id="news-04-tab" data-toggle="pill" data-target="#news-04"
                                    type="button" role="tab" aria-controls="news-04"
                                    aria-selected="false">นโยบายคุณภาพ</button>
                            </div>
                            <div class="action">
                                <a href="" class="btn btn-primary">ดูทั้งหมด</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div class="wg-news-tab wg-news-list" data-aos="fade-up">
                            <div class="tab-content" id="news-tabContent">
                                <div class="tab-pane fade show active" id="news-01" role="tabpanel"
                                    aria-labelledby="news-01-tab">
                                    <div class="wg-news-slide">
                                        <div class="swiper swiper-default">
                                            <div class="swiper-wrapper">
                                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                                <div class="swiper-slide">
                                                    <div class="item">
                                                        <a href="" class="link news-link">
                                                            <div class="news-card card">
                                                                <div class="thumbnail">
                                                                    <figure class="cover">
                                                                        <img src="{$template}/assets/img/uploads/news-thumb.jpg"
                                                                            alt="">
                                                                    </figure>
                                                                </div>
                                                                <div class="card-body">
                                                                    <h5 class="title">
                                                                        หน่วยทดสอบความชำนาญทั้งส่วนกลางและส่วนภูมิภาค
                                                                        ซึ่งการสมัครเข้าร่วม</h5>
                                                                    <div class="line"></div>
                                                                    <p class="desc">
                                                                        กรมวิทยาศาสตร์การแพทย์มีบริการทดสอบความ
                                                                        ชำนาญ ที่ให้บริการต่อเนื่องมามากกว่า 20 ปี
                                                                        มีหน่วย
                                                                        ทดสอบความชำนาญทั้งส่วนกลางและส่วนภูมิภาค
                                                                        ซึ่งการสมัครเข้าร่วมการทดสอบ
                                                                    </p>
                                                                    <div class="action">
                                                                        อ่านต่อ
                                                                        <span
                                                                            class="material-symbols-rounded">expand_circle_right</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="news-02" role="tabpanel" aria-labelledby="news-02-tab">
                                    <div class="wg-news-slide">
                                        <div class="swiper swiper-default">
                                            <div class="swiper-wrapper">
                                                <?php for ($i = 1; $i <= 2; $i++) { ?>
                                                <div class="swiper-slide">
                                                    <div class="item">
                                                        <a href="" class="link news-link">
                                                            <div class="news-card card">
                                                                <div class="thumbnail">
                                                                    <figure class="cover">
                                                                        <img src="https://picsum.photos/id/684/600/400"
                                                                            alt="">
                                                                    </figure>
                                                                </div>
                                                                <div class="card-body">
                                                                    <h5 class="title">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit. Quasi, saepe,
                                                                        voluptatum perspiciatis adipisci culpa hic
                                                                        impedit nulla tempora iure, vel nobis! Cumque
                                                                        ipsum recusandae iure expedita vitae ea dolor
                                                                        quia.</h5>
                                                                    <div class="line"></div>
                                                                    <p class="desc">
                                                                        Lorem ipsum dolor sit amet consectetur
                                                                        adipisicing elit. Sed atque eaque deleniti!
                                                                        Doloremque voluptate possimus laboriosam dicta
                                                                        pariatur, amet odio temporibus sapiente eos
                                                                        deleniti reprehenderit fugiat minus
                                                                        voluptatibus. Cum, ipsum.
                                                                    </p>
                                                                    <div class="action">
                                                                        อ่านต่อ
                                                                        <span
                                                                            class="material-symbols-rounded">expand_circle_right</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="news-03" role="tabpanel" aria-labelledby="news-03-tab">
                                    news-03</div>
                                <div class="tab-pane fade" id="news-04" role="tabpanel" aria-labelledby="news-04-tab">
                                    news-04</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-v overflow-hidden" style="position: relative;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-7 col-md-6 col-12" style="position: unset;">
                    <div class="wg-lab">
                        <div class="content" data-aos="fade-right">
                            <div class="whead">
                                <h2 class="title">บริการตรวจวิเคราะห์<br>ทางห้องปฏิบัติการ</h2>
                                <p class="subtitle">Lab</p>
                                <div class="bg-obj">
                                    <img src="{$template}/assets/img/background/bg-destination.svg" alt=""
                                        class="lazy">
                                </div>
                                <p class="subtitle">ตรวจสอบ<br>หน่วยบริการใกล้คุณ</p>
                            </div>
                            <div class="action">
                                <a href="" class="btn btn-primary">คลิกเลย</a>
                            </div>
                        </div>
                        <div class="bg" data-aos="fade-right">
                            <picture>
                                <source srcset="{$template}/assets/img/background/bg-wg-lab.webp"
                                    data-srcset="{$template}/assets/img/background/bg-wg-lab@2x.webp"
                                    type="image/webp">
                                <img src="{$template}/assets/img/background/bg-wg-lab.png"
                                    data-src="{$template}/assets/img/background/bg-wg-lab@2x.png" alt=""
                                    class="lazy">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12" style="position: unset;">
                    <div class="wg-contact">
                        <div class="content" data-aos="fade-left">
                            <div class="whead">
                                <h2 class="title">ติดต่อ/<br>สอบถามข้อมูล</h2>
                                <p class="subtitle">Contact</p>
                            </div>
                            <div class="contact-list">
                                {if $settingWeb.contact->email2 neq ""}
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt=""
                                                class="icon">
                                        </div>
                                        <div class="col">
                                            <p class="desc">
                                                <span class="d-block">ติดต่อ/สอบถามข้อมูล</span>
                                                <span class="d-block">E-mail : <a href="mailto:{$settingWeb.contact->email2}"
                                                        class="link">{$settingWeb.contact->email2}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                {/if}
                                {if $settingWeb.contact->email3 neq ""}
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt=""
                                                class="icon">
                                        </div>
                                        <div class="col">
                                            <p class="desc">
                                                <span class="d-block">สอบถามข้อมูลการตรวจวิเคราะห์</span>
                                                <span class="d-block">E-mail : <a href="mailto:{$settingWeb.contact->email3}"
                                                        class="link">{$settingWeb.contact->email3}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                {/if}
                                {if $settingWeb.contact->tel neq "" && $settingWeb.contact->tel2 neq ""}
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img src="{$template}/assets/img/icon/contact-icon-telephone.svg"
                                                alt="" class="icon">
                                        </div>
                                        <div class="col">
                                            <p class="desc">
                                                {if $settingWeb.contact->tel neq ""}
                                                    <span class="d-block">โทรศัพท์. <a href="tel:{" "|str_replace:"":$settingWeb.contact->tel}" class="link">{$settingWeb.contact->tel}</a></span>
                                                {/if}
                                                {if $settingWeb.contact->tel neq ""}
                                                    <span class="d-block">มือถือ. <a href="tel:{" "|str_replace:"":$settingWeb.contact->tel2}" class="link">{$settingWeb.contact->tel2}</a></span>
                                                {/if}
                                            </p>
                                        </div>
                                    </div>
                                {/if}
                                {if $settingWeb.contact->email4 neq ""}
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt=""
                                                class="icon">
                                        </div>
                                        <div class="col">
                                            <p class="desc">
                                                <span class="d-block">รับ-ส่งหนังสือราชการ</span>
                                                <span class="d-block">E-mail : <a href="mailto:{$settingWeb.contact->email4}"
                                                        class="link">{$settingWeb.contact->email4}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                {/if}
                            </div>
                        </div>
                        <div class="bg" data-aos="fade-left">
                            <picture>
                                <source srcset="{$template}/assets/img/background/bg-wg-contact.webp"
                                    data-srcset="{$template}/assets/img/background/bg-wg-contact@2x.webp"
                                    type="image/webp">
                                <img src="{$template}/assets/img/background/bg-wg-contact.png"
                                    data-src="{$template}/assets/img/background/bg-wg-contact@2x.png" alt=""
                                    class="lazy">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>