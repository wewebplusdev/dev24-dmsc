<?php
// call services
$loadServices = $HomePage->loadServices();
if ($loadServices->code == 1001) {
    $listjs[] = '<script src="' . _URL . 'front/template/default/assets/js/libs/swiper-bundle.min.js'.$lastModify.'"></script>';
    $smarty->assign("loadServices", $loadServices);
}
