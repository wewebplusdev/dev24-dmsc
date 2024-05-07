<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root . "_id as id,
" . $mod_tb_root . "_credate as credate,
" . $mod_tb_root . "_masterkey as masterkey,
" . $mod_tb_root . "_gid as gid,
" . $mod_tb_root . "_subject as subject,
" . $mod_tb_root . "_title as title,
" . $mod_tb_root . "_tel as tel,
" . $mod_tb_root . "_email as email,
" . $mod_tb_root . "_name as name,
" . $mod_tb_root . "_status as status ,
" . $mod_tb_root . "_ip as ip ,
" . $mod_tb_root . "_address as address ,

" . $mod_tb_root . "_complaint_name as complaint_name ,
" . $mod_tb_root . "_complaint_time as complaint_time ,
" . $mod_tb_root . "_complaint_fac as complaint_fac ,
" . $mod_tb_root . "_complaint_desc1 as complaint_desc1 ,
" . $mod_tb_root . "_complaint_desc2 as complaint_desc2 ,
" . $mod_tb_root . "_complaint_confirm as complaint_confirm 
";
$sql .= " FROM " . $mod_tb_root . " 
WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "' 
AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' 
AND " . $mod_tb_root . "_language = '" . $_REQUEST['inputLt'] . "' ";

$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valCredate = DateFormat($Row['credate']);
$valCreby = $Row['crebyid'];
$valStatus = $Row['status'];
if ($valStatus == "Read") {
   $valStatusClass = "fontContantTbEnable";
}else {
   $valStatusClass = "fontContantTbDisable";
}

$valSubject = rechangeQuot($Row['subject']);
$valTitle = rechangeQuot($Row['title']);
$valGid = rechangeQuot($Row['gid']);
$valTel = rechangeQuot($Row['tel']);
$valEmail = rechangeQuot($Row['email']);
$valName = rechangeQuot($Row['name']);
$valIP = rechangeQuot($Row['ip']);
$valAddress = rechangeQuot($Row['address']);

$valComplaintName = rechangeQuot($Row['complaint_name']);
$valComplaintTime = rechangeQuot($Row['complaint_time']);
$valComplaintFac = rechangeQuot($Row['complaint_fac']);
$valComplaintDesc1 = rechangeQuot($Row['complaint_desc1']);
$valComplaintDesc2 = rechangeQuot($Row['complaint_desc2']);
$valComplaintConfirm = rechangeQuot($Row['complaint_confirm']);


