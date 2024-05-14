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
                {$language_modules.breadcrumb1}
              </a>
            </li>
          </ol>
        </div>
        <h1 class="title">
          {$language_modules.breadcrumb1}
        </h1>
        <div class="graphic">
          <div class="obj">
            <img src="{$template}/assets/img/uploads/inner5.png" alt="obj-banner-about"
              class="lazy img-cover">
          </div>
        </div>
      </div>
    </div>
    <figure class="cover">
      <img src="{$template}/assets/img/static/banner.jpg" alt="" class="lazy img-cover">
    </figure>
  </div>

  {include file="front/controller/script/contact/template/footer-contact.tpl"}

  <div class="default-body pt-lg-3 pt-0">
    <div class="contact-map">
      <div class="container">
        <ul class="nav">
          <li>
            <a href="#nav-01" data-toggle="tab" class="link active">Google map</a>
          </li>
          <li>
            <a href="#nav-02" data-toggle="tab" class="link">Graphic map</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active show" id="nav-01">
            <div class="iframe-container">
              <iframe class="responsive-iframe" src="https://maps.google.com/maps?q={$settingWeb['contact']->glati},{$settingWeb['contact']->glongti}&hl=es;z=20&amp;output=embed" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <a href="{$ul}/{$menuActive}/map-google" class="link btn-full-screen" target="_blank">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                  <g id="full-screen" transform="translate(-0.323 -0.323)">
                    <path id="Path_452891" data-name="Path 452891" d="M19.677.323H14.194a.645.645,0,1,0,0,1.29h3.874L12.135,7.275a.645.645,0,1,0,.891.934l6.006-5.733V6.452a.645.645,0,0,0,1.29,0V.968a.645.645,0,0,0-.645-.645Z" fill="#2ab170"/>
                    <path id="Path_452892" data-name="Path 452892" d="M19.677,13.548a.645.645,0,0,0-.645.645V18.12l-6-6a.645.645,0,1,0-.912.912l6,6H14.194a.645.645,0,1,0,0,1.29h5.484a.645.645,0,0,0,.645-.645V14.194A.645.645,0,0,0,19.677,13.548Z" fill="#2ab170"/>
                    <path id="Path_452893" data-name="Path 452893" d="M7.286,12.447,1.613,18.12V14.194a.645.645,0,0,0-1.29,0v5.484a.645.645,0,0,0,.645.645H6.452a.645.645,0,1,0,0-1.29H2.525L8.2,13.359a.645.645,0,1,0-.912-.912Z" fill="#2ab170"/>
                    <path id="Path_452894" data-name="Path 452894" d="M2.525,1.613H6.452a.645.645,0,1,0,0-1.29H.968A.645.645,0,0,0,.323.968V6.452a.645.645,0,1,0,1.29,0V2.525L7.286,8.2A.645.645,0,1,0,8.2,7.286Z" fill="#2ab170"/>
                  </g>
                </svg>  
              </span>
              {$languageFrontWeb->viewlargemap->display->$currentLangWeb}
            </a>
          </div>
          <div class="tab-pane fade" id="nav-02">
            <figure class="cover">
              <img src="{$settingWeb['addresspic']}" alt="{$settingWeb['addresspic']}" class="img-cover">
            </figure>
            <a href="{$ul}/{$menuActive}/map-graphic" class="link btn-full-screen" target="_blank">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                  <g id="full-screen" transform="translate(-0.323 -0.323)">
                    <path id="Path_452891" data-name="Path 452891" d="M19.677.323H14.194a.645.645,0,1,0,0,1.29h3.874L12.135,7.275a.645.645,0,1,0,.891.934l6.006-5.733V6.452a.645.645,0,0,0,1.29,0V.968a.645.645,0,0,0-.645-.645Z" fill="#2ab170"/>
                    <path id="Path_452892" data-name="Path 452892" d="M19.677,13.548a.645.645,0,0,0-.645.645V18.12l-6-6a.645.645,0,1,0-.912.912l6,6H14.194a.645.645,0,1,0,0,1.29h5.484a.645.645,0,0,0,.645-.645V14.194A.645.645,0,0,0,19.677,13.548Z" fill="#2ab170"/>
                    <path id="Path_452893" data-name="Path 452893" d="M7.286,12.447,1.613,18.12V14.194a.645.645,0,0,0-1.29,0v5.484a.645.645,0,0,0,.645.645H6.452a.645.645,0,1,0,0-1.29H2.525L8.2,13.359a.645.645,0,1,0-.912-.912Z" fill="#2ab170"/>
                    <path id="Path_452894" data-name="Path 452894" d="M2.525,1.613H6.452a.645.645,0,1,0,0-1.29H.968A.645.645,0,0,0,.323.968V6.452a.645.645,0,1,0,1.29,0V2.525L7.286,8.2A.645.645,0,1,0,8.2,7.286Z" fill="#2ab170"/>
                  </g>
                </svg>  
              </span>
              {$languageFrontWeb->viewlargemap->display->$currentLangWeb}
            </a>
          </div>
        </div>
      </div>
    </div>
    {if $array_agency|count gte 1}
      <div class="contact-section">
        {foreach $array_agency as $keyarray_agency => $valuearray_agency}
          <div class="contact-center">
            <div class="container">
              <div class="whead">
                <h2 class="title">{$valuearray_agency.group.subject}</h2>
              </div>
              <div class="swiper">
                <div class="swiper-wrapper">
                  {foreach $valuearray_agency.list as $keyList => $valueList}
                    <div class="swiper-slide">
                      <div class="item">
                        <div class="contact-card">
                          <div class="head">{$valueList->subject}</div>
                          <div class="body">
                            <div class="desc">
                              {$valueList->address}
                              {if $valueList->tel neq ""}
                                <br>
                                {$languageFrontWeb->centraltelephone->display->$currentLangWeb} : {$valueList->tel}
                              {/if}
                              {if $valueList->fax neq "" && $valueList->email neq ""}
                                <br>
                                {if $valueList->fax neq ""}{$languageFrontWeb->fax->display->$currentLangWeb}:  {$valueList->fax}{/if}{if $valueList->email neq ""}| E-mail: {$valueList->email}{/if}
                              {/if}
                            </div>
                            <div class="action">
                              <a href="{$ul}/{$menuActive}/googlemap-agencies/{$valueList->id}" target="_blank" class="link">
                                <span class="text">Google map</span>
                                <span class="icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14.25" height="14.25"
                                    viewBox="0 0 14.25 14.25">
                                    <g id="Icon_ionic-ios-arrow-dropright" data-name="Icon ionic-ios-arrow-dropright"
                                      transform="translate(-3.375 -3.375)">
                                      <path id="Path_25" data-name="Path 25"
                                        d="M14.609,10.175a.664.664,0,0,1,.935,0l3.268,3.278a.66.66,0,0,1,.021.911l-3.22,3.23a.66.66,0,1,1-.935-.932l2.737-2.778-2.805-2.778A.653.653,0,0,1,14.609,10.175Z"
                                        transform="translate(-5.661 -3.389)" fill="#2ab170" />
                                      <path id="Path_26" data-name="Path 26"
                                        d="M3.375,10.5A7.125,7.125,0,1,0,10.5,3.375,7.124,7.124,0,0,0,3.375,10.5Zm1.1,0a6.035,6.035,0,1,1,1.768,4.261A5.977,5.977,0,0,1,4.471,10.5Z"
                                        fill="#2ab170" />
                                    </g>
                                  </svg>
                                </span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  {/foreach}
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
          </div>
        {/foreach}
        <div class="contact-bg"></div>
      </div>
    {/if}

    {if $load_data_service->code eq 1001}
      <div class="contact-service">
        <div class="container">
          <div class="whead">
            <h2 class="title">{$languageFrontWeb->serviceth->display->$currentLangWeb}</h2>
          </div>
          <div class="contact-service-list">
            {foreach $load_data_service->item as $keyload_data_service => $valueload_data_service}
              <div class="item">
                <div class="row no-gutters align-items-start mb-3">
                  <div class="col-auto">
                    <div class="icon">
                      <img src="{$valueload_data_service->pic->real}" alt="{$valueload_data_service->pic->real}">
                    </div>
                  </div>
                  <div class="col">
                    <div class="title">{$valueload_data_service->subject}</div>
                  </div>
                </div>
                <div class="tel">
                  <span class="fw-bold">{$languageFrontWeb->contact_tel->display->$currentLangWeb} :</span>
                  {$valueload_data_service->tel}
                </div>
              </div>
            {/foreach}
          </div>
        </div>
      </div>
    {/if}
  </div>
</section>