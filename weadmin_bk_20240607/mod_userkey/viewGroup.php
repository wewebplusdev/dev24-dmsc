<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";

			
			
			$sql = "SELECT   ";
			if($_REQUEST['inputLt']=="Thai"){
				$sql .= "   ".$mod_tb_root_group."_id, ".$mod_tb_root_group."_credate , ".$mod_tb_root_group."_crebyid, ".$mod_tb_root_group."_status	, ".$mod_tb_root_group."_lastdate , ".$mod_tb_root_group."_lastbyid ,    ".$mod_tb_root_group."_subject  ,    ".$mod_tb_root_group."_title   ";
			}else{
				$sql .= "  ".$mod_tb_root_group."_id, ".$mod_tb_root_group."_credate , ".$mod_tb_root_group."_crebyid, ".$mod_tb_root_group."_status	, ".$mod_tb_root_group."_lastdate , ".$mod_tb_root_group."_lastbyid ,    ".$mod_tb_root_group."_subjecten  ,    ".$mod_tb_root_group."_titleen 	  ";
			}
		 	 $sql .= " FROM ".$mod_tb_root_group." WHERE ".$mod_tb_root_group."_masterkey='".$_REQUEST["masterkey"]."'  AND  ".$mod_tb_root_group."_id='".$_REQUEST['valEditID']."' ";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL, $Query);
			$valID=$Row[0];
			$valCredate=DateFormat($Row[1]);
			$valCreby=$Row[2];
			$valStatus=$Row[3];
			if($valStatus=="Enable"){
				$valStatusClass=	"fontContantTbEnable";
			}else{
				$valStatusClass=	"fontContantTbDisable";
			}
			
			$valLastdate=DateFormat($Row[4]);
			$valLastby=$Row[5];
			$valSubject=rechangeQuot($Row[6]);
			$valTitle=rechangeQuot($Row[7]);
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);
			
			logs_access('3','View Group');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>

<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$_REQUEST['valEditID']?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
    <? if($_REQUEST['viewID']<=0){?>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?=$langMod["meu:group"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleviewg"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                        <td  class="divRightNavTb" align="right">
                        

                        
                        </td>
                        </tr>
                        </table>
					</div>
                    <? }?>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleviewg"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
													<? if($_REQUEST['viewID']<=0){?>
                                                    <? if($valPermission=="RW"){?>
                                                        <div  class="btnEditView" title="<?=$langTxt["btn:edit"]?>" onclick="
                                                        document.myFormHome.valEditID.value=<?=$valID?>;  
                                                        editContactNew('../<?=$mod_fd_root?>/editGroup.php')"></div>
                                                     <? }?>
                                                      <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('group.php')"></div>
                                                        <? }?>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
                             
   <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:subjectg"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:subjectgDe"]?></span>    </td>
    </tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:selectgn"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valSubject?></div></td>
  </tr>
        <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:noteg"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valTitle?></div></td>
  </tr>
     

 </table>
   <br />
   <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 

  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["pr:titlePer"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["pr:titlePerDe"]?></span>    </td>
    </tr>
  
   <tr >
    <td colspan="7" align="left"  valign="top" class="formTileTxt">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
   <tr ><td align="left"  valign="middle"  class="tbRightTitleTbL" >
       <span style="color:#54667a;" class="fontTitlTbRight"><?=$langTxt["mg:subject"]?></span></td>

    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span style="color:#FFCC00;" class="fontTitlTbRight"></span></td>
    <td width="18%"  class="tbRightTitleTbR"  valign="middle"  align="center"><span style="color:#FFCC00;"  class="fontTitlTbRight"></span></td>
  </tr>
   <?
  // Admin
  $sqlTopic="SELECT * FROM ".$mod_tb_root." WHERE  ".$mod_tb_root."_masterkey = '".$_REQUEST["masterkey"]."' AND ".$mod_tb_root."_status = 'Enable'     ORDER BY ".$mod_tb_root."_order DESC";
  $QueryTopic=wewebQueryDB($coreLanguageSQL,$sqlTopic) ;

  if(wewebNumRowsDB($coreLanguageSQL,$QueryTopic)<=0){
  ?>
     <tr >
    <td colspan="4" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?=$langTxt["mg:nodate"]?></td>
    </tr>
    <? }else{
      $topicIndex=0;  
      while($topic1=wewebFetchArrayDB($coreLanguageSQL,$QueryTopic)){
      $dataArrAdmin[$topicIndex][0]=$topic1[$mod_tb_root."_id"];
      $dataArrAdmin[$topicIndex][1]=$topic1[$mod_tb_root."_id"];
      
      if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
        $row_namelv1=$topic1[$mod_tb_root."_subject"];
      }else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
        $row_namelv1=$topic1[$mod_tb_root."_subjecten"];
      }
      
      $topicIndex+=1;
      
  ?>
 
  <tr class="divOverTb" >
     <td  class="divRightContantOverTbL"  valign="top" align="left"  style="padding-left:15px;">
     <?=$row_namelv1?>
        </td>
    <td  class="divRightContantOverTb"  valign="top"  align="center">
    <div  style="width:145px; margin:0 auto; text-align:center;">
    <div class="formDivRadioR"  style="color:#00CC00;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="RW<?=$topic1[$mod_tb_root."_id"]?>"   name="RW<?=$topic1[$mod_tb_root."_id"]?>"  border="0"/>&nbsp;<span><?=$langTxt["pr:manage"]?></span>
    </div>
     </div>
    
    </td>
    
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
  <div class="formDivRadioR"  style="color:#FF0000;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="NA<?=$topic1[$mod_tb_root."_id"]?>" name="NA<?=$topic1[$mod_tb_root."_id"]?>"  border="0"/>&nbsp;<span><?=$langTxt["pr:noaccess"]?></span>
    </div>
    </div>   </td>
    
  </tr>
     <? 
   
     }
   }
   
   ?>
  </table>
    </td>
    </tr>
  
    </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["us:titleinfo"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["us:titleinfoDe"]?></span>     </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:credate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valCredate?></div>         </td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valCreby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valCreby);
		}
    
	
	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:lastdate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valLastdate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valLastby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valLastby);
		}
    
	
	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["mg:status"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     
               <? if($valStatus=="Enable"){?>
                   <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }else{?>
                    <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }?>
     </div>         </td>
  </tr>
   </table>
   <br />
      <? if($_REQUEST['viewID']<=0){?>

     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" > 
  <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
    <? }?>
  </table>
  </div>
</form>   
  <? 
 $Field=$core_tb_permission_website;
 $sqlPM="SELECT * FROM ".$Field." WHERE ".$Field."_mid=".$_POST["valEditID"]." ";
 $QueryPM=wewebQueryDB($coreLanguageSQL,$sqlPM) ;
  $numPM=wewebNumRowsDB($coreLanguageSQL,$QueryPM);
 if($numPM>=1){
 ?>
 <script language="JavaScript">
<?
 while($pm=wewebFetchArrayDB($coreLanguageSQL,$QueryPM)){
 ?>
  jQuery("#<?=$pm[$Field."_permission"].$pm[$Field."_webid"]?>").attr("src","../img/btn/true.gif");
<?
 }
 ?>
 </script> 
 <?
  }
 ?>

<? include("../lib/disconnect.php");?>
</body>
</html>
