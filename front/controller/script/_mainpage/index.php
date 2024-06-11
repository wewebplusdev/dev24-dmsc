<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/

$MainPage = new MainPage;

#### POLICY
$loadPolicy = $MainPage->loadPolicy();
$smarty->assign("loadPolicy", $loadPolicy);

#### SETTING
$settingWeb = array();
$settingWeb['subject'] = $MainPage->settingWeb->setting->subject;
$settingWeb['subjectoffice'] = $MainPage->settingWeb->setting->subjectoffice;
$settingWeb['description'] = $MainPage->settingWeb->setting->description;
$settingWeb['keywords'] = $MainPage->settingWeb->setting->keywords;
$settingWeb['metatitle'] = $MainPage->settingWeb->setting->metatitle;
$settingWeb['contact'] = $MainPage->settingWeb->setting->config;
$settingWeb['social'] = $MainPage->settingWeb->setting->social;
$settingWeb['addresspic'] = $MainPage->settingWeb->setting->addresspic->real;

$languageWeb = $MainPage->settingWeb->language;
$languageFrontWeb = $MainPage->settingWeb->language_front;
$lcfWeb = $MainPage->settingWeb->facebook;
$sitemapWeb = $MainPage->settingWeb->sitemap;
$currentLangWeb = $MainPage->settingWeb->current_lang;
$logsView = $MainPage->settingWeb->count_view;
$recaptchaSitekey = $MainPage->recaptchaSitekey;
$recaptchaSecretkey = $MainPage->recaptchaSecretkey;

$smarty->assign("settingWeb", $settingWeb);
$smarty->assign("languageWeb", $languageWeb);
$smarty->assign("languageFrontWeb", $languageFrontWeb);
$smarty->assign("lcfWeb", $lcfWeb);
$smarty->assign("sitemapWeb", $sitemapWeb);
$smarty->assign("currentLangWeb", $currentLangWeb);
$smarty->assign("logsView", $logsView);
$smarty->assign("recaptchaSitekey", $recaptchaSitekey);
$smarty->assign("urlWeb", $url);
// printPre($settingWeb);

// check language
if (gettype($languageWeb) == 'array' && !empty($languageWeb)) {
    // Function to find the object with 'short' equal to 'th'
    function findObjectByShort($array, $short) {
        foreach ($array as $obj) {
            if (isset($obj->short) && $obj->short === $short) {
                return $obj;
            }
        }
        return null; // Return null if not found
    }
    // Find the object with 'short' equal to 'th'
    $foundObject = findObjectByShort($languageWeb, $url->pagelang[2]);
    
    if (!$foundObject) {
        header('location:' . $path_root . '/' . $languageWeb[0]->short . '/intro');
    }
}else{
    if ($url->segment[0] != '404') {
        header('location:' . $linklang . '/404');
    }
}
