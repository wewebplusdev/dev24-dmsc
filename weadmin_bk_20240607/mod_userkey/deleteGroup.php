<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

for($i=1;$i<=$_REQUEST['TotalCheckBoxID'];$i++) {
	$myVar=$_REQUEST['CheckBoxID'.$i];

	if(strlen($myVar)>=1) {
	$permissionID=$myVar;
			// $sql="DELETE FROM ".$mod_tb_root_email." WHERE ".$mod_tb_root_email."_gid=".$permissionID." ";
			// $Query=wewebQueryDB($coreLanguageSQL, $sql);
		

			$sql="DELETE FROM ".$mod_tb_root_group." WHERE ".$mod_tb_root_group."_id=".$permissionID." ";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
			
			$sql="DELETE FROM ".$core_tb_permission_website." WHERE ".$core_tb_permission_website."_mid=".$permissionID." ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			//  $sql="DELETE FROM md_hoo WHERE md_hoo_memuid=".$_REQUEST['menukeyid']." AND  md_hoo_siteid=".$_SESSION[$valSiteManage . 'core_session_id']."  AND  md_hoo_contantid=".$permissionID."   AND  md_hoo_table='".$mod_tb_root_group."'  ";
			// $Query=wewebQueryDB($coreLanguageSQL, $sql);
		
		}}
		 logs_access('3','Delete Group');
	?>
<? include("../lib/disconnect.php");?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
