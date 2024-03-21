<base href="{$base}">
<title>{$seo.title|default:$settingWeb.metatitle}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="{$seo.keyword|default:$settingWeb.keywords}">
<meta name="description" content="{$seo.desc|default:$settingWeb.description}">
<meta name="author" content="">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">

{assign  var=defultPic value="{$template}/assets/img/static/brand.png"}
{assign  var=valLinkImgSeo value="{$seo.pic|default:$defultPic}"}
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:title" content="{$valSeoTitle|default:$settingWeb.metatitle}">
<meta property="og:description" content="{$valSeoDescription|default:$settingWeb.description}">
<meta property="og:image" content="{$valSeoImages|default:$valLinkImgSeo}">
<meta property="og:site_name" content="">
<meta property="og:locale" content="">
<meta property="og:locale:alternate" content="">

<!--  Generate favicon.ico by https://www.favicon-generator.org/ -->
<link rel="shortcut icon" href="{$template}/assets/favicon/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" sizes="57x57" href="{$template}/assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="{$template}/assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="{$template}/assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="{$template}/assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="{$template}/assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="{$template}/assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="{$template}/assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="{$template}/assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="{$template}/assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/android-icon-192x192.png" sizes="192x192">
<link rel="manifest" href="{$template}/assets/favicon//manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{$template}/assets/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

{strip}
    {if {$assigncss|default:null}}
        {foreach $assigncss as $addAssetCss}
            {$addAssetCss}
        {/foreach}
    {/if}
{/strip}