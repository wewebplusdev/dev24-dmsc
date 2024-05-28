<?php
// call services
$loadServices = $HomePage->loadServices();
if ($loadServices->code == 1001) {
    $smarty->assign("loadServices", $loadServices);
}