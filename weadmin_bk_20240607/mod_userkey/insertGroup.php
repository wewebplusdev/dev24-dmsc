<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

	if($_REQUEST['execute']=="insert"){

		$sql = "SELECT MAX(".$mod_tb_root_group."_order) FROM ".$mod_tb_root_group;
		$Query=wewebQueryDB($coreLanguageSQL, $sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL, $Query);
		$maxOrder = $Row[0]+1;
		
		$insert=array();
		$insert[$mod_tb_root_group."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
		$insert[$mod_tb_root_group."_masterkey"] = "'".$_REQUEST["masterkey"]."'";
		$insert[$mod_tb_root_group."_subject"] = "'".changeQuot($_REQUEST['inputSubject'])."'";
		$insert[$mod_tb_root_group."_title"] = "'".changeQuot($_REQUEST['inputComment'])."'";
		$insert[$mod_tb_root_group."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root_group."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root_group."_lastbyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root_group."_lastby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root_group."_credate"] = "NOW()";
		$insert[$mod_tb_root_group."_lastdate"] = "NOW()";
		$insert[$mod_tb_root_group."_status"] = "'Disable'";
		$insert[$mod_tb_root_group."_order"] = "'".$maxOrder."'";
		$sql="INSERT INTO ".$mod_tb_root_group."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=wewebQueryDB($coreLanguageSQL, $sql);			
		$contantID=wewebInsertID($coreLanguageSQL,$mod_tb_root_group,$mod_tb_root_group."_id");
		

		$cutTxtPermission=$_POST['PermissionWeb'];
		$cutTxtPermissionArray=explode(",",$cutTxtPermission);
		for($i=0;$i<count($cutTxtPermissionArray);$i++){
				$txtPermission=explode(":",$cutTxtPermissionArray[$i]);
				
				$insert=array();
				$insert[$core_tb_permission_website."_mid"] = "'".$contantID."'";
				$insert[$core_tb_permission_website."_webid"] = "'".$txtPermission[0]."'";
				$insert[$core_tb_permission_website."_permission"] = "'".$txtPermission[1]."'";
				$sql="INSERT INTO ".$core_tb_permission_website."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
				$Query=wewebQueryDB($coreLanguageSQL,$sql);		
				
				
		}

	
		 logs_access('3','Insert Group');
		 } ?>
<? include("../lib/disconnect.php");?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputgroupid']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