if ($valID > 0) {
   $update = array();
   $update[] = $mod_tb_root . "_status='Read'";
   $sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $valID . "' ";
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
}

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="robots" content="noindex, nofollow" />
   <meta name="googlebot" content="noindex, nofollow" />
   <link href="../css/bootstrap.min.css" rel="stylesheet" />
   <link href="../css/theme.css?v=<?php echo date('Ymdhis'); ?>" rel="stylesheet" />
   <link href="../css/table_css.css?v=<?php echo date('Ymdhis'); ?>" rel="stylesheet" />

   <title><?php echo  $core_name_title ?></title>
   <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
   <form action="?" method="get" name="myForm" id="myForm">
      <input name="execute" type="hidden" id="execute" value="update" />
      <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
      <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
      <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $_REQUEST['module_pageshow'] ?>" />
      <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $_REQUEST['module_pagesize'] ?>" />
      <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $_REQUEST['module_orderby'] ?>" />

      <input name="valEditID" type="hidden" id="valEditID" value="<?php echo  $_REQUEST['valEditID'] ?>" />
      <input name="inputLt" type="hidden" id="inputLt" value="<?php echo  $_REQUEST['inputLt'] ?>" />

      <?php include_once './inc-inputsearch.php'; ?>

      <? if ($_REQUEST['viewID'] <= 0) { ?>
         <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
               <tr>
                  <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php echo  $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo  $langMod["txt:titleview"] ?></span></td>
                  <td class="divRightNavTb" align="right">
                  </td>
               </tr>
            </table>
         </div>
      <? } ?>
      <div class="divRightHead">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
            <tr>
               <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langMod["txt:titleview"] ?></span></td>
               <td align="left">
                  <table border="0" cellspacing="0" cellpadding="0" align="right">
                     <tr>
                        <td align="right">
                           <div class="btnBack" title="<?php echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </div>
      <div class="divRightMain">
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo  $langMod["txt:subjectDe"] ?></span>
               </td>
            </tr>
            <!-- <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["meu:group2"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <?php
                     $sql_group = "SELECT " . $mod_tb_root_group . "_id," . $mod_tb_root_group_lang . "_subject
                     FROM " . $mod_tb_root_group . "
                     INNER JOIN " . $mod_tb_root_group_lang . " ON " . $mod_tb_root_group . "_id = " . $mod_tb_root_group_lang . "_cid
                     WHERE  " . $mod_tb_root_group . "_masterkey ='" . $_REQUEST["masterkey"] . "' AND " . $mod_tb_root_group_lang . "_language='" . $_REQUEST['inputLt'] . "'  AND " . $mod_tb_root_group . "_id='" . $valGid . "'
                     ORDER BY " . $mod_tb_root_group . "_order DESC ";
                     $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                     $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
                     echo $row_groupname = $row_group[1];
                     ?>
                  </div>
               </td>
            </tr> -->
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:name"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valName ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:address"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valAddress ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:email"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valEmail ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:tel"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valTel ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:subject"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valSubject ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:title"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valTitle ?></div>
               </td>
            </tr>
         </table>
         <br />
         <?php if (in_array($_REQUEST['masterkey'], $array_masterkey_detail)) { ?>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:report"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo  $langMod["txt:reportDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:name_report"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valComplaintName ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:rank_report"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valComplaintTime ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:fac_report"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $modValueFac[$valComplaintFac] ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:corruption_report"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valComplaintDesc1 ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:rich_report"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valComplaintDesc2 ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:confirm_report"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $modValueConfirm[$valComplaintConfirm] ?></div>
               </td>
            </tr>
         </table>
         <br />
         <?php } ?>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo  $langTxt["us:titleinfo"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo  $langTxt["us:titleinfoDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:ip"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valIP ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:credate"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo  $valCredate ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["mg:status"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">

                     <? if ($valStatus == "Enable") { ?>
                        <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                     <? } else if ($valStatus == "Home") { ?>
                        <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                     <? } else { ?>
                        <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                     <? } ?>
                  </div>
               </td>
            </tr>
         </table>
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
               <td colspan="7" align="right" valign="top" height="20"></td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo  $langTxt["btn:gototop"] ?>"><?php echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
            </tr>
         </table>
      </div>
   </form>
   <script src="../js/bootstrap/bootstrap_edition.min.js"></script>
   <? include("../lib/disconnect.php"); ?>
   <? if ($_REQUEST['viewID'] <= 0) { ?>
      <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
      <script language="JavaScript" type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
      <script type="text/javascript">
         jQuery(function() {
            jQuery('a[rel=viewAlbum]').fancybox({
               'padding': 0,
               'transitionIn': 'fade',
               'transitionOut': 'fade',
               'autoSize': false,
            });
         });
      </script>
   <? } ?>

   <script type='text/javascript' src='../<?php echo  $mod_fd_root ?>/swfobject.js'></script>
   <script type='text/javascript' src='../<?php echo  $mod_fd_root ?>/silverlight.js'></script>
   <script type='text/javascript' src='../<?php echo  $mod_fd_root ?>/wmvplayer.js'></script>
   <script type='text/javascript'>
      var filename = "<?php echo  $filename ?>";
      var filetype = "<?php echo  $filetype ?>";
      var cnt = document.getElementById("areaPlayer");
      if (filetype == "flv") {
         var s1 = new SWFObject('../<?php echo  $mod_fd_root ?>/player.swf', 'player', '560', '315', '9');
         s1.addParam('allowfullscreen', 'true');
         s1.addParam('wmode', 'transparent');
         s1.addParam('allowscriptaccess', 'always');
         s1.addParam('flashvars', 'file=<?php echo  $mod_path_vdo ?>/' + filename);
         s1.write('areaPlayer');
      } else /* if(filetype=="wmv")*/ {

         var src = '../<?php echo  $mod_fd_root ?>/wmvplayer.xaml';
         var cfg = "";
         var ply;
         cfg = {
            file: '<?php echo  $mod_path_vdo ?>/' + filename,
            image: '',
            height: '315',
            width: '560',
            autostart: "false",
            windowless: 'true',
            showstop: 'true'
         };
         ply = new jeroenwijering.Player(cnt, src, cfg);
      }

      $(function() {

         $('.tool-items').hide();
      });
   </script>


</body>

</html>