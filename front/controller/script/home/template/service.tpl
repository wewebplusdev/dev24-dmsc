
{if $loadServices->_numOfRows gte 1}
    <div class="section section-i overflow-hidden" data-aos="fade-up">
        <div class="wg-services lazy" data-bg="{$template}/assets/img/background/bg-services.webp{$LastVersionCache}"
            data-bg-hidpi="{$template}/assets/img/background/bg-services.webp{$LastVersionCache}">
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
                                                                <img src="{$valueload_services_list->pic->webp}{$LastVersionCache}"
                                                                    alt="{$valueload_services_list->pic->webp}" class="thumb-img lazy" width="100" height="100">
                                                                <img src="{$valueload_services_list->pic2->webp}{$LastVersionCache}"
                                                                    alt="{$valueload_services_list->pic2->webp}" class="thumb-hover lazy" width="100" height="100">
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
