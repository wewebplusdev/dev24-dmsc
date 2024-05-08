<div class="intro-page">
    <div class="intro-slider">
        <div class="swiper swiper-default">
            <div class="swiper-wrapper">
                {foreach $array_intro as $keyarray_intro => $valuearray_intro}
                    {if $valuearray_intro->type eq 1}
                        <div class="swiper-slide intro-event" data-title="{$valuearray_intro->title}" data-url="{$valuearray_intro->url}" data-target="{$valuearray_intro->target}">
                            <div class="item" data-media="image">
                                <figure class="cover">
                                    <img src="{$valuearray_intro->pic->real}" alt="{$valuearray_intro->pic->pictures}">
                                </figure>
                            </div>
                        </div>
                    {elseif $valuearray_intro->type eq 2}
                        <div class="swiper-slide intro-event" data-title="{$valuearray_intro->title}" data-url="{$valuearray_intro->url}" data-target="{$valuearray_intro->target}">
                            <div class="item" data-media="video">
                                {$myUrlArray = "v="|explode:$valuearray_intro->video}
                                {$myUrlCut = $myUrlArray[1]}
                                {$myUrlCutArray = "&"|explode:$myUrlCut}
                                {$myUrlCutAnd= $myUrlCutArray.0}
                                  <div class="iframe-container" data-aos="fade-up">
                                      <iframe src="https://www.youtube.com/embed/{$myUrlCutAnd}" allow="autoplay" frameborder="0"></iframe>
                                  </div>
                            </div>
                        </div>
                    {else}
                        <div class="swiper-slide intro-event" data-title="{$valuearray_intro->title}" data-url="{$valuearray_intro->url}" data-target="{$valuearray_intro->target}">
                            <div class="item" data-media="video">
                                <div class="video-container">
                                    <video class="slide-video slide-media" loop muted autoplay style="pointer-events: none;">
                                        <source src="{$valuearray_intro->video->real}"
                                            type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    {/if}
                {/foreach}
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="intro-content">
        <div class="intro-content-wrapper">
            <div class="row row-0 height">
            <div class="col-lg-auto  order-lg-2">
                <div class="action">
                    <div class="row row-20 justify-content-center ">
                        <div class="col">
                            <a href="{$ul}/home" class="btn btn-primary" title="{$languageFrontWeb->Enterwebsite->display->$currentLangWeb}">{$languageFrontWeb->Enterwebsite->display->$currentLangWeb}</a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg order-lg-1">
                    <div class="logo row justify-content-center">
                        <div class="symbol col-lg-auto">
                            <picture>
                                <source srcset="{$template}/assets/img/static/brand.webp" type="image/webp">
                                <img src="{$template}/assets/img/static/brand.png" alt="DMSC LOGO"
                                    class="lazy">
                            </picture>
                        </div>
                        <div class="txt col-lg">
                            <strong>{$languageFrontWeb->department->display->$currentLangWeb}<br> {$languageFrontWeb->ministry->display->$currentLangWeb} </strong><br>
                            <span>{$languageFrontWeb->departmenten->display->$currentLangWeb}<br> {$languageFrontWeb->ministryen->display->$currentLangWeb}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>