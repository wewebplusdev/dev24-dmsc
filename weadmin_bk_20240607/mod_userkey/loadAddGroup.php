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

			 $myRand = time().rand(111,99);
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);

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
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
  genDataAdmin();
  document.myForm.Permission.value="";
	with(document.myForm) {
	
		if(isBlank(inputSubject)) {
			inputSubject.focus();
			jQuery("#inputSubject").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputSubject").removeClass("formInputContantTbAlertY"); 
		}

	

	}
	
	insertContactNew('insertGroup.php');
	
}


jQuery(document).ready(function(){

  jQuery('#myForm').keypress(function(e) {
    if (e.which == 13) {
		//e.preventDefault();
		executeSubmit();
		return false; 
    }
  });
});


</script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="insert" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
    <input name="PermissionWeb" type="hidden" id="PermissionWeb" value="" />
    <input name="Permission" type="hidden" id="Permission" value="" />
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?=$langMod["meu:group"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleaddg"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>(<?=$langTxt["lg:thai"]?>)<? }?></span></td>
                        <td  class="divRightNavTb" align="right">
                        

                        
                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleaddg"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>(<?=$langTxt["lg:thai"]?>)<? }?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                     <? if($valPermission=="RW" ){?>
                                                        <div  class="btnSave" title="<?=$langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
                                                      <? }?>
                                                        <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('group.php')"></div>
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
        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:selectgn"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb"/></td>
  </tr>
          <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:noteg"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <textarea name="inputComment"  id="inputComment" cols="20" rows="5" class="formTextareaContantTb"></textarea>
    </td>
  </tr>

  </table>
     <br />

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " >

  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["pr:titlePer"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["pr:titlePerDe"]?></span>    </td>
    </tr>
  
   <tr >
    <td colspan="7" align="left"  valign="top" class="formTileTxt">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
   <tr ><td align="left"  valign="middle"  class="tbRightTitleTbL" >
       <span style="color:#54667a;" class="fontTitlTbRight"><?=$langTxt["mg:subject"]?> </span></td>
    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span onclick="checkAllAdmin('WebsiteRW');"  style="cursor:pointer;color:#00CC00;"  class="fontTitlTbRight"><?=$langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTbR"  valign="middle"  align="center"><span onclick="checkAllAdmin('WebsiteNA');"  style="cursor:pointer;color:#FF0000;"  class="fontTitlTbRight"><?=$langTxt["pr:all"]?></span></td>
  </tr>
   <?
  // Admin
  $sqlTopic="SELECT * FROM ".$mod_tb_root." WHERE  ".$mod_tb_root."_masterkey = '".$_REQUEST['masterkey']."' AND ".$mod_tb_root."_status = 'Enable'     ORDER BY ".$mod_tb_root."_order DESC";
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
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?=$topic1[$mod_tb_root."_id"]?>"  id="WebsiteRW<?=$topic1[$mod_tb_root."_id"]?>"type="radio" class="formRadioContantTb"  value="RW" onclick="checkInSubAdmin('WebsiteRW',<?=$topic1[$mod_tb_root."_id"]?>)" /></div>
    <div class="formDivRadioR"  style="color:#00CC00;"><?=$langTxt["pr:manage"]?></div>
    </label>
    </div>
    
    </td>
    
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?=$topic1[$mod_tb_root."_id"]?>" id="WebsiteNA<?=$topic1[$mod_tb_root."_id"]?>" type="radio" class="formRadioContantTb" value="NA" onclick="checkInSubAdmin('WebsiteNA',<?=$topic1[$mod_tb_root."_id"]?>)"  /></div>
    <div class="formDivRadioR" style="color:#FF0000;"><?=$langTxt["pr:noaccess"]?></div>
    </label>
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
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" > 
  

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
  </table>
  </div>
</form> 

 <? include("../lib/disconnect.php");?>
<script language="JavaScript" type="text/javascript">
      var  idArrAdmin=new Array(<?=$topicIndex?>);
      for(i=0; i < <?=$topicIndex?>;i++){
         idArrAdmin[i]=new Array(2);
      }
    <?  for($i=0;$i < $topicIndex;$i++){
              echo  "idArrAdmin[".$i."][0]=".$dataArrAdmin[$i][0].";";
              echo  "idArrAdmin[".$i."][1]=".$dataArrAdmin[$i][1].";";
      }     
    ?>    
    function  checkAllAdmin(type){
      for(i=0;i < <?=$topicIndex?>;i++){
          document.getElementById(type+idArrAdmin[i][0]).checked=true;
      }
    }
    
    function  checkInSubAdmin(type,topicId){
      for(i=0;i < <?=$topicIndex?>;i++){
          if(idArrAdmin[i][1]==topicId){
            document.getElementById(type+idArrAdmin[i][0]).checked=true;
          }
      }
    }
    
    function genDataAdmin(){
      var genStrAdmin="";
      for(i=0;i < <?=$topicIndex?>;i++){
      
            if(document.getElementById("WebsiteRW"+idArrAdmin[i][0]).checked==true) { 
              genStrAdmin+=idArrAdmin[i][0]+":RW"; 
            }else{
              genStrAdmin+=idArrAdmin[i][0]+":NA"; 
            }
            
            if(i != <?=$topicIndex-1?>){
              genStrAdmin+=",";
            }
      }
    document.myForm.PermissionWeb.value=genStrAdmin;
    }   



  </script>
</body>
</html>
