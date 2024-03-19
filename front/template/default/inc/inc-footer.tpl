<footer class="site-footer">
    {if $load_policy->_numOfRows gte 1}
        <h2>Policy</h2>
        <ul>
            {foreach $load_policy->item as $keyPolicy => $valuePolicy}
                <li>
                    <a href="{$ul}/pageredirect/{$valuePolicy->tb|page_redirect:$valuePolicy->masterkey:$valuePolicy->id:$valuePolicy->language}">{$valuePolicy->subject}</a>
                </li>
            {/foreach}
        </ul>
    {/if}


    {if count((array)$sitemapWeb) gte 1}
        <h2>Sitemap</h2>
        <ul>
            {foreach $sitemapWeb->level_1->$currentLangWeb as $keySitemapLv1 => $valueSitemapLv1}
                <li>
                    <h4>{$valueSitemapLv1->subject}</h4>
                    {if count((array)$valueSitemapLv1->level_2) gte 1}
                        <ul>
                            {foreach $valueSitemapLv1->level_2 as $keyLv2 => $valueLv2}
                                <li>
                                    <h5>{$valueLv2->subject}</h5>
                                    {if count((array)$valueLv2->level_3) gte 1}
                                        <ul>
                                            {foreach $valueLv2->level_3 as $keyLv3 => $valueLv3}
                                                <li><h5>{$valueLv3->subject}</h5></li>
                                            {/foreach}
                                        </ul>
                                    {/if}
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>
            {/foreach}
        </ul>
    {/if}

    <div class="cookie-tab pdpa" style="display: none;">
        <div class="container">
            <div class="row align-items-center  h-tap">
                <div class="col-md">
                    <div class="text">
                        เว็บไซต์นี้ให้ความสำคัญต่อข้อมูลส่วนบุคคล เพื่อให้ท่านได้รับประสบการณ์ที่ดีบนเว็บไซต์ของเรา หากท่านใช้บริการเว็บไซต์นี้
                        โดยไม่มีการปรับตั้งค่าใดๆแสดงว่าท่านยอมรับการใช้งานคุกกี้และนโยบายข้อมูลส่วนบุคคลของเรา &ensp; <a class="link -cookie-policy" href="{$ul}/policy">
                        รายละเอียดเพิ่มเติม</a>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="action">
                        <a class="btn btn-primary acept-btn acceptCookie" id="btn-AcceptPdpa" data-accept="Accept" href="javascript:void(0);">ยอมรับ</a>
                        <a class="btn btn-primary-outline reject-btn" href="javascript:void(0);">ปฏิเสธ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>