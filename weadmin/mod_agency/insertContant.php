<?PHP
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];

if ($_REQUEST['execute'] == "insert") {
	$randomNumber = rand(111, 999);

	$sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
	$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
	$maxOrder = $Row[0] + 1;

	$insert = array();
	$insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
	$insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
	$insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
	$insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
	$insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
	$insert[$mod_tb_root . "_credate"] = "NOW()";
	$insert[$mod_tb_root . "_lastdate"] = "NOW()";
	$insert[$mod_tb_root . "_status"] = "'Disable'";
	$insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";
	$sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
	$contantID1 = wewebInsertID($coreLanguageSQL);
	$array_sch = array();
	if ($contantID1 > 0) {
		foreach ($arrLang as $keyLang => $valueLang) {
			if ($valueLang['key'] == $_SESSION[$valSiteManage . 'core_session_language']) {
				$insertLang = array();
				$insertLang[$mod_tb_root_lang . "_cid"] = "'" . $contantID1 . "'";
				$insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
				$insertLang[$mod_tb_root_lang . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
				$insertLang[$mod_tb_root_lang . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
				$insertLang[$mod_tb_root_lang . "_address"] = "'" . changeQuot($_REQUEST['inputAddress']) . "'";
				$insertLang[$mod_tb_root_lang . "_tel"] = "'" . changeQuot($_REQUEST['inputTel']) . "'";
				$insertLang[$mod_tb_root_lang . "_fax"] = "'" . changeQuot($_REQUEST['inputFax']) . "'";
				$insertLang[$mod_tb_root_lang . "_lat"] = "'" . changeQuot($_REQUEST['latInput']) . "'";
				$insertLang[$mod_tb_root_lang . "_long"] = "'" . changeQuot($_REQUEST['longInput']) . "'";
				$insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
				$insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
				$insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";
				$sql2 = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
				wewebQueryDB($coreLanguageSQL, $sql2);
			} else {
				$insertLang = array();
				$insertLang[$mod_tb_root_lang . "_cid"] = "'" . $contantID1 . "'";
				$insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
				$insertLang[$mod_tb_root_lang . "_language"] = "'" . $valueLang['key'] . "'";
				$insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
				$insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
				$insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";

				$sqllang = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
				wewebQueryDB($coreLanguageSQL, $sqllang);
			}
		}
	}

	logs_access('3', 'Insert');
} ?>
<?PHP include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
	<input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
	<input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
	<input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
	<input name="inputGh" type="hidden" id="inputGh" value="<?php echo  $_REQUEST['inputGroupID'] ?>" />
	<input name="inputTh" type="hidden" id="inputTh" value="<?php echo  $_REQUEST['inputSubID'] ?>" />
	<?php include_once './inc-inputsearch.php'; ?>
</form>
<script language="JavaScript" type="text/javascript">
	document.myFormAction.submit();
</script>