{* <footer class="site-footer">
    {if $load_policy->_numOfRows gte 1}
        <h2>Policy</h2>
        <ul>
            {foreach $load_policy->item as $keyPolicy => $valuePolicy}
                {assign var="checkUrl" value="{$valuePolicy->url|check_url}"}
                {assign var="target" value="_self"}
                {if $checkUrl}
                    {assign var="news_url" value="{$ul}/pageredirect/{$valuePolicy->tb|page_redirect:$valuePolicy->masterkey:$valuePolicy->id:$valuePolicy->language}"}
                    {$target = $valuePolicy->target}
                {else}
                    {assign var="news_url" value="javascript:void(0);"}
                {/if}
                <li>
                    <a href="{$news_url}" target="{$target}">{$valuePolicy->subject}</a>
                </li>
            {/foreach}
        </ul>
    {/if}

    {if count((array)$sitemapWeb) gte 1}
        <h2>Sitemap</h2>
        <ul>
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
                    <li>
                        <h4><a href="{$news_url}" target="{$target}">{$valueSitemapLv1->subject}</a></h4>
                        {if count((array)$valueSitemapLv1->level_2) gte 1}
                            <ul>
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
                                        <li>
                                            <h5><a href="{$news_url}" target="{$target}">{$valueLv2->subject}</a></h5>
                                            {if count((array)$valueLv2->level_3) gte 1}
                                                <ul>
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
                                                            <li><h5><a href="{$news_url}" target="{$target}">{$valueLv3->subject}</a></h5></li>
                                                        {/if}
                                                    {/foreach}
                                                </ul>
                                            {/if}
                                        </li>
                                    {/if}
                                {/foreach}
                            </ul>
                        {/if}
                    </li>
                {/if}
            {/foreach}
        </ul>
    {/if}
</footer> *}


<footer class="layout-footer">
    <div class="footer-content lazy" data-bg="{$template}/assets/img/background/bg-footer.webp" data-bg-hidpi="{$template}/assets/img/background/bg-footer@2x.webp">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md col-left" data-aos="fade-left">
                        <div class="title">กรมวิทยาศาสตร์การแพทย์</div>
                        <div class="subtitle">กระทรวงสาธารณสุข</div>
                    </div>
                    <div class="col-auto col-right" data-aos="fade-right">
                        <div class="title"><a href="tel:098 915 6809" class="link">098 915 6809</a></div>
                        <div class="subtitle"><img src="{$template}/assets/img/icon/contact-icon-call.svg" alt="" class="icon"> Call Center</div>
                    </div>
                </div>
            </div>
            <div class="footer-middle">
                <div class="row justify-content-lg-between">
                    <div class="col-md-auto" data-aos="fade-up">
                        <div class="contact">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="{$template}/assets/img/icon/contact-icon-address.svg" alt="" class="icon">
                                </div>
                                <div class="col">
                                    <p class="desc">
                                        กรมวิทยาศาสตร์การแพทย์<br>
                                        กระทรวงสาธารณสุข 88/7 บำราศนราดูร<br>
                                        ถ.ติวานนท์ ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี 11000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto" data-aos="fade-up">
                        <div class="contact">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="{$template}/assets/img/icon/contact-icon-telephone.svg" alt="" class="icon">
                                </div>
                                <div class="col">
                                    <p class="desc">
                                        <span class="d-block">ติดต่อสอบถามข้อมูล</span>
                                        <a href="tel:02 589 9850" class="link">02 589 9850 ถึง 8</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto" data-aos="fade-up">
                        <div class="contact">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="{$template}/assets/img/icon/contact-icon-fax.svg" alt="" class="icon">
                                </div>
                                <div class="col">
                                    <p class="desc">
                                        <span class="d-block">โทรสาร</span>
                                        <a href="fax:02 591 5974" class="link">02 591 5974</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto" data-aos="fade-up">
                        <div class="contact">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="{$template}/assets/img/icon/contact-icon-email.svg" alt="" class="icon">
                                </div>
                                <div class="col">
                                    <p class="desc">
                                        <span class="d-block">อีเมล์</span>
                                        <a href="mailto:prdmsc@dmsc.mail.go.th" class="link"><span class="d-block">prdmsc@dmsc.mail.go.th</span></a>
                                        <a href="mailto:info@dmsc.mail.go.th" class="link"><span class="d-block">info@dmsc.mail.go.th</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Force next columns to break to new line -->
                    <div class="w-100 p-0 d-xl-block d-none"></div>
                    <div class="col-md" data-aos="fade-up">
                        <div class="contact pt-md-3">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="{$template}/assets/img/icon/contact-icon-fax.svg" alt="" class="icon">
                                </div>
                                <div class="col">
                                    <p class="desc">
                                        <span class="d-block">ข้อมูลโดย ฝ่ายประชาสัมพันธ์ สำนักงานเลขานุการกรม</span>
                                        <span class="d-block">E-mail : <a href="prdmsc@dmsc.mail.go.th" class="link">prdmsc@dmsc.mail.go.th</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    Follow us:
                                </div>
                                <div class="col-auto">
                                    <div class="social">
                                        <ul class="item-list">
                                            <li>
                                                <a href="" class="link tele" title="Telephone">
                                                    <div class="rounded-0">
                                                        <img src="{$template}/assets/img/icon/old-typical-phone.svg" alt="" class="icon">
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.facebook.com/DMScNews/" class="link fb" title="Facebook" target="_blank">
                                                    <div class="rounded-0">
                                                        <img src="{$template}/assets/img/icon/facebook.svg" alt="" class="icon">
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/DMScNew" class="link tw" title="X" target="_blank">
                                                    <div class="rounded-0">
                                                        <img src="{$template}/assets/img/icon/twitter.svg" alt="" class="icon">
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.youtube.com/user/DMSCLive" class="link yt" title="YouTube" target="_blank">
                                                    <div class="rounded-0">
                                                        <img src="{$template}/assets/img/icon/youtube.svg" alt="" class="icon">
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://line.me/R/ti/p/%40009xhxof" class="link line" title="Line" target="_blank">
                                                    <div class="rounded-0">
                                                        <img src="{$template}/assets/img/icon/line.svg" alt="" class="icon">
                                                    </div>
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
            {if $load_policy->_numOfRows gte 1}
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md" data-aos="fade-left">
                        <div class="policy">
                            <ul class="item-list">
                                {foreach $load_policy->item as $keyPolicy => $valuePolicy}
                                    {assign var="checkUrl" value="{$valuePolicy->url|check_url}"}
                                    {assign var="target" value="_self"}
                                    {if $checkUrl}
                                        {assign var="news_url" value="{$ul}/pageredirect/{$valuePolicy->tb|page_redirect:$valuePolicy->masterkey:$valuePolicy->id:$valuePolicy->language}"}
                                        {$target = $valuePolicy->target}
                                    {else}
                                        {assign var="news_url" value="javascript:void(0);"}
                                    {/if}
                                    <li><a href="{$news_url}" class="link" target="{$target}">{$valuePolicy->subject}</a></li>
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-auto" data-aos="fade-right">
                        <a href="" class="link sitemap">แผนผังเว็บไซต์</a>
                    </div>
                </div>
            </div>
            {/if}
        </div>
    </div>
    <div class="footer-bar" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg">
                    <p class="copyright">Copyright © 2024 Department of Medical Sciences, Ministry of Public Health. All rights reserved.</p>
                </div>
                <div class="col-lg-auto">
                    <div class="visitors">จำนวนผู้เข้าชม <div class="box">2,651,012</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>