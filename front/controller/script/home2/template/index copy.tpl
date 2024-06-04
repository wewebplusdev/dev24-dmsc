<div class="container">
    <a href="{$ul}/home">
        <img src="{$languageFrontWeb->brandImg->display->$currentLangWeb}" alt="">
        <h2>{$settingWeb.subject}</h2>
        <h4>{$settingWeb.subjectoffice}</h4>
    </a>
    
    <div>language Active : </div>
    <ul>
        {foreach $languageWeb as $keyLangWeb => $valueLangWeb}
            <li><a href="{$ul}/lang/{$valueLangWeb->short}">{$valueLangWeb->subject}</a></li>
        {/foreach}
    </ul>

    {* Start Popup *}
    {if $loadPopup->_numOfRows gte 1}
        <h2>Popup</h2>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Popup btn
        </button>
    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                {foreach $loadPopup->item as $keyPopup => $valuePopup}
                    {if $valuePopup->type eq 1}
                        <img src="{$valuePopup->pic->pictures}" class="card-img-top" alt="{$valuePopup->pic->pictures}">
                        <div class="card-body">
                            <h5 class="card-title">{$valuePopup->subject}</h5>
                            <a {if $valuePopup->url neq "#" && $valuePopup->url neq ""}href="{$valuePopup->url}" target="{$valuePopup->target}"{else}href="javascript:void(0);"{/if} class="btn btn-primary">Link</a>
                        </div>
                    {else}
                        {$myUrlArray = "v="|explode:$valuePopup->video}
                        {$myUrlCut = $myUrlArray[1]}
                        {$myUrlCutArray = "&"|explode:$myUrlCut}
                        {$myUrlCutAnd= $myUrlCutArray.0}
                        <div class="detail-vdo">
                            <div class="iframe-container" data-aos="fade-up">
                                <iframe src="https://www.youtube.com/embed/{$myUrlCutAnd}" allow="autoplay" frameborder="0"></iframe>
                            </div>
                        </div>
                    {/if}
                {/foreach}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
    {/if}
    {* End Popup *}

    {* Start Top Graphic *}
    {if $loadTopgraphic->_numOfRows gte 1}
        <h2>Top Graphic</h2>
        <div class="d-flex flex-row p-2">
            {foreach $loadTopgraphic->item as $keyTgp => $valueTgp}
                <div class="card" style="width: 18rem;">
                    {if $valueTgp->type eq 1}
                        <img src="{$valueTgp->pic->pictures}" class="card-img-top" alt="{$valueTgp->pic->pictures}">
                        <div class="card-body">
                            <h5 class="card-title">{$valueTgp->subject}</h5>
                            <a {if $valueTgp->url neq "#" && $valueTgp->url neq ""}href="{$valueTgp->url}" target="{$valueTgp->target}"{else}href="javascript:void(0);"{/if} class="btn btn-primary">Link</a>
                        </div>
                    {else}
                        {$myUrlArray = "v="|explode:$valueTgp->video}
                        {$myUrlCut = $myUrlArray[1]}
                        {$myUrlCutArray = "&"|explode:$myUrlCut}
                        {$myUrlCutAnd= $myUrlCutArray.0}
                        <div class="detail-vdo">
                            <div class="iframe-container" data-aos="fade-up">
                                <iframe src="https://www.youtube.com/embed/{$myUrlCutAnd}" allow="autoplay" frameborder="0"></iframe>
                            </div>
                        </div>
                    {/if}
                </div>
            {/foreach}
        </div>
    {/if}
    {* End Top Graphic *}
    
    {* Start Services *}
    {if $loadServices->_numOfRows gte 1}
        <h2>Services</h2>
        <ul>
            {foreach $loadServices->item->group as $keyload_services_group => $load_services_group}
                <li><a href="javascript:void(0);" class="services-filter" data-id="{$load_services_group->id}">{$load_services_group->subject}</a></li>
            {/foreach}
        </ul>
        <div class="d-flex flex-row p-2" id="service-append">
            {foreach $loadServices->item->list as $keyload_services_list => $valueload_services_list}
                {assign var="checkUrl" value="{$valueload_services_list->url|checkUrl}"}
                {assign var="target" value="_self"}
                {if $checkUrl}
                    {assign var="news_url" value="{$ul}/pageredirect/{$valueload_services_list->tb|pageRedirect:$valueload_services_list->masterkey:$valueload_services_list->id:$valueload_services_list->language}"}
                    {$target = $valueload_services_list->target}
                {else}
                    {assign var="news_url" value="javascript:void(0);"}
                {/if}
                <div class="card" style="width: 18rem;">
                    <a href="{$news_url}" target="{$target}">
                        <img src="{$valueload_services_list->pic->pictures}" class="card-img-top" alt="{$valueload_services_list->pic->pictures}">
                        <div class="card-body">
                            <h5 class="card-title">{$valueload_services_list->subject}</h5>
                        </div>
                    </a>
                </div>
            {/foreach}
        </div>
    {/if}
    {* End Services *}

    {* Start Innovation *}
    {if $loadInnovation->_numOfRows gte 1}
        <h2>Innovation</h2>
        <div class="d-flex flex-row p-2" id="service-append">
            {foreach $loadInnovation->item as $keyload_innovation_list => $valueload_innovation_list}
                <div class="card" style="width: 18rem;">
                    <a href="{$valueload_innovation_list->url}" target="{$valueload_innovation_list->target}">
                        <img src="{$valueload_innovation_list->pic->pictures}" class="card-img-top" alt="{$valueload_innovation_list->pic->pictures}">
                        <div class="card-body">
                            <h5 class="card-title">{$valueload_innovation_list->subject}</h5>
                            <div class="desc">{$valueload_innovation_list->des}</div>
                            <div class="desc">{$valueload_innovation_list->number|number_format}</div>
                            <div class="desc">{$valueload_innovation_list->suffix}</div>
                        </div>
                    </a>
                </div>
            {/foreach}
        </div>
    {/if}
    {* End Innovation *}

    {* Start About *}
    {if $load_about->_numOfRows gte 1}
        <h2>About</h2>
        <div class="d-flex flex-row p-2" id="service-append">
        {foreach $load_about->item as $keyload_about_list => $valueload_about_list}
            {assign var="checkUrl" value="{$valueload_about_list->url|checkUrl}"}
            {assign var="target" value="_self"}
            {if $checkUrl}
                {assign var="news_url" value="{$ul}/pageredirect/{$valueload_about_list->tb|pageRedirect:$valueload_about_list->masterkey:$valueload_about_list->id:$valueload_about_list->language}"}
                {$target = $valueload_about_list->target}
            {else}
                {assign var="news_url" value="javascript:void(0);"}
            {/if}
            <div class="card" style="width: 18rem;">
                    <a href="{$news_url}" target="{$target}">
                        <img src="{$valueload_about_list->pic->pictures}" class="card-img-top" alt="{$valueload_about_list->pic->pictures}">
                        <div class="card-body">
                            <h5 class="card-title">{$valueload_about_list->subject}</h5>
                        </div>
                    </a>
                </div>
        {/foreach}
        </div>
    {/if}
    {* End About *}

    {* Start News *}
    {if count($array_news_list) gte 1}
        <h2>News</h2>
        {if gettype($array_news_list['group']) eq 'array' && count($array_news_list['group']) gte 1}
            <ul>
                {foreach $array_news_list['group'] as $keyarray_news_group => $array_news_group}
                    <li><a href="javascript:void(0);" data-id="{$array_news_group->id}">{$array_news_group->subject}</a></li>
                {/foreach}
            </ul>
        {/if}

        {if gettype($array_news_list['list']) eq 'array' && count($array_news_list['list']) gte 1}
            <div class="d-flex flex-row p-2" id="service-append">
                {foreach $array_news_list['list'] as $keyNews => $valueNews}
                    {foreach $valueNews as $keySubNews => $valueload_news_list}
                        {assign var="checkUrl" value="{$valueload_news_list->url|checkUrl}"}
                        {assign var="target" value="_self"}
                        {if $checkUrl}
                            {assign var="news_url" value="{$ul}/pageredirect/{$valueload_news_list->tb|pageRedirect:$valueload_news_list->masterkey:$valueload_news_list->id:$valueload_news_list->language}"}
                            {$target = $valueload_news_list->target}
                        {else}
                            {assign var="news_url" value="javascript:void(0);"}
                        {/if}
                        <div class="card" style="width: 18rem;">
                            <a href="{$news_url}" target="{$target}">
                                <img src="{$valueload_news_list->pic->pictures}" class="card-img-top" alt="{$valueload_news_list->pic->pictures}">
                                <div class="card-body">
                                    <h5 class="card-title">{$valueload_news_list->subject}</h5>
                                </div>
                            </a>
                        </div>
                    {/foreach}
                {/foreach}
            </div>
        {/if}

    {/if}
    {* End News *}

</div>