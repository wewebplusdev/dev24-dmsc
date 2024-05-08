<?php
$menuActive = "pageredirect";

$pageredirectage = new pageredirectage;
if (!empty($url->segment[1])) {
    $case_slug = explode("|", urldecode($url->segment[1]));

    /*#### Start Update View #####*/
    if (!isset($_COOKIE['VIEW_DETAIL_' . decodeStr($case_slug[1]) . '_' . urldecode(decodeStr($case_slug[2]))])) {
        setcookie("VIEW_DETAIL_" . decodeStr($case_slug[1]) . '_' . urldecode(decodeStr($case_slug[2])), true, time() + 600, '/', _URL, true, true);
        $view = 1;
    }else{
        $view = 0;
    }
    /*#### End Update View #####*/
   

    $array_req = array(
        'table' => decodeStr($case_slug[0]),
        'masterkey' => decodeStr($case_slug[1]),
        'id' => decodeStr($case_slug[2]),
        'language' => decodeStr($case_slug[3]),
        'action' => 'link',
        'download' => decodeStr($case_slug[4]),
        'urlc2' => decodeStr($case_slug[5]),
        'view' => $view,
    );
    // print_pre($array_req);
    
    // call redirect 
    $loadUrlRedirect = $pageredirectage->loadUrlRedirect($array_req);
    // print_pre($loadUrlRedirect);die;
    if ($loadUrlRedirect->code === 1001 && !empty($loadUrlRedirect->item->url)) {
        header('location:' . $loadUrlRedirect->item->url);
    }else{
        header('location:' . $linklang . "/home");
    }
}else{
    header('location:' . $linklang . "/home");
}

exit(0);
