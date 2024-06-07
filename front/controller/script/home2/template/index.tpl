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
                                <a href="{$valueTgp->url}" class="link" target="{$valueTgp->pic->target|default:'_self'}">
                                    <figure class="contain">
                                        <picture>
                                            <img src="{$valueTgp->pic->webp}{$LastVersionCache}"  class="lazy" loading="lazy" width="1903" height="743">
                                        </picture>
                                    </figure>
                                    <div class="fill-blur">
                                      <figure class="cover">
                                          <picture>
                                              <img src="{$valueTgp->pic->webp}{$LastVersionCache}"  class="lazy" loading="lazy" width="1903" height="743">
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
            <div class="wg-services lazy" >
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
                                    {* {foreach $loadServices->item->list as $keyload_services_list => $valueload_services_list}
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
                                                                    <img src="{$valueload_services_list->pic->webp}{$LastVersionCache}"
                                                                        alt="{$valueload_services_list->pic->webp}" class="thumb-img lazy" loading="lazy" width="100" height="100">
                                                                    <img src="{$valueload_services_list->pic2->webp}{$LastVersionCache}"
                                                                        alt="{$valueload_services_list->pic2->webp}" class="thumb-hover lazy" loading="lazy" width="100" height="100">
                                                                </figure>
                                                            </div>
                                                            <h5 class="title">{$valueload_services_list->subject}</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    {/foreach} *}
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
                                        class="lazy" loading="lazy" width="135" height="135">
                                </div>
                                <p class="subtitle">{$languageFrontWeb->checkservice->display->$currentLangWeb}</p>
                            </div>
                            <div class="action">
                                <a href="" class="btn btn-primary">{$languageFrontWeb->clicknow->display->$currentLangWeb}</a>
                            </div>
                        </div>
                        <div class="bg" data-aos="fade-right">
                            <source srcset="{$template}/assets/img/background/bg-wg-lab2.webp{$LastVersionCache}"
                                data-srcset="{$template}/assets/img/background/bg-wg-lab2.webp{$LastVersionCache}"
                                type="image/webp">
                            <img src="{$template}/assets/img/background/bg-wg-lab2.webp{$LastVersionCache}"
                                data-src="{$template}/assets/img/background/bg-wg-lab2.webp{$LastVersionCache}" loading="lazy" alt="background-lab"
                                class="lazy">
                            {* <picture>
                            </picture> *}
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
                                                class="icon" loading="lazy" width="37" height="37">
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
                                                class="icon" loading="lazy" width="37" height="37">
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
                                {if $settingWeb.contact->tel neq "" && $settingWeb.contact->tel2 neq ""}
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img src="{$template}/assets/img/icon/contact-icon-telephone.svg"
                                                alt="" class="icon" loading="lazy" width="37" height="37">
                                        </div>
                                        <div class="col">
                                            <p class="desc">
                                                {if $settingWeb.contact->tel neq ""}
                                                <span class="d-block">{$languageFrontWeb->contact_tel->display->$currentLangWeb} <a href="tel:{" "|str_replace:"":$settingWeb.contact->tel}"
                                                        class="link">{$settingWeb.contact->tel}</a></span>
                                                {/if}
                                                {if $settingWeb.contact->tel2 neq ""}
                                                <span class="d-block">{$languageFrontWeb->contact_mobile->display->$currentLangWeb} <a href="tel:{" "|str_replace:"":$settingWeb.contact->tel2}"
                                                        class="link">{$settingWeb.contact->tel2}</a></span>

                                                {/if}
                                            </p>
                                        </div>
                                    </div>
                                {/if}
                                {if $settingWeb.contact->email4 neq ""}
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt="icon-email"
                                                class="icon" loading="lazy" width="37" height="37">
                                        </div>
                                        <div class="col">
                                            <p class="desc">
                                                <span class="d-block">{$languageFrontWeb->contact_desc->display->$currentLangWeb}</span>
                                                <span class="d-block">E-mail : <a href="mailto:{$settingWeb.contact->email4}"
                                                        class="link">{$settingWeb.contact->email4}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                {/if}
                            </div>
                        </div>
                        <div class="bg" data-aos="fade-left">
                            <source srcset="{$template}/assets/img/background/bg-wg-contact2.webp{$LastVersionCache}"
                                data-srcset="{$template}/assets/img/background/bg-wg-contact2.webp{$LastVersionCache}"
                                type="image/webp">
                            <img src="{$template}/assets/img/background/bg-wg-contact2.webp{$LastVersionCache}"
                                data-src="{$template}/assets/img/background/bg-wg-contact2.webp{$LastVersionCache}" loading="lazy" alt="background-contact"
                                class="lazy">
                            {* <picture>
                            </picture> *}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                <div class="guides-overlay-custom"></div>
</section>