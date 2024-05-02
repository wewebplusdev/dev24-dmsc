<?php
header('Content-Type: application/json; charset=utf-8');


$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secretkey . '&response=' . $_POST['g-recaptcha-response']);
$responseData = json_decode($verifyResponse);

if ($responseData->success) {
    $arrJson = array(
        'code' => 1001,
        'msg' => 'success',
    );
    echo json_encode($arrJson);
}else{
    $arrJson = array(
        'code' => 1000,
        'msg' => 'recaptcha unsuccess',
    );
    echo json_encode($arrJson);
}
