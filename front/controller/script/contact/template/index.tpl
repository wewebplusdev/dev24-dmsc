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
        <h2 class="title">
          {$language_modules.breadcrumb1}
        </h2>
        <div class="graphic">
          <div class="obj">
            <img src="{$template}/assets/img/uploads/inner-contact-2.png" alt="obj-banner-about"
              class="lazy img-cover">
          </div>
        </div>
      </div>
    </div>
    <figure class="cover">
      <img src="{$template}/assets/img/static/banner.jpg" alt="background-banner" class="lazy img-cover">
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
                    <path id="Path_4528911" data-name="Path 452891" d="M19.677.323H14.194a.645.645,0,1,0,0,1.29h3.874L12.135,7.275a.645.645,0,1,0,.891.934l6.006-5.733V6.452a.645.645,0,0,0,1.29,0V.968a.645.645,0,0,0-.645-.645Z" fill="#2ab170"/>
                    <path id="Path_4528922" data-name="Path 452892" d="M19.677,13.548a.645.645,0,0,0-.645.645V18.12l-6-6a.645.645,0,1,0-.912.912l6,6H14.194a.645.645,0,1,0,0,1.29h5.484a.645.645,0,0,0,.645-.645V14.194A.645.645,0,0,0,19.677,13.548Z" fill="#2ab170"/>
                    <path id="Path_4528933" data-name="Path 452893" d="M7.286,12.447,1.613,18.12V14.194a.645.645,0,0,0-1.29,0v5.484a.645.645,0,0,0,.645.645H6.452a.645.645,0,1,0,0-1.29H2.525L8.2,13.359a.645.645,0,1,0-.912-.912Z" fill="#2ab170"/>
                    <path id="Path_4528944" data-name="Path 452894" d="M2.525,1.613H6.452a.645.645,0,1,0,0-1.29H.968A.645.645,0,0,0,.323.968V6.452a.645.645,0,1,0,1.29,0V2.525L7.286,8.2A.645.645,0,1,0,8.2,7.286Z" fill="#2ab170"/>
                  </g>
                </svg>  
              </span>
              {$languageFrontWeb->viewlargemap->display->$currentLangWeb}
            </a>
          </div>
          <div class="tab-pane fade" id="nav-02">
            <figure class="cover">
              <img src="{$settingWeb['addresspic']}" alt="graphic map cover" class="img-cover">
            </figure>
            <a href="{$ul}/{$menuActive}/map-graphic" class="link btn-full-screen" target="_blank">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                  <g id="full-screen1" transform="translate(-0.323 -0.323)">
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
                            {* <div class="desc">
                              {$valueList->address}
                              {if $valueList->tel neq ""}
                                <br>
                                {$languageFrontWeb->centraltelephone->display->$currentLangWeb} : {$valueList->tel}
                              {/if}
                              {if $valueList->fax neq "" && $valueList->email neq ""}
                                <br>
                                {if $valueList->fax neq ""}{$languageFrontWeb->fax->display->$currentLangWeb}:  {$valueList->fax}{/if}{if $valueList->email neq ""}| E-mail: {$valueList->email}{/if}
                              {/if}
                            </div> *}
                            <div class="inner-desc">
                              <div class="desc">{$valueList->address}</div>
                              {if $valueList->tel neq ""}
                                {* <br> *}
                                <div class="desc">{$languageFrontWeb->centraltelephone->display->$currentLangWeb} : {$valueList->tel}</div>
                              {/if}
                              {if $valueList->fax neq "" && $valueList->email neq ""}
                                {* <br> *}
                                {if $valueList->fax neq ""}<div class="desc">{$languageFrontWeb->fax->display->$currentLangWeb}:  {$valueList->fax}{/if}{if $valueList->email neq ""}| E-mail: {$valueList->email}</div>{/if}
                              {/if}
                            </div>
                            <div class="action">
                              <a href="{$ul}/{$menuActive}/googlemap-agencies/{$valueList->id}" target="_blank" class="link d-flex align-items-center">
                                <span class="text">Google map</span>
                                <span class="icon">
                                  <img src="{$template}/assets/img/static/Icon-ionic-ios-arrow-dropright.png" alt="image-arrow-right">
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
            <div class="swiper">
              <div class="swiper-wrapper">
              {foreach $load_data_service->item as $keyload_data_service => $valueload_data_service}
                <div class="swiper-slide">
                  <div class="item">
                    <div class="row no-gutters align-items-start mb-3">
                      <div class="col-auto">
                        <div class="icon">
                          <img src="{$valueload_data_service->pic->real}" alt="contact icon">
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
                </div>
              {/foreach}
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    {/if}
  </div>
</section>