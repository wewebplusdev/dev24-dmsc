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
                                        {$myUrlArray = "v="|explode:$valueload_popup->video}
                                        {$myUrlCut = $myUrlArray[1]}
                                        {$myUrlCutArray = "&"|explode:$myUrlCut}
                                        {$myUrlCutAnd= $myUrlCutArray.0}
                                        <div class="swiper-slide">
                                            <div class="iframe-container">
                                                <iframe
                                                    src="https://www.youtube.com/embed/{$myUrlCutAnd}?controls=0&autoplay=1&mute=1&loop=1&enablejsapi=1"
                                                    title="Inside Of Saturn&#39;s Rings" style="border: none;"
                                                    referrerpolicy="strict-origin-when-cross-origin">
                                                    </iframe>
                                            </div>
                                        </div>
                                    {else}
                                        <div class="swiper-slide">
                                            <div class="video-container">
                                                {* <video loop="" autoplay="" muted="" controlsList="nofullscreen" style="pointer-events: none;" playsinline>
                                                <source src="{$valueTgp->video->real}" type="video/mp4">
                                                Your browser does not support the video tag.
                                                </video> *}
                                                <video loop="" autoplay="" muted="" controls>
                                                <source src="{$valueload_popup->video}" type="video/mp4">
                                                Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div>
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
                        <div class="position-absolute" style="margin-top:20px; left:20px;">
                        <form action="" class="form-default form-contact" style="background-image:none; clip-path:none">
                            <div class="form-group">
    
                                <div class="block-control mb-md-3 mb-2">
                                    <label class="text-white container-check">ไม่ต้องแสดงวันนี้อีก
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
    
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>

                    <div class="custom-control form-control-lg custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkbox-popup">
                        <label class="custom-control-label" for="checkbox-popup">ไม่แสดงในวันนี้อีก</label>
                    </div>

                </div>
            </div>
        </div>
    </div>
{/if}