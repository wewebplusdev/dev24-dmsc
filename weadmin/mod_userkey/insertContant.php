<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

	if($_REQUEST['execute']=="insert"){
		$sql = "SELECT MAX(".$mod_tb_root."_order) FROM ".$mod_tb_root;
		$Query=wewebQueryDB($coreLanguageSQL, $sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL, $Query);
		$maxOrder = $Row[0]+1;

		$insert=array();
		$insert[$mod_tb_root."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
		$insert[$mod_tb_root."_masterkey"] = "'".$_REQUEST["masterkey"]."'";
		$insert[$mod_tb_root."_subject"] = "'".changeQuot($_REQUEST['inputSubject'])."'";
		$insert[$mod_tb_root."_controlkey"] = "'".changeQuot($_POST["inputControlKey"])."'";
		$insert[$mod_tb_root."_secretkey"] = "'".changeQuot($_POST["inputSecretKeyHidden"])."'";
		$insert[$mod_tb_root."_note"] = "'".changeQuot($_REQUEST['inputComment'])."'";
		$insert[$mod_tb_root."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root."_lastbyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root."_lastby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root."_credate"] = "".wewebNow($coreLanguageSQL)."";
		$insert[$mod_tb_root."_lastdate"] = "".wewebNow($coreLanguageSQL)."";
		$insert[$mod_tb_root."_status"] = "'Disable'";
		$insert[$mod_tb_root."_order"] = "'".$maxOrder."'";
		 $sql="INSERT INTO ".$mod_tb_root."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=wewebQueryDB($coreLanguageSQL, $sql);
		$contantID=wewebInsertID($coreLanguageSQL,$mod_tb_root,$mod_tb_root."_id");
// print_pre($sql);
		 logs_access('3','Insert');
		 } ?>
<? include("../lib/disconnect.php");?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?=$_REQUEST['inputTh']?>" />

</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
