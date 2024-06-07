<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

$loaddder=$_POST['Valueloaddder'];
$tablename=$_POST['Valuetablename'];
$statusname=$_POST['Valuestatusname'];
$statusid=$_POST['Valuestatusid'];
$loadderstatus=$_POST['Valueloadderstatus'];
$filestatus=$_POST['Valuefilestatus'];
$ValMasterkey=$_POST['ValMasterkey'];

// $sqlSch = "SELECT count(".$tablename."_id) as countStatus  FROM ".$tablename." WHERE  ".$tablename."_status='Home' AND  ".$tablename."_masterkey='".$ValMasterkey."'";
// $querySch=wewebQueryDB($coreLanguageSQL,$sqlSch);
// $rowSch=wewebFetchArrayDB($coreLanguageSQL,$querySch);
// $valCount=$rowSch[0];
// // print_pre($valCount);
// if ($valCount == 5 && $statusname !='Home') {
// 	if($statusname=="Enable"){
// 	$inputstatusname="Disable";
// 	}else if($statusname=="Disable"){
// 	$inputstatusname="Enable";
// 	}
// }else{
	if($statusname=="Enable"){
		$inputstatusname="Disable";
		}else if($statusname=="Disable"){
		$inputstatusname="Enable";
		}
// }

	$sql = "UPDATE ".$tablename." SET "
		.$tablename."_status= '$inputstatusname'  WHERE ".$tablename."_id='". $statusid."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);	
		
		if($tablename==$mod_tb_root){
			$sqlSch = "SELECT ".$tablename."_masterkey  FROM ".$tablename." WHERE  ".$tablename."_id='".$statusid."' ";
			$querySch=wewebQueryDB($coreLanguageSQL,$sqlSch);
			$rowSch=wewebFetchArrayDB($coreLanguageSQL,$querySch);
			$valMasterkey=$rowSch[0];
			
			$updateSch="";
			$updateSch[]=$core_tb_search."_status  	='$inputstatusname'";
			$sqlUpdateSch="UPDATE ".$core_tb_search." SET ".implode(",",$updateSch)." WHERE ".$core_tb_search."_contantid='".$statusid."'  AND  ".$core_tb_search."_masterkey 	='".$valMasterkey."'";
			$querylUpdateSch=wewebQueryDB($coreLanguageSQL,$sqlUpdateSch);
		}

	?>
	<? if($inputstatusname=="Enable"){?>
    <a href="javascript:void(0)"  onclick="changeStatus('<?=$loaddder?>','<?=$tablename?>','<?=$inputstatusname?>','<?=$statusid?>','<?=$loadderstatus?>','<?=$filestatus?>')" ><span class="fontContantTbEnable"><?=$inputstatusname?></span></a>

	<? }elseif($inputstatusname=="Home"){ ?>
		<a href="javascript:void(0)"  onclick="changeStatus('<?=$loaddder?>','<?=$tablename?>','<?=$inputstatusname?>','<?=$statusid?>','<?=$loadderstatus?>','<?=$filestatus?>')" ><span class="fontContantTbHomeSt"><?=$inputstatusname?></span></a>

	<?}else{?>
    <a href="javascript:void(0)"  onclick="changeStatus('<?=$loaddder?>','<?=$tablename?>','<?=$inputstatusname?>','<?=$statusid?>','<?=$loadderstatus?>','<?=$filestatus?>')" ><span class="fontContantTbDisable"><?=$inputstatusname?></span></a>
                
                
                <? }?>
                
                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="<?=$loaddder?>" />

     	