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
" . $mod_tb_root . "_gid as gid,
" . $mod_tb_root_lang . "_subject as subject,
" . $mod_tb_root_lang . "_title as title,
" . $mod_tb_root_lang . "_address as address,
" . $mod_tb_root_lang . "_tel as tel,
" . $mod_tb_root_lang . "_fax as fax,
" . $mod_tb_root_lang . "_email as email,
" . $mod_tb_root_lang . "_lat as lat,
" . $mod_tb_root_lang . "_long as lng,
" . $mod_tb_root_lang . "_id as lid,
" . $mod_tb_root_lang . "_pic as pic,
" . $mod_tb_root_lang . "_picType as picType,
" . $mod_tb_root_lang . "_picDefault as picDefault 
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
$valGid = $Row['gid'];

$valSubject = rechangeQuot($Row['subject']);
$valTitle = rechangeQuot($Row['title']);
$valAddress = rechangeQuot($Row['address']);
$valTel = rechangeQuot($Row['tel']);
$valFax = rechangeQuot($Row['fax']);
$valEmail = rechangeQuot($Row['email']);
$valLat = rechangeQuot($Row['lat']);
$valLong = rechangeQuot($Row['lng']);
$valSGid = $Row['lid'];
if (!empty($valSGid)) {
    $valcid = $valSGid;
} else {
    $valcid = $myRand;
}
$valpicType = $Row['picType'] ? $Row['picType'] : 1;
$valpicDefault = $Row['picDefault'];
$valPic = $mod_path_pictures . "/" . $Row['pic'];

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
                <?php if (in_array($_REQUEST['masterkey'], $array_masterkey_group)) { ?>
                    <tr>
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
                    </tr>
                <?php } ?>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valSubject ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:title"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?= $valTitle ?></div>
                    </td>
                </tr>
                <?php if (in_array($_REQUEST['masterkey'], $array_masterkey_group)) { ?>
                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:address"];  ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo  $valAddress ?></div>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:tel"];  ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valTel ?></div>
                    </td>
                </tr>
                <?php if (in_array($_REQUEST['masterkey'], $array_masterkey_group)) { ?>
                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:fax"];  ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo  $valFax ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:email"];  ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo  $valEmail ?></div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <br />
            <?php if (!in_array($_REQUEST['masterkey'], $array_masterkey_group)) { ?>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:pic"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:picDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $modTxtShowPic[0] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $modTxtShowPic[$valpicType] ?></div>
                    </td>
                </tr>
                <tr <?php if ($valpicType == 2) {
                        echo 'style="display:none;"';
                    } ?>>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql_nopic2 = "";
                            $sql_nopic = "SELECT " . $core_tb_nopic . "_id as id
                        ," . $core_tb_nopic . "_masterkey as masterkey
                        ," . $core_tb_nopic . "_subject as subject
                        ," . $core_tb_nopic . "_file as file 
                        FROM " . $core_tb_nopic . " 
                        WHERE " . $core_tb_nopic . "_masterkey = '" . $core_masterkey_nopic . "'
                        AND " . $core_tb_nopic . "_status != 'Disable' ";
                            $sql_nopic2 .= $sql_nopic . " AND " . $core_tb_nopic . "_id = '" . $valpicDefault . "'";
                            $sql_nopic .= " ORDER BY " . $core_tb_nopic . "_order DESC";
                            $sql_nopic2 .= " ORDER BY " . $core_tb_nopic . "_order DESC";
                            $query_nopic2 = wewebQueryDB($coreLanguageSQL, $sql_nopic2);
                            $numRows_nopic = wewebNumRowsDB($coreLanguageSQL, $query_nopic2);
                            if ($numRows_nopic == 1) {
                                $row_nopic = wewebFetchArrayDB($coreLanguageSQL, $query_nopic2);
                                $valPicD = $core_pathname_upload . "/" . $row_nopic['masterkey'] . "/office/" . $row_nopic['file'];
                            } else {
                                $query_nopic = wewebQueryDB($coreLanguageSQL, $sql_nopic);
                                $row_nopic = wewebFetchArrayDB($coreLanguageSQL, $query_nopic);
                                $valPicD = $core_pathname_upload . "/" . $row_nopic['masterkey'] . "/office/" . $row_nopic['file'];
                            }
                            ?>
                            <img src="<?php echo  $valPicD ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?php echo  "../img/btn/nopic.jpg" ?>'" />
                        </div>
                    </td>
                </tr>
                <tr <?php if ($valpicType == 1) {
                        echo 'style="display:none;"';
                    } ?>>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <img src="<?php echo  $valPic ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?php echo  "../img/btn/nopic.jpg" ?>'" />
                        </div>
                    </td>
                </tr>
            </table>
            <br />
            <?php } ?>
            
            <?php if (in_array($_REQUEST['masterkey'], $array_masterkey_group)) { ?>
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
            <?php } ?>
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