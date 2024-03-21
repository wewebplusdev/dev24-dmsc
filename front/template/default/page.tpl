<!DOCTYPE html>
<html lang="{$langon}">

<head>
    {include file="{$incfile.metatag}" title=title}
    
    <!-- Cookie Consent by https://www.cookiewow.com -->
    <script type="text/javascript" src="https://cookiecdn.com/cwc.js"></script>
    <script id="cookieWow" type="text/javascript" src="https://cookiecdn.com/configs/XxwWvCXDwKtsHUWb2c4Fm8RH" data-cwcid="XxwWvCXDwKtsHUWb2c4Fm8RH"></script>

    {include file="{$incfile.loadstyle}" title=title}
</head>

<body>
    {* {include file="{$incfile.preloader}" title=title} *}
    <div class="global-container bg-drop">
        {include file="{$incfile.header}" title=title}
        {include file="{$fileInclude|templateInclude}" title=pageContent}
        {include file="{$incfile.footer}" title=title}
        {include file="{$incfile.modal}" title=title}
    </div>
    {include file="{$incfile.loadscript}" title=title}
</body>

</html>