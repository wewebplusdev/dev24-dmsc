<section class="layout-body layout-body-home">

    {if $loadTopgraphic->_numOfRows gte 1}
        <div id="banner" class="text-righ w-25 ml-auto"></div>
        <div class="top-graphic" data-aos="fade-down">
            <div class="swiper swiper-default">
                <div class="swiper-wrapper">
                    {foreach $loadTopgraphic->item as $keyTgp => $valueTgp}
                    {if $valueTgp->type eq 2 && $valueTgp->video neq ""}
                        {$myUrlArray = "v="|explode:$valueTgp->video}
                        {$myUrlCut = $myUrlArray[1]}
                        {$myUrlCutArray = "&"|explode:$myUrlCut}
                        {$myUrlCutAnd= $myUrlCutArray.0}
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="iframe-container">
                                    <iframe
                                        src="https://www.youtube.com/embed/{$myUrlCutAnd}?controls=0&autoplay=1&mute=1&loop=1&enablejsapi=1"
                                        title="Inside Of Saturn&#39;s Rings" style="border: none; pointer-events: none;"
                                        referrerpolicy="strict-origin-when-cross-origin"></iframe>
                                </div>
                            </div>
                        </div>
                    {elseif $valueTgp->type eq 3}
                        <div class="swiper-slide">
                            <div class="item">
                            <div class="video-container">
                                <video loop="" autoplay="" muted="" controlsList="nofullscreen" style="pointer-events: none;" playsinline>
                                <source src="{$valueTgp->video->real}" type="video/mp4">
                                Your browser does not support the video tag.
                                </video>
                            </div>
                            </div>
                        </div>
                    {else}
                        <div class="swiper-slide">
                            <div class="item">
                                <a href="{$valueTgp->url}" class="link" target="{$valueTgp->pic->target|default:'_self'}" title="link" title="link from image" >
                                    <figure class="contain">
                                        <picture>
                                            <img src="{$valueTgp->pic->pictures}" alt="{$valueTgp->pic->pictures}" class="lazy">
                                        </picture>
                                    </figure>
                                    <div class="fill-blur">
                                      <figure class="cover">
                                          <picture>
                                              <img src="{$valueTgp->pic->pictures}" alt="{$valueTgp->pic->pictures}" class="lazy">
                                          </picture>
                                      </figure>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                    {/if}
                    {/foreach}
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    {/if}

    {if $loadServices->_numOfRows gte 1}
        <div class="section section-i overflow-hidden" data-aos="fade-up">
            <div class="wg-services lazy" data-bg="{$template}/assets/img/background/bg-services.webp"
                data-bg-hidpi="{$template}/assets/img/background/bg-services@2x.webp">
                <div class="container">
                    <div class="row align-items-center text-sm-left text-center">
                        <div class="col-sm mb-sm-0 mb-3">
                            <div class="whead mb-0" data-aos="fade-right">
                                <h5 class="title">{$languageFrontWeb->serviceth->display->$currentLangWeb}</h5>
                                <p class="subtitle">{$languageFrontWeb->serviceen->display->$currentLangWeb}</p>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="action" data-aos="fade-left">
                                <a href="{$ul}/services" class="btn btn-primary">{$languageFrontWeb->read_all->display->$currentLangWeb}</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-category" data-aos="fade-left" data-aos-delay="400">
                        <div class="service-category-list">
                            <div class="swiper swiper-default">
                                <div class="swiper-wrapper">
                                    {foreach $loadServices->item->group as $keyload_services_group => $load_services_group}
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
                                    {foreach $loadServices->item->list as $keyload_services_list => $valueload_services_list}
                                        {assign var="checkUrl" value="{$valueload_services_list->url|checkUrl}"}
                                        {assign var="target" value="_self"}
                                        {if $checkUrl}
                                            {assign var="news_url" value="{$ul}/pageredirect/{$valueload_services_list->tb|pageRedirect:$valueload_services_list->masterkey:$valueload_services_list->id:$valueload_services_list->language}"}
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
                                                                    <img src="{$valueload_services_list->pic->pictures}"
                                                                        alt="{$valueload_services_list->pic->pictures}" class="thumb-img lazy">
                                                                    <img src="{$valueload_services_list->pic2->pictures}"
                                                                        alt="{$valueload_services_list->pic2->pictures}" class="thumb-hover lazy">
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

    {if $loadInnovation->_numOfRows gte 1}
        <div class="section section-ii">
            <div class="wg-research">
                <div class="wg-research-main" data-aos="fade-up">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="whead mb-0">
                                    <h2 class="title">{$languageFrontWeb->researchth->display->$currentLangWeb}</h2>
                                    <p class="subtitle">{$languageFrontWeb->researchen->display->$currentLangWeb}</p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="action">
                                    <a href="{$ul}/services/rein" class="btn btn-primary">{$languageFrontWeb->read_all->display->$currentLangWeb}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    {foreach $loadInnovation->item as $keyload_innovation => $valueload_innovation}
                        {if $keyload_innovation < 2}
                            {if $keyload_innovation eq 0}
                                {$fade_action = "right"}
                                {$fade_action_converse = "left"}
                                {$backgroud_img = "wg-research-graphic-03.png"}
                            {else}
                                {$fade_action = "left"}
                                {$fade_action_converse = "right"}
                                {$backgroud_img = "wg-research-graphic-04.png"}
                            {/if}
                            <div class="col-lg" data-aos="fade-{$fade_action}">
                                <a href="{$valueload_innovation->url}" class="link">
                                    <div class="wg-research-group -{$fade_action_converse}">
                                        <div class="row no-gutters">
                                            <div class="col">
                                                <div class="whead">
                                                    <h3 class="title">{$valueload_innovation->subject}</h3>
                                                    <p class="subtitle">{$valueload_innovation->des}</p>
                                                    <div class="total">{$valueload_innovation->number|number_format}</div>
                                                    <div class="unit">{$valueload_innovation->suffix}</div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="graphic">
                                                    <picture>
                                                        <img src="{$template}/assets/img/static/{$backgroud_img}" alt="{$backgroud_img}">
                                                    </picture>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-obj">
                                            <img src="{$valueload_innovation->pic->pictures}" alt="{$valueload_innovation->subject}" class="lazy">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        {else}
                            {break}
                        {/if}
                    {/foreach}
                </div>
                {if $loadInnovation->item|count gte 2}
                    <div class="wg-research-list lazy"
                        data-bg="{$template}/assets/img/background/bg-wg-research.webp"
                        data-bg-hidpi="{$template}/assets/img/background/bg-wg-research@2x.webp">
                        <div class="container">
                            <div class="swiper swiper-default">
                                <div class="swiper-wrapper">
                                    {foreach $loadInnovation->item as $keyload_innovation => $valueload_innovation}
                                        {if $keyload_innovation > 1}
                                            <div class="swiper-slide">
                                                <div class="item">
                                                    <a href="{$valueload_innovation->url}" class="link" target="{$valueload_innovation->target|default:'_self'}">
                                                        <div class="wg-research-group" data-aos="fade-down" data-aos-delay="400">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="whead">
                                                                        <h3 class="title">{$valueload_innovation->subject}</h3>
                                                                        <p class="subtitle">{$valueload_innovation->des}</p>
                                                                        <div class="total">{$valueload_innovation->number|number_format}</div>
                                                                        <div class="unit">
                                                                            {$valueload_innovation->suffix}
                                                                            <span
                                                                                class="material-symbols-rounded">expand_circle_right</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bg-obj">
                                                                <img src="{$valueload_innovation->pic->pictures}" alt="{$valueload_innovation->subject}" class="lazy">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        {/if}
                                    {/foreach}
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                {/if}
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
                                <h3 class="title">{$languageFrontWeb->department->display->$currentLangWeb}</h3>
                                <p class="subtitle">{$languageFrontWeb->ministry->display->$currentLangWeb}</p>
                                <div class="line"></div>
                                <p class="desc">
                                    {$languageFrontWeb->aboutdepartment->display->$currentLangWeb}
                                </p>
                            </div>
                            <div class="action">
                                <a href="{$ul}/about" class="btn btn-primary">{$languageFrontWeb->readmore->display->$currentLangWeb}</a>
                            </div>
                        </div>
                    </div>
                    {if $loadAbout->_numOfRows gte 1}
                      <div class="col-lg-auto">
                          <div class="wg-about-group-list">
                              <div class="swiper">
                                <div class="swiper-wrapper">
                                {for $foo=1 to 3}
                                  <div class="swiper-slide">
                                    <div class="row no-gutters">
                                        {foreach $loadAbout->item as $keyload_about => $valueload_about}
                                            {assign var="checkUrl" value="{$valueload_about->url|checkUrl}"}
                                            {assign var="target" value="_self"}
                                            {if $checkUrl}
                                                {assign var="news_url" value="{$ul}/pageredirect/{$valueload_about->tb|pageRedirect:$valueload_about->masterkey:$valueload_about->id:$valueload_about->language}"}
                                                {$target = $valueload_about->target}
                                            {else}
                                                {assign var="news_url" value="javascript:void(0);"}
                                            {/if}
                                            <div class="col-6">
                                                <a href="{$news_url}" class="link" target="{$target}">
                                                    <div class="wg-about-group" data-aos="fade-down" data-aos-delay="200">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="title">{$valueload_about->subject}</h4>
                                                                <div class="grphic-obj">
                                                                    <div class="contain">
                                                                        <img src="{$valueload_about->pic->pictures}"
                                                                            alt="{$valueload_about->subject}" class="img-contain lazy">
                                                                    </div>
                                                                </div>
                                                                <div class="action">
                                                                    {$languageFrontWeb->readmore->display->$currentLangWeb}
                                                                    <span
                                                                        class="material-symbols-rounded">expand_circle_right</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        {/foreach}
                                    </div>
                                  </div>
                                {/for}
                                </div>
                              </div>
                          </div>
                      </div>
                      {* <div class="wg-about-group-list">
                        {foreach $loadAbout->item as $keyload_about => $valueload_about}
                          {assign var="checkUrl" value="{$valueload_about->url|checkUrl}"}
                          {assign var="target" value="_self"}
                          {if $checkUrl}
                              {assign var="news_url" value="{$ul}/pageredirect/{$valueload_about->tb|pageRedirect:$valueload_about->masterkey:$valueload_about->id:$valueload_about->language}"}
                              {$target = $valueload_about->target}
                          {else}
                              {assign var="news_url" value="javascript:void(0);"}
                          {/if}
                          <a href="{$news_url}" class="link" target="{$target}">
                            <div class="wg-about-group" data-aos="fade-down-left" data-aos-delay="200">
                              <div class="card">
                                <div class="card-body">
                                  <h3 class="title">{$valueload_about->subject}</h3>
                                  <div class="grphic-obj">
                                    <div class="contain">
                                      <img src="{$valueload_about->pic->pictures}"
                                          alt="{$valueload_about->subject}" class="img-contain lazy">
                                    </div>
                                  </div>
                                  <div class="action">
                                    {$languageFrontWeb->readmore->display->$currentLangWeb}
                                    <span class="material-symbols-rounded">expand_circle_right</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>
                        {/foreach}
                      </div> *}
                    {/if}
                </div>
                <div class="graphic" data-aos="fade-up" data-aos-delay="400">
                    <picture>
                        <source srcset="{$template}/assets/img/static/wg-about-graphic01.webp"
                            data-srcset="{$template}/assets/img/static/wg-about-graphic01.webp"
                            type="image/webp">
                        <img src="{$template}/assets/img/static/wg-about-graphic.png"
                            data-src="{$template}/assets/img/static/wg-about-graphic01.webp" alt="image-graphic"
                            class="lazy">
                    </picture>
                </div>
            </div>
        </div>
    </div>

    {if $array_news_list['group']|count gte 1 && $array_news_list['list']|count gte 1}
        <div class="section section-iv overflow-hidden">
            <div class="wg-news lazy" data-bg="{$template}/assets/img/background/bg-wg-news.webp"
                data-bg-hidpi="{$template}/assets/img/background/bg-wg-news@2x.webp">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg">
                            <div class="wg-news-nav" data-aos="fade-left" data-aos-delay="200">
                                <div class="whead text-sm-left text-center pb-sm-0 pb-5">
                                    <h5 class="title">{$languageFrontWeb->titlenewsth->display->$currentLangWeb}</h5>
                                    <p class="subtitle">{$languageFrontWeb->titlenewsen->display->$currentLangWeb}</p>
                                    <div class="line"></div>
                                </div>
                                <div class="nav nav-default flex-column" id="news-tab" role="tablist"
                                    aria-orientation="vertical">
                                    {foreach $array_news_list['group'] as $keyNewsGroup => $valueNewsGroup}
                                        <button class="nav-link {if $keyNewsGroup eq 0}active{/if}" id="news-0{$valueNewsGroup->id}-tab" data-toggle="pill"
                                            data-target="#news-0{$valueNewsGroup->id}" type="button" role="tab" aria-controls="news-0{$valueNewsGroup->id}" aria-selected="true">{$valueNewsGroup->subject}</button>
                                    {/foreach}
                                </div>
                                <div class="action">
                                    <a href="{$ul}/listAll/{$valueNewsGroup->masterkey}" class="btn btn-primary">{$languageFrontWeb->read_all->display->$currentLangWeb}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                            <div class="wg-news-tab wg-news-list" data-aos="fade-up">
                                <div class="tab-content" id="news-tabContent">
                                    {$index_news = 0}
                                    {foreach $array_news_list['list'] as $keyNewsListGroup => $valueNewsListGroup}
                                    <div class="tab-pane fade {if $index_news eq 0}show active{/if}" id="news-0{$keyNewsListGroup}" role="tabpanel"
                                        aria-labelledby="news-0{$keyNewsListGroup}-tab">
                                        <div class="wg-news-slide">
                                            <div class="swiper swiper-default">
                                                <div class="swiper-wrapper">
                                                    {foreach $valueNewsListGroup as $keyNewsList => $valueNewsList}
                                                        {assign var="checkUrl" value="{$valueNewsList->url|checkUrl}"}
                                                        {assign var="target" value="_self"}
                                                        {if $checkUrl}
                                                            {assign var="news_url" value="{$ul}/pageredirect/{$valueNewsList->tb|pageRedirect:$valueNewsList->masterkey:$valueNewsList->id:$valueNewsList->language}"}
                                                            {$target = $valueNewsList->target}
                                                        {else}
                                                            {assign var="news_url" value="javascript:void(0);"}
                                                        {/if}
                                                        <div class="swiper-slide">
                                                            <div class="item">
                                                                <a href="{$news_url}" class="link news-link" target="{$target}">
                                                                    <div class="news-card card">
                                                                        <div class="thumbnail">
                                                                            <figure class="cover">
                                                                                <img src="{$valueNewsList->pic->pictures}" alt="{$valueNewsList->subject}">
                                                                            </figure>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <h5 class="title">{$valueNewsList->subject}</h5>
                                                                            <div class="line"></div>
                                                                            <p class="desc">
                                                                                {$valueNewsList->title}
                                                                            </p>
                                                                            <div class="action">
                                                                                {$languageFrontWeb->readmore->display->$currentLangWeb}
                                                                                <span
                                                                                    class="material-symbols-rounded">expand_circle_right</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    {/foreach}
                                                </div>
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div>
                                            </div>
                                        </div>
                                    </div>
                                    {$index_news = $index_news + 1}
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/if}

    <div class="section section-v overflow-hidden" style="position: relative;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-7 col-md-6 col-12" style="position: unset;">
                    <div class="wg-lab">
                        <div class="content" data-aos="fade-right">
                            <div class="whead">
                                <h2 class="title">{$languageFrontWeb->labanalysis->display->$currentLangWeb}</h2>
                                <p class="subtitle">{$languageFrontWeb->labtext->display->$currentLangWeb}</p>
                                <div class="bg-obj">
                                    <img src="{$template}/assets/img/background/bg-destination.svg" alt="image-obj"
                                        class="lazy">
                                </div>
                                <p class="subtitle">{$languageFrontWeb->checkservice->display->$currentLangWeb}</p>
                            </div>
                            <div class="action">
                                <a href="" class="btn btn-primary">{$languageFrontWeb->clicknow->display->$currentLangWeb}</a>
                            </div>
                        </div>
                        <div class="bg" data-aos="fade-right">
                            <picture>
                                <source srcset="{$template}/assets/img/background/bg-wg-lab2.webp"
                                    data-srcset="{$template}/assets/img/background/bg-wg-lab2.webp"
                                    type="image/webp">
                                <img src="{$template}/assets/img/background/bg-wg-lab2.png"
                                    data-src="{$template}/assets/img/background/bg-wg-lab2.png" alt="background-lab"
                                    class="lazy">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12" style="position: unset;">
                    <div class="wg-contact">
                        <div class="content" data-aos="fade-left">
                            <div class="whead">
                                <h2 class="title">{$languageFrontWeb->contacttitle->display->$currentLangWeb}</h2>
                                <p class="subtitle">{$languageFrontWeb->contacttext->display->$currentLangWeb}</p>
                            </div>
                            <div class="contact-list">
                                {if $settingWeb.contact->email2 neq ""}
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt="icon-email"
                                                class="icon">
                                        </div>
                                        <div class="col">
                                            <p class="desc">
                                                <span class="d-block">{$languageFrontWeb->contactinfo->display->$currentLangWeb}</span>
                                                <span class="d-block">E-mail : <a href="mailto:{$settingWeb.contact->email2}"
                                                        class="link">{$settingWeb.contact->email2}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                {/if}
                                {if $settingWeb.contact->email3 neq ""}
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt="icon-email"
                                                class="icon">
                                        </div>
                                        <div class="col">
                                            <p class="desc">
                                                <span class="d-block">{$languageFrontWeb->inqairebout->display->$currentLangWeb}</span>
                                                <span class="d-block">E-mail : <a href="{$settingWeb.contact->email3}"
                                                        class="link">{$settingWeb.contact->email3}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                {/if}
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-telephone.svg"
                                            alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">โทรศัพท์. <a href="tel:0-2589-9850"
                                                    class="link">0-2589-9850</a> ถึง 8 ต่อ 99968</span>
                                            <span class="d-block">มือถือ. <a href="tel:098-915-6809"
                                                    class="link">098-915-6809</a></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt="icon-email"
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">รับ-ส่งหนังสือราชการ</span>
                                            <span class="d-block">E-mail : <a href="saraban@dmsc.mail.go.th"
                                                    class="link">saraban@dmsc.mail.go.th</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg" data-aos="fade-left">
                            <picture>
                                <source srcset="{$template}/assets/img/background/bg-wg-contact.webp"
                                    data-srcset="{$template}/assets/img/background/bg-wg-contact@2x.webp"
                                    type="image/webp">
                                <img src="{$template}/assets/img/background/bg-wg-contact.png"
                                    data-src="{$template}/assets/img/background/bg-wg-contact@2x.png" alt="background-contact"
                                    class="lazy">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                <div class="guides-overlay-custom"></div>
</section>