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
                <form action="{$ul}/{$menuActive}/{$masterkey}" method="GET" class="form-default" id="filter-form">
                    <div class="head">
                        <div class="row">
                            <div class="col-md-auto mb-md-0 mb-2">
                                <div class="form-group form-select -select-group mb-0">
                                <label class="control-label visually-hidden" for="gid">{$languageFrontWeb->selectgroup->display->$currentLangWeb}{$language_modules.breadcrumb2}</label>
                                <div class="select-wrapper">
                                    <select class="select-filter" name="gid" id="gid" style="width: 100%;" onchange="submit();">
                                    <option value="">{$languageFrontWeb->selectgroup->display->$currentLangWeb}{$language_modules.breadcrumb2}</option>
                                    {foreach $load_group->item as $keyload_group => $valueload_group}
                                        <option value="{$valueload_group->id}" {if $req.gid eq $valueload_group->id}selected{/if}>{$valueload_group->subject}</option>
                                    {/foreach}
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group form-search mb-0">
                                    <label class="control-label visually-hidden" for="">{$languageFrontWeb->typesearch->display->$currentLangWeb}</label>
                                    <div class="block-control">
                                        <input class="form-control" type="search" name="keyword" id="keyword" value="{$req.keyword}" placeholder="{$languageFrontWeb->typesearch->display->$currentLangWeb}">
                                        <div class="search">
                                            <a href="javascript:void(0);" class="link" onclick="$('#filter-form').submit();">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="33.621" height="33.621"
                                                        viewBox="0 0 33.621 33.621">
                                                        <g id="Icon_feather-search" data-name="Icon feather-search"
                                                            transform="translate(1.5 1.5)">
                                                            <path id="Path_41" data-name="Path 41"
                                                                d="M31.167,17.833A13.333,13.333,0,1,1,17.833,4.5,13.333,13.333,0,0,1,31.167,17.833Z"
                                                                transform="translate(-4.5 -4.5)" fill="none" stroke="#29b171"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="3" />
                                                            <path id="Path_42" data-name="Path 42" d="M32.225,32.225l-7.25-7.25"
                                                                transform="translate(-2.225 -2.225)" fill="none"
                                                                stroke="#29b171" stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row align-items-center">
                            <div class="col-md mb-md-0 mb-3">
                                <div class="whead my-0">
                                    <div class="title">{$language_modules.breadcrumb2}</div>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row gutters-20">
                                    <div class="col-md col-12">
                                        <div class="form-group form-select mb-0">
                                            <label class="control-label" for="selectFilter">{$languageFrontWeb->sort->display->$currentLangWeb} :</label>
                                            <div class="select-wrapper">
                                                <select class="select-filter" name="sort" id="sort"
                                                    style="width: 100%;" onchange="submit();">
                                                    <option value="1" {if $req.sort == '1'} selected {/if}>
                                                    {$languageFrontWeb->sort_desc->display->$currentLangWeb}
                                                    </option>
                                                    <option value="2" {if $req.sort == '2'} selected {/if}>
                                                    {$languageFrontWeb->sort_asc->display->$currentLangWeb}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto ml-auto">
                                        <div class="layout-view layout-grid">
                                            <div class="btn-group">
                                                <button type="button" class="btn-grid">
                                                    <span class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="30"
                                                            height="30" viewBox="0 0 30 30">
                                                            <defs>
                                                                <clipPath id="clip-path">
                                                                    <rect id="Rectangle_17247"
                                                                        data-name="Rectangle 17247" width="30"
                                                                        height="30" transform="translate(1500 722)"
                                                                        fill="#2ab170" />
                                                                </clipPath>
                                                            </defs>
                                                            <g id="Mask_Group_395" data-name="Mask Group 395"
                                                                transform="translate(-1500 -722)"
                                                                clip-path="url(#clip-path)">
                                                                <g id="grid" transform="translate(1500.217 722)">
                                                                    <g id="Group_90690" data-name="Group 90690"
                                                                        transform="translate(0)">
                                                                        <g id="Group_90689" data-name="Group 90689">
                                                                            <path id="Path_452567"
                                                                                data-name="Path 452567"
                                                                                d="M8.043,0H1.087a.87.87,0,0,0-.87.87V7.826a.87.87,0,0,0,.87.87H8.043a.87.87,0,0,0,.87-.87V.87A.87.87,0,0,0,8.043,0Z"
                                                                                transform="translate(-0.217)"
                                                                                fill="#2ab170" />
                                                                            <path id="Path_452568"
                                                                                data-name="Path 452568"
                                                                                d="M18.478,0H11.522a.87.87,0,0,0-.87.87V7.826a.87.87,0,0,0,.87.87h6.957a.87.87,0,0,0,.87-.87V.87A.87.87,0,0,0,18.478,0Z"
                                                                                transform="translate(-0.217)"
                                                                                fill="#2ab170" />
                                                                            <path id="Path_452569"
                                                                                data-name="Path 452569"
                                                                                d="M8.043,10.435H1.087a.87.87,0,0,0-.87.87v6.957a.87.87,0,0,0,.87.87H8.043a.87.87,0,0,0,.87-.87V11.3A.87.87,0,0,0,8.043,10.435Z"
                                                                                transform="translate(-0.217 0)"
                                                                                fill="#2ab170" />
                                                                            <path id="Path_452570"
                                                                                data-name="Path 452570"
                                                                                d="M18.478,10.435H11.522a.87.87,0,0,0-.87.87v6.957a.87.87,0,0,0,.87.87h6.957a.87.87,0,0,0,.87-.87V11.3A.87.87,0,0,0,18.478,10.435Z"
                                                                                transform="translate(-0.217 0)"
                                                                                fill="#2ab170" />
                                                                            <path id="Path_452571"
                                                                                data-name="Path 452571"
                                                                                d="M28.913,0H21.957a.87.87,0,0,0-.87.87V7.826a.87.87,0,0,0,.87.87h6.957a.87.87,0,0,0,.87-.87V.87A.87.87,0,0,0,28.913,0Z"
                                                                                transform="translate(-0.217)"
                                                                                fill="#2ab170" />
                                                                            <path id="Path_452572"
                                                                                data-name="Path 452572"
                                                                                d="M28.913,10.435H21.957a.87.87,0,0,0-.87.87v6.957a.87.87,0,0,0,.87.87h6.957a.87.87,0,0,0,.87-.87V11.3A.87.87,0,0,0,28.913,10.435Z"
                                                                                transform="translate(-0.217 0)"
                                                                                fill="#2ab170" />
                                                                            <path id="Path_452573"
                                                                                data-name="Path 452573"
                                                                                d="M8.043,21.3H1.087a.87.87,0,0,0-.87.87V29.13a.87.87,0,0,0,.87.87H8.043a.87.87,0,0,0,.87-.87V22.174A.87.87,0,0,0,8.043,21.3Z"
                                                                                transform="translate(-0.217 0)"
                                                                                fill="#2ab170" />
                                                                            <path id="Path_452574"
                                                                                data-name="Path 452574"
                                                                                d="M18.478,21.3H11.522a.87.87,0,0,0-.87.87V29.13a.87.87,0,0,0,.87.87h6.957a.87.87,0,0,0,.87-.87V22.174A.87.87,0,0,0,18.478,21.3Z"
                                                                                transform="translate(-0.217 0)"
                                                                                fill="#2ab170" />
                                                                            <path id="Path_452575"
                                                                                data-name="Path 452575"
                                                                                d="M28.913,21.3H21.957a.87.87,0,0,0-.87.87V29.13a.87.87,0,0,0,.87.87h6.957a.87.87,0,0,0,.87-.87V22.174A.87.87,0,0,0,28.913,21.3Z"
                                                                                transform="translate(-0.217 0)"
                                                                                fill="#2ab170" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn-list">
                                                    <span class="icon">
                                                        <svg id="view-list" xmlns="http://www.w3.org/2000/svg"
                                                            width="30" height="24.706" viewBox="0 0 30 24.706">
                                                            <path id="Path_452576" data-name="Path 452576"
                                                                d="M0,20.294H7.059V13.235H0Zm0,8.824H7.059V22.059H0ZM0,11.471H7.059V4.412H0Zm8.824,8.824H30V13.235H8.824Zm0,8.824H30V22.059H8.824Zm0-24.706v7.059H30V4.412Z"
                                                                transform="translate(0 -4.412)" fill="#2ab170" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            {if $load_data->_numOfRows gte 1}
                <div class="document-download-list -layout-grid" id="download-list">
                    {foreach $load_data->item as $keyload_data => $valueload_data}
                        {assign var="checkUrl" value="{$valueload_data->url|check_url}"}
                        {assign var="target" value="_self"}
                        {assign var="downloadID" value=""}
                        {if $valueload_data->typec eq 2}
                            {$downloadID = $valueload_data->attachment[0]->id}
                            {$fileinfo = $valueload_data->attachment[0]->filename|fileinclude:'file':{$valueload_data->masterkey}|get_Icon}
                        {/if}
                        {if $checkUrl}
                            {assign var="news_url" value="{$ul}/pageredirect/{$valueload_data->tb|page_redirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language:$downloadID}"}
                            {$target = $valueload_data->target}
                        {else}
                            {assign var="news_url" value="javascript:void(0);"}
                        {/if}
                        <div class="item">
                            <div class="item-wrapper">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 col-thumb">
                                        <div class="thumbnail">
                                            <figure class="cover">
                                                <img src="{$valueload_data->pic->pictures}"
                                                    alt="{$valueload_data->pic->pictures}" class="img-cover">
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="content">
                                            <div class="row align-items-center">
                                                <div class="col col-head">
                                                    <div class="head">
                                                        <div class="title">{$valueload_data->subject}</div>
                                                        <div class="date">{$valueload_data->createDate->style}</div>
                                                    </div>
                                                    {if $valueload_data->typec eq 2}
                                                        <div class="box">
                                                            <ul class="item-list">
                                                                <li>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.234"
                                                                                height="20" viewBox="0 0 15.234 20">
                                                                                <g id="document-3" transform="translate(-2.383)">
                                                                                    <path id="Path_452390" data-name="Path 452390"
                                                                                        d="M16.945,4.151,13.179.588A2.14,2.14,0,0,0,11.7,0H4.531A2.151,2.151,0,0,0,2.383,2.148v15.7A2.151,2.151,0,0,0,4.531,20H15.469a2.151,2.151,0,0,0,2.148-2.148V5.712A2.157,2.157,0,0,0,16.945,4.151Zm-1.138.536H12.891a.2.2,0,0,1-.2-.2V1.744Zm-.338,14.141H4.531a.978.978,0,0,1-.977-.977V2.148a.978.978,0,0,1,.977-.977h6.992v3.32a1.369,1.369,0,0,0,1.367,1.367h3.555V17.852A.978.978,0,0,1,15.469,18.828Z"
                                                                                        fill="#2ab170" />
                                                                                    <path id="Path_452391" data-name="Path 452391"
                                                                                        d="M14.18,7.813H5.586a.586.586,0,0,0,0,1.172H14.18a.586.586,0,0,0,0-1.172Z"
                                                                                        fill="#2ab170" />
                                                                                    <path id="Path_452392" data-name="Path 452392"
                                                                                        d="M14.18,10.938H5.586a.586.586,0,0,0,0,1.172H14.18a.586.586,0,0,0,0-1.172Z"
                                                                                        fill="#2ab170" />
                                                                                    <path id="Path_452393" data-name="Path 452393"
                                                                                        d="M8.427,14.063H5.586a.586.586,0,0,0,0,1.172H8.427a.586.586,0,0,0,0-1.172Z"
                                                                                        fill="#2ab170" />
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                        <div class="txt"><strong>{$languageFrontWeb->filetype->display->$currentLangWeb} :</strong> {$fileinfo.type}</div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="16.727" viewBox="0 0 20 16.727">
                                                                                <path id="folder"
                                                                                    d="M19.777,7.342a1.323,1.323,0,0,0-1.1-.53H16.91V4.895a1.341,1.341,0,0,0-1.34-1.34H9.391a1.253,1.253,0,0,1-.828-.42L8.1,2.5a2.307,2.307,0,0,0-1.705-.866H4.253A1.74,1.74,0,0,0,2.679,2.75l-.147.417a.674.674,0,0,1-.55.389H1.34A1.341,1.341,0,0,0,0,4.895v12.1a.54.54,0,0,0,.032.182,1.223,1.223,0,0,0,.221.656,1.323,1.323,0,0,0,1.1.53H15.009a2.191,2.191,0,0,0,1.958-1.389L19.913,8.56A1.323,1.323,0,0,0,19.777,7.342ZM1.34,4.641h.642A1.74,1.74,0,0,0,3.556,3.528L3.7,3.112a.675.675,0,0,1,.55-.389H6.395a1.253,1.253,0,0,1,.828.42l.462.633a2.306,2.306,0,0,0,1.705.866H15.57a.257.257,0,0,1,.253.253V6.812H5.022A2.191,2.191,0,0,0,3.064,8.2L1.086,13.849V4.895A.257.257,0,0,1,1.34,4.641ZM18.887,8.2l-2.946,8.415a1.106,1.106,0,0,1-.933.662H1.358a.273.273,0,0,1-.219-.072.273.273,0,0,1,0-.23L4.089,8.56A1.106,1.106,0,0,1,5.022,7.9H18.673a.274.274,0,0,1,.219.072A.274.274,0,0,1,18.887,8.2Z"
                                                                                    transform="translate(0 -1.636)"
                                                                                    fill="#2ab170" />
                                                                            </svg>
                                                                        </span>
                                                                        <div class="txt"><strong>{$languageFrontWeb->file_size->display->$currentLangWeb} :</strong> {$valueload_data->attachment[0]->filename|fileinclude:'file':{$valueload_data->masterkey}|get_IconSize}</div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="18.75" viewBox="0 0 20 18.75">
                                                                                <path id="Download"
                                                                                    d="M20,10.156a4.38,4.38,0,0,1-4.375,4.375H12.5a.625.625,0,0,1,0-1.25h3.125a3.125,3.125,0,0,0,0-6.25H15a.625.625,0,0,1-.625-.625,4.375,4.375,0,0,0-8.75,0A.625.625,0,0,1,5,7.031H4.375a3.125,3.125,0,0,0,0,6.25H7.5a.625.625,0,0,1,0,1.25H4.375a4.375,4.375,0,0,1,0-8.75H4.41a5.625,5.625,0,0,1,11.18,0h.035A4.38,4.38,0,0,1,20,10.156Zm-7.942,5.808L10.625,17.4V9.531a.625.625,0,0,0-1.25,0V17.4L7.942,15.964a.625.625,0,1,0-.884.884l2.5,2.5a.625.625,0,0,0,.884,0l2.5-2.5a.625.625,0,1,0-.884-.884Z"
                                                                                    transform="translate(0 -0.781)"
                                                                                    fill="#2ab170" />
                                                                            </svg>
                                                                        </span>
                                                                        <div class="txt"><strong>{$languageFrontWeb->docdownload->display->$currentLangWeb} :</strong> {$valueload_data->attachment[0]->download|number_format} {$languageFrontWeb->view2->display->$currentLangWeb}
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    {/if}
                                                </div>
                                                {if $valueload_data->typec eq 2}
                                                    <div class="col-auto">
                                                        <a href="{$news_url}" target="{$target}" class="link">
                                                            <div class="d-flex align-items-center">
                                                                <span class="icon mr-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="18.947" height="20"
                                                                        viewBox="0 0 18.947 20">
                                                                        <g id="download-2"
                                                                            transform="translate(-3.828 -3.158)">
                                                                            <path id="Path_452394"
                                                                                data-name="Path 452394"
                                                                                d="M4.881,16.842a1.053,1.053,0,0,1,1.053,1.053V20a1.053,1.053,0,0,0,.308.744h0a1.053,1.053,0,0,0,.744.308H19.618A1.053,1.053,0,0,0,20.67,20V17.895a1.053,1.053,0,0,1,2.105,0V20a3.158,3.158,0,0,1-3.158,3.158H6.986A3.158,3.158,0,0,1,3.828,20V17.895a1.053,1.053,0,0,1,1.053-1.053Z"
                                                                                fill="#2ab170" fill-rule="evenodd" />
                                                                            <path id="Path_452395"
                                                                                data-name="Path 452395"
                                                                                d="M7.294,10.835a1.053,1.053,0,0,1,1.489,0L13.3,15.353l4.519-4.519a1.053,1.053,0,0,1,1.489,1.489l-5.263,5.263a1.053,1.053,0,0,1-1.489,0L7.294,12.323A1.053,1.053,0,0,1,7.294,10.835Z"
                                                                                fill="#2ab170" fill-rule="evenodd" />
                                                                            <path id="Path_452396"
                                                                                data-name="Path 452396"
                                                                                d="M13.3,3.158a1.053,1.053,0,0,1,1.053,1.053V16.842a1.053,1.053,0,0,1-2.105,0V4.211A1.053,1.053,0,0,1,13.3,3.158Z"
                                                                                fill="#2ab170" fill-rule="evenodd" />
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                <div class="txt text-primary  fw-bold">{$languageFrontWeb->downloads->display->$currentLangWeb}</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                {else}
                                                    <div class="col-xl-auto col-12">
                                                        <div class="action">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <a href="{$news_url}" target="{$target}" class="link -read-more">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="icon mr-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                    height="20" viewBox="0 0 20 20">
                                                                                    <g id="ARROW_48" data-name="ARROW 48"
                                                                                        transform="translate(-0.006)">
                                                                                        <path id="Path_452117"
                                                                                            data-name="Path 452117"
                                                                                            d="M19.062,10.662a.938.938,0,0,0-.938.938v3.775a2.753,2.753,0,0,1-2.75,2.75H4.632a2.753,2.753,0,0,1-2.75-2.75V4.632a2.753,2.753,0,0,1,2.75-2.75H8.407a.938.938,0,0,0,0-1.876H4.632A4.631,4.631,0,0,0,.006,4.632V15.374A4.631,4.631,0,0,0,4.632,20H15.374A4.631,4.631,0,0,0,20,15.374V11.6a.938.938,0,0,0-.938-.938Z"
                                                                                            fill="#2ab170" />
                                                                                        <path id="Path_452118"
                                                                                            data-name="Path 452118"
                                                                                            d="M19.042,0h-5.83a.938.938,0,0,0-.938.92.955.955,0,0,0,.959.956H16.8L9.333,9.347a.938.938,0,0,0,1.326,1.326L18.131,3.2V6.786a.938.938,0,1,0,1.876,0V.964A.964.964,0,0,0,19.042,0Z"
                                                                                            fill="#2ab170" />
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                            <div class="txt text-primary fw-bold">{$languageFrontWeb->readmore->display->$currentLangWeb}</div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            {/if}
        </div>
        {if $load_data->_numOfRows gte 1}
            {include file="inc/inc-pagination.tpl" title=title}
        {/if}
    </div>
</section>