<header class="layout-header">
    <div class="top-bar" data-aos="fade-down" data-aos-delay="200">
        <div class="container">
            <div class="nav-lang d-lg-block d-none guide-nav-lang">
                <div class="row justify-content-end align-items-center gutters-10">
                    <div class="col-auto">
                        <div class="nav-label">{$languageFrontWeb->choose_lang->display->$currentLangWeb}</div>
                    </div>
                    {foreach $languageWeb as $keyLangWeb => $valueLangWeb}
                        <div class="col-auto">
                            <a title="{$valueLangWeb->subject}" class="nav-lang-th{if $currentLangWeb eq $valueLangWeb->subject} active{/if}" target="_self" href="{$ul}/lang/{$valueLangWeb->short}">
                                <span class="visually-hidden">{$valueLangWeb->subject}</span>
                                <img src="{$template}/assets/img/icon/lang-{$valueLangWeb->short}.svg" alt="th" class="flag">
                            </a>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container align-items-lg-end">
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
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" data-aos="fade-left">
                <span class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
           
                {if count((array)$sitemapWeb) gte 1}
                <ul class="main-menu navbar-nav ml-auto mb-2 mb-lg-0 guide-main-header">
                    {foreach $sitemapWeb->level_1->$currentLangWeb as $keySitemapLv1 => $valueSitemapLv1}
                        {if $valueSitemapLv1->subject neq ""}
                            {assign var="checkUrl" value="{$valueSitemapLv1->url|checkUrl}"}
                            {assign var="target" value="_self"}
                            {if $checkUrl}
                                {assign var="news_url" value="{$ul}/pageredirect/{$valueSitemapLv1->tb|pageRedirect:$valueSitemapLv1->masterkey:$valueSitemapLv1->id:$currentLangWeb}"}
                                {$target = $valueSitemapLv1->target}
                            {else}
                                {assign var="news_url" value="javascript:void(0);"}
                            {/if}
                            {if count((array)$valueSitemapLv1->level_2) gte 1}
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle menu-{$valueSitemapLv1->id}" href="javascript:void;" title="{$valueSitemapLv1->subject}"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            data-aos="fade-left">{$valueSitemapLv1->subject}</a>
                                        <div class="dropdown-menu full-dropdown-menu">
                                            <div class="container-dropdown-menu">
                                                <div class="submenu-row">
                                                    <div class="submenu-col"></div>
                                                    <div class="submenu-col sub1menu">
                                                        <div class=" mCustomScrollbar">
                                                            <!-- sub1menu -->
                                                            <ul class="nav-list fluid">
                                                            {foreach $valueSitemapLv1->level_2 as $keyLv2 => $valueLv2}
                                                                {if $valueLv2->subject neq ""}
                                                                    {assign var="checkUrl" value="{$valueLv2->url|checkUrl}"}
                                                                    {assign var="target" value="_self"}
                                                                    {if $checkUrl}
                                                                        {assign var="news_url" value="{$ul}/pageredirect/{$valueLv2->tb|pageRedirect:$valueLv2->masterkey:$valueLv2->id:$currentLangWeb}"}
                                                                        {$target = $valueLv2->target}
                                                                    {else}
                                                                        {assign var="news_url" value="javascript:void(0);"}
                                                                    {/if}
                                                                    {if count((array)$valueLv2->level_3) gte 1}
                                                                        <li class="has-submenu">
                                                                            <a href="javascript:void(0)" title="{$valueLv2->subject}"  class="link"
                                                                                id="sub{$valueSitemapLv1->id}menu-{$valueLv2->id}">{$valueLv2->subject}</a>
                                                                        </li>
                                                                    {else}
                                                                        <li>
                                                                            <a href="{$news_url}" target="{$target}"  title="{$valueLv2->subject}"  class="link">{$valueLv2->subject}</a>
                                                                        </li>
                                                                    {/if}
                                                                {/if}
                                                            {/foreach}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    {foreach $valueSitemapLv1->level_2 as $keyLv2 => $valueLv2}
                                                        {if count((array)$valueLv2->level_3) gte 1}
                                                            <div class="submenu-col sub2menu" data-submenu-parent="sub{$valueSitemapLv1->id}menu-{$valueLv2->id}">
                                                                <div class="scroll-wrapper mCustomScrollbar">
                                                                    <!-- sub2menu -->
                                                                    <div class="back-menu">{$valueLv2->subject}</div>
                                                                    <ul class="nav-list fluid">
                                                                    {foreach $valueLv2->level_3 as $keyLv3 => $valueLv3}
                                                                        {if $valueLv3->subject neq ""}
                                                                            {assign var="checkUrl" value="{$valueLv3->url|checkUrl}"}
                                                                            {assign var="target" value="_self"}
                                                                            {if $checkUrl}
                                                                                {assign var="news_url" value="{$ul}/pageredirect/{$valueLv3->tb|pageRedirect:$valueLv3->masterkey:$valueLv3->id:$currentLangWeb}"}
                                                                                {$target = $valueLv3->target}
                                                                            {else}
                                                                                {assign var="news_url" value="javascript:void(0);"}
                                                                            {/if}
                                                                            <li>
                                                                                <a href="{$news_url}" target="{$target}" title="{$valueLv3->subject}"  class="link">{$valueLv3->subject}</a>
                                                                            </li>
                                                                        {/if}
                                                                    {/foreach}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        {/if}
                                                    {/foreach}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            {else}
                                <li class="nav-item">
                                    <a class="nav-link menu-{$valueSitemapLv1->id}" href="{$news_url}" target="{$target}"  title="{$valueSitemapLv1->subject}" data-aos="fade-left">{$valueSitemapLv1->subject}</a>
                                </li>
                            {/if}
                        {/if}
                    {/foreach}
                </ul>
                {/if}

                <div class="nav-search guide-search" data-aos="fade-left">
                    <form class="form-default form-search" method="get" role="search" action="{$ul}/searchAll">
                        <div class="input-group">
                            <a href="javascript:void(0)" class="btn-link">
                                <span class="visually-hidden">Search</span>
                                <span data-feather="search"></span>
                            </a>
                            <input class="form-control" name="keyword" type="text" placeholder="{$languageFrontWeb->search->display->$currentLangWeb}" aria-label="Search">
                        </div>
                    </form>
                    <a href="javascript:void(0)" class="close-search">
                        <span data-feather="x"></span>
                    </a>
                </div>
                <div class="nav-lang d-lg-none d-block guides-current-element">
                  <div class="row align-items-center gutters-10">
                      <div class="col-12">
                          <div class="nav-label">{$languageFrontWeb->choose_lang->display->$currentLangWeb}</div>
                      </div>
                      {foreach $languageWeb as $keyLangWeb => $valueLangWeb}
                          <div class="col-auto">
                              <a title="{$valueLangWeb->subject}" class="nav-lang-th{if $currentLangWeb eq $valueLangWeb->subject} active{/if}" target="_self" href="{$ul}/lang/{$valueLangWeb->short}">
                                  <span class="visually-hidden">{$valueLangWeb->subject}</span>
                                  <img src="{$template}/assets/img/icon/lang-{$valueLangWeb->short}.svg" alt="th" class="flag">
                              </a>
                          </div>
                      {/foreach}
                  </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="guides-overlay-custom"></div>
</header>