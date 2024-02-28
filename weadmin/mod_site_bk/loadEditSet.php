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

                if (isBlank(inputSubject)) {
                    inputSubject.focus();
                    jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                }


                if (isBlank(inputOffice)) {
                    inputOffice.focus();
                    jQuery("#inputOffice").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputOffice").removeClass("formInputContantTbAlertY");
                }
                /*
					
					 if (isBlank(inputSubjecten)) {
                        inputSubjecten.focus();
                        jQuery("#inputSubjecten").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputSubjecten").removeClass("formInputContantTbAlertY");
                    }
					
                    if (isBlank(inputOfficeen)) {
                        inputOfficeen.focus();
                        jQuery("#inputOfficeen").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputOfficeen").removeClass("formInputContantTbAlertY");
                    }*/


                if (isBlank(inputTagTitle)) {
                    inputTagTitle.focus();
                    jQuery("#inputTagTitle").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputTagTitle").removeClass("formInputContantTbAlertY");
                }
                if (isBlank(inputTagDescription)) {
                    inputTagDescription.focus();
                    jQuery("#inputTagDescription").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputTagDescription").removeClass("formInputContantTbAlertY");
                }


                if (isBlank(inputTagKeywords)) {
                    inputTagKeywords.focus();
                    jQuery("#inputTagKeywords").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputTagKeywords").removeClass("formInputContantTbAlertY");
                }

                /*

                    if (isBlank(inputTagTitleEN)) {
                        inputTagTitleEN.focus();
                        jQuery("#inputTagTitleEN").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagTitleEN").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(inputTagDescriptionEN)) {
                        inputTagDescriptionEN.focus();
                        jQuery("#inputTagDescriptionEN").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagDescriptionEN").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(inputTagKeywordsEN)) {
                        inputTagKeywordsEN.focus();
                        jQuery("#inputTagKeywordsEN").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagKeywordsEN").removeClass("formInputContantTbAlertY");
                    }
					*/
                /*
                    if (isBlank(socialFb) || socialFb.value=="http://") {
                        socialFb.focus();
                        jQuery("#socialFb").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialFb").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(socialLk)) {
                        socialLk.focus();
                        jQuery("#socialLk").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialLk").removeClass("formInputContantTbAlertY");
                    }
                    
                   

                    // if(socialLi.value=="http://") {
                    //     socialLi.focus();
                    //   jQuery("#socialLi").addClass("formInputContantTbAlertY");
                    //   return false;
                    // }else{
                    //   jQuery("#socialLi").removeClass("formInputContantTbAlertY");
                    // }

					 if (isBlank(socialYt)) {
                        socialYt.focus();
                        jQuery("#socialYt").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialYt").removeClass("formInputContantTbAlertY");
                    }
					
                    if (isBlank(socialTw)) {
                        socialTw.focus();
                        jQuery("#socialTw").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialTw").removeClass("formInputContantTbAlertY");
                    }
				
                */

                if (isBlank(infoSubject)) {
                    infoSubject.focus();
                    jQuery("#infoSubject").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoSubject").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoAddress)) {
                    infoAddress.focus();
                    jQuery("#infoAddress").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoAddress").removeClass("formInputContantTbAlertY");
                }

                // if (isBlank(infoAddressEN)) {
                //     infoAddressEN.focus();
                //     jQuery("#infoAddressEN").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#infoAddressEN").removeClass("formInputContantTbAlertY");
                // }

                // if (isBlank(infoAddressCN)) {
                //     infoAddressCN.focus();
                //     jQuery("#infoAddressCN").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#infoAddressCN").removeClass("formInputContantTbAlertY");
                // }

                if (isBlank(infoTel)) {
                    infoTel.focus();
                    jQuery("#infoTel").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoTel").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoFax)) {
                    infoFax.focus();
                    jQuery("#infoFax").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoFax").removeClass("formInputContantTbAlertY");
                }

                // if (isBlank(hotline)) {
                //     hotline.focus();
                //     jQuery("#hotline").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#hotline").removeClass("formInputContantTbAlertY");
                // }

                if (isBlank(infoEmail)) {
                    infoEmail.focus();
                    jQuery("#infoEmail").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoEmail").removeClass("formInputContantTbAlertY");
                }

                if (!isBlank(infoEmail)) {
                    if (!isEmail(infoEmail.value)) {
                        infoEmail.focus();
                        jQuery("#infoEmail").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoEmail").removeClass("formInputContantTbAlertY");
                    }
                }

                // if (isBlank(glati)) {
                //     glati.focus();
                //     jQuery("#glati").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#glati").removeClass("formInputContantTbAlertY");
                // }

                // if (isBlank(glongti)) {
                //     glongti.focus();
                //     jQuery("#glongti").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#glongti").removeClass("formInputContantTbAlertY");
                // }

                // if (isBlank(hotline)) {
                //     hotline.focus();
                //     jQuery("#hotline").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#hotline").removeClass("formInputContantTbAlertY");
                // }
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

        // ############################## Add other faction ##################################
        // var fac = 0;
        // var i = 1;
        // var factel = 0;
        // var i2 = 1;
        // var facemail = 0;
        // var i3 = 1;
        var tb = 0;
        var i = 1;

        function addfaction() {
            tb++;
            i++;

            //   fac++;
            //   i++;
            //   factel++;
            //   i2++;
            //   facemail++;
            //   i3++;
            //
            var inputfacsubject = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["txt:office"] ?><span class="fontContantAlert"></span></td>';
            var inputfactxtsubject = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputfaction[subject][]" id="inputfactionsubject" type="text"  class="formInputContantTb"/><br /></td>';
            var inputfac = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod['info:address'] ?> <span class="fontContantAlert"></span></td>';
            var inputfactxt = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputfaction[address][]" id="inputfaction" cols="45" rows="5" class="formTextareaContantTb"></textarea></td>';

            // var inputfacen = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:faction"] ?> <span class="fontContantAlert"></span></td>';
            // var inputfactxten = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputfaction[nameen][]" id="inputfaction" type="text"  class="formInputContantTb"/></td>';

            var inputfactel = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:factiontel"] ?><span class="fontContantAlert"></span></td>';
            var inputfactxttel = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputfaction[tel][]" id="inputfaction" type="text"  class="formInputContantTb"/><br /></td>';
            var inputfacfax = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:fax"] ?><span class="fontContantAlert"></span></td>';
            var inputfactxtfax = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputfaction[fax][]" id="inputfaction" type="text"  class="formInputContantTb"/><br /></td>';
            var inputfacemail = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>';
            var inputfacemailtxt = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >    <input class="formInputContantTb"  name="inputfaction[email][]" id="inputfactionemail" /><br /></td>';

            // var inputfacfacebook = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:fb"] ?><span class="fontContantAlert"></span></td>';
            // var inputfacfacebooktxt = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >    <input class="formInputContantTb"  name="inputfaction[facebook][]" id="inputfactionfacebook" /><br /><span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span></td>';
            // var inputfactwitter = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:tw"] ?><span class="fontContantAlert"></span></td>';
            // var inputfactwittertxt = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >    <input class="formInputContantTb"  name="inputfaction[twitter][]" id="inputfactiontwitter" /><br /><span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span></td>';
            // var inputfacline = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:li"] ?><span class="fontContantAlert"></span></td>';
            // var inputfaclinetxt = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >    <input class="formInputContantTb"  name="inputfaction[line][]" id="inputfactioneline" /><br /><span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span></td>';
            // var inputfacyoutube = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:yt"] ?><span class="fontContantAlert"></span></td>';
            // var inputfacyoutubetxt = '<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >    <input class="formInputContantTb"  name="inputfaction[youtube][]" id="inputfactionyoutube" /><br /><span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span></td>';

            $("#factionTable").append("<tr id='s" + tb + "' class=\"sInput\">" + inputfacsubject + inputfactxtsubject + "<td  width=\"10%\"><div class=\"btnDel2\" onclick=\"removefac(" + tb + ")\" title=\"ź\" style=\"padding-right: 50px; padding-top: 20px;\"  ></div></td></tr>");
            // $("#factionTable").append("<tr id='n" + tb + "' class=\"sInput\">" + inputfac + inputfactxt + "<td  width=\"10%\"><div class=\"btnDel2\" onclick=\"removefac(" + tb + ")\" title=\"ź\" style=\"padding-right: 50px; padding-top: 20px;\"  ></div></td></tr>");
            $("#factionTable").append("<tr id='n" + tb + "' class=\"sInput\">" + inputfac + inputfactxt +"<td  width=\"10%\"></td></tr>");
            $("#factionTable").append("<tr id='t" + tb + "' class=\"sInput\">" + inputfactel + inputfactxttel + "<td  width=\"10%\"></td></tr>");
            $("#factionTable").append("<tr id='ff" + tb + "' class=\"sInput\">" + inputfacfax + inputfactxtfax + "<td  width=\"10%\"></td></tr>");
            $("#factionTable").append("<tr id='e" + tb + "' class=\"sInput\">" + inputfacemail + inputfacemailtxt + "<td  width=\"10%\"></td></tr>");
            // $("#factionTable").append("<tr id='f" + tb + "' class=\"sInput\">" + inputfacfacebook + inputfacfacebooktxt + "<td  width=\"10%\"></td></tr>");
            // $("#factionTable").append("<tr id='tw" + tb + "' class=\"sInput\">" + inputfactwitter + inputfactwittertxt + "<td  width=\"10%\"></td></tr>");
            // $("#factionTable").append("<tr id='l" + tb + "' class=\"sInput\">" + inputfacline + inputfaclinetxt + "<td  width=\"10%\"></td></tr>");
            // $("#factionTable").append("<tr id='y" + tb + "' class=\"sInput\">" + inputfacyoutube + inputfacyoutubetxt + "<td  width=\"10%\"></td></tr>");
            $("#factionTable").append("<tr id='h" + tb + "'> <td colspan='8' valign='top' align='right' height='1'><div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div> </td></tr>");

        }

        function removefac(tb) {
            jQuery('tr[id="s' + tb + '"]').remove();
            jQuery('tr[id="h' + tb + '"]').remove();
            // jQuery('tr[id="n' + tb + '"]').remove();
            jQuery('tr[id="t' + tb + '"]').remove();
            jQuery('tr[id="ff' + tb + '"]').remove();
            jQuery('tr[id="e' + tb + '"]').remove();
            // jQuery('tr[id="f' + tb + '"]').remove();
            // jQuery('tr[id="tw' + tb + '"]').remove();
            // jQuery('tr[id="l' + tb + '"]').remove();
            // jQuery('tr[id="y' + tb + '"]').remove();
        }

        function removefacOld(tb) {
            jQuery('tr[id="old' + tb + '"]').remove();
        }
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
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:about"] ?>
                            <!-- (<?php echo  $langTxt["lg:thai"] ?>) -->
                        </span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:aboutDe"] ?>
                            <!-- (<?php echo  $langTxt["lg:thai"] ?>) -->
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["ab:subject"] ?>
                        <!-- (<?php echo  $langTxt["lg:thai"] ?>) --> <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?php echo  $valSubject ?>" /></td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:titleOffice"] ?>
                        <!-- (<?php echo  $langTxt["lg:thai"] ?>) --> <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputOffice" id="inputOffice" type="text" class="formInputContantTb" value="<?php echo  $valSubjectOffice ?>" /></td>
                </tr>
            </table>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:none;">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:about"] ?>
                            <!-- (<?php echo  $langTxt["lg:eng"] ?>) -->
                        </span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:aboutDe"] ?>
                            <!-- (<?php echo  $langTxt["lg:thai"] ?>) -->
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["ab:subject"] ?>
                        <!-- (<?php echo  $langTxt["lg:eng"] ?>) --> <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubjecten" id="inputSubjecten" type="text" class="formInputContantTb" value="<?php echo  $valSubjecten ?>" /></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["ab:office"] ?>
                        <!-- (<?php echo  $langTxt["lg:eng"] ?>) --> <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputOfficeen" id="inputOfficeen" type="text" class="formInputContantTb" value="<?php echo  $valSubjectOfficeen ?>" /></td>
                </tr>

            </table>
            <!-- ###### START TEXT FRONT WEBSIDE EDIT ###### -->
            <br />





            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:seo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:seoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seotitle"] ?>
                        <!--  (TH) --><span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagTitle" id="inputTagTitle" type="text" class="formInputContantTb" value="<?php echo  $valMetatitle ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seotitlenote"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seodes"] ?>
                        <!-- (TH) --><span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagDescription" id="inputTagDescription" type="text" class="formInputContantTb" value="<?php echo  $valDescription ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seodesnote"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seokey"] ?>
                        <!-- (TH) --><span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagKeywords" id="inputTagKeywords" type="text" class="formInputContantTb" value="<?php echo  $valKeywords ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seokeynote"] ?></span>
                    </td>
                </tr>
                <!-- <tr > <td colspan="2"><hr style="color:#d1d1d1;border:1px solid #eaeaea;"/><br/></td></tr> -->
                <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seotitle"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitleEN" id="inputTagTitleEN" type="text"  class="formInputContantTb" value="<?php echo  $valMetatitleen ?>"/><br />
                            <span class="formFontNoteTxt"><?php echo  $langMod["inp:seotitlenote"] ?></span></td>
                    </tr >

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seodes"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescriptionEN" id="inputTagDescriptionEN"  type="text"  class="formInputContantTb" value="<?php echo  $valDescriptionen ?>"/><br />
                            <span class="formFontNoteTxt"><?php echo  $langMod["inp:seodesnote"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seokey"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywordsEN" id="inputTagKeywordsEN"  type="text"  class="formInputContantTb" value="<?php echo  $valKeywordsen ?>"/><br />
                            <span class="formFontNoteTxt"><?php echo  $langMod["inp:seokeynote"] ?></span></td>
                    </tr> -->
            </table>



            <br />

            <!-- add social media by nut -->
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:setSocial"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:setSocialDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:fb"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"> </span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo  $langMod["social:fb"] ?>][link]" id="socialFb" type="text" class="formInputContantTb" value="<?php echo  $ValSocial[$langMod["social:fb"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:ig"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"> </span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo  $langMod["social:ig"] ?>][link]" id="socialIg" type="text" class="formInputContantTb" value="<?php echo  $ValSocial[$langMod["social:ig"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:tw"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"> </span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo $langMod["social:tw"] ?>][link]" id="socialTw" type="text" class="formInputContantTb" value="<?php echo $ValSocial[$langMod["social:tw"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:li"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo  $langMod["social:li"] ?>][link]" id="socialLi" type="text" class="formInputContantTb" value="<?php echo  $ValSocial[$langMod["social:li"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:yt"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"> </span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo  $langMod["social:yt"] ?>][link]" id="socialYt" type="text" class="formInputContantTb" value="<?php echo  $ValSocial[$langMod["social:yt"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>

                <!-- <tr >
                       <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:qr"] ?></td>
                       <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                           <div class="file-input-wrapper">
                               <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                               <input type="file" name="fileToUploadQR" id="fileToUploadQR" onchange="ajaxFileUploadQR();" />
                           </div>

                           <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                           <div class="clearAll"></div>

                           <div id="boxPicQR" class="formFontTileTxt">
                               <?php if (is_file($valQr)) { ?>
                                   <img src="<?php echo  $valQr ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                   <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePicQR.php','boxPicQR')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                   <input type="hidden" name="picQR" id="picQR" value="<?php echo  $valOrName ?>" />
                               <?php } ?>
                           </div>

                       </td>
                   </tr> -->

            </table>
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

                <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["set:open"] ?><span class="fontContantAlert">*</span></td>
                        <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="info[open]"  id="infoOpen"  value="<?php echo  $ValConfig['open'] ?>"/><br /></td>
                    </tr> -->
                    
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:office"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[subject]" id="infoSubject" value="<?php echo  $ValConfig['subject'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:address']; ?>
                        <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <textarea name="info[address]" id="infoAddress" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($ValConfig['address']) ?></textarea>
                        <br />
                    </td>
                </tr>


                <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?php echo  $langMod['info:address']; ?> (<?php echo $langTxt["lg:eng"]; ?>)
                            <span class="fontContantAlert">*</span>
                        </td>
                        <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <textarea  name="info[addressen]" id="infoAddressEN" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($ValConfig['addressen']) ?></textarea>
                            <br />
                        </td>
                    </tr> -->
                <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?php echo  $langMod['info:address']; ?> (<?php echo $langTxt["lg:chi"]; ?>)
                            <span class="fontContantAlert">*</span>
                        </td>
                        <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <textarea  name="info[addresscn]" id="infoAddressCN" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($ValConfig['addresscn']) ?></textarea>
                            <br />
                        </td>
                    </tr> -->

                <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?php echo  $langMod['info:address']; ?>(EN)
                            <span class="fontContantAlert">*</span></td>
                        <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >

                            <textarea  name="info[addressen]" id="infoAddressen" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($ValConfig['addressen']) ?></textarea>

                            <br />
                        </td>
                    </tr> -->


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:tel"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[tel]" id="infoTel" value="<?php echo  $ValConfig['tel'] ?>" /><br />
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

                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:hotline"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[hotline]" id="hotline" value="<?php echo  $ValConfig['hotline'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:hotlinede"] ?></span>
                    </td>
                </tr> -->

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[email]" id="infoEmail" value="<?php echo  $ValConfig['email'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
                    </td>
                </tr>
                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:picaddress"] ?></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUploadHT" id="fileToUploadHT" onchange="ajaxFileUploadHT();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>

                        <div id="boxPicHT" class="formFontTileTxt">
                            <?php if (is_file($valHotline)) { ?>
                                <img src="<?php echo  $valHotline ?>" style="float:left;border:#c8c7cc solid 1px;width:300px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePicHT.php','boxPicHT')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picHT" id="picHT" value="<?php echo  $valHotlineName ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr> -->

                <tr >
                    <td colspan='8' valign='top' align='right' height='1'>
                        <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                    </td>
                </tr>


                <!-- start faction -->
                <td align="right" valign="top" width="100%" colspan="6" style="display: none;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="factionTable">
                        <?php if (!empty($ValFac)) {
                            foreach ($ValFac as $key => $value) { ?>
                                <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:office"] ?><span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[subject][]" id="inputfactionSubject" value="<?php echo $value['subject'] ?>" /><br />
                                    </td>
                                    <td width="10%" align="left">
                                        <?php if ($key == 0) { ?>
                                            <div class="btnAdd3" style="padding-right: 86px; padding-top: 20px;" title="add" onclick="addfaction();"></div>
                                        <?php } else { ?>
                                            <div class="btnDel2" onclick="removefacOld(<?php echo $key ?>)" title="" style="padding-right: 50px; padding-top: 20px;"></div>
                                        <?php  } ?>
                                    </td>
                                </tr>
                                <tr id="old<?php echo $key ?>">
                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod['info:address'] ?> <span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <textarea name="inputfaction[address][]" id="inputfaction" cols="45" rows="5" class="formTextareaContantTb"><?php echo $value['address'] ?></textarea>
                                    </td>
                                </tr>

                                <!-- <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:faction"] ?> (<?php echo  $langTxt["lg:eng"] ?>)<span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[nameen][]" id="inputfactionen" value="<?php echo $value['nameen'] ?>" /><br />
                                    </td>
                                </tr> -->

                                <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:factiontel"] ?><span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[tel][]" id="inputfactionTel" value="<?php echo $value['tel'] ?>" /><br />
                                    </td>
                                </tr>
                                <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:fax"] ?><span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[fax][]" id="inputfactionFax" value="<?php echo $value['fax'] ?>" /><br />
                                    </td>
                                </tr>

                                <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[email][]" id="inputfactionemail" value="<?php echo $value['email'] ?>" /><br />
                                    </td>
                                </tr>

                                <!-- <tr id="old<?php echo $key ?>">
                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:picaddress"] ?></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <div class="file-input-wrapper">
                                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                                            <input type="file" name="fileToUploadAdd<?php echo $key ?>" id="fileToUploadAdd<?php echo $key ?>" onchange="ajaxFileUpload_mul('input#picadd-<?php echo $key ?>', 'loadInsertPicAdd.php', 'fileToUploadAdd<?php echo $key ?>', '#boxPicAdd-<?php echo $key ?>', '<?php echo $key ?>');" />
                                        </div>

                                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                                        <div class="clearAll"></div>

                                        <div id="boxPicAdd-<?php echo $key ?>" class="formFontTileTxt">
                                            <?php if (is_file($valPicAdd)) { ?>
                                                <img src="<?php echo  $valPicAdd ?>" style="float:left;border:#c8c7cc solid 1px;" />
                                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload_mul('deletePicAdd.php', 'picadd-<?php echo $key ?>', '#boxPicAdd-<?php echo $key ?>')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                                <input type="hidden" name="inputfaction[picadd<?php echo $key ?>][]" id="picadd-<?php echo $key ?>" value="<?php echo  $value['pic'] ?>" />
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr> -->

                                <!-- <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:fb"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[facebook][]" id="inputfactionfacebook" value="<?php echo $value['facebook'] ?>" /><br />
                                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                                    </td>
                                </tr>

                                <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:tw"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[twitter][]" id="inputfactiontwitter" value="<?php echo $value['twitter'] ?>" /><br />
                                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                                    </td>
                                </tr>

                                <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:li"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[line][]" id="inputfactionline" value="<?php echo $value['line'] ?>" /><br />
                                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                                    </td>
                                </tr>

                                <tr id="old<?php echo $key ?>">

                                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:yt"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                        <input class="formInputContantTb" name="inputfaction[youtube][]" id="inputfactionyoutube" value="<?php echo $value['youtube'] ?>" /><br />
                                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                                    </td>
                                </tr> -->

                                <tr id="old<?php echo $key ?>">
                                    <td colspan='8' valign='top' align='right' height='1'>
                                        <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                                    </td>
                                </tr>

                            <?php }
                        } else { ?>
                            <tr id="firstSubjectTr">
                                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:office"] ?><span class="fontContantAlert"></span></td>
                                <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                    <input class="formInputContantTb" name="inputfaction[subject][]" id="inputfactionSubject" value="" /><br />
                                </td>
                            </tr>
                            <tr id="firstNameTr">
                                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod['info:address'] ?> <span class="fontContantAlert"></span></td>
                                <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                    <!-- <input class="formInputContantTb"  name="inputfaction[name][]" id="inputfaction"  value=""/><br /></td> -->
                                    <textarea name="inputfaction[address][]" id="inputfaction" cols="45" rows="5" class="formTextareaContantTb"></textarea>
                                <td width="10%" align="left">
                                    <div class="btnAdd3" style="padding-right: 86px; padding-top: 20px;" title="add" onclick="addfaction();"></div>
                                </td>
                            </tr>

                            <!-- <tr id="firstTelTr">

                            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:faction"] ?>  (<?php echo  $langTxt["lg:eng"] ?>)<span class="fontContantAlert"></span></td>
                            <td  colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                <input class="formInputContantTb"  name="inputfaction[nemeen][]" id="inputfactionen"  value=""/><br /></td>
                        </tr> -->


                            <tr id="firstTelTr">

                                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:factiontel"] ?><span class="fontContantAlert"></span></td>
                                <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                    <input class="formInputContantTb" name="inputfaction[tel][]" id="inputfactionTel" value="" /><br />
                                </td>
                            </tr>
                            <tr id="firstEmailTr">

                                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>
                                <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                    <input class="formInputContantTb" name="inputfaction[email][]" id="inputfactionemail" value="" /><br />
                                </td>
                            </tr>

                            <tr id="firstFbTr">

                                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:fb"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                                <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                    <input class="formInputContantTb" name="inputfaction[facebook][]" id="inputfactionfacebook" value="" /><br />
                                    <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                                </td>
                            </tr>

                            <tr id="firstTwTr">

                                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:tw"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                                <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                    <input class="formInputContantTb" name="inputfaction[twitter][]" id="inputfactiontwitter" value="" /><br />
                                    <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                                </td>
                            </tr>

                            <tr id="firstLiTr">

                                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:li"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                                <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                    <input class="formInputContantTb" name="inputfaction[line][]" id="inputfactionline" value="" /><br />
                                    <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                                </td>
                            </tr>

                            <tr id="firstYtTr">

                                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:yt"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                                <td colspan="6" align="left" valign="top" class="formRightContantTb">
                                    <input class="formInputContantTb" name="inputfaction[youtube][]" id="inputfactionline" value="" /><br />
                                    <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                                </td>
                            </tr>

                            <tr id="firstHRTr">
                                <td colspan='8' valign='top' align='right' height='1'>
                                    <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                                </td>
                            </tr>

                        <?php } ?>


                    </table>
                </td>


                <!-- end faction -->

                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:latiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="info[glati]" id="glati" value="<?php echo  $ValConfig['glati'] ?>" />
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:longtiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="info[glongti]" id="glongti" value="<?php echo  $ValConfig['glongti'] ?>" />
                    </td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:picaddress"] ?></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>

                        <div id="boxPicNew" class="formFontTileTxt">
                            <?php if (is_file($valPic)) { ?>
                                <img src="<?php echo  $valPic ?>" style="float:left;border:#c8c7cc solid 1px; width: calc(100% - 600px)" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picname" id="picname" value="<?php echo  $valPicName ?>" />
                            <?php } ?>
                        </div>

                        <?php /* ?>
                            <div id="boxPicNew" class="formFontTileTxt">
                                <input type="hidden" name="picname" id="picname" />
                            </div>
                            <?php */ ?>
                    </td>
                </tr> -->




                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:pichotline"] ?></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUploadHT" id="fileToUploadHT" onchange="ajaxFileUploadHT();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>

                        <div id="boxPicHT" class="formFontTileTxt">
                            <?php if (is_file($valHotline)) { ?>
                                <img src="<?php echo  $valHotline ?>" style="float:left;border:#c8c7cc solid 1px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePicHT.php','boxPicHT')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picHT" id="picHT" value="<?php echo  $valHotlineName ?>" />
                            <?php } ?>
                        </div>

                        <!--
                           <div id="boxPicNew" class="formFontTileTxt">
                               <input type="hidden" name="picname" id="picname" />
                           </div>
                           -->
                    </td>
                </tr>

                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:pichotlineH"] ?></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUploadHTh" id="fileToUploadHTh" onchange="ajaxFileUploadHTh();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>

                        <div id="boxPicHTh" class="formFontTileTxt">
                            <?php if (is_file($valHotlineH)) { ?>
                                <img src="<?php echo  $valHotlineH ?>" style="float:left;border:#c8c7cc solid 1px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePicHTh.php','boxPicHTh')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picHTh" id="picHTh" value="<?php echo  $valHotlineNameH ?>" />
                            <?php } ?>
                        </div>

                        <!--
                          <div id="boxPicNew" class="formFontTileTxt">
                              <input type="hidden" name="picname" id="picname" />
                          </div>
                          -->
                    </td>
                </tr>

            </table>

            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["info:titlecallape"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["info:titlecallapede"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:office"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[subject][]" id="callapeSubject" value="<?php echo  $valCallape[0]['subject'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:duty"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[role][]" id="callapeSubject" value="<?php echo  $valCallape[0]['role'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:address']; ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <textarea name="callape[address][]" id="callapeAddress" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($valCallape[0]['address']) ?></textarea>
                        <br />
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:tel"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[tel][]" id="callapeTel" value="<?php echo  $valCallape[0]['tel'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:telde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:fax"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[fax][]" id="callapeFax" value="<?php echo  $valCallape[0]['fax'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:faxde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[email][]" id="callapeEmail" value="<?php echo  $valCallape[0]['email'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:latiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="callape[glati][]" id="glati" value="<?php echo  $valCallape[0]['glati'] ?>" />
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:longtiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="callape[glongti][]" id="glongti" value="<?php echo  $valCallape[0]['glongti'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:picaddress"] ?></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUploadCallape1" id="fileToUploadCallape1" onchange="ajaxFileUpload_mul('input#picnameCallape1', 'loadInsertPicCallape1.php', 'fileToUploadCallape1', '#boxPicNewCall1');" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>

                        <div id="boxPicNewCall1" class="formFontTileTxt">
                        <?php if (is_file($valPicCallape1)) { ?>
                                <img src="<?php echo  $valPicCallape1 ?>" style="float:left;border:#c8c7cc solid 1px;width:300px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload_mul('deletePicAdd-1.php','#boxPicNewCall1')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picnameCallape1" id="picnameCallape1" value="<?php echo  $valCallapeNamePic1 ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan='8' valign='top' align='right' height='1'>
                        <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:office"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[subject][]" id="callapeSubject" value="<?php echo  $valCallape[1]['subject'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:duty"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[role][]" id="callapeSubject" value="<?php echo  $valCallape[1]['role'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:address']; ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <textarea name="callape[address][]" id="callapeAddress" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($valCallape[1]['address']) ?></textarea>
                        <br />
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:tel"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[tel][]" id="callapeTel" value="<?php echo  $valCallape[1]['tel'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:telde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:fax"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[fax][]" id="callapeFax" value="<?php echo  $valCallape[1]['fax'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:faxde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[email][]" id="callapeEmail" value="<?php echo  $valCallape[1]['email'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:latiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="callape[glati][]" id="glati" value="<?php echo  $valCallape[1]['glati'] ?>" />
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:longtiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="callape[glongti][]" id="glongti" value="<?php echo  $valCallape[1]['glongti'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:picaddress"] ?></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUploadCallape2" id="fileToUploadCallape2" onchange="ajaxFileUpload_mul('input#picnameCallape2', 'loadInsertPicCallape2.php', 'fileToUploadCallape2', '#boxPicNewCall2');" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>

                        <div id="boxPicNewCall2" class="formFontTileTxt">
                        <?php if (is_file($valPicCallape2)) { ?>
                                <img src="<?php echo  $valPicCallape2 ?>" style="float:left;border:#c8c7cc solid 1px;width:300px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload_mul('deletePicAdd-2.php','#boxPicNewCall2')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picnameCallape2" id="picnameCallape2" value="<?php echo  $valCallapeNamePic2 ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan='8' valign='top' align='right' height='1'>
                        <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:office"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[subject][]" id="callapeSubject" value="<?php echo  $valCallape[2]['subject'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:duty"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[role][]" id="callapeSubject" value="<?php echo  $valCallape[2]['role'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:address']; ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <textarea name="callape[address][]" id="callapeAddress" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($valCallape[2]['address']) ?></textarea>
                        <br />
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:tel"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[tel][]" id="callapeTel" value="<?php echo  $valCallape[2]['tel'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:telde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:fax"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[fax][]" id="callapeFax" value="<?php echo  $valCallape[2]['fax'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:faxde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[email][]" id="callapeEmail" value="<?php echo  $valCallape[2]['email'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:latiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="callape[glati][]" id="glati" value="<?php echo  $valCallape[2]['glati'] ?>" />
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:longtiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="callape[glongti][]" id="glongti" value="<?php echo  $valCallape[2]['glongti'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:picaddress"] ?></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUploadCallape3" id="fileToUploadCallape3" onchange="ajaxFileUpload_mul('input#picnameCallape3', 'loadInsertPicCallape3.php', 'fileToUploadCallape3', '#boxPicNewCall3');" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>

                        <div id="boxPicNewCall3" class="formFontTileTxt">
                        <?php if (is_file($valPicCallape3)) { ?>
                                <img src="<?php echo  $valPicCallape3 ?>" style="float:left;border:#c8c7cc solid 1px;width:300px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload_mul('deletePicAdd-3.php','#boxPicNewCall3')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picnameCallape3" id="picnameCallape3" value="<?php echo  $valCallapeNamePic3 ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan='8' valign='top' align='right' height='1'>
                        <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:office"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[subject][]" id="callapeSubject" value="<?php echo  $valCallape[3]['subject'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:duty"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[role][]" id="callapeSubject" value="<?php echo  $valCallape[3]['role'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:address']; ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <textarea name="callape[address][]" id="callapeAddress" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($valCallape[3]['address']) ?></textarea>
                        <br />
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:tel"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[tel][]" id="callapeTel" value="<?php echo  $valCallape[3]['tel'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:telde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:fax"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[fax][]" id="callapeFax" value="<?php echo  $valCallape[3]['fax'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:faxde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="callape[email][]" id="callapeEmail" value="<?php echo  $valCallape[3]['email'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:latiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="callape[glati][]" id="glati" value="<?php echo  $valCallape[3]['glati'] ?>" />
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:longtiture'] ?>
                        <span class="fontContantAlert"></span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="callape[glongti][]" id="glongti" value="<?php echo  $valCallape[3]['glongti'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:picaddress"] ?></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUploadCallape4" id="fileToUploadCallape4" onchange="ajaxFileUpload_mul('input#picnameCallape4', 'loadInsertPicCallape4.php', 'fileToUploadCallape4', '#boxPicNewCall4');" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>

                        <div id="boxPicNewCall4" class="formFontTileTxt">
                        <?php if (is_file($valPicCallape4)) { ?>
                                <img src="<?php echo  $valPicCallape4 ?>" style="float:left;border:#c8c7cc solid 1px;width:300px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload_mul('deletePicAdd-4.php','#boxPicNewCall4')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picnameCallape4" id="picnameCallape4" value="<?php echo  $valCallapeNamePic4 ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan='8' valign='top' align='right' height='1'>
                        <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                    </td>
                </tr>
            </table>

            <br style="display: none;" />

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" style="display: none;">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName" id="inputFileName" type="text" class="formInputContantTb" /></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">Presentation<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDocpresent();" />
                        </div>
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxFileNewpresent" class="formFontTileTxt">
                            <?php
                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_keyfile ='present'";
                            $query_file = wewebQueryDB($coreLanguageSQL, $sql);
                            $number_row = wewebNumRowsDB($coreLanguageSQL, $query_file);
                            if ($number_row >= 1) {
                                $txtFile = "";
                                while ($row_file = wewebFetchArrayDB($coreLanguageSQL, $query_file)) {
                                    $linkRelativePath = $mod_path_file . "/" . $row_file[1];
                                    $downloadFile = $row_file[1];
                                    $downloadID = $row_file[0];
                                    $downloadName = $row_file[2];
                                    $countDownload = $row_file[3];
                                    $imageType = strstr($downloadFile, '.');
                                    $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUploadpre('deleteFilepre.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                }
                            }

                            echo $txtFile;
                            ?>
                        </div>
                    </td>
                </tr>

                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName2" id="inputFileName2" type="text" class="formInputContantTb" /></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">Company Profile<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="inputFileUpload2" id="inputFileUpload2" onchange="ajaxFileUploadDocprofile();" />
                        </div>
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxFileNewprofile" class="formFontTileTxt">
                            <?php

                            $sqlpro = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_keyfile ='profile'";
                            $query_filepro = wewebQueryDB($coreLanguageSQL, $sqlpro);
                            //print_pre($query_file);
                            $number_rowpro = wewebNumRowsDB($coreLanguageSQL, $query_filepro);
                            if ($number_rowpro >= 1) {
                                $txtFilepro = "";
                                while ($row_filepro = wewebFetchArrayDB($coreLanguageSQL, $query_filepro)) {
                                    $linkRelativePath = $mod_path_file . "/" . $row_filepro[1];
                                    $downloadFile = $row_filepro[1];
                                    $downloadID = $row_filepro[0];
                                    $downloadName = $row_filepro[2];
                                    $countDownload = $row_filepro[3];
                                    $imageType = strstr($downloadFile, '.');
                                    $txtFilepro .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUploadpro('deleteFilepro.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                }
                            }

                            echo $txtFilepro;
                            ?>
                        </div>
                    </td>
                </tr>
                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName3" id="inputFileName3" type="text" class="formInputContantTb" /></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">Annaul Report<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="inputFileUpload3" id="inputFileUpload3" onchange="ajaxFileUploadDoc();" />
                        </div>
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxFileNew" class="formFontTileTxt">
                            <?php

                            $sqlreport = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_keyfile ='report'";
                            $query_filereport = wewebQueryDB($coreLanguageSQL, $sqlreport);
                            //print_pre($query_file);
                            $number_rowreport = wewebNumRowsDB($coreLanguageSQL, $query_filereport);
                            if ($number_rowreport >= 1) {
                                $txtFilereport = "";
                                while ($row_filereport = wewebFetchArrayDB($coreLanguageSQL, $query_filereport)) {
                                    $linkRelativePath = $mod_path_file . "/" . $row_filereport[1];
                                    $downloadFile = $row_filereport[1];
                                    $downloadID = $row_filereport[0];
                                    $downloadName = $row_filereport[2];
                                    $countDownload = $row_filereport[3];
                                    $imageType = strstr($downloadFile, '.');
                                    $txtFilereport .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                }
                            }

                            echo $txtFilereport;
                            ?>
                        </div>
                    </td>
                </tr>
                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName4" id="inputFileName4" type="text" class="formInputContantTb" /></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">Achievements and awards<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="inputFileUpload4" id="inputFileUpload4" onchange="ajaxFileUploadDocAchieve();" />
                        </div>
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxFileNewachieve" class="formFontTileTxt">
                            <?php

                            $sqlreport = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_keyfile ='achievements'";
                            $query_filereport = wewebQueryDB($coreLanguageSQL, $sqlreport);
                            // print_pre($sqlreport);
                            $number_rowreport = wewebNumRowsDB($coreLanguageSQL, $query_filereport);
                            if ($number_rowreport >= 1) {
                                $txtFileAch = "";
                                while ($row_filereport = wewebFetchArrayDB($coreLanguageSQL, $query_filereport)) {
                                    $linkRelativePath = $mod_path_file . "/" . $row_filereport[1];
                                    $downloadFile = $row_filereport[1];
                                    $downloadID = $row_filereport[0];
                                    $downloadName = $row_filereport[2];
                                    $countDownload = $row_filereport[3];
                                    $imageType = strstr($downloadFile, '.');
                                    $txtFileAch .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUploadAch('deleteFileAch.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                }
                            }

                            echo $txtFileAch;
                            ?>
                        </div>
                    </td>
                </tr>

            </table>
            <br>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:none;">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:setOffice"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:setOfficeDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>




                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:subjectOffice"] ?> <span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubjectOffice" id="inputSubjectOffice" type="text" class="formInputContantTb" value="<?php echo  $valSubjectOffice ?>" /></td>
                </tr>

                <tr>
                    <td align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:titleOffice"] ?> <span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="inputTitleOffice" id="inputTitleOffice" type="text" class="formInputContantTb" value="<?php echo  $valTitleOffice ?>" />
                    </td>
                </tr>


                <!--
                      <tr style="display:none;" >
                          <td align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["ab:titleEn"] ?><span class="fontContantAlert"></span></td>
                          <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                              <textarea name="inputTitleEn" id="inputTitleEn" cols="45" rows="5" class="formTextareaContantTb"><?php echo  $valTitleEn ?></textarea>     </td>
                      </tr>
                    -->


            </table>

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
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