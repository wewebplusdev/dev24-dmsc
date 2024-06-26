<?php

// $data = array();
// $data['action'] = 'contact';
// $data['method'] = 'getAdmin';
// $data['masterkey'] = 'cum';
// $data['language'] = $ContactPage->language;
// $contact_data = $ContactPage->loadData($data);

// $array_email = array();
// $array_email[] = trim($_POST["inputEmail"]);

// if ($contact_data->code == 1001) {
//     foreach ($contact_data->item as $keyEmail => $valueEmail) {
//         $array_email[] = trim($valueEmail->email);
//     }
// }
// $array_email = array_filter($array_email);
// require_once _DIR . FULL_SCRIPT_PATH . $menuActive . '/service/mailer-global.php'; #load service
// loadSendEmailTo($array_email, 'กรมวิทยาศาสตร์การแพทย์ - ติดต่อเรา', $message);

// printPre($array_email);die;
// die;

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

        $data = array();
        $data['action'] = 'contact';
        $data['method'] = 'getAdmin';
        $data['masterkey'] = 'cum';
        $data['language'] = $ContactPage->language;
        $contact_data = $ContactPage->loadData($data);

        $array_email = array();
        $array_email[] = trim($_POST["inputEmail"]);

        if ($contact_data->code == 1001) {
            foreach ($contact_data->item as $keyEmail => $valueEmail) {
                $array_email[] = trim($valueEmail->email);
            }
        }
        $array_email = array_filter($array_email);
        require_once _DIR . FULL_SCRIPT_PATH . $menuActive . '/service/mailer-global.php'; #load service
        loadSendEmailTo($array_email, 'กรมวิทยาศาสตร์การแพทย์ - ติดต่อเรา', $message);
        // loadSendEmailTo(trim($_POST["inputEmail"]), 'กรมวิทยาศาสตร์การแพทย์ - ติดต่อเรา', $message);

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
