<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/

$mainPage = new mainPage;

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

$smarty->assign("settingWeb", $settingWeb);
$smarty->assign("languageWeb", $languageWeb);
$smarty->assign("languageFrontWeb", $languageFrontWeb);
$smarty->assign("lcfWeb", $lcfWeb);
$smarty->assign("sitemapWeb", $sitemapWeb);
$smarty->assign("currentLangWeb", $currentLangWeb);
// print_pre($languageWeb);