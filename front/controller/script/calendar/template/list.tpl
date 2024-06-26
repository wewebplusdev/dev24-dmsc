{if $loadData->code eq 1001 && $loadData->_numOfRows gte 1}
    <div class="event-list">
        <div class="container">
            <div class="title">{$languageFrontWeb->calendar_activity_list->display->$currentLangWeb}</div>
            {foreach $loadData->item as $keyload_data => $valueload_data}
                {assign var="checkUrl" value="{$valueload_data->url|checkUrl}"}
                {assign var="target" value="_self"}
                {assign var="downloadID" value=""}
                {if $valueload_data->typec eq 2}
                    {$downloadID = $valueload_data->attachment[0]->id}
                {/if}
                {if $checkUrl}
                    {assign var="news_url" value="{$ul}/pageredirect/{$valueload_data->tb|pageRedirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language:$downloadID}"}
                    {$target = $valueload_data->target}
                {else}
                    {assign var="news_url" value="javascript:void(0);"}
                {/if}
                <div class="item">
                    <a href="{$news_url}" target="{$target}" class="link">
                        <div class="row no-gutters align-items-end">
                            <div class="col-auto mb-auto">
                                <div class="dot" ></div>
                            </div>
                            <div class="col">
                                <div class="date mb-md-3 mb-2">{$valueload_data->date_display}</div>
                                <div class="desc mb-md-3 mb-2">{$valueload_data->subject}</div>
                                {if $valueload_data->period eq 1}                  
                                    <div class="desc">8.30 {$languageFrontWeb->suffixtime->display->$currentLangWeb} - 16.30 {$languageFrontWeb->suffixtime->display->$currentLangWeb}</div>
                                {else}
                                    <div class="desc">{$valueload_data->stime} {$languageFrontWeb->suffixtime->display->$currentLangWeb} - {$valueload_data->etime} {$languageFrontWeb->suffixtime->display->$currentLangWeb}</div>
                                {/if}
                            </div>
                            <div class="col-auto">
                                <div class="read-more">
                                    {$languageFrontWeb->readmore->display->$currentLangWeb}
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