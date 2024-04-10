{if $load_data->code eq 1001 && $load_data->_numOfRows gte 1}
    <div class="event-list">
        <div class="container">
            <div class="title">รายการกิจกรรม</div>
            {foreach $load_data->item as $keyload_data => $valueload_data}
                {assign var="checkUrl" value="{$valueload_data->url|check_url}"}
                {assign var="target" value="_self"}
                {if $checkUrl}
                    {assign var="news_url" value="{$ul}/pageredirect/{$valueload_data->tb|page_redirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language}"}
                    {$target = $valueload_data->target}
                {else}
                    {assign var="news_url" value="javascript:void(0);"}
                {/if}
                <div class="item">
                    <a href="{$news_url}" target="{$target}" class="link">
                        <div class="row no-gutters align-items-end">
                            <div class="col-auto mb-auto">
                                <div class="dot" style="background-color:{$valueload_data->color}"></div>
                            </div>
                            <div class="col">
                                <div class="date">{$valueload_data->date_display}</div>
                                <div class="desc">{$valueload_data->subject}</div>
                            </div>
                            <div class="col-auto">
                                <div class="read-more">
                                    อ่านต่อ
                                    <span class="material-symbols-rounded">expand_circle_right</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            {/foreach}
        </div>
    </div>
{/if}