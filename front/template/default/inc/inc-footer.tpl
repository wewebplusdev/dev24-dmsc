<footer class="layout-footer">
    <div class="footer-content lazy" data-bg="{$template}/assets/img/background/bg-footer.webp"
        data-bg-hidpi="{$template}/assets/img/background/bg-footer@2x.webp">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md col-left" data-aos="fade-up">
                        <div class="title">{$languageFrontWeb->department->display->$currentLangWeb}</div>
                        <div class="subtitle">{$languageFrontWeb->ministry->display->$currentLangWeb}</div>
                    </div>
                    {if $settingWeb.contact->tel2 neq ""}
                        <div class="col-auto col-right" data-aos="fade-up">
                            <div class="title"><a href="tel:{$settingWeb.contact->tel2}" title="Telephone"  class="link">{$settingWeb.contact->tel2}</a></div>
                            <div class="subtitle"><img src="{$template}/assets/img/icon/contact-icon-call.svg" alt="" class="icon"> Call Center</div>
                        </div>
                    {/if}
                </div>
            </div>
            <div class="footer-middle">
                <div class="row justify-content-lg-between">
                    <div class="col-md-auto" data-aos="fade-up">
                        <div class="contact">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="{$template}/assets/img/icon/contact-icon-address.svg" alt=""
                                        class="icon">
                                </div>
                                <div class="col">
                                    <p class="desc">
                                        {$settingWeb.contact->address}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {if $settingWeb.contact->tel neq ""}
                        <div class="col-md-auto" data-aos="fade-up">
                            <div class="contact">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-telephone.svg" alt=""
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">{$languageFrontWeb->contactinformation->display->$currentLangWeb}</span>
                                            <a href="tel:{" "|str_replace:"":$settingWeb.contact->tel}" title="Telephone" class="link">{$settingWeb.contact->tel}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if $settingWeb.contact->fax neq ""}
                        <div class="col-md-auto" data-aos="fade-up">
                            <div class="contact">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-fax.svg" alt=""
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">{$languageFrontWeb->fax->display->$currentLangWeb}</span>
                                            <a href="javascript:void(0);" title="Fax" class="link">{$settingWeb.contact->fax}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if $settingWeb.contact->email2 neq "" && $settingWeb.contact->email neq ""}
                        <div class="col-md-auto" data-aos="fade-up">
                            <div class="contact">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt=""
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">{$languageFrontWeb->email->display->$currentLangWeb}</span>
                                            <a href="mailto:{$settingWeb.contact->email2}" class="link"><span
                                                    title="Email" class="d-block">{$settingWeb.contact->email2}</span></a>
                                            <a href="mailto:{$settingWeb.contact->email}" class="link"><span
                                                  title="Email"  class="d-block">{$settingWeb.contact->email}</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if $settingWeb.contact->email2 neq ""}
                        <!-- Force next columns to break to new line -->
                        <div class="w-100 p-0 d-xl-block d-none"></div>
                        <div class="col-md" data-aos="fade-up">
                            <div class="contact pt-md-3">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="{$template}/assets/img/icon/contact-icon-fax.svg" alt=""
                                            class="icon">
                                    </div>
                                    <div class="col">
                                        <p class="desc">
                                            <span class="d-block">{$languageFrontWeb->idso->display->$currentLangWeb}</span>
                                            <span class="d-block">E-mail : <a href="{$settingWeb.contact->email2}" title="Email"
                                                    class="link">{$settingWeb.contact->email2}</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                    <div class="w-100 p-0 d-lg-none"></div>
                    <div class="col-sm-auto" data-aos="fade-up">
                        <div class="ipv6">
                            <picture>
                                <source srcset="{$template}/assets/img/static/ipv6.webp" type="image/webp">
                                <img src="{$template}/assets/img/static/ipv6.png" alt="" class="icon">
                            </picture>
                        </div>
                    </div>
                    <div class="col-lg col-sm-auto" data-aos="fade-up">
                        <div class="followus pt-md-3">
                            <div class="row no-gutters align-items-center justify-content-md-end">
                                <div class="col-auto">
                                  <div class="text-follow-us">Follow us:</div>
                                </div>
                                <div class="col-auto">
                                    <div class="social">
                                        <ul class="item-list">
                                            {if $settingWeb.social->Tel->link neq "" && $settingWeb.social->Tel->link neq "#"}
                                                <li>
                                                    <a href="tel:{$settingWeb.social->Tel->link}" class="link tele" title="Telephone">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/old-typical-phone.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                            {if $settingWeb.social->Facebook->link neq "" && $settingWeb.social->Facebook->link neq "#"}
                                                <li>
                                                    <a href="{$settingWeb.social->Facebook->link}" class="link fb"
                                                        title="Facebook" target="_blank">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/facebook.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                            {if $settingWeb.social->Twitter->link neq "" && $settingWeb.social->Twitter->link neq "#"}
                                                <li>
                                                    <a href="{$settingWeb.social->Twitter->link}" class="link tw" title="X"
                                                        target="_blank">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/twitter.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                            {if $settingWeb.social->Youtube->link neq "" && $settingWeb.social->Youtube->link neq "#"}
                                                <li>
                                                    <a href="{$settingWeb.social->Youtube->link}" class="link yt"
                                                        title="YouTube" target="_blank">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/youtube.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                            {if $settingWeb.social->Line->link neq "" && $settingWeb.social->Line->link neq "#"}
                                                <li>
                                                    <a href="{$settingWeb.social->Line->link}" class="link line"
                                                        title="Line" target="_blank">
                                                        <div class="rounded-0">
                                                            <img src="{$template}/assets/img/icon/line.svg"
                                                                alt="" class="icon">
                                                        </div>
                                                    </a>
                                                </li>
                                            {/if}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom" >
                <div class="row">
                    {if $load_policy->_numOfRows gte 1}
                    <div class="col-md align-self-center" data-aos="fade-up">
                        <div class="policy">
                            <ul class="item-list">
                                {foreach $load_policy->item as $keyPolicy => $valuePolicy}
                                    {assign var="checkUrl" value="{$valuePolicy->url|check_url}"}
                                    {assign var="target" value="_self"}
                                    {$downloadID = 0}
                                    {if $valuePolicy->typec eq 2}
                                        {$downloadID = $valuePolicy->attachment[0]->id}
                                    {/if}
                                    {if $checkUrl}
                                        {assign var="news_url" value="{$ul}/pageredirect/{$valuePolicy->tb|page_redirect:$valuePolicy->masterkey:$valuePolicy->id:$valuePolicy->language:$downloadID}"}
                                        {$target = $valuePolicy->target}
                                    {else}
                                        {assign var="news_url" value="javascript:void(0);"}
                                    {/if}
                                    <li>
                                        <a  href="{$news_url}" class="link" target="{$target}">{$valuePolicy->subject}</a>
                                    </li>
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                    {/if}
                    <div class="col-md-auto" data-aos="fade-up">
                        {* <a href="javascript:void(0);" class="link sitemap">{$languageFrontWeb->sitemap->display->$currentLangWeb}</a> *}
                        <a href="javascript:void(0);" class="link sitemap btn btn-primary text-white">{$languageFrontWeb->sitemap->display->$currentLangWeb}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bar" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg">
                    <p class="copyright">{$languageFrontWeb->copyrightweb->display->$currentLangWeb}</p>
                </div>
                <div class="col-lg-auto">
                    <div class="visitors">{$languageFrontWeb->logsviewWeb->display->$currentLangWeb} <div class="box">{$logsView|number_format}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{if count((array)$sitemapWeb) gte 1}
  <div class="sitmap-full">
    <div class="close">
      <svg xmlns="http://www.w3.org/2000/svg" width="37.993" height="37.993" viewBox="0 0 37.993 37.993">
        <g id="Group_882" data-name="Group 882" transform="translate(-11556.55 148.45)">
          <line id="Line_9" data-name="Line 9" x2="28.093" y2="28.093" transform="translate(11561.5 -143.5)" fill="none" stroke="#229972" stroke-linecap="round" stroke-width="7" />
          <line id="Line_10" data-name="Line 10" x1="28.093" y2="28.093" transform="translate(11561.5 -143.5)" fill="none" stroke="#229972" stroke-linecap="round" stroke-width="7" />
        </g>
      </svg>
    </div>
    <h1 class="h-title">แผนผังเว็บไซต์</h1>
    <!-- Start Sitemap --------->
    {if count((array)$sitemapWeb) gte 1}
    <div class="sitmap-menu">
    
      <div class="row gutters-40">
        
        {foreach $sitemapWeb->level_1->$currentLangWeb as $keySitemapLv1 => $valueSitemapLv1}
            {if $valueSitemapLv1->subject neq ""}
                {assign var="checkUrl" value="{$valueSitemapLv1->url|check_url}"}
                {assign var="target" value="_self"}
                {if $checkUrl}
                    {assign var="news_url" value="{$ul}/pageredirect/{$valueSitemapLv1->tb|page_redirect:$valueSitemapLv1->masterkey:$valueSitemapLv1->id:$currentLangWeb}"}
                    {$target = $valueSitemapLv1->target}
                {else}
                    {assign var="news_url" value="javascript:void(0);"}
                {/if}
                <div class="col-xl-3 col-md-6">
                  <div class="submenu">
                  {if count((array)$valueSitemapLv1->level_2) gte 1}
                    <div class="title">
                      <a href="javascript:void;" title="{$valueSitemapLv1->subject}" class="link">{$valueSitemapLv1->subject}</a>
                    </div>
                 
                    <ul class="list-group">
                    {foreach $valueSitemapLv1->level_2 as $keyLv2 => $valueLv2}
                    {if $valueLv2->subject neq ""}
                        {assign var="checkUrl" value="{$valueLv2->url|check_url}"}
                        {assign var="target" value="_self"}
                        {if $checkUrl}
                            {assign var="news_url" value="{$ul}/pageredirect/{$valueLv2->tb|page_redirect:$valueLv2->masterkey:$valueLv2->id:$currentLangWeb}"}
                            {$target = $valueLv2->target}
                        {else}
                            {assign var="news_url" value="javascript:void(0);"}
                        {/if}
                        {if count((array)$valueLv2->level_3) gte 1}
                          <li class="item">
                            <a  href="javascript:void(0)" title="{$valueLv2->subject}" class="link">{$valueLv2->subject}</a>
                          </li>
                           {if count((array)$valueLv2->level_3) gte 1}
                              <li class="item-sub">
                                <ul class="list-sub-group">
                                {foreach $valueLv2->level_3 as $keyLv3 => $valueLv3}
                                  {if $valueLv3->subject neq ""}
                                      {assign var="checkUrl" value="{$valueLv3->url|check_url}"}
                                      {assign var="target" value="_self"}
                                      {if $checkUrl}
                                          {assign var="news_url" value="{$ul}/pageredirect/{$valueLv3->tb|page_redirect:$valueLv3->masterkey:$valueLv3->id:$currentLangWeb}"}
                                          {$target = $valueLv3->target}
                                      {else}
                                          {assign var="news_url" value="javascript:void(0);"}
                                      {/if}
                                      <li>
                                        <a href="{$news_url}" target="{$target}"  title="{$valueLv3->subject}" class="link">{$valueLv3->subject}</a>
                                      </li>
                                      {/if}
                                  {/foreach}
                                </ul>
                              </li>
                               {/if}
                           {else}
                           <li class="item">
                            <a href="{$news_url}" target="{$target}" title="{$valueLv2->subject}" class="link">{$valueLv2->subject}</a>
                          </li>
                          {/if}
                        {/if}
                    {/foreach}
                      
                      
              
                    </ul>
                
                    {else}
                    <div class="title">
                      <a href="{$news_url}" target="{$target}"  title="{$valueSitemapLv1->subject}"   class="link">{$valueSitemapLv1->subject}</a>
                    </div>
                    {/if}
                  </div>
                </div>
            {/if}
        {/foreach}        
      </div>
    </div>
    {/if}
    <!-- End Sitemap --------->
  </div>
{/if}