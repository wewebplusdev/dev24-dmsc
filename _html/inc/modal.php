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
<div class="modal popup-modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span class="material-symbols-rounded">
                        cancel
                    </span>
                </button>
                <div class="popup-slide">
                    <div class="swiper default-swiper">
                        <div class="swiper-wrapper">
                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                                <div class="swiper-slide">
                                    <figure class="cover">
                                        <picture>
                                            <source srcset="<?php echo $core_template; ?>/img/static/popup.webp" type="image/webp">
                                            <img src="<?php echo $core_template; ?>/img/static/popup.jpg" alt="popup">
                                        </picture>
                                    </figure>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <!-- <div class="autoplay-progress">
                            <svg viewBox="0 0 48 48">
                                <circle cx="24" cy="24" r="20"></circle>
                            </svg>
                            <span></span>
                        </div> -->
                    </div>
                    <div class="default-swiper">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>