
<!-- Core -->
<script src="{$template}/assets/js/libs/jquery-3.6.0.js"></script>
<script src="{$template}/assets/js/libs/jquery-ui.min.js"></script>
<script src="{$template}/assets/js/libs/jquery.easing.min.js"></script>
<script src="{$template}/assets/js/libs/jquery.mCustomScrollbar.js"></script>
<script src="{$template}/assets/js/libs/modernizr.min.js"></script>
<script src="{$template}/assets/js/libs/aos.js"></script>
<script src="{$template}/assets/js/libs/popper.min.js"></script>
<script src="{$template}/assets/js/libs/bootstrap.min.js"></script>
<script src="{$template}/assets/js/libs/lazyload.min.js"></script>
<script src="{$template}/assets/js/libs/select2.min.js"></script>
<script src="{$template}/assets/js/libs/sweetalert.min.js"></script>
<script src="{$template}/assets/js/libs/swiper-bundle.min.js"></script>
<script src="{$template}/assets/js/libs/slick.min.js"></script>
<script src="{$template}/assets/js/libs/fancybox.umd.js"></script>
<script src="{$template}/assets/js/libs/trunk8.js"></script>
<script src="{$template}/assets/js/cookie.js"></script>

<script src="{$template}/assets/js/libs/feather.js"></script>

<script>
  feather.replace();
</script>

<!-- Module -->
<script type="module" src="{$template}/assets/js/controller.js{$lastModify}"></script>
<!-- Main -->
<script src="{$template}/assets/js/main.js{$lastModify}"></script>
<!-- Dev -->
<script src="{$template}/assets/js/developer.js{$lastModify}"></script>

<script type="text/javascript">var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;</script>

{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}

