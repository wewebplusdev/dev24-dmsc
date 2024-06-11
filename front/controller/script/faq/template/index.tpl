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
            {* <li>
              <a href="#" class="link">
                คำถามที่พบบ่อย (FAQ)
              </a>
            </li> *}
          </ol>
        </div>
        <h1 class="title">
          {$language_modules.breadcrumb2}
        </h1>
        <div class="graphic">
          <div class="obj">
            <img src="{$template}/assets/img/uploads/inner2.png" alt="obj-banner-about"
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
        <form action="{$ul}/{$menuActive}" method="GET" class="form-default" id="filter-form">
          <div class="head">
            <div class="row">
              <div class="col-md">
                <div class="form-group form-search mb-0">
                  <label class="control-label visually-hidden"
                    for="keywordFaq">{$languageFrontWeb->typesearch->display->$currentLangWeb}</label>
                  <div class="block-control">
                    <input class="form-control" type="search" name="keywordFaq"
                      id="keywordFaq" value="{$req.keyword}"
                      placeholder="{$languageFrontWeb->typesearch->display->$currentLangWeb}">
                    <div class="search">
                      <a href="javascript:void(0);" class="link filter-form"  aria-label="link">
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
                  </div>
                </div>
              </div>
              <div class="col-md-auto">
                <div class="form-group form-select mb-0">
                  <label class="control-label"
                    for="sort">{$languageFrontWeb->sort->display->$currentLangWeb}
                    :</label>
                  <div class="select-wrapper">
                    <select class="select-filter" aria-label="select filter" name="sort" id="sort"
                      style="width: 100%;" >
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
    <div class="container">
      {if $loadData->_numOfRows gte 1}
        <div class="layout-faq" id="accordion">
          {foreach $loadData->item as $keyload_data => $valueload_data}
            <div class="card">
              <div class="card-header" id="heading{$keyload_data}">
                <a href="" class="link {if $keyload_data gte 1}collapsed{/if}" data-toggle="collapse" data-target="#collapse{$keyload_data}" aria-expanded="true"
                  aria-controls="collapse{$keyload_data}" aria-label="link">
                  <div class="row gutters-10 align-items-center">
                    <div class="col-auto">
                      {* <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="31.229"
                          height="31.229" viewBox="0 0 31.229 31.229">
                          <defs>
                            <clipPath id="clip-path">
                              <path id="path3592" d="M0-682.665H31.229v31.229H0Z" transform="translate(0 682.665)"
                                fill="#fff" />
                            </clipPath>
                          </defs>
                          <g id="g3590" clip-path="url(#clip-path)">
                            <g id="g3596" transform="translate(0.61 0.61)">
                              <path id="path3598"
                                d="M-490.329-55.018A15.01,15.01,0,0,0-509.44-53.26h0A15.008,15.008,0,0,0-510.9-33.735l-1.155,4.311,4.311-1.155A15.008,15.008,0,0,0-488.22-32.04h0a15.01,15.01,0,0,0,1.757-19.112"
                                transform="translate(513.835 57.655)" fill="none" stroke="#01377e" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" />
                            </g>
                            <g id="g3600" transform="translate(10.214 6.201)">
                              <path id="path3602"
                                d="M-27.731-114.492a1.308,1.308,0,0,1-1.265-1.7,5.472,5.472,0,0,1,1.432-2.263,5.462,5.462,0,0,1,4.059-1.517,5.467,5.467,0,0,1,3.6,1.638,5.467,5.467,0,0,1,1.638,3.6,5.518,5.518,0,0,1-3.026,5.177,2.075,2.075,0,0,0-1.161,1.855h0A1.308,1.308,0,0,1-23.76-106.4h-.005a1.308,1.308,0,0,1-1.308-1.308h0a4.683,4.683,0,0,1,2.6-4.2,2.893,2.893,0,0,0,1.586-2.715,3.014,3.014,0,0,0-2.742-2.742,2.862,2.862,0,0,0-2.129.795,2.867,2.867,0,0,0-.741,1.156A1.325,1.325,0,0,1-27.731-114.492Z"
                                transform="translate(29.06 119.981)" fill="none" stroke="#01377e" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" />
                            </g>
                            <g id="g3604" transform="translate(14.201 22.407)">
                              <path id="path3606"
                                d="M-54.672-27.336a1.31,1.31,0,0,1-1.31,1.31,1.31,1.31,0,0,1-1.31-1.31,1.31,1.31,0,0,1,1.31-1.31A1.31,1.31,0,0,1-54.672-27.336Z"
                                transform="translate(57.293 28.647)" fill="none" stroke="#01377e" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" />
                            </g>
                          </g>
                        </svg>
                      </div> *}
                      <div class="icon">
                        <img src="{$template}/assets/img/static/icon-faq-q.svg" alt="icon-faq-q">
                      </div>
                    </div>
                    <div class="col">
                      <div class="title">{$valueload_data->subject}</div>
                    </div>
                  </div>
                </a>
              </div>
              <div id="collapse{$keyload_data}" class="collapse {if $keyload_data eq 0}show{/if}" aria-labelledby="heading{$keyload_data}" data-parent="#accordion">
                <div class="card-body">
                  <div class="row gutters-10 align-items-start">
                    <div class="col-auto">
                      {* <div class="icon">
                        <svg id="Group_90476" data-name="Group 90476" xmlns="http://www.w3.org/2000/svg" width="30.002"
                          height="30.002" viewBox="0 0 30.002 30.002">
                          <path id="Path_452373" data-name="Path 452373"
                            d="M53.784,26H28.218A2.22,2.22,0,0,0,26,28.218V44.653a2.22,2.22,0,0,0,2.218,2.218h2.348v4.566a.652.652,0,0,0,1.06.509l6.344-5.075h6.293v6.522a2.609,2.609,0,1,0,5.218,0V46.871h4.3A2.22,2.22,0,0,0,56,44.653V28.218A2.22,2.22,0,0,0,53.784,26ZM45.566,42.958h2.609v9.131H45.566Zm.5-1.3.8-1.341.8,1.341Zm.8,13.044a1.306,1.306,0,0,1-1.3-1.3h2.609A1.306,1.306,0,0,1,46.871,54.7ZM54.7,44.653a.914.914,0,0,1-.913.913h-4.3c0-3.463,0-3.257-.005-3.341a.642.642,0,0,0-.083-.247c-.054-.092-1.219-2.032-1.961-3.269a.653.653,0,0,0-1.119,0c-.376.627-1.91,3.183-1.961,3.269a.642.642,0,0,0-.083.247c-.01.085,0-.114-.005,3.341H37.74a.652.652,0,0,0-.407.143l-5.463,4.37V46.219a.652.652,0,0,0-.652-.652h-3a.914.914,0,0,1-.913-.913V28.218a.914.914,0,0,1,.913-.913H53.784a.914.914,0,0,1,.913.913Z"
                            transform="translate(-26 -26)" fill="#ccc" />
                          <path id="Path_452374" data-name="Path 452374"
                            d="M107.523,86H86.652a.652.652,0,0,0,0,1.3h20.871a.652.652,0,1,0,0-1.3Z"
                            transform="translate(-82.087 -82.087)" fill="#ccc" />
                          <path id="Path_452375" data-name="Path 452375"
                            d="M107.523,146H86.652a.652.652,0,1,0,0,1.3h20.871a.652.652,0,1,0,0-1.3Z"
                            transform="translate(-82.087 -138.173)" fill="#ccc" />
                          <path id="Path_452376" data-name="Path 452376"
                            d="M99.044,206H86.652a.652.652,0,0,0,0,1.3H99.044a.652.652,0,1,0,0-1.3Z"
                            transform="translate(-82.087 -194.26)" fill="#ccc" />
                        </svg>
                      </div> *}
                      <div class="icon">
                        <img src="{$template}/assets/img/static/icon-faq-a.svg" alt="icon-faq-a">
                      </div>
                    </div>
                    <div class="col">
                      <div class="desc">
                        {strip}
                            {$valueload_data->html|txtReplaceHTML}
                        {/strip}
                      </div>
                    </div>
                  </div>

                  {if $valueload_data->attachment|gettype eq "array" && $valueload_data->attachment|count gte 1}
                    <div class="detail-body">
                      <div class="document-download-list">
                        <div class="whead mt-0">
                          <h2 class="title text-center">{$languageFrontWeb->docdownload->display->$currentLangWeb}</h2>
                        </div>
                        <div class="swiper">
                          <div class="swiper-wrapper">
                            {foreach $valueload_data->attachment as $keyattachment => $valueattachment}
                              {$fileinfo = $valueattachment->filename|fileinclude:'file':{$valueload_data->masterkey}|getIcon}
                              {assign var="download_url" value="{$ul}/pageredirect/{$valueload_data->tb|pageRedirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language:$valueattachment->id}"}
                              <div class="swiper-slide">
                                <div class="item">
                                  <div class="item-wrapper">
                                    <a href="{$download_url}" target="_blank" class="link">
                                      <div class="row gutters-20 aling-items-start">
                                        <div class="col-auto">
                                          <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="57.688" height="48.202" viewBox="0 0 57.688 48.202">
                                              <g id="download-3" transform="translate(-6.5 -48.832)">
                                                <path id="Path_451708" data-name="Path 451708" d="M10.726,125.151A3.225,3.225,0,0,1,7.5,121.925v-32.1a2.017,2.017,0,0,1,2.017-2.017H16.9" transform="translate(0 -33.724)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <line id="Line_8910" data-name="Line 8910" x1="21.759" transform="translate(19.836 91.427)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <path id="Path_451709" data-name="Path 451709" d="M41.478,189.617H36.29a3.26,3.26,0,0,0,3.217-3.275V162.429a2.017,2.017,0,0,1,2.017-2.017H79.637a2.017,2.017,0,0,1,2.017,2.017v8.682" transform="translate(-25.564 -98.19)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <path id="Path_451710" data-name="Path 451710" d="M111.291,344.116H101.207a1.12,1.12,0,0,1-1.12-1.12v-3.051a1.12,1.12,0,0,1,1.12-1.121h10.084a1.12,1.12,0,0,1,1.12,1.121V343A1.12,1.12,0,0,1,111.291,344.116Z" transform="translate(-82.213 -256.611)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <line id="Line_8911" data-name="Line 8911" x2="5.897" transform="translate(17.874 66.215)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <line id="Line_8912" data-name="Line 8912" x2="8.874" transform="translate(17.874 70.137)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <path id="Path_451711" data-name="Path 451711" d="M91.37,62.222V51.849a2.017,2.017,0,0,1,2.017-2.017h25.329" transform="translate(-74.472)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <path id="Path_451712" data-name="Path 451712" d="M370.42,49.832h2.954a2.017,2.017,0,0,1,2.017,2.017V62.222" transform="translate(-322.255)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <line id="Line_8913" data-name="Line 8913" x2="26.044" transform="translate(21.994 54.066)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <line id="Line_8914" data-name="Line 8914" x2="26.044" transform="translate(21.994 57.988)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <path id="Path_451713" data-name="Path 451713" d="M288.607,258.371a12.1,12.1,0,1,1,12.1,12.1A12.1,12.1,0,0,1,288.607,258.371Z" transform="translate(-249.609 -174.433)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <path id="Path_451714" data-name="Path 451714" d="M362.7,375.1v2.091a.9.9,0,0,1-.9.9H353.82a.9.9,0,0,1-.9-.9V375.1" transform="translate(-306.719 -288.822)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <line id="Line_8915" data-name="Line 8915" y2="6.161" transform="translate(51.093 78.612)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                                <path id="Path_451715" data-name="Path 451715" d="M374.3,343.128l2.195,1.963a.448.448,0,0,0,.6,0l2.195-1.963" transform="translate(-325.699 -260.432)" fill="none" stroke="#29b171" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                              </g>
                                            </svg>
                                          </span>
                                        </div>
                                        <div class="col">
                                          <div class="desc">
                                            {$valueattachment->name}
                                          </div>
                                          <div class="type-file">
                                            <ul class="item-list">
                                              <li>
                                                <strong>{$languageFrontWeb->filetype->display->$currentLangWeb} :</strong> <span>{$fileinfo.type}</span>
                                              </li>
                                              <li>
                                                <strong>{$languageFrontWeb->file_size->display->$currentLangWeb} :</strong> <span>{$valueattachment->filename|fileinclude:'file':{$valueload_data->masterkey}|getIconSize}</span>
                                              </li>
                                              <li>
                                                <strong>{$languageFrontWeb->docdownload->display->$currentLangWeb} :</strong> <span>{$valueattachment->download|number_format} {$languageFrontWeb->view2->display->$currentLangWeb}</span>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            {/foreach}
                          </div>
                          <div class="swiper-pagination"></div>
                        </div>
                      </div>
                    </div>
                  {/if}
                </div>
              </div>
            </div>
          {/foreach}
        </div>
      {/if}
    </div>
    {if $loadData->_numOfRows gte 1}
      {include file="inc/inc-pagination.tpl" title=title}
    {/if}
  </div>
</section>