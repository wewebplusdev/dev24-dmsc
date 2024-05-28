
<!-- Core -->
<script src="{$template}/assets/js/libs/jquery-3.6.0.js{$LastVersionCache}"></script>
{* <script src="{$template}/assets/js/libs/jquery-ui.min.js{$LastVersionCache}"></script> *}
<script src="{$template}/assets/js/libs/jquery.easing.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/jquery.mCustomScrollbar.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/modernizr.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/aos.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/popper.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/bootstrap.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/lazyload.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/select2.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/sweetalert.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/swiper-bundle.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/slick.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/fancybox.umd.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/trunk8.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/cookie.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/moment.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/validator.min.js{$LastVersionCache}"></script>
<script src="{$template}/assets/js/libs/feather.js{$LastVersionCache}"></script>
{* <script src="{$template}/assets/js/libs/guides.min.js{$LastVersionCache}"></script> *}
<script src="{$template}/assets/js/libs/guides.js{$LastVersionCache}"></script>


<script>
  feather.replace();
</script>


  {* <!-- asw jss -->
  <script src="{$template}/assets/js/accessibility.js{$LastVersionCache}"></script>  *}

<!-- Module -->
<script type="module" src="{$template}/assets/js/controller.js{$LastVersionCache}"></script>

<!-- Main -->
<script src="{$template}/assets/js/main.js{$LastVersionCache}"></script>
<!-- Dev -->
<script src="{$template}/assets/js/developer.js{$LastVersionCache}"></script>

<script>var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;</script>

{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}


