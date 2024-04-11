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
                        <li>
                            <a href="{$ul}/{$menuActive}/{$load_data->item[0]->id}/{$load_data->item[0]->masterkey}/{$load_data->item[0]->gid}" class="link">
                                {$load_data->item[0]->subject}
                            </a>
                        </li>
                    </ol>
                </div>
                <h1 class="title">
                    {$language_modules.breadcrumb2}
                </h1>
                <div class="graphic">
                    <div class="obj">
                        <img src="{$template}/assets/img/uploads/obj-banner-about.png" alt="obj-banner-about.png"
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
        <div class="detail-body">
            <div class="default-bar">
                <div class="container">
                    <div class="topbar">
                        <div class="whead">
                            <h2 class="title">{$load_data->item[0]->subject}</h2>
                        </div>
                    </div>
                    <div class="middle-bar">
                        <div class="row align-items-center">
                            <div class="col-md mb-md-0 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="box">
                                            <strong>โดย :</strong> <span>รัฐฐา ธนันท์พรพงษ์</span>
                                        </div>
                                    </div>
                                    <div class="col-auto pl-sm-2">
                                        <div class="row gutters-20">
                                            <div class="col-auto">
                                                <div class="box">
                                                    <span class="icon pr-xl-2 pr-lg1">
                                                        <svg id="view-2" xmlns="http://www.w3.org/2000/svg" width="25"
                                                            height="15.934" viewBox="0 0 25 15.934">
                                                            <g id="Group_90612" data-name="Group 90612">
                                                                <g id="Group_90611" data-name="Group 90611">
                                                                    <path id="Path_452477" data-name="Path 452477"
                                                                        d="M24.841,11.107C24.618,10.8,19.3,3.626,12.5,3.626S.382,10.8.159,11.107a.825.825,0,0,0,0,.973C.382,12.385,5.7,19.56,12.5,19.56s12.118-7.175,12.341-7.481A.824.824,0,0,0,24.841,11.107ZM12.5,17.912c-5.006,0-9.342-4.762-10.626-6.319C3.156,10.035,7.483,5.275,12.5,5.275s9.342,4.762,10.626,6.319C21.844,13.152,17.517,17.912,12.5,17.912Z"
                                                                        transform="translate(0 -3.626)"
                                                                        fill="#2ab170" />
                                                                </g>
                                                            </g>
                                                            <g id="Group_90614" data-name="Group 90614"
                                                                transform="translate(7.555 3.022)">
                                                                <g id="Group_90613" data-name="Group 90613">
                                                                    <path id="Path_452478" data-name="Path 452478"
                                                                        d="M10.989,6.044a4.945,4.945,0,1,0,4.945,4.945A4.951,4.951,0,0,0,10.989,6.044Zm0,8.242a3.3,3.3,0,1,1,3.3-3.3A3.3,3.3,0,0,1,10.989,14.286Z"
                                                                        transform="translate(-6.044 -6.044)"
                                                                        fill="#2ab170" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span>{$load_data->item[0]->view|number_format}</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="box">
                                                    <span class="icon pr-xl-2 pr-lg1">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                            height="20" viewBox="0 0 20 20">
                                                            <defs>
                                                                <clipPath id="clip-path">
                                                                    <rect id="Rectangle_17161"
                                                                        data-name="Rectangle 17161" width="20"
                                                                        height="20" transform="translate(665 666)"
                                                                        fill="#2ab170" />
                                                                </clipPath>
                                                            </defs>
                                                            <g id="Mask_Group_372" data-name="Mask Group 372"
                                                                transform="translate(-665 -666)"
                                                                clip-path="url(#clip-path)">
                                                                <g id="calendar-2" transform="translate(665 666)">
                                                                    <path id="Path_452479" data-name="Path 452479"
                                                                        d="M16.139,1.54h-.746V.785a.781.781,0,1,0-1.562,0V1.54H6.169V.785a.781.781,0,1,0-1.562,0V1.54H3.861A3.866,3.866,0,0,0,0,5.4V16.134A3.866,3.866,0,0,0,3.861,20H16.139A3.866,3.866,0,0,0,20,16.134V5.4A3.866,3.866,0,0,0,16.139,1.54ZM3.861,3.1h.746V4.625a.781.781,0,0,0,1.562,0V3.1h7.662V4.625a.781.781,0,1,0,1.562,0V3.1h.746a2.3,2.3,0,0,1,2.3,2.3v.746H1.562V5.4a2.3,2.3,0,0,1,2.3-2.3ZM16.139,18.434H3.861a2.3,2.3,0,0,1-2.3-2.3V7.709H18.438v8.425A2.3,2.3,0,0,1,16.139,18.434Zm-9.2-7.653a.781.781,0,0,1-.781.781H4.62A.781.781,0,0,1,4.62,10H6.156A.781.781,0,0,1,6.937,10.781Zm9.224,0a.781.781,0,0,1-.781.781H13.844a.781.781,0,1,1,0-1.562H15.38A.781.781,0,0,1,16.161,10.781Zm-4.616,0a.781.781,0,0,1-.781.781H9.228a.781.781,0,1,1,0-1.562h1.536A.781.781,0,0,1,11.544,10.781ZM6.937,15.388a.781.781,0,0,1-.781.781H4.62a.781.781,0,1,1,0-1.562H6.156A.781.781,0,0,1,6.937,15.388Zm9.224,0a.781.781,0,0,1-.781.781H13.844a.781.781,0,1,1,0-1.562H15.38A.781.781,0,0,1,16.161,15.388Zm-4.616,0a.781.781,0,0,1-.781.781H9.228a.781.781,0,0,1,0-1.562h1.536A.781.781,0,0,1,11.544,15.388Z"
                                                                        fill="#2ab170" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span>{$load_data->item[0]->createDate->style}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="box">
                                    <div class="social-list">
                                        <strong>Share : </strong>
                                        <ul class="item-list">
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={$fullurl}" class="link" title="facebook" target="_blank">
                                                    <span class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="11.352"
                                                            height="20" viewBox="0 0 11.352 20">
                                                            <path id="facebook"
                                                                d="M7.036,20h-3.2a.971.971,0,0,1-.97-.97V11.806H.995a.971.971,0,0,1-.97-.97V7.74a.971.971,0,0,1,.97-.97H2.863V5.22a5.278,5.278,0,0,1,1.4-3.781A5.027,5.027,0,0,1,7.965,0l2.443,0a.972.972,0,0,1,.968.97V3.848a.971.971,0,0,1-.97.97H8.762c-.5,0-.629.1-.657.131-.045.051-.1.2-.1.595V6.77h2.276a.986.986,0,0,1,.48.122.974.974,0,0,1,.5.849v3.1a.971.971,0,0,1-.97.97H8.006V19.03A.971.971,0,0,1,7.036,20Zm-3-1.172h2.8V11.281a.649.649,0,0,1,.648-.648h2.607V7.942H7.481a.648.648,0,0,1-.648-.648V5.545a2,2,0,0,1,.392-1.371,1.987,1.987,0,0,1,1.535-.528H10.2V1.176l-2.24,0A3.7,3.7,0,0,0,4.036,5.22V7.295a.648.648,0,0,1-.648.648H1.2v2.691H3.388a.648.648,0,0,1,.648.648Zm6.37-17.651h0Zm0,0"
                                                                transform="translate(-0.024)" fill="#2ab170" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/intent/tweet?url={$fullurl}" class="link" title="x" target="_blank">
                                                    <span class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.57"
                                                            height="20" viewBox="0 0 19.57 20">
                                                            <path id="twitter"
                                                                d="M11.883,8.469,19.169,0H17.442L11.116,7.353,6.064,0H.237l7.64,11.119L.237,20H1.963l6.68-7.765L13.979,20h5.827L11.883,8.469ZM9.519,11.217,8.745,10.11,2.585,1.3H5.237l4.971,7.11.774,1.107,6.461,9.242H14.791L9.519,11.218Z"
                                                                transform="translate(-0.237)" fill="#2ab170" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                            {* <li>
                                                <a href="mailto:{$fullurl}" class="link" title="email">
                                                    <span class="icon">
                                                        <svg id="mail" xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="14.063" viewBox="0 0 20 14.063">
                                                            <g id="Group_90602" data-name="Group 90602"
                                                                transform="translate(0 0)">
                                                                <path id="Path_452472" data-name="Path 452472"
                                                                    d="M18.242,3.266H1.758A1.76,1.76,0,0,0,0,5.023V15.57a1.76,1.76,0,0,0,1.758,1.758H18.242A1.76,1.76,0,0,0,20,15.57V5.023A1.76,1.76,0,0,0,18.242,3.266ZM18,4.438l-6.753,6.717a1.758,1.758,0,0,1-2.487,0L2,4.438ZM1.172,15.332V5.263L6.236,10.3ZM2,16.156l5.062-5.03.862.857a2.93,2.93,0,0,0,4.142,0l.863-.858L18,16.156Zm16.823-.824L13.764,10.3l5.064-5.037Z"
                                                                    transform="translate(0 -3.266)" fill="#2ab170" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li> *}
                                            <li>
                                                <a href="javascript:window.print()" class="link" title="print">
                                                    <span class="icon">
                                                        <svg id="printer-2" xmlns="http://www.w3.org/2000/svg"
                                                            width="20" height="20" viewBox="0 0 20 20">
                                                            <g id="Group_90604" data-name="Group 90604">
                                                                <g id="Group_90603" data-name="Group 90603">
                                                                    <path id="Path_452473" data-name="Path 452473"
                                                                        d="M18.828,7.132V5.273A1.76,1.76,0,0,0,17.07,3.516h-.929L12.8.172l0,0a.587.587,0,0,0-.4-.169H4.1a.586.586,0,0,0-.586.586v2.93H2.93A1.76,1.76,0,0,0,1.172,5.273V7.132A1.761,1.761,0,0,0,0,8.789V15.9a1.76,1.76,0,0,0,1.758,1.758H3.516v1.758A.586.586,0,0,0,4.1,20H15.9a.586.586,0,0,0,.586-.586V17.656h1.758A1.76,1.76,0,0,0,20,15.9V8.789A1.761,1.761,0,0,0,18.828,7.132ZM16.484,4.688h.586a.587.587,0,0,1,.586.586V7.031H16.484ZM12.969,2l1.515,1.515H12.969ZM4.688,1.172H11.8V4.1a.586.586,0,0,0,.586.586h2.93V7.031H4.688Zm-2.344,4.1a.587.587,0,0,1,.586-.586h.586V7.031H2.344ZM15.313,18.828H4.688V12.969H15.313Zm3.516-2.93a.587.587,0,0,1-.586.586H16.484V12.969h.586a.586.586,0,0,0,0-1.172H2.93a.586.586,0,0,0,0,1.172h.586v3.516H1.758a.587.587,0,0,1-.586-.586V8.789A.587.587,0,0,1,1.758,8.2H18.242a.587.587,0,0,1,.586.586Z"
                                                                        fill="#2ab170" />
                                                                </g>
                                                            </g>
                                                            <g id="Group_90606" data-name="Group 90606">
                                                                <g id="Group_90605" data-name="Group 90605">
                                                                    <path id="Path_452474" data-name="Path 452474"
                                                                        d="M13.555,14.141H6.445a.586.586,0,0,0,0,1.172h7.109a.586.586,0,0,0,0-1.172Z"
                                                                        fill="#2ab170" />
                                                                </g>
                                                            </g>
                                                            <g id="Group_90608" data-name="Group 90608">
                                                                <g id="Group_90607" data-name="Group 90607">
                                                                    <path id="Path_452475" data-name="Path 452475"
                                                                        d="M13.555,16.484H6.445a.586.586,0,0,0,0,1.172h7.109a.586.586,0,0,0,0-1.172Z"
                                                                        fill="#2ab170" />
                                                                </g>
                                                            </g>
                                                            <g id="Group_90610" data-name="Group 90610">
                                                                <g id="Group_90609" data-name="Group 90609">
                                                                    <path id="Path_452476" data-name="Path 452476"
                                                                        d="M4.1,9.375H2.93a.586.586,0,0,0,0,1.172H4.1a.586.586,0,0,0,0-1.172Z"
                                                                        fill="#2ab170" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-block my-lg-4 my-0">
              <div class="container">
                <div class="gallery-slide">
                  <div class="swiper gallery-swiper-2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <figure class="cover">
                          <a href="{$template}/assets/img/uploads/news-thumb.jpg" class="link" data-fancybox="gallery">
                            <img src="{$template}/assets/img/uploads/news-thumb.jpg" alt="" class="img-cover">
                          </a>
                        </figure>
                      </div>
                      <div class="swiper-slide">
                        <figure class="cover">
                          <a href="{$template}/assets/img/uploads/img-news-detail.jpg" class="link" data-fancybox="gallery">
                            <img src="{$template}/assets/img/uploads/img-news-detail.jpg" alt="" class="img-cover">
                          </a>
                        </figure>
                      </div>
                      <div class="swiper-slide">
                        <figure class="cover">
                          <a href="{$template}/assets/img/uploads/news-thumb.jpg" class="link" data-fancybox="gallery">
                            <img src="{$template}/assets/img/uploads/news-thumb.jpg" alt="" class="img-cover">
                          </a>
                        </figure>
                      </div>
                      <div class="swiper-slide">
                        <figure class="cover">
                          <a href="{$template}/assets/img/uploads/img-news-detail.jpg" class="link" data-fancybox="gallery">
                            <img src="{$template}/assets/img/uploads/img-news-detail.jpg" alt="" class="img-cover">
                          </a>
                        </figure>
                      </div>
                    </div>
                  </div>
                  <div class="gallery-slider-nav">
                    <div thumbsSlider="" class="swiper gallery-swiper-">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <figure class="cover">
                            <img src="{$template}/assets/img/uploads/news-thumb.jpg" alt="" class="img-cover">
                          </figure>
                        </div>
                        <div class="swiper-slide">
                          <figure class="cover">
                            <img src="{$template}/assets/img/uploads/img-news-detail.jpg" alt="" class="img-cover">
                          </figure>
                        </div>
                        <div class="swiper-slide">
                          <figure class="cover">
                            <img src="{$template}/assets/img/uploads/news-thumb.jpg" alt="" class="img-cover">
                          </figure>
                        </div>
                        <div class="swiper-slide">
                          <figure class="cover">
                            <img src="{$template}/assets/img/uploads/img-news-detail.jpg" alt="" class="img-cover">
                          </figure>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ck editor -->
            <div class="editor-content">
                {strip}
                    {$load_data->item[0]->html|txtReplaceHTML}
                {/strip}
            </div>
            <!-- ck editor -->

            {if $load_data->item[0]->video neq ""}
                <div class="vdo">
                    <div class="container">
                        {if $load_data->item[0]->type eq "url"}
                            <!-- youtube -->
                                <div class="iframe-container">
                                {$myUrlArray = "v="|explode:$load_data->item[0]->video}
                                {$myUrlCut = $myUrlArray[1]}
                                {$myUrlCutArray = "&"|explode:$myUrlCut}
                                {$myUrlCutAnd= $myUrlCutArray.0}
                                <iframe src="https://www.youtube.com/embed/{$myUrlCutAnd}" title="Inside Of Saturn&#39;s Rings" style="border: none; pointer-events: none;" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                            </div>
                        {else}
                            <!-- mp4 -->
                            <div class="video-container">
                                <video loop="" autoplay="" muted="" controlsList="nofullscreen" controls>
                                    <source src="{$load_data->item[0]->video}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        {/if}
                    </div>
                </div>
            {/if}

            {if $load_data->item[0]->attachment|gettype eq "array" && $load_data->item[0]->attachment|count gte 1}
                <div class="document-download-list">
                    <div class="container">
                        <div class="whead">
                            <h2 class="title text-center">{$languageFrontWeb->docdownload->display->$currentLangWeb}</h2>
                        </div>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                {foreach $load_data->item[0]->attachment as $keyattachment => $valueattachment}
                                    {$fileinfo = $valueattachment->filename|fileinclude:'file':{$load_data->item[0]->masterkey}|get_Icon}
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <div class="item-wrapper">
                                              <a href="" class="link">
                                                  <div class="row gutters-20 aling-items-start">
                                                      <div class="col-auto">
                                                          <span class="icon">
                                                              <svg xmlns="http://www.w3.org/2000/svg" width="57.688"
                                                                  height="48.202" viewBox="0 0 57.688 48.202">
                                                                  <g id="download-3" transform="translate(-6.5 -48.832)">
                                                                      <path id="Path_451708" data-name="Path 451708"
                                                                          d="M10.726,125.151A3.225,3.225,0,0,1,7.5,121.925v-32.1a2.017,2.017,0,0,1,2.017-2.017H16.9"
                                                                          transform="translate(0 -33.724)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <line id="Line_8910" data-name="Line 8910" x1="21.759"
                                                                          transform="translate(19.836 91.427)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <path id="Path_451709" data-name="Path 451709"
                                                                          d="M41.478,189.617H36.29a3.26,3.26,0,0,0,3.217-3.275V162.429a2.017,2.017,0,0,1,2.017-2.017H79.637a2.017,2.017,0,0,1,2.017,2.017v8.682"
                                                                          transform="translate(-25.564 -98.19)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <path id="Path_451710" data-name="Path 451710"
                                                                          d="M111.291,344.116H101.207a1.12,1.12,0,0,1-1.12-1.12v-3.051a1.12,1.12,0,0,1,1.12-1.121h10.084a1.12,1.12,0,0,1,1.12,1.121V343A1.12,1.12,0,0,1,111.291,344.116Z"
                                                                          transform="translate(-82.213 -256.611)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <line id="Line_8911" data-name="Line 8911" x2="5.897"
                                                                          transform="translate(17.874 66.215)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <line id="Line_8912" data-name="Line 8912" x2="8.874"
                                                                          transform="translate(17.874 70.137)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <path id="Path_451711" data-name="Path 451711"
                                                                          d="M91.37,62.222V51.849a2.017,2.017,0,0,1,2.017-2.017h25.329"
                                                                          transform="translate(-74.472)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <path id="Path_451712" data-name="Path 451712"
                                                                          d="M370.42,49.832h2.954a2.017,2.017,0,0,1,2.017,2.017V62.222"
                                                                          transform="translate(-322.255)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <line id="Line_8913" data-name="Line 8913" x2="26.044"
                                                                          transform="translate(21.994 54.066)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <line id="Line_8914" data-name="Line 8914" x2="26.044"
                                                                          transform="translate(21.994 57.988)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <path id="Path_451713" data-name="Path 451713"
                                                                          d="M288.607,258.371a12.1,12.1,0,1,1,12.1,12.1A12.1,12.1,0,0,1,288.607,258.371Z"
                                                                          transform="translate(-249.609 -174.433)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <path id="Path_451714" data-name="Path 451714"
                                                                          d="M362.7,375.1v2.091a.9.9,0,0,1-.9.9H353.82a.9.9,0,0,1-.9-.9V375.1"
                                                                          transform="translate(-306.719 -288.822)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <line id="Line_8915" data-name="Line 8915" y2="6.161"
                                                                          transform="translate(51.093 78.612)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
                                                                      <path id="Path_451715" data-name="Path 451715"
                                                                          d="M374.3,343.128l2.195,1.963a.448.448,0,0,0,.6,0l2.195-1.963"
                                                                          transform="translate(-325.699 -260.432)" fill="none"
                                                                          stroke="#29b171" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                                          stroke-width="2" />
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
                                                                      <strong>{$languageFrontWeb->file_size->display->$currentLangWeb} :</strong> <span>{$valueattachment->filename|fileinclude:'file':{$load_data->item[0]->masterkey}|get_IconSize}</span>
                                                                  </li>
                                                                  <li>
                                                                      <strong>{$languageFrontWeb->docdownload->display->$currentLangWeb} :</strong> <span>{$valueattachment->download|number_format} ครั้ง</span>
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

            {if $load_data_other->code eq 1001 && $load_data_other->item|count gte 1}
                <div class="news-area">
                    <div class="container">
                        <div class="whead">
                            <h2 class="title text-center">{$languageFrontWeb->newsrelated->display->$currentLangWeb}</h2>
                        </div>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                {foreach $load_data_other->item as $keyload_data_other => $valueload_data_other}
                                    {assign var="checkUrl" value="{$valueload_data_other->url|check_url}"}
                                    {assign var="target" value="_self"}
                                    {if $checkUrl}
                                        {assign var="news_url" value="{$ul}/pageredirect/{$valueload_data_other->tb|page_redirect:$valueload_data_other->masterkey:$valueload_data_other->id:$valueload_data_other->language}"}
                                        {$target = $valueload_data_other->target}
                                    {else}
                                        {assign var="news_url" value="javascript:void(0);"}
                                    {/if}
                                    <div class="swiper-slide">
                                        <a href="{$news_url}" class="link news-link" target="{$target}">
                                            <div class="news-card card">
                                                <div class="thumbnail">
                                                    <figure class="cover">
                                                        <img src="{$valueload_data_other->pic->pictures}"
                                                            alt="{$valueload_data_other->pic->pictures}">
                                                    </figure>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="title">{$valueload_data_other->subject}</h5>
                                                    <div class="line"></div>
                                                    <p class="desc">
                                                        {$valueload_data_other->title}
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
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            {/if}
        </div>
    </div>
</section>