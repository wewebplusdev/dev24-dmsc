<footer class="site-footer">
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
</footer>