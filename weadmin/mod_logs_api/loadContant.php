<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = getNameMenu($_REQUEST["menukeyid"]);
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

// setting permissions site
if (!empty($_REQUEST['inputGh2'])) {
   $req_id = $_REQUEST['inputGh2'];
} else {
   $req_id = $_SESSION[$valSiteManage . "core_session_minisite"]['id'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="robots" content="noindex, nofollow">
   <meta name="googlebot" content="noindex, nofollow">

   <link href="../css/theme.css" rel="stylesheet" />
   <title><?php echo $core_name_title ?></title>
   <link rel="stylesheet" href="../js/jquery-ui-1.9.0.css">
   <script language="JavaScript" type="text/javascript" src="../js/jquery-3.7.0.min.js"></script>
   <script language="JavaScript" type="text/javascript" src="../js/jquery-ui-1.13.2.js"></script>
   <script language="JavaScript" type="text/javascript" src="../js/jquery.blockUI.js"></script>
   <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
   <script type="text/javascript" language="javascript">
      jQuery(document).ready(function() {

         jQuery('#myForm').keypress(function(e) {
            if (e.which == 13) {
               //e.preventDefault();

               document.myForm.submit();;
               return false;

            }
            /* End  Enter Check CKeditor */
         });


      });
   </script>
</head>

<body>
   <?php
   // Check to set default value #########################
   $module_default_pagesize = $core_default_pagesize;
   $module_default_maxpage = $core_default_maxpage;
   $module_default_reduce = $core_default_reduce;
   $module_default_pageshow = 1;
   $module_sort_number = $core_sort_number;

   if ($_REQUEST['module_pagesize'] == "") {
      $module_pagesize = $module_default_pagesize;
   } else {
      $module_pagesize = $_REQUEST['module_pagesize'];
   }

   if ($_REQUEST['module_pageshow'] == "") {
      $module_pageshow = $module_default_pageshow;
   } else {
      $module_pageshow = $_REQUEST['module_pageshow'];
   }

   if ($_REQUEST['module_adesc'] == "") {
      $module_adesc = $module_sort_number;
   } else {
      $module_adesc = $_REQUEST['module_adesc'];
   }

   if ($_REQUEST['module_orderby'] == "") {
      $module_orderby = $mod_tb_root . "_time";
   } else {
      $module_orderby = $_REQUEST['module_orderby'];
   }

   if ($_REQUEST['inputSearch'] != "") {
      $inputSearch = trim($_REQUEST['inputSearch']);
   } else {
      $inputSearch = $_REQUEST['inputSearch'];
   }

   $sqlSelect = "
					" . $mod_tb_root . "_action as action,
					" . $mod_tb_root . "_sessid as sessid,
					" . $mod_tb_root . "_sname  AS sname,
					" . $mod_tb_root . "_time as credate,
					" . $mod_tb_root . "_type as type,
					" . $mod_tb_root . "_token as token ,
					" . $mod_tb_root . "_sid AS sid
					";
   $sqlWhere = " WHERE 1=1";
   $sqlSearch = "";

   if ($inputSearch <> "") {
      $sqlSearch = $sqlSearch . "  AND   ( " . $mod_tb_root . "_action LIKE '%$inputSearch%'  OR  " . $mod_tb_root . "_sname LIKE '%$inputSearch%'OR " . $mod_tb_root . "_sid LIKE '%$inputSearch%' OR " . $mod_tb_root . "_type LIKE '%$inputSearch%'   ) ";
   }

   if ($_REQUEST['sdateInputSe'] <> "" && $_REQUEST['edateInputSe'] <> "") {
      $valSdate = DateFormatInsertNoTime($_REQUEST['sdateInputSe']);
      $valEdate = DateFormatInsertNoTime($_REQUEST['edateInputSe']);

      $sqlSearch = $sqlSearch . "  AND  (" . $mod_tb_root . "_time BETWEEN '" . $valSdate . " 00:00:00' AND '" . $valEdate . " 23:59:59')  ";
   }

   if ($_REQUEST['inputGh'] >= 1) {
      $keySearchGh = $modTxtTypeAccess[$_REQUEST['inputGh']];

      $sqlSearch = $sqlSearch . "  AND " . $mod_tb_root . "_action ='" . $keySearchGh . "'   ";
   }


   $sql_export = "SELECT  " . $sqlSelect . "  FROM " . $mod_tb_root;
   $sql_export .= $sqlWhere;
   $sql_export .= $sqlSearch;
   $sql_export .= " ORDER BY $module_orderby  DESC ";
   /* ################ Replace SQL To Export ############## */

   $sql_export = str_replaceExport($sql_export, "1");
   ?>
   <form action="?" method="post" name="myFormExport" id="myFormExport">
      <input name="sql_export" type="hidden" id="sql_export" value="<?php echo $sql_export ?>" />
      <input name="language_export" type="hidden" id="language_export" value="<?php echo $_SESSION[$valSiteManage . 'core_session_language'] ?>" />
      <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST["masterkey"] ?>" />
      <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST["menukeyid"] ?>" />
      <input name="inputGh2" type="hidden" id="inputGh2" value="<?php echo $req_id ?>" />
   </form>

   <form action="?" method="post" name="myForm" id="myForm">
      <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
      <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
      <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $module_pageshow ?>" />
      <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $module_pagesize ?>" />
      <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $module_orderby ?>" />

      <div class="divRightNav">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
               <td class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $valNav2 ?></span></td>
               <td class="divRightNavTb" align="right">



               </td>
            </tr>
         </table>
      </div>
      <div class="divRightHeadSearch table-insub">
         <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;" align="center">
            <tr>
               <td>
                  <input style="margin-bottom: 10px;" name="sdateInput" type="text" id="sdateInput" placeholder="<?php echo $langMod["tit:sSedate"] ?>" autocomplete="off" value="<?php echo trim($_REQUEST['sdateInputSe']) ?>" class="formInputSearchStyle sdateInput"/>
               </td>
               <td>
                  <input style="margin-bottom: 10px;" name="edateInput" type="text" id="edateInput" placeholder="<?php echo $langMod["tit:eSedate"] ?>" autocomplete="off" value="<?php echo trim($_REQUEST['edateInputSe']) ?>" class="formInputSearchStyle" />
               </td>
            </tr>
            <tr>
               <td>
                  <select name="inputGh" id="inputGh" onchange="document.myForm.submit();" class="formSelectSearchStyle">
                     <option value="0"><?php echo $langMod["tit:typeAccessSle"] ?> </option>
                     <?php
                     $countTypeAccessArray = count($modTxtTypeAccess);
                     for ($iType = 1; $iType < $countTypeAccessArray; $iType++) {
                     ?>
                        <option value="<?php echo $iType ?>" <?php if ($_REQUEST['inputGh'] == $iType) { ?> selected="selected" <?php } ?>><?php echo $modTxtTypeAccess[$iType] ?></option>
                     <?php } ?>
                  </select>
               </td>
               <td id="boxSelectTest">
                  <input name="inputSearch" type="text" id="inputSearch" value="<?= trim($_REQUEST['inputSearch']) ?>" class="formInputSearchStyle" placeholder="<?= $langTxt["sch:search"] ?>" />
               </td>
               <td class="bottonSearch" align="right">
                  <input name="searchOk" id="searchOk" onClick="document.myForm.submit();" type="button" class="btnSearch" value=" " />
               </td>
            </tr>

         </table>
      </div>
      <div class="divRightHead">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
            <tr>
               <td height="77" align="left"><span class="fontHeadRight"><?php echo $valNav2 ?></span></td>
               <td align="left">
                  <table border="0" cellspacing="0" cellpadding="0" align="right">
                     <tr>
                        <td align="right">
                           <?php if ($valPermission == "RW") { ?>


                              <div class="btnExport" title="<?php echo $langTxt["btn:export"] ?>" onclick="
                                                      document.myFormExport.action = 'exportReport.php';
                                                      document.myFormExport.submit();
                                                  "></div>
                           <?php } ?>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </div>
      <div class="divRightMain">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxListwBorder">
            <tr>
               <td align="left" valign="middle" class="divRightTitleTbL" style="height:30px; padding-left:10px;"><span class="fontTitlTbRight"><?php echo $langMod["mg:subject"] ?></span></td>
               <td width="20%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo $langTxt["us:creby"] ?></span></td>
               <td width="10%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo $langMod["home:accesscode"] ?></span></td>
               <td width="20%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo $langMod["home:access"] ?></span></td>
               <td width="10%" class="divRightTitleTbR" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo $langTxt["home:date"] ?></span></td>
            </tr>
            <?php
            // SQL SELECT #########################
            $sql = "SELECT " . $sqlSelect . "  FROM " . $mod_tb_root;
            $sql .= $sqlWhere;
            $sql .= $sqlSearch;

            //                 print_pre($sql);
            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_totalrecord = wewebNumRowsDB($coreLanguageSQL, $query);

            // Find max page size #########################
            if ($count_totalrecord > $module_pagesize) {
               $numberofpage = ceil($count_totalrecord / $module_pagesize);
            } else {
               $numberofpage = 1;
            }

            // Recover page show into range #########################
            if ($module_pageshow > $numberofpage) {
               $module_pageshow = $numberofpage;
            }

            // Select only paging range #########################
            $recordstart = ($module_pageshow - 1) * $module_pagesize;

            $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";

            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
            $index = 1;
            $valDivTr = "divSubOverTb";
            if ($count_record > 0) {
               while ($index < $count_record + 1) {
                  $row = wewebFetchArrayDB($coreLanguageSQL, $query);
                  $valStatusType = $row['type'];
                  $valStatusCode = $row['sid'];
                  $valNameService = rechangeQuot($row['action']);
                  $valName = rechangeQuot($row['sname']);
                  if ($valName == "") {
                     $valName = "-";
                  }

                  $valDateCredate = dateFormatReal($row['credate']);
                  $valTimeCredate = timeFormatReal($row['credate']);

                  if ($valActiontype == 1) {
                     $valSubject = $langTxt["home:login"];
                  } else if ($valActiontype == 2) {
                     $valSubject = $langTxt["nav:userManage2"];
                  } else if ($valActiontype == 3) {
                     $valSubject = getNameMenu($valMenuid);
                  } else if ($valActiontype == 4) {
                     $valSubject = $langTxt["nav:perManage2"];
                  } else {
                     $valSubject = $valUrl;
                  }

                  if ($valDivTr == "divSubOverTb") {
                     $valDivTr = "divOverTb";
                  } else {
                     $valDivTr = "divSubOverTb";
                  }
                  /*
                                   $sql_s = "SELECT
                                   " . $core_tb_setting . "." . $core_tb_setting . "_id as id,
                                   " . $core_tb_setting . "." . $core_tb_setting . "_subject as subject,
                                   " . $core_tb_setting . "." . $core_tb_setting . "_title as title,
                                   " . $core_tb_setting . "." . $core_tb_setting . "_masterkey as masterkey
                                   FROM
                                   " . $core_tb_setting . "
                                   WHERE
                                   1=1 ";
                                   $sql_s .= " and " . $core_tb_setting . "." . $core_tb_setting . "_status = 'Enable'";
                                   $sql_s .= " and " . $core_tb_setting . "." . $core_tb_setting . "_issite = '1'";
                                   $sql_s .= " and " . $core_tb_setting . "." . $core_tb_setting . "_id = '" . $row['minisite'] . "'";
                                   $sql_s .= " order by " . $core_tb_setting . "." . $core_tb_setting . "_order desc";
                                   $query_s = wewebQueryDB($coreLanguageSQL, $sql_s);
                                   $row_s = wewebFetchArrayDB($coreLanguageSQL, $query_s);
                                   $valNameMinisite = $row_s['subject'] ? $row_s['subject'] : '-';
                                  */
            ?>
                  <tr class="<?php echo $valDivTr ?>">
                     <td class="divRightContantOverTbL" valign="top" align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td align="left" style="padding-top:3px; padding-left:10px;">
                                 <div class="widthDiv">
                                    <span class="fontContantTbupdate"><?php echo $valNameService ?></span>
                                 </div>
                              </td>
                           </tr>
                        </table>
                     </td>

                     <td class="divRightContantOverTb" valign="top" align="center"><span class="fontContantTbupdate"><?php echo $valName ?></span></td>
                     <td class="divRightContantOverTb" valign="top" align="center"><span class="fontContantTbupdate"><?php echo $valStatusCode ?></span></td>
                     <td class="divRightContantOverTb" valign="top" align="center">


                        <span class="fontContantTbupdate"><?php echo $valStatusType ?></span>
                     </td>
                     <td class="divRightContantOverTbR" valign="top" align="center">
                        <span class="fontContantTbupdate"><?php echo $valDateCredate ?></span><br />
                        <span class="fontContantTbTime"><?php echo $valTimeCredate ?></span>
                     </td>
                  </tr>

               <?php
                  $index++;
               }
            } else {
               ?>
               <tr>
                  <td colspan="4" align="center" valign="middle" class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;"><?php echo $langTxt["mg:nodate"] ?></td>
               </tr>
            <?php } ?>

            <tr>
               <td colspan="5" align="center" valign="middle" class="divRightContantTbRL">
                  <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
                     <tr>
                        <td class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?php echo $langTxt["pr:All"] ?> <b><?php echo number_format($count_totalrecord) ?></b> <?php echo $langTxt["pr:record"] ?></span></td>
                        <td class="divRightNavTb" align="right">
                           <table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                 <td align="right" style="padding-right:10px;"><span class="fontContantTbNavPage"><?php echo $langTxt["pr:page"] ?>
                                       <?php if ($numberofpage > 1) { ?>
                                          <select name="toolbarPageShow" class="formSelectContantPage" onChange="document.myForm.module_pageshow.value = this.value;
                                                                  document.myForm.submit();
                                                                 ">
                                             <?php
                                             if ($numberofpage < $module_default_maxpage) {
                                                // Show page list #########################
                                                for ($i = 1; $i <= $numberofpage; $i++) {
                                                   echo "<option value=\"$i\"";
                                                   if ($i == $module_pageshow) {
                                                      echo " selected";
                                                   }
                                                   echo ">$i</option>";
                                                }
                                             } else {
                                                // # If total page count greater than default max page  value then reduce page select size #########################
                                                $starti = $module_pageshow - $module_default_reduce;
                                                if ($starti < 1) {
                                                   $starti = 1;
                                                }
                                                $endi = $module_pageshow + $module_default_reduce;
                                                if ($endi > $numberofpage) {
                                                   $endi = $numberofpage;
                                                }
                                                //#####################
                                                for ($i = $starti; $i <= $endi; $i++) {
                                                   echo "<option value=\"$i\"";
                                                   if ($i == $module_pageshow) {
                                                      echo " selected";
                                                   }
                                                   echo ">$i</option>";
                                                }
                                             }
                                             ?>
                                          </select>
                                       <?php } else { ?>
                                          <b><?php echo $module_pageshow ?></b>
                                       <?php } ?>
                                       <?php echo $langTxt["pr:of"] ?> <b><?php echo $numberofpage ?></b></span></td>
                                 <?php if ($module_pageshow > 1) { ?>
                                    <td width="21" align="center"> <img src="../img/controlpage/playset_start.gif" width="21" height="21" onmouseover="this.src = '../img/controlpage/playset_start_active.gif';
                                                            this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_start.gif';" onclick="document.myForm.module_pageshow.value = 1;
                                                                  document.myForm.submit();" style="cursor:pointer;" /></td>
                                 <?php } else { ?>
                                    <td width="21" align="center"><img src="../img/controlpage/playset_start_disable.gif" width="21" height="21" /></td>
                                 <?php } ?>
                                 <?php
                                 if ($module_pageshow > 1) {
                                    $valPrePage = $module_pageshow - 1;
                                 ?>
                                    <td width="21" align="center"> <img src="../img/controlpage/playset_backward.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src = '../img/controlpage/playset_backward_active.gif';
                                                            this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_backward.gif';" onclick="document.myForm.module_pageshow.value = '<?php echo $valPrePage ?>';
                                                                  document.myForm.submit();" /></td>
                                 <?php } else { ?>
                                    <td width="21" align="center"><img src="../img/controlpage/playset_backward_disable.gif" width="21" height="21" /></td>
                                 <?php } ?>
                                 <td width="21" align="center"> <img src="../img/controlpage/playset_stop.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src = '../img/controlpage/playset_stop_active.gif';
                                                      this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_stop.gif';" onclick="
                                                            with (document.myForm) {
                                                               module_pageshow.value = '';
                                                               module_pagesize.value = '';
                                                               module_orderby.value = '';
                                                               document.myForm.submit();
                                                            }
                                                                                    " /></td>
                                 <?php
                                 if ($module_pageshow < $numberofpage) {
                                    $valNextPage = $module_pageshow + 1;
                                 ?>
                                    <td width="21" align="center"> <img src="../img/controlpage/playset_forward.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src = '../img/controlpage/playset_forward_active.gif';
                                                            this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_forward.gif';" onclick="document.myForm.module_pageshow.value = '<?php echo $valNextPage ?>';
                                                                  document.myForm.submit();" /></td>
                                 <?php } else { ?>
                                    <td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
                                 <?php } ?>
                                 <?php if ($module_pageshow < $numberofpage) { ?>
                                    <td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src = '../img/controlpage/playset_end_active.gif';
                                                            this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_end.gif';" onclick="document.myForm.module_pageshow.value = '<?php echo $numberofpage ?>';
                                                                  document.myForm.submit();" /></td>
                                 <?php } else { ?>
                                    <td width="10" align="center"><img src="../img/controlpage/playset_end_disable.gif" width="21" height="21" /></td>
                                 <?php } ?>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php echo $index - 1 ?>" />
         <div class="divRightContantEnd"></div>
      </div>

   </form>
   <?php if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") { ?>
      <script language="JavaScript" type="text/javascript" src="../js/datepickerThai.js"></script>
   <?php } else { ?>
      <script language="JavaScript" type="text/javascript" src="../js/datepickerEng.js"></script>
   <?php } ?>
   <?php include("../lib/disconnect.php"); ?>

</body>

</html>