<?php
header('Content-Type: application/json; charset=utf-8');


$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptchaSecretkey . '&response=' . $_POST['g-recaptcha-response']);
$responseData = json_decode($verifyResponse);

if ($responseData->success || true) {
    $arrData = array();
    foreach ($_POST as $key_form => $value_form) {
        $arrData[$key_form] = $value_form;
    }
    $arrData['ip'] = getip();
    $arrData['action'] = 'contact';
    $arrData['method'] = 'insertCorruption';
    $arrData['language'] = $contactPage->language;
    
    // insert
    $insert_data = $contactPage->load_data($arrData);
    if ($insert_data->code == 1001) {
        $arrJson = array(
            'code' => 1001,
            'msg' => 'success',
        );
    }else{
        $arrJson = array(
            'code' => 400,
            'msg' => 'unsuccess',
            'icon' => 'error',
            'title' => $languageFrontWeb->errorReturn->display->$currentLangWeb,
            'text' => $languageFrontWeb->tryAgainReturn->display->$currentLangWeb,
        );   
    }
    echo json_encode($arrJson);
}else{
    $arrJson = array(
        'code' => 1000,
        'msg' => 'recaptcha unsuccess',
        'icon' => 'error',
        'title' => $languageFrontWeb->errorReturn->display->$currentLangWeb,
        'text' => $languageFrontWeb->tryAgainReturn->display->$currentLangWeb,
    );
    echo json_encode($arrJson);
}
