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
$tablenamefield=$_POST['tablenamefield'];
$menuid=$_POST['menuid'];
$valParentidMenu=loadGetParentidMenu($menuid);

		if($tablename==$mod_tb_root){
			$sqlSch = "SELECT ".$tablename."_masterkey  FROM ".$tablename." WHERE  ".$tablename."_id='".$statusid."' ";
			$querySch=wewebQueryDB($coreLanguageSQL, $sqlSch);
			$rowSch=wewebFetchArrayDB($coreLanguageSQL, $querySch);
			$valMasterkey=$rowSch[0];
		}
$masterkey=$valMasterkey;
include("config.php");



if($statusname=="Enable"){
$inputstatusname="Disable";
}else if($statusname=="Disable"){
$inputstatusname="Enable";
}
		

     	$sql = "UPDATE ".$tablename." SET "
		.$tablename."_status= '$inputstatusname'  WHERE ".$tablename."_id='". $statusid."'";
		$Query=wewebQueryDB($coreLanguageSQL, $sql);	
		
		/*
		if($inputstatusname=="Home"){
		
		
			$sql = "SELECT MAX(md_hoo_order) FROM  md_hoo WHERE md_hoo_siteid='".$valParentidMenu."' ";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL, $Query);
			$maxOrder = $Row[0]+1;
			

			$insert=array();
			$insert["md_hoo_memuid"] = "'".$menuid."'";
			$insert["md_hoo_siteid"] = "'".$valParentidMenu."'";
			$insert["md_hoo_typeid"] = "'2'";
			$insert["md_hoo_contantid"] = "'".$statusid."'";
			$insert["md_hoo_table"] = "'".$tablename."'";
			$insert["md_hoo_field"] = "'".$tablenamefield."'";
			$insert["md_hoo_order"] = "'".$maxOrder."'";
			 $sql="INSERT INTO "."md_hoo(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);			
		}else{
			 $sql="DELETE FROM md_hoo WHERE   md_hoo_contantid='".$statusid."' AND md_hoo_memuid='".$menuid."' AND md_hoo_siteid='".$valParentidMenu."' ";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
		}
		*/
		
		
	?>
	<? if($inputstatusname=="Enable"){?>
    <a href="javascript:void(0)"  onclick="changeStatusSite('<?=$loaddder?>','<?=$tablename?>','<?=$inputstatusname?>','<?=$statusid?>','<?=$loadderstatus?>','<?=$filestatus?>','<?=$tablenamefield?>','<?=$menuid?>')" ><span class="fontContantTbEnable"><?=$inputstatusname?></span></a>
	<? }else if($inputstatusname=="Home"){?>
    <a href="javascript:void(0)"  onclick="changeStatusSite('<?=$loaddder?>','<?=$tablename?>','<?=$inputstatusname?>','<?=$statusid?>','<?=$loadderstatus?>','<?=$filestatus?>','<?=$tablenamefield?>','<?=$menuid?>')" ><span class="fontContantTbHomeSt"><?=$inputstatusname?></span></a>
                <? }else{?>
    <a href="javascript:void(0)"  onclick="changeStatusSite('<?=$loaddder?>','<?=$tablename?>','<?=$inputstatusname?>','<?=$statusid?>','<?=$loadderstatus?>','<?=$filestatus?>','<?=$tablenamefield?>','<?=$menuid?>')" ><span class="fontContantTbDisable"><?=$inputstatusname?></span></a>
                
                
                <? }?>
                
                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="<?=$loaddder?>" />
                <?
//include("../lib/incRss.php");

				?>
