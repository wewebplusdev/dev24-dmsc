<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Manage Contant</title>
</head>

<body>
	<?php
	if ($execute == "update") {

		$update = array();
		$update[] = $mod_tb_root . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
		$update[] = $mod_tb_root . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
		$update[] = $mod_tb_root . "_lastdate=NOW()";

		$sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "' ";
		$Query = wewebQueryDB($coreLanguageSQL, $sql);
		
		$sqlcheck = "SELECT " . $mod_tb_root_lang . "_id FROM " . $mod_tb_root_lang . " WHERE " . $mod_tb_root_lang . "_language = '" . $_REQUEST['inputLt'] . "' AND " . $mod_tb_root_lang . "_cid = '" . $_POST["valEditID"] . "'";
		$Querycheck = wewebQueryDB($coreLanguageSQL, $sqlcheck);
		$count_check = wewebNumRowsDB($coreLanguageSQL, $Querycheck);
		if ($count_check > 0) {
			$update = array();
			$update[] = $mod_tb_root_lang . "_subject='" . changeQuot($_POST['inputSubject']) . "'";
			$update[] = $mod_tb_root_lang . "_address='" . changeQuot($_POST['inputAddress']) . "'";
			$update[] = $mod_tb_root_lang . "_tel='" . changeQuot($_POST['inputTel']) . "'";
			$update[] = $mod_tb_root_lang . "_fax='" . changeQuot($_POST['inputFax']) . "'";
			$update[] = $mod_tb_root_lang . "_lat='" . changeQuot($_POST['latInput']) . "'";
			$update[] = $mod_tb_root_lang . "_long='" . changeQuot($_POST['longInput']) . "'";

			$update[] = $mod_tb_root_lang . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
			$update[] = $mod_tb_root_lang . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
			$update[] = $mod_tb_root_lang . "_lastdate=NOW()";

			$sql = "UPDATE " . $mod_tb_root_lang . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root_lang . "_id='" . $_POST["valCid"] . "' AND " . $mod_tb_root_lang . "_language = '" . $_REQUEST['inputLt'] . "'";
			$Query = wewebQueryDB($coreLanguageSQL, $sql);
		} else {
			$insertLang = array();
			$insertLang[$mod_tb_root_lang . "_cid"] = "'" . $_POST["valEditID"] . "'";
			$insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
			$insertLang[$mod_tb_root_lang . "_language"] = "'" . $_POST['inputLt'] . "'";
			$insertLang[$mod_tb_root_lang . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
			$insertLang[$mod_tb_root_lang . "_address"] = "'" . changeQuot($_REQUEST['inputAddress']) . "'";
			$insertLang[$mod_tb_root_lang . "_tel"] = "'" . changeQuot($_REQUEST['inputTel']) . "'";
			$insertLang[$mod_tb_root_lang . "_fax"] = "'" . changeQuot($_REQUEST['inputFax']) . "'";
			$insertLang[$mod_tb_root_lang . "_lat"] = "'" . changeQuot($_REQUEST['latInput']) . "'";
			$insertLang[$mod_tb_root_lang . "_long"] = "'" . changeQuot($_REQUEST['longInput']) . "'";

			$insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
			$insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
			$insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";
			$sql = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
			wewebQueryDB($coreLanguageSQL, $sql);
		}

		logs_access('3', 'Update');

	?>
	<?php  } ?>
	<?php include("../lib/disconnect.php"); ?>
	<form action="index.php" method="post" name="myFormAction" id="myFormAction">
		<input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
		<input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
		<input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
		<input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
		<input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
		<input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
		<input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGroupID'] ?>" />
		<input name="inputTh" type="hidden" id="inputTh" value="<?php echo $_REQUEST['inputSubID'] ?>" />
		<?php include_once './inc-inputsearch.php'; ?>
	</form>
	<script language="JavaScript" type="text/javascript">
		document.myFormAction.submit();
	</script>
</body>

</html>