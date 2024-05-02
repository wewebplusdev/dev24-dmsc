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
                <div class="col-md">
                    <div class="logo">
                        <div class="symbol">
                            <picture>
                                <source srcset="{$template}/assets/img/static/brand.webp" type="image/webp">
                                <img src="{$template}/assets/img/static/brand.png" alt="DMSC LOGO"
                                    class="lazy">
                            </picture>
                        </div>
                        <div class="txt">
                            <strong>{$languageFrontWeb->department->display->$currentLangWeb}<br> {$languageFrontWeb->ministry->display->$currentLangWeb} </strong><br>
                            <span>{$languageFrontWeb->departmenten->display->$currentLangWeb}<br> {$languageFrontWeb->ministryen->display->$currentLangWeb}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="action">
                        <div class="row row-20">
                            <div class="col-sm-auto col">
                                <a {if $array_intro[0]->url neq "" && $array_intro[0]->url neq "#"}href="{$array_intro[0]->url}" target="{$array_intro[0]->target}"{/if} class="btn btn-light -intro-action" title="{$array_intro[0]->title}" {if $array_intro[0]->title eq ""}style="display:none;"{/if}>{$array_intro[0]->title}</a>
                            </div>
                            <div class="col-sm-auto col">
                                <a href="{$ul}/home" class="btn btn-primary" title="{$languageFrontWeb->Enterwebsite->display->$currentLangWeb}">{$languageFrontWeb->Enterwebsite->display->$currentLangWeb}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>