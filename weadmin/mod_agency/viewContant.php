<?PHP
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
$sql .= "
" . $mod_tb_root . "_id as id,
" . $mod_tb_root . "_credate as credate,
" . $mod_tb_root . "_crebyid as crebyid,
" . $mod_tb_root . "_lastdate as lastdate,
" . $mod_tb_root . "_lastbyid as lastbyid,
" . $mod_tb_root . "_status as status,
" . $mod_tb_root_lang . "_subject as subject,
" . $mod_tb_root_lang . "_address as address,
" . $mod_tb_root_lang . "_tel as tel,
" . $mod_tb_root_lang . "_fax as fax,
" . $mod_tb_root_lang . "_lat as lat,
" . $mod_tb_root_lang . "_long as lng,
" . $mod_tb_root_lang . "_id as lid 
";

$sql .= " FROM " . $mod_tb_root . " INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root . "_id = " . $mod_tb_root_lang . "_cid
WHERE " . $mod_tb_root . "_masterkey='" . $_POST["masterkey"] . "' AND  " . $mod_tb_root . "_id 	='" . $_POST["valEditID"] . "' AND " . $mod_tb_root_lang . "_language 	='" . $_REQUEST['inputLt'] . "'";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row['id'];
$valStatus = $Row['status'];
if ($valStatus == "Enable") {
   $valStatusClass = "fontContantTbEnable";
} elseif ($valStatus == "Home") {
   $valStatusClass = "fontContantTbHomeSt";
} else {
   $valStatusClass = "fontContantTbDisable";
}

$valCredate = DateFormat($Row['credate']);
$valCreby = $Row['crebyid'];
$valLastdate = DateFormat($Row['lastdate']);
$valLastby = $Row['lastbyid'];

$valSubject = rechangeQuot($Row['subject']);
$valAddress = rechangeQuot($Row['address']);
$valTel = rechangeQuot($Row['tel']);
$valFax = rechangeQuot($Row['fax']);
$valLat = rechangeQuot($Row['lat']);
$valLong = rechangeQuot($Row['lng']);
$valSGid = $Row['lid'];
if (!empty($valSGid)) {
    $valcid = $valSGid;
} else {
    $valcid = $myRand;
}


$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo  $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $keyGoogleMap; ?>&sensor=false&callback=initialize(false)"></script>
    <script language="JavaScript" type="text/javascript" src="./js/script.js"></script>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
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
        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo  $_REQUEST['inputLt'] ?>" />
        <? if ($_REQUEST['viewID'] <= 0) { ?>
            <div class="divRightNav">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php echo  $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo  $langMod["txt:titleview"] ?> <? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?php echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<? } ?></span></td>
                        <td class="divRightNavTb" align="right">



                        </td>
                    </tr>
                </table>
            </div>
        <? } ?>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langMod["txt:titleview"] ?> <? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?php echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<? } ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <? if ($_REQUEST['viewID'] <= 0) { ?>
                                        <? if ($valPermission == "RW") { ?>
                                            <div class="btnEditView" title="<?php echo  $langTxt["btn:edit"] ?>" onclick="
                                                                    document.myFormHome.valEditID.value =<?php echo  $valID ?>;
                                                                    editContactNew('../<?php echo  $mod_fd_root ?>/editContant.php')"></div>
                                        <? } ?>
                                        <div class="btnBack" title="<?php echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                                    <? } ?>
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
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:subject"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:subjectDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valSubject ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:address"];  ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valAddress ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:tel"];  ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valTel ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:fax"];  ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valFax ?></div>
                    </td>
                </tr>
            </table>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:maptitle"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:mapdetail"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:gmap"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div id="map_canvas" data-page="view" style="height:300px;width:80%;"></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:lat"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="latInput" id="latInput" type="text" class="formInputContantTbShot" disabled value="<?php echo $valLat; ?>" />
                    </td>

                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:long"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="longInput" id="longInput" type="text" class="formInputContantTbShot" disabled value="<?php echo $valLong; ?>" />
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langTxt["us:titleinfo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langTxt["us:titleinfoDe"] ?></span>
                    </td>
                </tr>
                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:view"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valView ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:credate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valCredate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?
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
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:lastdate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valLastdate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?
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
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["mg:status"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">

                            <? if ($valStatus == "Enable") { ?>
                                <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                            <? } else { ?>
                                <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                            <? } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br />
            <? if ($_REQUEST['viewID'] <= 0) { ?>
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                    <tr>
                        <td colspan="7" align="right" valign="top" height="20"></td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo  $langTxt["btn:gototop"] ?>"><?php echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                    </tr>
                <? } ?>
                </table>
        </div>
    </form>
    <? include("../lib/disconnect.php"); ?>
</body>
<script>
    $(function() {
        $('.tool-items').hide();
    });
</script>

</html>