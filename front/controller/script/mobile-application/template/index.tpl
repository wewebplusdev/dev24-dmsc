<section class="layout-body">
  <div class="default-header">
    <div class="wrapper">
      <div class="container">
        <div class="breadcrumb-block">
          <ol class="breadcrumb">
            <li>
              <a href="{$ul}/home" class="link">
                <span class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15.856" height="15.857" viewBox="0 0 15.856 15.857">
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
        <h2 class="title">
          {$language_modules.breadcrumb2}
        </h2>
        <div class="graphic">
          <div class="obj">
            <img src="{$template}/assets/img/uploads/inner3.png" alt="image-inner" class="lazy img-cover">
          </div>
        </div>
      </div>
    </div>
    <figure class="cover">
      <img src="{$template}/assets/img/static/banner.jpg" alt="background-banner" class="lazy img-cover">
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
                  <label class="control-label visually-hidden"
                    for="gid">{$languageFrontWeb->selectgroup->display->$currentLangWeb}{$language_modules.breadcrumb2}</label>
                  <div class="select-wrapper">
                    <select class="select-filter" name="gid" id="gid" style="width: 100%;" onchange="submit();">
                      <option value="">
                        {$languageFrontWeb->selectgroup->display->$currentLangWeb}{$language_modules.breadcrumb2}
                      </option>
                      {foreach $load_group->item as $keyload_group => $valueload_group}
                        <option value="{$valueload_group->id}" {if $req.gid eq $valueload_group->id}selected{/if}>
                          {$valueload_group->subject}</option>
                      {/foreach}
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group form-search mb-0">
                  <label class="control-label visually-hidden"
                    for="keyword">{$languageFrontWeb->typesearch->display->$currentLangWeb}</label>
                  <div class="block-control">
                    <input class="form-control" type="search" name="keyword" id="keyword" value="{$req.keyword}"
                      placeholder="{$languageFrontWeb->typesearch->display->$currentLangWeb}">
                    <div class="search">
                      <a href="javascript:void(0);" class="link" onclick="$('#filter-form').submit();">
                        <span class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="33.621" height="33.621"
                            viewBox="0 0 33.621 33.621">
                            <g id="Icon_feather-search" data-name="Icon feather-search" transform="translate(1.5 1.5)">
                              <path id="Path_41" data-name="Path 41"
                                d="M31.167,17.833A13.333,13.333,0,1,1,17.833,4.5,13.333,13.333,0,0,1,31.167,17.833Z"
                                transform="translate(-4.5 -4.5)" fill="none" stroke="#29b171" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="3" />
                              <path id="Path_42" data-name="Path 42" d="M32.225,32.225l-7.25-7.25"
                                transform="translate(-2.225 -2.225)" fill="none" stroke="#29b171" stroke-linecap="round"
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
                      <input type="text" name="selectFilter" id="selectFilter" class="d-none">
                      <div class="select-wrapper">
                        <select class="select-filter" name="sort" id="sort" style="width: 100%;" onchange="submit();">
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
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
      {if $loadData->_numOfRows gte 1}
        <div class="document-download-list -layout-grid" id="download-list">
          {foreach $loadData->item as $keyload_data => $valueload_data}
            {assign var="checkUrl" value="{$valueload_data->url|checkUrl}"}
            {assign var="checkUrl2" value="{$valueload_data->url2|checkUrl}"}
            {assign var="target" value="_self"}
            {assign var="target2" value="_self"}
            {assign var="downloadID" value=""}
            {if $valueload_data->typec eq 2}
              {$downloadID = $valueload_data->attachment[0]->id}
            {/if}
            {if $checkUrl}
              {assign var="news_url" value="{$ul}/pageredirect/{$valueload_data->tb|pageRedirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language:$downloadID}"}
              {$target = $valueload_data->target}
            {else}
              {assign var="news_url" value="javascript:void(0);"}
            {/if}
            {if $checkUrl2}
              {assign var="news_url2" value="{$ul}/pageredirect/{$valueload_data->tb|pageRedirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language:$downloadID}|{'urlc2'|encodeStr}"}
              {$target2 = $valueload_data->target}
            {else}
              {assign var="news_url2" value="javascript:void(0);"}
            {/if}
            <div class="item">
              <div class="item-wrapper">
                <div class="row no-gutters align-items-center">
                  <div class="col-12 col-thumb">
                    <div class="thumbnail">
                      <figure class="cover">
                        <img src="{$valueload_data->pic->pictures}" alt="" class="{$valueload_data->pic->pictures}">
                      </figure>
                    </div>
                  </div>
                  <div class="col">
                    <div class="content">
                      <div class="head">
                        <div class="title">{$valueload_data->subject}</div>
                      </div>
                      <div class="action">
                        <div class="d-flex align-items-center">
                          <a href="{$news_url}" class="link -web-link" target="{$target}">
                            <div class="d-flex align-items-center">
                              <span class="icon mr-2">
                              <img src="{$template}/assets/img/static/readmore.png" alt="image-readmore-link">
                              </span>
                              <div class="txt fw-bold">{$languageFrontWeb->linkandroid->display->$currentLangWeb}</div>
                            </div>
                          </a>
                          <a href="{$news_url2}" class="link -web-link" target="{$target2}">
                            <div class="d-flex align-items-center">
                              <span class="icon mr-2">
                              <img src="{$template}/assets/img/static/readmore.png" alt="image-readmore-link">
                              </span>
                              <div class="txt fw-bold">{$languageFrontWeb->linkios->display->$currentLangWeb}</div>
                            </div>
                          </a>
                        </div>
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