<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sql = "SELECT  ";
$sql .= "   " . $mod_tb_root_subgroup . "_id, " . $mod_tb_root_subgroup . "_credate ,
      " . $mod_tb_root_subgroup . "_crebyid, " . $mod_tb_root_subgroup . "_status  ";

$sql .= "  ,   (SELECT " . $mod_tb_root_subgroup_lang . "_subject FROM " . $mod_tb_root_subgroup_lang . " WHERE " . $mod_tb_root_subgroup_lang . "_language='" . $_REQUEST['inputLt'] . "' AND  " . $mod_tb_root_subgroup_lang . "_cid 	='" . $_POST["valEditID"] . "') as subject,
      (SELECT " . $mod_tb_root_subgroup_lang . "_title FROM " . $mod_tb_root_subgroup_lang . " WHERE " . $mod_tb_root_subgroup_lang . "_language='" . $_REQUEST['inputLt'] . "' AND  " . $mod_tb_root_subgroup_lang . "_cid 	='" . $_POST["valEditID"] . "') as title ";

$sql .= " ," . $mod_tb_root_subgroup_lang . "_coreid,  " . $mod_tb_root_subgroup . "_col,  " . $mod_tb_root_subgroup . "_pic,  " . $mod_tb_root_subgroup . "_pic2 ";
$sql .= " , " . $mod_tb_root_subgroup . "_timekm as timekm ";
$sql .= " 	FROM " . $mod_tb_root_subgroup . " INNER JOIN " . $mod_tb_root_subgroup_lang . " ON " . $mod_tb_root_subgroup . "_id = " . $mod_tb_root_subgroup_lang . "_cid WHERE " . $mod_tb_root_subgroup_lang . "_masterkey='" . $_POST["masterkey"] . "' AND  " . $mod_tb_root_subgroup . "_id 	='" . $_POST["valEditID"] . "'
      ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valid = $Row[0];
$valcredate = DateFormat($Row[1]);
$valcreby = $Row[2];
$valstatus = $Row[3];
$valSubject = rechangeQuot($Row[4]);
$valTitle = rechangeQuot($Row[5]);
$valCoreID = rechangeQuot($Row[6]);
$valColor = rechangeQuot($Row[7]);
$valPicName = $Row[8];
$valPic = $mod_path_pictures . "/" . $Row[8];

$valPicName2 = $Row[9];
$valPic2 = $mod_path_pictures . "/" . $Row[9];

