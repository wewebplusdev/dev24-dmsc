<section class="layout-body">
    <div class="default-header">
        <div class="wrapper">
            <div class="container">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{$ul}/home" class="link">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.856" height="15.857"
                                        viewBox="0 0 15.856 15.857">
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
                                {$language_modules.breadcrumb2}
                            </a>
                        </li>
                        {* <li>
                            <a href="{$ul}/{$menuActive}/{$masterkey}" class="link">
                                {$language_modules.breadcrumb2}
                            </a>
                        </li> *}
                    </ol>
                </div>
                <h1 class="title">
                    {$language_modules.breadcrumb2}
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
    <div class="default-body">
        <div class="default-filter">
            <div class="container">
                <form action="{$ul}/{$menuActive}/{$masterkey}" method="GET" class="form-default">
                    <div class="row gutters-20 align-items-end">
                        <div class="col-md">
                            <div class="form-group form-search">
                                <label class="control-label visually-hidden" for="">กลุ่ม</label>
                                <div class="block-control">
                                    <input class="form-control" type="search" name="keyword" id="keyword" value="{$req.keyword}" placeholder="{$languageFrontWeb->typesearch->display->$currentLangWeb}">
                                    <div class="search">
                                        <a href="" class="link">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="33.621" height="33.621"
                                                    viewBox="0 0 33.621 33.621">
                                                    <g id="Icon_feather-search" data-name="Icon feather-search"
                                                        transform="translate(1.5 1.5)">
                                                        <path id="Path_41" data-name="Path 41"
                                                            d="M31.167,17.833A13.333,13.333,0,1,1,17.833,4.5,13.333,13.333,0,0,1,31.167,17.833Z"
                                                            transform="translate(-4.5 -4.5)" fill="none"
                                                            stroke="#29b171" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="3" />
                                                        <path id="Path_42" data-name="Path 42"
                                                            d="M32.225,32.225l-7.25-7.25"
                                                            transform="translate(-2.225 -2.225)" fill="none"
                                                            stroke="#29b171" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="3" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group form-select mb-0">
                                <label class="control-label" for="sort">{$languageFrontWeb->sort->display->$currentLangWeb} :</label>
                                <div class="select-wrapper">
                                    <select class="select-filter" name="sort" id="sort"
                                        style="width: 100%;" onchange="submit();">
                                        <option value="1" {if $req.sort == '1'} selected {/if}>{$languageFrontWeb->sort_desc->display->$currentLangWeb}</option>
                                        <option value="2" {if $req.sort == '2'} selected {/if}>{$languageFrontWeb->sort_asc->display->$currentLangWeb}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="news-area">
            <div class="container">
                {if $load_data->_numOfRows gte 1}
                    <div class="news-list">
                        {foreach $load_data->item as $keyload_data => $valueload_data}
                            {assign var="checkUrl" value="{$valueload_data->url|check_url}"}
                            {assign var="target" value="_self"}
                            {if $checkUrl}
                                {assign var="news_url" value="{$ul}/pageredirect/{$valueload_data->tb|page_redirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language}"}
                                {$target = $valueload_data->target}
                            {else}
                                {assign var="news_url" value="javascript:void(0);"}
                            {/if}
                            <div class="item">
                                <a href="{$news_url}" class="link news-link" target="{$target}">
                                    <div class="news-card card">
                                        <div class="thumbnail">
                                            <figure class="cover">
                                                <img src="{$valueload_data->pic->pictures}" alt="{$valueload_data->pic->pictures}">
                                            </figure>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="title">{$valueload_data->subject}
                                            </h5>
                                            <div class="line"></div>
                                            <p class="desc">
                                                {$valueload_data->title}
                                            </p>
                                            <div class="action">
                                                {$languageFrontWeb->readmore->display->$currentLangWeb}
                                                <span class="material-symbols-rounded">expand_circle_right</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        {/foreach}
                    </div>
                {/if}
            </div>
        </div>
        {if $load_data->_numOfRows gte 1}
            {include file="inc/inc-pagination.tpl" title=title}
        {/if}
    </div>
</section>