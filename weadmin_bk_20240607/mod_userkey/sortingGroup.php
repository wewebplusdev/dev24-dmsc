<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

$valSortArray=explode("&listItem[]=","&".$_POST['inputSort']);
 $valSortCount= count($valSortArray);
 
	for($i=0;$i<$valSortCount;$i++){
		$valSort =$valSortArray[$i];
		$valOrder = $valSortCount-$i;
		if($valSort>=1){
			 $sql = "UPDATE ".$mod_tb_root_group." SET ".$mod_tb_root_group."_order = $valOrder WHERE ".$mod_tb_root_group."_id = $valSort";
			$query=wewebQueryDB($coreLanguageSQL, $sql);
		}
			
	}

logs_access('3','Sort Group');
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
