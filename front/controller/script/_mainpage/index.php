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
// printPre($MainPage->settingWeb->sitemap);