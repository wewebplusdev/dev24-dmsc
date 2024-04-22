<?php
## load modulus ##
require_once _DIR . '/front/libs/smarty4320/Smarty.class.php';

## smarty start ##
$smarty = new Smarty;
// $smarty = new SmartyBC();
$smarty->loadPlugin('smarty_compiler_switch');
$smarty->debugging = FALSE;
$smarty->caching = FALSE;
$smarty->setTemplateDir($path_template[$templateweb])->setCompileDir($path_compile)->setCacheDir($path_cache);
