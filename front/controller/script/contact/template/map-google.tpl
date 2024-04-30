{include file="inc/inc-header-map.tpl" title=title}
<div class="full-map">
    <div class="iframe-container">
        <iframe class="responsive-iframe"
            src="https://maps.google.com/maps?q={$settingWeb['contact']->glati},{$settingWeb['contact']->glongti}&hl=es;z=20&amp;output=embed"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>