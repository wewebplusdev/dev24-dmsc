<?php

$data = array();
$data['action'] = 'contact';
$data['method'] = 'getAdmin';
$data['masterkey'] = 'cum';
$data['language'] = $ContactPage->language;
$insert_data = $ContactPage->loadData($data);
// require_once _DIR . FULL_SCRIPT_PATH . $menuActive . '/service/mailer-global.php'; #load service
// loadSendEmailTo(trim($_POST["inputEmail"]), 'กรมวิทยาศาสตร์การแพทย์ - ติดต่อเรา', $message);
$array_email = array();
$array_email[] = trim($_POST["inputEmail"]);
print_pre($array_email);
die;



header('Content-Type: application/json; charset=utf-8');

$requestParams = [
    'secret' => $recaptchaSecretkey,
    'response' => $_POST['g-recaptcha-response']
];
$requestQuery = http_build_query($requestParams);

$verifyUrl = 'https://www.google.com/recaptcha/api/siteverify?' . $requestQuery;

$verifyResponse = file_get_contents($verifyUrl);

$responseData = json_decode($verifyResponse);

if ($responseData->success) {
    $arrData = array();
    foreach ($_POST as $key_form => $value_form) {
        $arrData[$key_form] = $value_form;
    }
    $arrData['ip'] = getip();
    $arrData['action'] = 'contact';
    $arrData['method'] = 'insertContact';
    $arrData['language'] = $ContactPage->language;
  
    // insert
    $insert_data = $ContactPage->loadData($arrData);
    if ($insert_data->code == 1001) {

        // require_once _DIR . FULL_SCRIPT_PATH . $menuActive . '/service/mailer-global.php'; #load service
        // loadSendEmailTo(trim($_POST["inputEmail"]), 'กรมวิทยาศาสตร์การแพทย์ - ติดต่อเรา', $message);
        $array_email = array();
        $array_email[] = trim($_POST["inputEmail"]);

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
