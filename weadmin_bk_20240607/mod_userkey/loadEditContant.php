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


$sql = "SELECT  ";
// if($_REQUEST['inputLt']=="Thai"){
$sql .= "
			" . $mod_tb_root . "_id,
			" . $mod_tb_root . "_lastdate,
			" . $mod_tb_root . "_creby,
			" . $mod_tb_root . "_status ,
			" . $mod_tb_root . "_subject ";



$sql .= " ," . $mod_tb_root . "_controlkey as controlkey
			,  " . $mod_tb_root . "_secretkey as secretkey
			,  " . $mod_tb_root . "_note as note 
			 ";
$sql .= " 	FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey='" . $_POST["masterkey"] . "' AND  " . $mod_tb_root . "_id 	='" . $_POST["valEditID"] . "'";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valid = $Row[0];
$vallastdate = DateFormat($Row[1]);
$valcreby = $Row[2];
$valstatus = $Row[3];
$valSubject = $Row[4];
$valControlKey = trim($Row['controlkey']);
$valSecretKey = trim($Row['secretkey']);
$valNote = $Row['note'];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />
  <link href="../css/theme.css" rel="stylesheet" />

  <style>
    .info,
    .success,
    .warning,
    .error,
    .validation {
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

    .error {
      color: #D8000C;
      background-color: #FFBABA;
      /* background-image: url('https://i.imgur.com/GnyDvKN.png'); */
    }

    .validation {
      color: #D63301;
      background-color: #FFCCBA;
      /* background-image: url('https://i.imgur.com/GnyDvKN.png'); */
    }
  </style>

  <title><?= $core_name_title ?></title>
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
  <script language="JavaScript" type="text/javascript">
    function executeSubmit() {
      with(document.myForm) {
        // if(inputGroupID.value==0) {
        // 	inputGroupID.focus();
        // 	jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
        // 	return false;
        // }else{
        // 	jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
        // }

        if (isBlank(inputSubject)) {
          inputSubject.focus();
          jQuery("#inputSubject").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
        }

        if (isBlank(inputControlKey)) {
          inputControlKey.focus();
          jQuery("#inputControlKey").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputControlKey").removeClass("formInputContantTbAlertY");
        }


      }

      updateContactNew('updateContant.php');

    }


    function loadCheckUser() {
      with(document.myForm) {
        var inputValuename = document.myForm.inputUserName.value;
      }
      if (inputValuename != '') {
        checkUsermember(inputValuename);
      }
    }
  </script>
</head>

<body>
  <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?= $_REQUEST['inputGh'] ?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
    <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?= $valhtmlname ?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />
    <div class="divRightNav">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?= getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleedit"] ?></span></td>
          <td class="divRightNavTb" align="right">



          </td>
        </tr>
      </table>
    </div>
    <div class="divRightHead">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
        <tr>
          <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleedit"] ?></span></td>
          <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <td align="right">
                  <? if ($valPermission == "RW") { ?>
                    <div class="btnSave" title="<?= $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                  <? } ?>
                  <div class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
            <span class="formFontSubjectTxt"><?= $langMod["txt:subject"] ?></span><br />
            <span class="formFontTileTxt"><?= $langMod["txt:subjectDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>


        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:inpName"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?= $valSubject ?>" onblur="checkDuplicateValue('ControlKey')" /></td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:controlkey"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <input name="inputControlKey" id="inputControlKey" type="text" class="formInputContantTb" onblur="checkDuplicateValue('ControlKey')" maxlength="100" value="<?= $valControlKey ?>" />
            <span class="formFontNoteTxt"><?= $langMod["inp:notecontrolkey"] ?></span>
          </td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:secretkey"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <input name="inputSecretKeyHidden" id="inputSecretKeyHidden" type="hidden" class="formInputContantTb" readonly value="<?= $valSecretKey ?>" />
            <input name="inputSecretKey" id="inputSecretKey" type="text" class="formInputContantTb info" disabled="disabled" value="<?= $valSecretKey ?>"/>
            <!-- <textarea name="inputSecretKey" id="inputSecretKey" cols="45" rows="5" class="formTextareaContantTb" disabled="disabled"><?= $valSecretKey ?></textarea> -->
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:noteg"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <textarea name="inputComment" id="inputComment" cols="45" rows="5" class="formTextareaContantTb"><?= $valNote ?></textarea>
          </td>
        </tr>
      </table>
      <br />

      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

        <tr>
          <td colspan="7" align="right" valign="top" height="20"></td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
        </tr>
      </table>
    </div>
  </form>
  <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
      $("#cHourInput").val('<?php echo @$valHour; ?>');
      $("#cMinInput").val('<?php echo @$valMinute; ?>');
    });
  </script>
  <script type="text/javascript" language="javascript">
    /*################################# Upload Pic #######################*/
    function ajaxFileUpload() {
      var valuepicname = jQuery("input#picname").val();

      jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
          border: 'none',
          padding: '35px',
          backgroundColor: '#000',
          '-webkit-border-radius': '10px',
          '-moz-border-radius': '10px',
          opacity: .9,
          color: '#fff'
        }
      });


      jQuery.ajaxFileUpload({
        url: 'loadUpdatePic.php?myID=<?= $_POST["valEditID"] ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
        secureuri: false,
        fileElementId: 'fileToUpload',
        dataType: 'json',
        success: function(data, status) {
          if (typeof(data.error) != 'undefined') {

            if (data.error != '') {
              alert(data.error);

            } else {
              jQuery("#boxPicNew").show();
              jQuery("#boxPicNew").html(data.msg);
              setTimeout(jQuery.unblockUI, 200);
            }
          }
        },
        error: function(data, status, e) {
          alert(e);
        }
      })
      return false;

    }
  </script>
  <? if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") { ?>
    <script language="JavaScript" type="text/javascript" src="../js/datepickerThai.js"></script>
  <? } else { ?>
    <script language="JavaScript" type="text/javascript" src="../js/datepickerEng.js"></script>
  <? } ?>
  <? include("../lib/disconnect.php"); ?>

</body>

</html>