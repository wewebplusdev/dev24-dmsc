<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sqlCheck = "SELECT " . $mod_tb_set . "_id   FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";
$queryCheck = wewebQueryDB($coreLanguageSQL, $sqlCheck);
$countNumCheck = wewebNumRowsDB($coreLanguageSQL, $queryCheck);


if ($countNumCheck <= 0) {
    $insert = array();
    $insert[$mod_tb_set . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_set . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
    $insert[$mod_tb_set . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastdate"] = "NOW()";
    $insert[$mod_tb_set . "_credate"] = "NOW()";
    $sqlInsert = "INSERT INTO " . $mod_tb_set . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
    $contantID = wewebInsertID($coreLanguageSQL);
    //$queryInsert = $dbConnect->execute($queryInsert);

    $insertlang = array();
    $insertlang[$mod_tb_setlang . "_containid"] = "'" . $contantID . "'";
    $insertlang[$mod_tb_setlang . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insertlang[$mod_tb_setlang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
    $sqlInsert = "INSERT INTO " . $mod_tb_setlang . "(" . implode(",", array_keys($insertlang)) . ") VALUES (" . implode(",", array_values($insertlang)) . ")";
    $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
}

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
" . $mod_tb_setlang . "_title as title,
" . $mod_tb_setlang . "_language as language

 FROM " . $mod_tb_set . " INNER JOIN " . $mod_tb_setlang . " ON " . $mod_tb_set . "_id = " . $mod_tb_setlang . "_containid
 INNER JOIN ".$mod_tb_sylang." ON " . $mod_tb_setlang . "_language = ".$mod_tb_sylang."_subject
 WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  
 GROUP BY " . $mod_tb_set . "_id";
//  print_pre($sql);
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);

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

// print_pre($ValFac);
// print_pre($ValFac2);

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID'] ?>" />
        <?php if ($_REQUEST['viewID'] <= 0) { ?>
            <div class="divRightNav">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a><img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo getNameMenu($_REQUEST["menukeyid"]) ?></span></td>
                        <td class="divRightNavTb" align="right">

                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo getNameMenu($_REQUEST["menukeyid"]) ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if ($valPermission == "RW" && $_REQUEST['viewID'] <= 0) { ?>

                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <table align="center" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center">
                                                                <div class="btnEditView" title="<?php echo $langTxt["btn:edit"] ?>" onclick="
                                                                                document.myFormHome.valEditID.value =<?php echo $valID ?>;
                                                                                document.myFormHome.inputLt.value ='Thai';
                                                                                editContactNew('../<?php echo $mod_fd_root ?>/editSet.php')"></div>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>

                                    <?php } ?>
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
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:about"] ?>
                            <!-- (<?php echo $langTxt["lg:thai"] ?>) -->
                        </span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:aboutDe"] ?>
                            <!-- (<?php echo $langTxt["lg:thai"] ?>) -->
                        </span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["ab:subject"] ?>
                        <!-- (<?php echo $langTxt["lg:thai"] ?>) --> :<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSubject ?></div>
                    </td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:titleOffice"] ?>
                        <!-- (<?php echo $langTxt["lg:thai"] ?>) --> :<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSubjectOffice ?></div>
                    </td>
                </tr>

                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["ab:titleEn"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valTitleEn ?></div>
                    </td>
                </tr>
            </table>

            <br />

            <!-- 
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;" >
                            <span class="formFontSubjectTxt"><?php echo $langMod["txt:about"] ?>(<?php echo $langTxt["lg:eng"] ?>)</span><br/>
                            <span class="formFontTileTxt"><?php echo $langMod["txt:aboutDe"] ?>(<?php echo $langTxt["lg:eng"] ?>)</span>                            </td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["ab:subject"] ?>(<?php echo $langTxt["lg:eng"] ?>) :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valSubjecten ?></div></td>
                    </tr>
                    

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["ab:office"] ?>(<?php echo $langTxt["lg:eng"] ?>) :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valSubjectOfficeen ?></div></td>
                    </tr>
                  

                    <tr  style="display:none;">
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["ab:titleEn"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valTitleEn ?></div></td>
                    </tr>
                </table> -->


            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:set"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:setDe"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seotitle"] ?>
                        <!-- (TH) -->:<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valMetatitle ?></div>
                    </td>
                </tr>
                <!--    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seotitle"] ?> (EN):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valMetatitleen ?></div></td>
                    </tr> -->
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seodes"] ?>
                        <!-- (TH) -->:<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valDescription ?></div>
                    </td>
                </tr>
                <tr>
                    <!--      <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seodes"] ?> (EN):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valDescriptionen ?></div></td>
                    </tr> -->
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seokey"] ?>
                        <!-- (TH) -->:<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valKeywords ?></div>
                    </td>
                </tr>
                <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seokey"] ?> (EN):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valKeywordsen ?></div></td>
                    </tr> -->
            </table>
            <br />


            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:setSocial"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:setSocialDe"] ?></span>
                    </td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:fb"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:fb"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:fb"]]['link'] ?></a></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:ig"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:ig"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:ig"]]['link'] ?></a></div>
                    </td>
                </tr>
                
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:tw"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:tw"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:tw"]]['link'] ?></a></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:li"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:li"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:li"]]['link'] ?></a></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:yt"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:yt"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:yt"]]['link'] ?></a></div>
                    </td>
                </tr>
                <!-- <tr >

                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["info:qr"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">

                                <?php if (is_file($valQr)) { ?>
                                    <img src="<?php echo $valQr ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                <?php } ?>

                            </div></td>

                    </tr> -->

            </table>
            <br />


            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder" >
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["info:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["info:titlede"] ?></span>
                    </td>
                </tr>

                <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["set:open"] ?><span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $ValConfig['open'] ?></div></td>
                    </tr> -->
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:office"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValConfig['subject'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:address"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo nl2br($ValConfig['address']) ?></div>
                    </td>
                </tr>

                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:address"] ?> (<?php echo $langTxt["lg:eng"]; ?>):<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo nl2br($ValConfig['addressen']) ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:address"] ?> (<?php echo $langTxt["lg:chi"]; ?>):<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo nl2br($ValConfig['addresscn']) ?></div>
                    </td>
                </tr> -->

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValConfig['tel'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValConfig['fax'] ?></div>
                    </td>
                </tr>

                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:hotline"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValConfig['hotline'] ?></div>
                    </td>
                </tr> -->

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValConfig['email'] ?></div>
                    </td>
                </tr>

                <!-- <tr>
                    <td colspan='8' valign='top' align='right' height='1'>
                        <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                    </td>
                </tr> -->
                
                <!-- <?php if(!empty($ValFac)){ 
                    foreach ($ValFac as $key => $value) { ?>
                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:office"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo $value['subject'] ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod['info:address'] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo $value['address'] ?></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod['info:factiontel'] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo $value['tel'] ?></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod['info:email'] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo $value['email'] ?></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:fb"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><a href="<?php echo $value['facebook'] ?>" target="_blank"><?php echo $value['facebook'] ?></a></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:tw"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><a href="<?php echo $value['twitter'] ?>" target="_blank"><?php echo $value['twitter'] ?></a></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:li"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><a href="<?php echo $value['line'] ?>" target="_blank"><?php echo $value['line'] ?></a></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:yt"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><a href="<?php echo $value['youtube'] ?>" target="_blank"><?php echo $value['youtube'] ?></a></div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='8' valign='top' align='right' height='1'>
                            <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                        </td>
                    </tr>
                <?php }} ?> -->


                <!-- <tr>
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView">

                                [ <?php echo $ValConfig['glati'] ?> , <?php echo $ValConfig['glongti'] ?> ] <br/>
                                <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $ValConfig['glati'] ?>,<?php echo $ValConfig['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>

                                <br />


                            </div></td>
                    </tr> -->

                <!-- <tr>

                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["info:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">

                                <?php if (is_file($valPic)) { ?>
                                    <img src="<?php echo $valPic ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                <?php } ?>

                            </div></td>

                    </tr> -->


                <tr style="display:none;">

                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:pichotline"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">

                            <?php if (is_file($valHotline)) { ?>
                                <img src="<?php echo $valHotline ?>" style="float:left;border:#c8c7cc solid 1px;" />
                            <?php } ?>

                        </div>
                    </td>

                </tr>

                <tr style="display:none;">

                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:pichotlineH"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">

                            <?php if (is_file($valHotlineH)) { ?>
                                <img src="<?php echo $valHotlineH ?>" style="float:left;border:#c8c7cc solid 1px;" />
                            <?php } ?>

                        </div>
                    </td>

                </tr>


            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder" >
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["info:titlecallape"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["info:titlecallapede"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:office"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[0]['subject'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:duty"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[0]['role'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:address"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo nl2br($valCallape[0]['address']) ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[0]['tel'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[0]['fax'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[0]['email'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                        <div class="formDivView">
                            [ <?php echo $valCallape[0]['glati'] ?> , <?php echo $valCallape[0]['glongti'] ?> ] <br/>
                            <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $valCallape[0]['glati'] ?>,<?php echo $valCallape[0]['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                            <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                        <?php if (is_file($valPicCallape1)) { ?>
                            <img src="<?php echo $valPicCallape1 ?>"  style="float:left;border:#c8c7cc solid 1px;width:300px;"  />
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
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:office"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[1]['subject'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:duty"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[1]['role'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:address"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo nl2br($valCallape[1]['address']) ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[1]['tel'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[1]['fax'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[1]['email'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                        <div class="formDivView">
                            [ <?php echo $valCallape[1]['glati'] ?> , <?php echo $valCallape[1]['glongti'] ?> ] <br/>
                            <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $valCallape[1]['glati'] ?>,<?php echo $valCallape[1]['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                            <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                        <?php if (is_file($valPicCallape2)) { ?>
                            <img src="<?php echo $valPicCallape2 ?>"  style="float:left;border:#c8c7cc solid 1px;width:300px;"  />
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
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:office"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[2]['subject'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:duty"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[2]['role'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:address"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo nl2br($valCallape[2]['address']) ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[2]['tel'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[2]['fax'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[2]['email'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                        <div class="formDivView">
                            [ <?php echo $valCallape[2]['glati'] ?> , <?php echo $valCallape[2]['glongti'] ?> ] <br/>
                            <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $valCallape[2]['glati'] ?>,<?php echo $valCallape[2]['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                            <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                        <?php if (is_file($valPicCallape3)) { ?>
                            <img src="<?php echo $valPicCallape3 ?>"  style="float:left;border:#c8c7cc solid 1px;width:300px;"  />
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
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:office"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[3]['subject'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:duty"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[3]['role'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:address"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo nl2br($valCallape[3]['address']) ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[3]['tel'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[3]['fax'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCallape[3]['email'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                        <div class="formDivView">
                            [ <?php echo $valCallape[3]['glati'] ?> , <?php echo $valCallape[3]['glongti'] ?> ] <br/>
                            <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $valCallape[3]['glati'] ?>,<?php echo $valCallape[3]['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                            <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                        <?php if (is_file($valPicCallape4)) { ?>
                            <img src="<?php echo $valPicCallape4 ?>"  style="float:left;border:#c8c7cc solid 1px;width:300px;"  />
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
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:none">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">Presentation :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_keyfile = 'present'";
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
                            ?>

                                    <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?php echo $mod_fd_root ?>/download.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadName . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?></div>
                                    <div></div>

                            <?php
                                }
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">Company Profile :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_keyfile = 'profile'";
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
                            ?>

                                    <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?php echo $mod_fd_root ?>/download.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadName . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?></div>
                                    <div></div>

                            <?php
                                }
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">Annaul Report :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_keyfile = 'report'";
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
                            ?>

                                    <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?php echo $mod_fd_root ?>/download.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadName . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?></div>
                                    <div></div>

                            <?php
                                }
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">Achievements and awards :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_keyfile = 'achievements'";
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
                            ?>

                                    <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?php echo $mod_fd_root ?>/download.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadName . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?></div>
                                    <div></div>

                            <?php
                                }
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br style="display:none"/>

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:none;">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:setOffice"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:setOfficeDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:subjectOffice"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSubjectOffice ?></div>
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:titleOffice"] ?> :<span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valTitleOffice ?></div>
                    </td>
                </tr>
                <!--
                      <tr style="display:none;" >
                          <td align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["ab:titleEn"] ?><span class="fontContantAlert"></span></td>
                          <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                              <textarea name="inputTitleEn" id="inputTitleEn" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valTitleEn ?></textarea>     </td>
                      </tr>
                    -->
            </table>
            <br style="display:none"/>

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleinfo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langTxt["us:titleinfoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:credate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCredate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                echo getUserThai($valCreby);
                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                echo getUserEng($valCreby);
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:lastdate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valLastdate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                echo getUserThai($valLastby);
                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                echo getUserEng($valLastby);
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <?php if ($_REQUEST['viewID'] <= 0) { ?>
                    <tr>
                        <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </form>
    <?php include("../lib/disconnect.php"); ?>
</body>

</html>