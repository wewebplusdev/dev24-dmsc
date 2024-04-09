<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Popup -->
{if $load_popup->_numOfRows gte 1}
    <div class="modal popup-modal fade" id="popupModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span class="material-symbols-rounded">
                            cancel
                        </span>
                    </button>
                    <div class="popup-slide">
                        <div class="swiper swiper-default">
                            <div class="swiper-wrapper">
                                {foreach $load_popup->item as $keyload_popup => $valueload_popup}
                                    {if $valueload_popup->type eq 1}
                                        <div class="swiper-slide">
                                            <figure class="cover">
                                                <picture>
                                                    <img src="{$valueload_popup->pic->pictures}" alt="{$valueload_popup->pic->pictures}">
                                                </picture>
                                            </figure>
                                        </div>
                                    {elseif $valueload_popup->type eq 2}

                                    {else}
                                        
                                    {/if}
                                {/foreach}
                            </div>
                            <div class="swiper-pagination"></div>
                            <!-- <div class="autoplay-progress">
                                <svg viewBox="0 0 48 48">
                                    <circle cx="24" cy="24" r="20"></circle>
                                </svg>
                                <span></span>
                            </div> -->
                        </div>
                        <div class="swiper-default">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}