<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/

$mainPage = new mainPage;

#### POLICY
$load_policy = $mainPage->load_policy();
$smarty->assign("load_policy", $load_policy);

#### SETTING
$settingWeb = array();
$settingWeb['subject'] = $mainPage->settingWeb->setting->subject;
$settingWeb['subjectoffice'] = $mainPage->settingWeb->setting->subjectoffice;
$settingWeb['description'] = $mainPage->settingWeb->setting->description;
$settingWeb['keywords'] = $mainPage->settingWeb->setting->keywords;
$settingWeb['metatitle'] = $mainPage->settingWeb->setting->metatitle;
$settingWeb['contact'] = $mainPage->settingWeb->setting->config;
$settingWeb['social'] = $mainPage->settingWeb->setting->social;

$languageWeb = $mainPage->settingWeb->language;
$languageFrontWeb = $mainPage->settingWeb->language_front;
$lcfWeb = $mainPage->settingWeb->facebook;
$sitemapWeb = $mainPage->settingWeb->sitemap;
$currentLangWeb = $mainPage->settingWeb->current_lang;
$logsView = $mainPage->settingWeb->count_view;
$recaptcha_sitekey = $mainPage->recaptcha_sitekey;
$recaptcha_secretkey = $mainPage->recaptcha_secretkey;

$smarty->assign("settingWeb", $settingWeb);
$smarty->assign("languageWeb", $languageWeb);
$smarty->assign("languageFrontWeb", $languageFrontWeb);
$smarty->assign("lcfWeb", $lcfWeb);
$smarty->assign("sitemapWeb", $sitemapWeb);
$smarty->assign("currentLangWeb", $currentLangWeb);
$smarty->assign("logsView", $logsView);
$smarty->assign("recaptcha_sitekey", $recaptcha_sitekey);

// menu header
// print_pre($mainPage->settingWeb->sitemap);
$is_link = '/th/downloadAll/dcio_d';
// $is_link = '';
function header_active($link){
    global $path_root;

    if (!empty($link)) {
        $new_url = explode("//" . $_SERVER['HTTP_HOST'] . $path_root, _FullUrl);
        if (str_contains($new_url[1], $link)) {
            return true;
        }
    }else{
        return false;
    }
}

$header_active = header_active($is_link);
// print_pre($header_active);