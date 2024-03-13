<div class="container">

    <img src="{$languageFrontWeb->brandImg->display->$currentLangWeb}" alt="">
    <h2>{$settingWeb.subject}</h2>
    <h4>{$settingWeb.subjectoffice}</h4>
    
    <div>language Active : </div>
    <ul>
        {foreach $languageWeb as $keyLangWeb => $valueLangWeb}
            <li><a href="javascript:void(0);" data-short="{$valueLangWeb->short}" data-lang="{$valueLangWeb->subject}" class="switch-alnguage">{$valueLangWeb->subject}</a></li>
        {/foreach}
    </ul>


    {* Start Top Graphic *}
    {if $load_topgraphic->_numOfRows gte 1}
        <div class="d-flex flex-row p-2">
            {foreach $load_topgraphic->item as $keyTgp => $valueTgp}
                <div class="card" style="width: 18rem;">
                    {if $valueTgp->type eq 1}
                        <img src="{$valueTgp->pic->real}" class="card-img-top" alt="{$valueTgp->pic->real}" onerror="this.src='http://via.placeholder.com/1908x1080';">
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

</div>