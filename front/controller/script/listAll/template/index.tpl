<section class="layout-body">
  <div class="default-header">
    <div class="wrapper">
      <div class="container">
        <div class="breadcrumb-block">
          <ol class="breadcrumb">
            <li>
              <a href="{$ul}/home" class="link">
                <span class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15.856"
                    height="15.857" viewBox="0 0 15.856 15.857">
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
            <img src="{$template}/assets/img/uploads/obj-banner-about.png"
              alt="obj-banner-about" class="lazy img-cover">
          </div>
        </div>
      </div>
    </div>
    <figure class="cover">
      <img src="{$template}/assets/img/static/banner.jpg" alt=""
        class="lazy img-cover">
    </figure>
  </div>
  <div class="default-body">
    <div class="default-filter">
      <div class="container">
        <form action="{$ul}/{$menuActive}/{$masterkey}" method="GET" class="form-default" id="filter-form">
          <div class="head">
            <div class="row">
              {if $load_group->_numOfRows gte 1}
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
              {/if}
              <div class="col-md">
                <div class="form-group form-search mb-0">
                  <label class="control-label visually-hidden"
                    for="">{$languageFrontWeb->typesearch->display->$currentLangWeb}</label>
                  <div class="block-control">
                    <input class="form-control" type="search" name="keyword"
                      id="keyword" value="{$req.keyword}"
                      placeholder="{$languageFrontWeb->typesearch->display->$currentLangWeb}">
                    <div class="search">
                      <a href="javascript:void(0);" class="link" onclick="$('#filter-form').submit();">
                        <span class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="33.621"
                            height="33.621" viewBox="0 0 33.621 33.621">
                            <g id="Icon_feather-search"
                              data-name="Icon feather-search"
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
            </div>
          </div>
          <div class="body">
            <div class="row align-items-center">
              <div class="col-md mb-md-0 mb-2">
                <div class="whead my-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <h2 class="title">{$language_modules.breadcrumb2}</h2>
                    </div>
                    <div class="col-auto">
                      <div class="row no-gutters">
                        <div class="col-auto">
                          <a href="{$ul}/rss/{$masterkey}Feed{$req['gid']}.xml" class="link -rss" target="_blank">
                            <span class="icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24.998" viewBox="0 0 25 24.998">
                                <g id="Group_90676" data-name="Group 90676" transform="translate(0 -0.001)">
                                  <path id="Path_452560" data-name="Path 452560" d="M3.409,18.181a3.288,3.288,0,0,0-2.415.994A3.429,3.429,0,0,0,.994,24,3.288,3.288,0,0,0,3.409,25,3.288,3.288,0,0,0,5.823,24a3.429,3.429,0,0,0,0-4.829A3.287,3.287,0,0,0,3.409,18.181Z" fill="#ff7f00"/>
                                  <path id="Path_452561" data-name="Path 452561" d="M11.256,13.743a15.7,15.7,0,0,0-4.6-3.222A15.917,15.917,0,0,0,1.225,9.091H1.136a1.034,1.034,0,0,0-.763.3A1.046,1.046,0,0,0,0,10.227v2.4a1.092,1.092,0,0,0,.293.764,1.078,1.078,0,0,0,.737.355,11.043,11.043,0,0,1,6.95,3.276,11.041,11.041,0,0,1,3.276,6.95A1.11,1.11,0,0,0,12.374,25h2.4a1.046,1.046,0,0,0,.834-.373,1.077,1.077,0,0,0,.3-.852,15.926,15.926,0,0,0-1.429-5.432A15.7,15.7,0,0,0,11.256,13.743Z" fill="#ff7f00"/>
                                  <path id="Path_452562" data-name="Path 452562" d="M22.866,14.905a24.89,24.89,0,0,0-5.219-7.554,24.888,24.888,0,0,0-7.554-5.22A24.637,24.637,0,0,0,1.189,0H1.136a1.063,1.063,0,0,0-.781.32A1.05,1.05,0,0,0,0,1.138V3.676a1.087,1.087,0,0,0,.311.772,1.062,1.062,0,0,0,.754.346A20.115,20.115,0,0,1,8.317,6.606a20.411,20.411,0,0,1,5.965,4.11,20.411,20.411,0,0,1,4.11,5.965,19.846,19.846,0,0,1,1.793,7.252,1.064,1.064,0,0,0,.346.755,1.11,1.11,0,0,0,.79.311H23.86a1.049,1.049,0,0,0,.817-.355,1.027,1.027,0,0,0,.32-.834A24.634,24.634,0,0,0,22.866,14.905Z" fill="#ff7f00"/>
                                </g>
                              </svg>
                            </span>
                          </a>
                        </div>
                        <div class="col-auto">
                          <a href="{$ul}/json/{$masterkey}Feed{$req['gid']}.json" class="link -rss" target="_blank">
                            <span class="mt-1">{ JSON }</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-auto">
                <div class="form-group form-select mb-0">
                  <label class="control-label"
                    for="sort">{$languageFrontWeb->sort->display->$currentLangWeb}
                    :</label>
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
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="news-area">
      <div class="container">
        {if $loadData->_numOfRows gte 1}
          <div class="news-list">
            {foreach $loadData->item as $keyload_data => $valueload_data}
              {assign var="checkUrl" value="{$valueload_data->url|check_url}"}
              {assign var="target" value="_self"}
              {assign var="downloadID" value=""}
              {if $valueload_data->typec eq 2}
                {$downloadID = $valueload_data->attachment[0]->id}
              {/if}
              {if $checkUrl}
                {assign var="news_url" value="{$ul}/pageredirect/{$valueload_data->tb|page_redirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language:$downloadID}"}
                {$target = $valueload_data->target}
              {else}
                {assign var="news_url" value="javascript:void(0);"}
              {/if}
              <div class="item">
                <a href="{$news_url}" class="link news-link" target="{$target}">
                  <div class="news-card card">
                    <div class="thumbnail">
                      <figure class="cover">
                        <img src="{$valueload_data->pic->pictures}"
                          alt="{$valueload_data->pic->pictures}">
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
                        <span
                          class="material-symbols-rounded">expand_circle_right</span>
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
    {if $loadData->_numOfRows gte 1}
      {include file="inc/inc-pagination.tpl" title=title}
    {/if}
  </div>
</section>