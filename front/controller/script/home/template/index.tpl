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
    {if $load_popup->_numOfRows gte 1}
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
                {foreach $load_popup->item as $keyPopup => $valuePopup}
                    {if $valuePopup->type eq 1}
                        <img src="{$valuePopup->pic->pictures}" class="card-img-top" alt="{$valuePopup->pic->pictures}" onerror="this.src='http://via.placeholder.com/1908x1080';">
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
    {if $load_topgraphic->_numOfRows gte 1}
        <h2>Top Graphic</h2>
        <div class="d-flex flex-row p-2">
            {foreach $load_topgraphic->item as $keyTgp => $valueTgp}
                <div class="card" style="width: 18rem;">
                    {if $valueTgp->type eq 1}
                        <img src="{$valueTgp->pic->pictures}" class="card-img-top" alt="{$valueTgp->pic->pictures}" onerror="this.src='http://via.placeholder.com/1908x1080';">
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
    {if $load_services->_numOfRows gte 1}
        <h2>Services</h2>
        <ul>
            {foreach $load_services->item->group as $keyload_services_group => $load_services_group}
                <li><a href="javascript:void(0);" class="services-filter" data-id="{$load_services_group->id}">{$load_services_group->subject}</a></li>
            {/foreach}
        </ul>
        <div class="d-flex flex-row p-2">
            {foreach $load_services->item->list as $keyload_services_list => $valueload_services_list}
                <div class="card" style="width: 18rem;">
                    <a {if $valueload_services_list->url neq "#" && $valueload_services_list->url neq ""}href="{$ul}/pageredirect/{$valueload_services_list->tb|page_redirect:$valueload_services_list->masterkey:$valueload_services_list->id:$valueload_services_list->language}" target="{$valueload_services_list->target}"{else}href="javascript:void(0);"{/if} >
                        <img src="{$valueload_services_list->pic->pictures}" class="card-img-top" alt="{$valueload_services_list->pic->pictures}" onerror="this.src='http://via.placeholder.com/1908x1080';">
                        <div class="card-body">
                            <h5 class="card-title">{$valueload_services_list->subject}</h5>
                        </div>
                    </a>
                </div>
            {/foreach}
        </div>
    {/if}
    {* End Services *}


</div>