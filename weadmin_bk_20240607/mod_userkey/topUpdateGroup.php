<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

		$sql = "SELECT MAX(".$mod_tb_root_group."_order) FROM ".$mod_tb_root_group;
		$Query=wewebQueryDB($coreLanguageSQL, $sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL, $Query);
		$maxOrder = $Row[0]+1;

		$update=array();
		$update[]=$mod_tb_root_group."_order='".$maxOrder."'";
		$update[]=$mod_tb_root_group."_lastbyid='".$_SESSION[$valSiteManage.'core_session_id']."'";
		$update[]=$mod_tb_root_group."_lastby='".$_SESSION[$valSiteManage.'core_session_name']."'";
		$update[]=$mod_tb_root_group."_lastdate=NOW()";

		$sql="UPDATE ".$mod_tb_root_group." SET ".implode(",",$update)." WHERE ".$mod_tb_root_group."_id='".$_POST["valEditID"]."' ";
		$Query=wewebQueryDB($coreLanguageSQL, $sql);

		 logs_access('3','Sort');
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
    <input name="inputTh" type="hidden" id="inputTh" value="<?=$_REQUEST['inputTh']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
