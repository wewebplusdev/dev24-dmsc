<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

$old = decodeStr($_POST['SecretKeyOLD']);
if ($_POST['SecretKeyOLD'] != '') {
    $Secretkey = encodeStr('secretkey=' . $_POST['inputControlKey'] . '&url=' . $_POST['inputurl']);
} else {
    $Secretkey = encodeStr('secretkey=' . $_POST['inputControlKey'] . '&url=' . $_POST['inputurl']);
}
echo $Secretkey;
