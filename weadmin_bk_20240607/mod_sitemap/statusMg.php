<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

$loaddder = $_POST['Valueloaddder'];
$tablename = $_POST['Valuetablename'];
$statusname = $_POST['Valuestatusname'];
$statusid = $_POST['Valuestatusid'];
$loadderstatus = $_POST['Valueloadderstatus'];
$filestatus = $_POST['Valuefilestatus'];

$sqlSch = "SELECT " . $tablename . "_masterkey  FROM " . $tablename . " WHERE  " . $tablename . "_id='" . $statusid . "' ";
$querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
$rowSch = wewebFetchArrayDB($coreLanguageSQL, $querySch);
$valMasterkey = $rowSch[0];
$_REQUEST['masterkey'] = $valMasterkey;

if ($statusname == "Enable") {
    $inputstatusname = "Disable";
} else if ($statusname == "Disable") {
    $inputstatusname = "Enable";
}


$sql = "UPDATE " . $tablename . " SET "
    . $tablename . "_status= '$inputstatusname'  WHERE " . $tablename . "_id='" . $statusid . "'";
$Query = wewebQueryDB($coreLanguageSQL, $sql);

// load inc
require_once './inc/function-mod.php';

?>
<?php if ($inputstatusname == "Enable") { ?>
    <a href="javascript:void(0)" onclick="changeStatus('<?php echo $loaddder ?>','<?php echo $tablename ?>','<?php echo $inputstatusname ?>','<?php echo $statusid ?>','<?php echo $loadderstatus ?>','<?php echo $filestatus ?>')"><span class="fontContantTbEnable"><?php echo $inputstatusname ?></span></a>

<?php } else { ?>
    <a href="javascript:void(0)" onclick="changeStatus('<?php echo $loaddder ?>','<?php echo $tablename ?>','<?php echo $inputstatusname ?>','<?php echo $statusid ?>','<?php echo $loadderstatus ?>','<?php echo $filestatus ?>')"><span class="fontContantTbDisable"><?php echo $inputstatusname ?></span></a>
<?php } ?>

<img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="<?php echo $loaddder ?>" />