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

$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];

$sql = "SELECT
" . $mod_tb_set . "_id,
" . $mod_tb_set . "_credate ,
" . $mod_tb_set . "_crebyid,
" . $mod_tb_set . "_lastdate,
" . $mod_tb_set . "_lastbyid,
" . $mod_tb_setlang . "_description,
" . $mod_tb_setlang . "_keywords,
" . $mod_tb_setlang . "_metatitle,
" . $mod_tb_setlang . "_subject,
" . $mod_tb_setlang . "_social,
" . $mod_tb_setlang . "_config,
" . $mod_tb_setlang . "_addresspic,
" . $mod_tb_setlang . "_subjectoffice,
" . $mod_tb_setlang . "_qr,
" . $mod_tb_setlang . "_hotlinepic,
" . $mod_tb_setlang . "_hotline,
" . $mod_tb_setlang . "_fac as fac,
" . $mod_tb_setlang . "_callape as callape,
" . $mod_tb_setlang . "_piccallape as piccallape,
" . $mod_tb_setlang . "_title as title

 FROM " . $mod_tb_set . " INNER JOIN " . $mod_tb_setlang . " ON " . $mod_tb_set . "_id = " . $mod_tb_setlang . "_containid
 WHERE " . $mod_tb_set . "_id='" . $_REQUEST["valEditID"] . "'  AND " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";

$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
// print_pre($Row);
$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valLastdate = DateFormat($Row[3]);
$valLastby = $Row[4];
$valDescription = rechangeQuot($Row[5]);
$valKeywords = rechangeQuot($Row[6]);
$valMetatitle = rechangeQuot($Row[7]);
$valSubject = $Row[8];
// $valSubjecten = $Row[9];

$valTitle = rechangeQuot($Row['title']);
//$valTitleEn = rechangeQuot($Row[10]);

$valTitle = $Row[$mod_tb_setlang . "_title"];
// $valTitleEn = $Row[$mod_tb_setlang . "_titleen"];


// $valPicName = $Row[15];
// $valPic = $mod_path_pictures . "/" . $Row[15];

$ValSocial = unserialize($Row['' . $mod_tb_setlang . '_social']);
$ValConfig = unserialize($Row['' . $mod_tb_setlang . '_config']);
$valSubjectOffice = rechangeQuot($Row[12]);


$valOrName = $Row[13];
$valQr = $mod_path_pictures . "/" . $Row[13];

$valHotlineName = $Row[15];
$valHotline = $mod_path_pictures . "/" . $Row[14];

$valHotlineNameH = $Row[23];
$valHotlineH = $mod_path_pictures . "/" . $Row[23];
$ValFac2 = unserialize($Row['fac']);
foreach ($ValFac2 as $key => $value4) {
    foreach ($value4 as $keyinner4 => $valueinner4) {
        $ValFac[$keyinner4][$key] = $valueinner4;
    }
}

$callape = unserialize($Row['callape']);
foreach ($callape as $keyvaluecallape => $valuecallape) {
    foreach ($valuecallape as $keyinnervaluecallape => $valueinnervaluecallape) {
        $valCallape[$keyinnervaluecallape][$keyvaluecallape] = $valueinnervaluecallape;
    }
}

$valCallapeNamePic1 = $Row['piccallape1'];
$valPicCallape1 = $mod_path_pictures . "/" . $Row['piccallape1'];
$valCallapeNamePic2 = $Row['piccallape2'];
$valPicCallape2 = $mod_path_pictures . "/" . $Row['piccallape2'];
$valCallapeNamePic3 = $Row['piccallape3'];
$valPicCallape3 = $mod_path_pictures . "/" . $Row['piccallape3'];
$valCallapeNamePic4 = $Row['piccallape4'];
$valPicCallape4 = $mod_path_pictures . "/" . $Row['piccallape4'];
// print_pre($valCallape);
// print_pre($ValFac2);
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

