<?php
## load modulus ##
require_once _DIR . '/front/libs/smarty4320/Smarty.class.php';

## smarty start ##
$smarty = new Smarty;
$smarty->loadPlugin('smarty_compiler_switch');
$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir($path_template[$templateweb])->setCompileDir($path_compile)->setCacheDir($path_cache);
