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
			// if($_REQUEST['inputLt']=="Thai"){
			$sql .= "
			".$mod_tb_root."_id ,
			".$mod_tb_root."_credate ,
			".$mod_tb_root."_crebyid,
			".$mod_tb_root."_status,
			".$mod_tb_root."_lastdate,
			".$mod_tb_root."_subject ,
			".$mod_tb_root."_lastbyid
         ";
		
			 $sql .= " ,".$mod_tb_root."_controlkey as controlkey,  ".$mod_tb_root."_secretkey as secretkey,  ".$mod_tb_root."_note as note ";
			$sql .= " FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_REQUEST["masterkey"]."'  AND  ".$mod_tb_root."_id='".$_REQUEST['valEditID']."' ";
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
			$valSubject=rechangeQuot($Row[5]);
			$valLastby=$Row[6];

      $valControlKey = trim($Row['controlkey']);
      $valSecretKey = trim($Row['secretkey']);
			$valNote=rechangeQuot($Row['note']);
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);

			logs_access('3','View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow"/>
<meta name="googlebot" content="noindex, nofollow"/>
<link href="../css/theme.css" rel="stylesheet"/>
<style>
  .info, .success, .warning, .error, .validation {
    border: 1px solid;
    /* margin: 10px 0px; */
    padding: 15px 0px 15px 0px;
    background-repeat: no-repeat;
    background-position: 10px center;
    max-width: 90%;
    word-break: break-all;
  }
  .info {
    color: #00529B;
    background-color: #BDE5F8;
    /* background-image: url('https://i.imgur.com/ilgqWuX.png'); */
  }
  .success {
    color: #4F8A10;
    background-color: #DFF2BF;
    /* background-image: url('https://i.imgur.com/Q9BGTuy.png'); */
  }
  .warning {
    color: #9F6000;
    background-color: #FEEFB3;
    /* background-image: url('https://i.imgur.com/Z8q7ww7.png'); */
  }
  .error{
    color: #D8000C;
    background-color: #FFBABA;
    /* background-image: url('https://i.imgur.com/GnyDvKN.png'); */
  }
  .validation{
    color: #D63301;
    background-color: #FFCCBA;
    /* background-image: url('https://i.imgur.com/GnyDvKN.png'); */
  }
</style>
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
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?=getNameMenu($_REQUEST["menukeyid"])?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleview"]?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                    <? }?>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleview"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
													<? if($_REQUEST['viewID']<=0){?>
                                                    <? if($valPermission=="RW"){?>
                                                        <div  class="btnEditView" title="<?=$langTxt["btn:edit"]?>" onclick="
                                                        document.myFormHome.valEditID.value=<?=$valID?>;
                                                        editContactNew('../<?=$mod_fd_root?>/editContant.php')"></div>
                                                     <? }?>
                                                      <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('index.php')"></div>
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
    <span class="formFontSubjectTxt"><?=$langMod["txt:subject"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:subjectDe"]?></span>    </td>
    </tr>
    
	
      <tr>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:inpName"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valSubject?></div></td>
  </tr>
   
  <tr>
    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:controlkey"] ?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
      <div class="formDivView"><?= $valControlKey ?></div>
    </td>
  </tr>
  
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:secretkey"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
        <div class="info" name="inputSecretKey" id="inputSecretKey"><?=$valSecretKey?></div>
          </td> 
        </tr>
         <tr>
    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:noteg"] ?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
      <div class="formDivView"><?= $valNote ?></div>
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
    <!-- <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:view"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valview?></div>         </td>
  </tr> -->
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
<? include("../lib/disconnect.php");?>


</body>
</html>