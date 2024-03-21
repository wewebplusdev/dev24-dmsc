
<script src="{$template}/assets/js/libs/jquery-3.6.0.js"></script>
<script src="{$template}/assets/js/cookie.js"></script>

<script type="module" src="{$template}/assets/js/controller.js{$lastModify}"></script>

<script src="{$template}/assets/js/main.js{$lastModify}"></script>

<script src="{$template}/assets/js/developer.js{$lastModify}"></script>
{* <script src="{$template}/assets/js/pdpa.js{$lastModify}"></script> *}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script type="text/javascript">var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;</script>

{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}