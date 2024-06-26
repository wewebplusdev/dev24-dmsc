<header class="layout-header layout-header-fullmap ">
  <div class="navbar">
    <div class="container">
      <div class="row align-items-lg-end align-items-center w-100 justify-content-between">
        <div class="col-auto">
          <a class="navbar-brand" href="{$ul}/home" data-aos="fade-right">
            <div class="brand-logo">
              <img src="{$template}/assets/img/static/brand-header.png" alt="DMSC LOGO">
            </div>
            <div class="brand-txt">
              <div class="title">
                {$settingWeb.subject}
              </div>
              <div class="subtitle">
                {$settingWeb.subjectoffice}
              </div>
            </div>
          </a>
        </div>
        <div class="col-auto">
          <div class="action">
            <div class="row gutters-20 align-items-center">
              {if $subPage == 'map-google'}
                <div class="col-md-auto col-6">
                  <a href="https://www.google.com/maps/search/?api=1&query={$settingWeb['contact']->glati},{$settingWeb['contact']->glongti}" target="_blank" class="btn btn-primary">{$languageFrontWeb->getdirection->display->$currentLangWeb}</a>
                </div>
              {/if}
              {* {if $subPage == 'map-graphic'}
                <div class="col-md-auto col-6">
                  <a href="" class="btn btn-primary">{$languageFrontWeb->downloads->display->$currentLangWeb}</a>
                </div>
              {/if} *}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>