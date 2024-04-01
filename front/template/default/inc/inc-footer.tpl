<footer class="layout-footer">
    <div class="footer-content lazy" data-bg="{$template}/assets/img/background/bg-footer.webp"
        data-bg-hidpi="{$template}/assets/img/background/bg-footer@2x.webp">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md col-left" data-aos="fade-left">
                        <div class="title">กรมวิทยาศาสตร์การแพทย์</div>
                        <div class="subtitle">กระทรวงสาธารณสุข</div>
                    </div>
                    {if $settingWeb.contact->tel2 neq ""}
                        <div class="col-auto col-right" data-aos="fade-right">
                            <div class="title"><a href="tel:{$settingWeb.contact->tel2}" class="link">{$settingWeb.contact->tel2}</a></div>
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
                                            <span class="d-block">ติดต่อสอบถามข้อมูล</span>
                                            <a href="tel:{" "|str_replace:"":$settingWeb.contact->tel}" class="link">{$settingWeb.contact->tel}</a>
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
                                            <span class="d-block">โทรสาร</span>
                                            <a href="javascript:void(0);" class="link">{$settingWeb.contact->fax}</a>
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
                                            <span class="d-block">อีเมล์</span>
                                            <a href="mailto:{$settingWeb.contact->email2}" class="link"><span
                                                    class="d-block">{$settingWeb.contact->email2}</span></a>
                                            <a href="mailto:{$settingWeb.contact->email}" class="link"><span
                                                    class="d-block">{$settingWeb.contact->email}</span></a>
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
                                            <span class="d-block">ข้อมูลโดย ฝ่ายประชาสัมพันธ์ สำนักงานเลขานุการกรม</span>
                                            <span class="d-block">E-mail : <a href="{$settingWeb.contact->email2}"
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
                                    Follow us:
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
            <div class="footer-bottom">
                <div class="row">
                    {if $load_policy->_numOfRows gte 1}
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
                                    <li>
                                        <a href="{$news_url}" class="link" target="{$target}">{$valuePolicy->subject}</a>
                                    </li>
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                    {/if}
                    <div class="col-md-auto" data-aos="fade-right">
                        <a href="" class="link sitemap">แผนผังเว็บไซต์</a>
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