$myRand = time() . rand(111, 999);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo  $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    <script language="JavaScript" type="text/javascript">
        function executeSubmit() {
            with(document.myForm) {
                if (isBlank(infoTel)) {
                    infoTel.focus();
                    jQuery("#infoTel").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoTel").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoTel2)) {
                    infoTel2.focus();
                    jQuery("#infoTel2").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoTel2").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoFax)) {
                    infoFax.focus();
                    jQuery("#infoFax").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoFax").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoEmail)) {
                    infoEmail.focus();
                    jQuery("#infoEmail").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoEmail").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoEmail2)) {
                    infoEmail2.focus();
                    jQuery("#infoEmail2").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoEmail2").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoEmail3)) {
                    infoEmail3.focus();
                    jQuery("#infoEmail3").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoEmail3").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(glati)) {
                    glati.focus();
                    jQuery("#glati").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#glati").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(glongti)) {
                    glongti.focus();
                    jQuery("#glongti").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#glongti").removeClass("formInputContantTbAlertY");
                }
            }

            updateContactNew('updateSet.php');

        }
        jQuery(document).ready(function() {

            jQuery('#myForm').keypress(function(e) {
                /* Start  Enter Check CKeditor */
                var checkFocusTitle = jQuery("#infoAddress").is(":focus");
                var checkFocusTitleEn = jQuery("#inputTitleEn").is(":focus");

                if (e.which == 13) {
                    //e.preventDefault();
                    if (!checkFocusTitle) {
                        //										if(!checkFocusTitleEn){
                        executeSubmit();
                        return false;
                    }
                    //										}
                }
                /* End  Enter Check CKeditor */
            });
        });
    </script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $_REQUEST['module_orderby'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo  $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo  $_REQUEST['valEditID'] ?>" />
        <input name="valDelFile" type="hidden" id="valDelFile" value="" />
        <input name="inputHtml" type="hidden" id="inputHtml" value="" />
        <input name="keyfile" type="hidden" id="keyfile" value="" />
        <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo  $valhtmlname ?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo  $_REQUEST['inputLt'] ?>" />
        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('set.php')" target="_self"><?php echo  getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo  $langMod["txt:titleedit"] ?></span></td>
                    <td class="divRightNavTb" align="right"></td>
                </tr>
            </table>
        </div>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langMod["txt:titleedit"] ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if ($valPermission == "RW") { ?>
                                        <div class="btnSave" title="<?php echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                    <?php } ?>
                                    <div class="btnBack" title="<?php echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('set.php')"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["info:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["info:titlede"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:tel"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[tel]" id="infoTel" value="<?php echo  $ValConfig['tel'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:telde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:tel"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[tel2]" id="infoTel2" value="<?php echo  $ValConfig['tel2'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:telde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:fax"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[fax]" id="infoFax" value="<?php echo  $ValConfig['fax'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:faxde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[email]" id="infoEmail" value="<?php echo  $ValConfig['email'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[email2]" id="infoEmail2" value="<?php echo  $ValConfig['email2'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[email3]" id="infoEmail3" value="<?php echo  $ValConfig['email3'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
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
    <?php include("../lib/disconnect.php"); ?>
    <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
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
                url: 'loadInsertPic.php?myID=<?php echo  $myRand ?>&masterkey=<?php echo  $_REQUEST['masterkey'] ?>&langt=<?php echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo  $_REQUEST['menukeyid'] ?>',
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

        /*################################# Upload QR #######################*/
        function ajaxFileUploadQR() {
            var valuepicname = jQuery("input#picQR").val();

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
                url: 'loadInsertPicQR.php?myID=<?php echo  $myRand ?>&masterkey=<?php echo  $_REQUEST['masterkey'] ?>&langt=<?php echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo  $_REQUEST['menukeyid'] ?>',
                secureuri: false,
                fileElementId: 'fileToUploadQR',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);

                        } else {
                            jQuery("#boxPicQR").show();
                            jQuery("#boxPicQR").html(data.msg);
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
        /*################################# Upload hotline #######################*/
        function ajaxFileUploadHT() {
            var valuepicname = jQuery("input#picHT").val();

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
                url: 'loadInsertPicHT.php?myID=<?php echo  $myRand ?>&masterkey=<?php echo  $_REQUEST['masterkey'] ?>&langt=<?php echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo  $_REQUEST['menukeyid'] ?>',
                secureuri: false,
                fileElementId: 'fileToUploadHT',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);

                        } else {
                            jQuery("#boxPicHT").show();
                            jQuery("#boxPicHT").html(data.msg);
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
        /*################################# Upload multi #######################*/
        function ajaxFileUpload_mul(inputID, filename, eleID, classID, keyID) {
        var valuepicname = jQuery(inputID).val();

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
            url: filename + '?myID=<?php echo $myRand ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>' + '&element='+eleID + '&keyid='+keyID,
            secureuri: false,
            fileElementId: eleID,
            dataType: 'json',
            success: function(data, status) {
                if (typeof(data.error) != 'undefined') {

                    if (data.error != '') {
                        alert(data.error);

                    } else {
                        jQuery(classID).show();
                        jQuery(classID).html(data.msg);
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

        /*################################# Upload hotline Head #######################*/
        function ajaxFileUploadHTh() {
            var valuepicname = jQuery("input#picHTh").val();

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
                url: 'loadInsertPicHTh.php?myID=<?php echo  $myRand ?>&masterkey=<?php echo  $_REQUEST['masterkey'] ?>&langt=<?php echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo  $_REQUEST['menukeyid'] ?>',
                secureuri: false,
                fileElementId: 'fileToUploadHTh',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);

                        } else {
                            jQuery("#boxPicHTh").show();
                            jQuery("#boxPicHTh").html(data.msg);
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
        /*############################# Upload File ####################################*/

        function ajaxFileUploadDocpresent() {
            var valuefilename = jQuery("input#inputFileName").val();
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
                url: 'loadUpdateFilepre.php?myID=<?php echo $_REQUEST["valEditID"] ?>&masterkey=<?php echo $_REQUEST["masterkey"] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                secureuri: true,
                fileElementId: 'inputFileUpload',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);
                        } else {
                            jQuery("#boxFileNewpresent").show();
                            jQuery("#boxFileNewpresent").html(data.msg);
                            document.myForm.inputFileName.value = "";
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

        function ajaxFileUploadDocAchieve() {
            var valuefilename = jQuery("input#inputFileName4").val();
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
                url: 'loadUpdateFileAch.php?myID=<?php echo $_REQUEST["valEditID"] ?>&masterkey=<?php echo $_REQUEST["masterkey"] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                secureuri: true,
                fileElementId: 'inputFileUpload4',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);
                        } else {
                            jQuery("#boxFileNewachieve").show();
                            jQuery("#boxFileNewachieve").html(data.msg);
                            document.myForm.inputFileName.value = "";
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

        function ajaxFileUploadDocprofile() {
            var valuefilename = jQuery("input#inputFileName2").val();
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
                url: 'loadUpdateFilepro.php?myID=<?php echo $_REQUEST["valEditID"] ?>&masterkey=<?php echo $_REQUEST["masterkey"] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                secureuri: true,
                fileElementId: 'inputFileUpload2',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);
                        } else {
                            jQuery("#boxFileNewprofile").show();
                            jQuery("#boxFileNewprofile").html(data.msg);
                            document.myForm.inputFileName.value = "";
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

        function ajaxFileUploadDoc() {
            var valuefilename = jQuery("input#inputFileName3").val();
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
                url: 'loadUpdateFile.php?myID=<?php echo $_REQUEST["valEditID"] ?>&masterkey=<?php echo $_REQUEST["masterkey"] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                secureuri: true,
                fileElementId: 'inputFileUpload3',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);
                        } else {
                            jQuery("#boxFileNew").show();
                            jQuery("#boxFileNew").html(data.msg);
                            document.myForm.inputFileName.value = "";
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
</body>

</html>