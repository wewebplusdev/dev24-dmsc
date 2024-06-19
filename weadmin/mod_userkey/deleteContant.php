<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

$sql_check = "SET FOREIGN_KEY_CHECKS = 0";
$Query = wewebQueryDB($coreLanguageSQL, $sql_check);

for ($i = 1; $i <= $_REQUEST['TotalCheckBoxID']; $i++) {
	$myVar = $_REQUEST['CheckBoxID' . $i];


	if (strlen($myVar) >= 1) {
		$permissionID = $myVar;

		$sql = "SELECT  " . $mod_tb_root . "_pic FROM " . $mod_tb_root . " WHERE  " . $mod_tb_root . "_id='" . $permissionID . "' ";

		######################### Delete  Contant ###############################
		$sql = "DELETE FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_id=" . $permissionID . " ";
		$Query = wewebQueryDB($coreLanguageSQL, $sql);
	}
}
logs_access('3', 'Delete');
$sql_check = "SET FOREIGN_KEY_CHECKS = 1";
$Query = wewebQueryDB($coreLanguageSQL, $sql_check);

?>
<? include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
	<input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
	<input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
	<input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
	<input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
	<input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
	<input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
	<input name="inputGh" type="hidden" id="inputGh" value="<?= $_REQUEST['inputGh'] ?>" />
	<input name="inputTh" type="hidden" id="inputTh" value="<?= $_REQUEST['inputTh'] ?>" />
</form>
<script language="JavaScript" type="text/javascript">
	document.myFormAction.submit();
</script>