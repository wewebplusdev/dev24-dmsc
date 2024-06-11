<?
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

if ($statusname == "Enable") {
    $inputstatusname = "Disable";
} else if ($statusname == "Disable") {
    $inputstatusname = "Enable";
}

$sql = "SELECT
" . $mod_tb_set . "_id as id,
" . $mod_tb_setlang . "_config as config 
 FROM " . $mod_tb_set . " INNER JOIN " . $mod_tb_setlang . " ON " . $mod_tb_set . "_id = " . $mod_tb_setlang . "_containid
 WHERE " . $mod_tb_setlang . "_id='" . $statusid . "' ";

$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$ValConfig = unserialize($Row['config']);
$ValConfig['popupstatus'] = $inputstatusname;

$sql = "UPDATE " . $tablename . " SET "
    . $tablename . "_config= '" . serialize($ValConfig) . "'  WHERE " . $tablename . "_id='" . $statusid . "'";
    // print_pre($sql);
$Query = wewebQueryDB($coreLanguageSQL, $sql);
?>
<? if ($inputstatusname == "Enable") { ?>
    <a href="javascript:void(0)" onclick="changeStatus('<?= $loaddder ?>','<?= $tablename ?>','<?= $inputstatusname ?>','<?= $statusid ?>','<?= $loadderstatus ?>','<?= $filestatus ?>')"><span class="fontContantTbEnable"><?= $inputstatusname ?></span></a>
<?  } else { ?>
    <a href="javascript:void(0)" onclick="changeStatus('<?= $loaddder ?>','<?= $tablename ?>','<?= $inputstatusname ?>','<?= $statusid ?>','<?= $loadderstatus ?>','<?= $filestatus ?>')"><span class="fontContantTbDisable"><?= $inputstatusname ?></span></a>
<? } ?>
<img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="<?= $loaddder ?>" />