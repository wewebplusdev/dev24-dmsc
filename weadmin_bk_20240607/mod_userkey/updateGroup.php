<?	
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
<?
	if($execute=="update"){

		$update=array();
		if($_REQUEST['inputLt']=="Thai"){
		$update[]=$mod_tb_root_group."_subject='".changeQuot($_POST['inputSubject'])."'";
		$update[]=$mod_tb_root_group."_title  	='".changeQuot($_POST['inputComment'])."'";
		}else{
		$update[]=$mod_tb_root_group."_subjecten='".changeQuot($_POST['inputSubject'])."'";
		$update[]=$mod_tb_root_group."_titleen  	='".changeQuot($_POST['inputComment'])."'";
		}
		
		$update[]=$mod_tb_root_group."_lastbyid='".$_SESSION[$valSiteManage.'core_session_id']."'";
		$update[]=$mod_tb_root_group."_lastby='".$_SESSION[$valSiteManage.'core_session_name']."'";
		$update[]=$mod_tb_root_group."_lastdate=NOW()";

		$sql="UPDATE ".$mod_tb_root_group." SET ".implode(",",$update)." WHERE ".$mod_tb_root_group."_id='".$_POST["valEditID"]."' ";
		$Query=wewebQueryDB($coreLanguageSQL, $sql);
		$contantID = $_POST["valEditID"];

		
		$sql="DELETE FROM ".$core_tb_permission_website." WHERE ".$core_tb_permission_website."_mid=".$contantID." ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		
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
		
		
		logs_access('3','Update Group');
		?>
        <? } ?>
 <? include("../lib/disconnect.php");?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
            		</body></html>	
