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
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="news-area">
      <div class="container">
        <div class="news-list">
          {foreach $array_data as $keyload_data => $valueload_data}
            <div class="item">
              <a href="{$valueload_data['url']}" class="link news-link" target="_blank">
                <div class="news-card card">
                  <div class="thumbnail">
                    <figure class="cover">
                      <img src="{$valueload_data['enclosure']}"
                        alt="{$valueload_data['enclosure']}">
                    </figure>
                  </div>
                  <div class="card-body">
                    <h5 class="title">{$valueload_data['title']}
                    </h5>
                    <div class="line"></div>
                    <p class="desc">
                      {$valueload_data['description']}
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
      </div>
    </div>
  </div>
</section>