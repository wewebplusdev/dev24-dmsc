<div class="container">
    {* Start Intro *}
    {if gettype($array_intro) eq 'array' && count($array_intro) gte 1}
        <div class="d-flex flex-row p-2">
        {foreach $array_intro as $keyarray_intro => $valuearray_intro}
                <div class="card" style="width: 18rem;">
                    {if $valuearray_intro->type eq 1}
                        <img src="{$valuearray_intro->pic->pictures}" class="card-img-top" alt="{$valuearray_intro->pic->pictures}">
                        <div class="card-body">
                            <h5 class="card-title">{$valuearray_intro->subject}</h5>
                            <a {if $valuearray_intro->url neq "#" && $valuearray_intro->url neq ""}href="{$valuearray_intro->url}" target="{$valuearray_intro->target}"{else}href="javascript:void(0);"{/if} class="btn btn-primary">Link</a>
                        </div>
                    {else}
                        {$myUrlArray = "v="|explode:$valuearray_intro->video}
                        {$myUrlCut = $myUrlArray[1]}
                        {$myUrlCutArray = "&"|explode:$myUrlCut}
                        {$myUrlCutAnd= $myUrlCutArray.0}
                        <div class="detail-vdo">
                            <div class="iframe-container" data-aos="fade-up">
                                <iframe src="https://www.youtube.com/embed/{$myUrlCutAnd}" allow="autoplay" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{$valuearray_intro->subject}</h5>
                            <a {if $valuearray_intro->url neq "#" && $valuearray_intro->url neq ""}href="{$valuearray_intro->url}" target="{$valuearray_intro->target}"{else}href="javascript:void(0);"{/if} class="btn btn-primary">Link</a>
                        </div>
                    {/if}
                </div>
            {/foreach}
        </div>
    {/if}
    {* End Intro *}
</div>