$valtimekm = $Row['timekm'];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
      <meta name="robots" content="noindex, nofollow"/>
      <meta name="googlebot" content="noindex, nofollow"/>
      <link href="../css/bootstrap.min.css" rel="stylesheet" />
      <link href="../css/theme.css?v=<?php echo date('Ymdhis'); ?>" rel="stylesheet" />
      <link href="../css/table_css.css?v=<?php echo date('Ymdhis'); ?>" rel="stylesheet" />
      <link href="js/uploadfile.css" rel="stylesheet" />
      <title><?php echo $core_name_title ?></title>
      <link href="../js/select2/css/select2.css" rel="stylesheet" />

      <script language="JavaScript" type="text/javascript" src="../js/select2/js/select2.js"></script>
      <!-- <script src="https://code.jquery.com/jquery-1.11.3.js"></script> -->
      <script language="JavaScript" type="text/javascript" src="../js/jquery.blockUI.js"></script>
      <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js?v=<?php echo date('Ymdhis'); ?>"></script>
      <script language="JavaScript" type="text/javascript">
         function executeSubmit() {
            with (document.myForm) {


               if (isBlank(inputSubject)) {
                  inputSubject.focus();
                  jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                  return false;
               } else {
                  jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
               }

//               if (isBlank(inputTimeKm)) {
//                  inputTimeKm.focus();
//                  jQuery("#inputTimeKm").addClass("formInputContantTbAlertY");
//                  return false;
//               } else {
//                  jQuery("#inputTimeKm").removeClass("formInputContantTbAlertY");
//               }

            }

            updateContactNew('updateSubGroup.php');

         }


         function loadCheckUser() {
            with (document.myForm) {
               var inputValuename = document.myForm.inputUserName.value;
            }
            if (inputValuename != '') {
               checkUsermember(inputValuename);
            }
         }



         jQuery(document).ready(function () {

            jQuery('#myForm').keypress(function (e) {
               /* Start  Enter Check CKeditor */

               if (e.which == 13) {
                  executeSubmit();
                  return false;
               }
               /* End  Enter Check CKeditor */
            });
         });


      </script>
   </head>

   <body>
      <form action="?" method="get" name="myForm" id="myForm">
         <input name="execute" type="hidden" id="execute" value="update" />
         <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
         <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
         <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
         <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
         <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />

         <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
         <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID'] ?>" />
         <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt'] ?>" />
         <input name="inputgroupID" type="hidden" id="inputgroupID" value="<?php echo $_REQUEST['inputgroupID'] ?>" />

         <?php include_once './inc-inputsearch.php'; ?>
         <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
               <tr>
                  <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?php echo $langMod["meu:group"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleeditg"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php } ?></span></td>
                  <td  class="divRightNavTb" align="right">



                  </td>
               </tr>
            </table>
         </div>
         <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
               <tr>
                  <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleeditg"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php } ?></span></td>
                  <td align="left">
                     <table  border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                           <td align="right">
                              <?php if ($valPermission == "RW") { ?>
                                 <div  class="btnSave" title="<?php echo $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                              <?php } ?>
                              <div  class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('subgroup.php')"></div>
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
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:subjectg"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:subjectgDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:subjectg"] ?><span class="fontContantAlert">*</span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?php echo $valSubject ?>"/></td>
               </tr>
               <tr style="display: none;">
                  <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:timeKm"] ?><span class="fontContantAlert">*</span></td>
                  <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                     <select name="inputTimeKm" id="inputTimeKm" class="formSelectContantTb">
                        <option value="0">เลือก<?php echo $langMod["tit:timeKm"] ?></option>
                        <?php
                        foreach ($mod_distance AS $distance) {
                           $selected = $valtimekm == $distance ? "selected" : "";
                           ?>
                           <option value="<?= $distance ?>" <?= $selected ?>><?php echo $distance ?></option>
                           <?php
                        }
                        ?>
                     </select>
                  </td>
               </tr>
               <tr style="display: none;">
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:color"] ?><span class="fontContantAlert">*</span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputColor" id="inputColor" type="text"  class="izzyColor" value="<?php echo $valColor ?>" style="border: 1px solid <?php echo $valColor ?>;" /></td>
               </tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:noteg"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <textarea name="inputComment"  id="inputComment" cols="20" rows="5" class="formTextareaContantTb"><?php echo $valTitle ?></textarea>
                  </td>
               </tr>
               <tr>
                  <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:subjectGtype"] ?><span class="fontContantAlert">*</span></td>
                  <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                     <ul class="ul-select-multiple item-list" style="margin: 0;">
                        <?php
                        $sql_group = "SELECT " . $mod_tb_root . "_id"
                                . "," . $mod_tb_root_lang . "_subject"
                                . "," . $mod_tb_root_lang . "_pic AS pic"
                                . " "
                                . "FROM " . $mod_tb_root . " "
                                . "INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root . "_id = " . $mod_tb_root_lang . "_cid "
                                . "WHERE  " . $mod_tb_root . "_masterkey ='" . $masterkey_todo . "' "
                                . "AND " . $mod_tb_root . "_status!='Disable' "
                                . "AND " . $mod_tb_root_lang . "_language='Thai' "
                                . "ORDER BY " . $mod_tb_root . "_order DESC ";
                        $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                        while ($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
                           $row_groupid = $row_group[0];
                           $row_groupname = $row_group[1];

                           $valPicSub = $core_pathname_upload . "/$masterkey_todo/pictures" . "/" . $row_group["pic"];
                           if (is_file($valPicSub)) {
                              $valPicSub = $valPicSub;
                           } else {
                              $valPicSub = "../img/btn/nopic.jpg";
                           }

                           $is_subgroup = match_todog($row_groupid, $valid);
                           ?>
                           <li class="box-data-work-all box-data-work-<?= $row_groupid ?>">
                              <div class="wrapper">
                                 <label>
                                    <input type="checkbox" value="<?= $row_groupid ?>" name="inputtodoID[]" id="inputtodoID<?= $row_groupid ?>" <?php if ($is_subgroup) { ?>checked<?php } ?>/>
                                    <img src="<?= $valPicSub ?>"/>
                                    <p>
                                       <?= $row_groupname ?>
                                    </p>

                                 </label>
                              </div>
                           </li>
                           <?php
                        }
                        ?>
                     </ul>
                  </td>
               </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:album"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <div class="file-input-wrapper">
                        <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                        <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                     </div>

                     <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"] ?></span>
                     <div class="clearAll"></div>
                     <div id="boxPicNew" class="formFontTileTxt">
                        <?php if (is_file($valPic)) { ?>
                           <img src="<?php echo $valPic ?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
                           <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                           <input type="hidden" name="picname" id="picname" value="<?php echo $valPicName ?>" />
                        <?php } ?>
                     </div></td>
               </tr>
               <tr style="display:none;">
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $modTxtShowPic[0] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <label>
                        <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio"  class="formRadioContantTb" <?php if ($valPicShow != 2) { ?> checked="checked" <?php } ?>  /></div>
                        <div class="formDivRadioR"><?php echo $modTxtShowPic[1] ?></div>
                     </label>

                     <label>
                        <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic"  value="2"  type="radio"  class="formRadioContantTb" <?php if ($valPicShow == 2) { ?> checked="checked" <?php } ?> /></div>
                        <div class="formDivRadioR"><?php echo $modTxtShowPic[2] ?></div>
                     </label>
                     </label>
                  </td>
               </tr>
            </table>
            <br />

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt">รูปภาพพื้นหลัง</span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:album"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <div class="file-input-wrapper">
                        <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                        <input type="file" name="fileToUpload2" id="fileToUpload2" onchange="ajaxFileUpload2();" />
                     </div>

                     <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"] ?></span>
                     <div class="clearAll"></div>
                     <div id="boxPicNew2" class="formFontTileTxt">
                        <?php if (is_file($valPic2)) { ?>
                           <img src="<?php echo $valPic2 ?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
                           <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload2('deletePic2.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                           <input type="hidden" name="picname2" id="picname2" value="<?php echo $valPicName2 ?>" />
                        <?php } ?>
                     </div></td>
               </tr>
            </table>
            <br />

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
               <tr >
                  <td colspan="7" align="right"  valign="top" height="20"></td>
               </tr>
               <tr >
                  <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
               </tr>
            </table>
         </div>
      </form>
      <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
      <script type="text/javascript" src="izzyColor.js"></script>
      <script type="text/javascript" language="javascript">
                              /*################################# Upload Pic #######################*/
                              function ajaxFileUpload() {
                                 var valuepicname = jQuery("input#picname").val();

                                 jQuery.blockUI({
                                    message: jQuery('#tallContent'),
                                    css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                    }
                                 });


                                 jQuery.ajaxFileUpload({
                                    url: 'loadUpdatePicG.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                                    secureuri: false,
                                    fileElementId: 'fileToUpload',
                                    dataType: 'json',
                                    success: function (data, status) {
                                       if (typeof (data.error) != 'undefined')
                                       {

                                          if (data.error != '')
                                          {
                                             alert(data.error);

                                          } else
                                          {
                                             jQuery("#boxPicNew").show();
                                             jQuery("#boxPicNew").html(data.msg);
                                             setTimeout(jQuery.unblockUI, 200);
                                          }
                                       }
                                    },
                                    error: function (data, status, e)
                                    {
                                       alert(e);
                                    }
                                 }
                                 )
                                 return false;

                              }

                              function ajaxFileUpload2() {
                                 var valuepicname = jQuery("input#picname2").val();

                                 jQuery.blockUI({
                                    message: jQuery('#tallContent'),
                                    css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                    }
                                 });


                                 jQuery.ajaxFileUpload({
                                    url: 'loadUpdatePicG2.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                                    secureuri: false,
                                    fileElementId: 'fileToUpload2',
                                    dataType: 'json',
                                    success: function (data, status) {
                                       if (typeof (data.error) != 'undefined')
                                       {

                                          if (data.error != '')
                                          {
                                             alert(data.error);

                                          } else
                                          {
                                             jQuery("#boxPicNew2").show();
                                             jQuery("#boxPicNew2").html(data.msg);
                                             setTimeout(jQuery.unblockUI, 200);
                                          }
                                       }
                                    },
                                    error: function (data, status, e)
                                    {
                                       alert(e);
                                    }
                                 }
                                 )
                                 return false;

                              }
      </script>
      <?php include("../lib/disconnect.php"); ?>

   </body>
</html>
