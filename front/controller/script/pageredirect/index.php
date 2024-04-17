<?php
$menuActive = "pageredirect";

$pageredirectage = new pageredirectage;
if (!empty($url->segment[1])) {
    $case_slug = explode("|", urldecode($url->segment[1]));
    $array_req = array(
        'table' => decodeStr($case_slug[0]),
        'masterkey' => decodeStr($case_slug[1]),
        'id' => decodeStr($case_slug[2]),
        'language' => decodeStr($case_slug[3]),
        'action' => 'link',
        'download' => decodeStr($case_slug[4]),
    );
    print_pre($array_req);
    
    // call redirect 
    $load_url_redirect = $pageredirectage->load_url_redirect($array_req);
    print_pre($load_url_redirect);die;
    if ($load_url_redirect->code === 1001 && !empty($load_url_redirect->item->url)) {
        header('location:' . $load_url_redirect->item->url);
    }else{
        header('location:' . $linklang . "/home");
    }
}else{
    header('location:' . $linklang . "/home");
}

exit(0);
