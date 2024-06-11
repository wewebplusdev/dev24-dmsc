<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
$sqlChk = "SELECT " . $core_tb_menu . "_id," . $core_tb_menu . "_linkpath FROM " . $core_tb_menu;
$sqlChk = $sqlChk . "  WHERE " . $core_tb_menu . "_masterkey ='" . $_REQUEST['masterkey'] . "'";
$queryChk = wewebQueryDB($coreLanguageSQL, $sqlChk);
$rowChk = wewebFetchArrayDB($coreLanguageSQL, $queryChk);
$pathArr = explode("/", $rowChk[1]);

include("../" . $pathArr[1] . "/incModLang.php");
include("../" . $pathArr[1] . "/config.php");

// check permissions
$callGauthen = "Select
" . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_cmgid as idG
From
" . $mod_tb_permisGroup . "
Where
" . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_misid = " . $_SESSION[$valSiteManage . "core_session_groupid"] . "
AND " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_masterkey = '" . $_REQUEST['masterkey'] . "'";
$listAuthen = $dbConnect->execute($callGauthen);
$listGAllow = array();
foreach ($listAuthen as $key => $value) {
	$listGAllow[] = $value['idG'];
}

$sql = "SELECT 
" . $mod_tb_root . "_id as id
," . $mod_tb_root_lang . "_subject as subject
," . $mod_tb_root . "_lastdate as lastdate
," . $mod_tb_root . "_status as status 
FROM " . $mod_tb_root;
$sql = $sql . "  INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root . "_id = " . $mod_tb_root_lang . "_cid";
$sql = $sql . "  WHERE " . $mod_tb_root . "_masterkey ='" . $_REQUEST['masterkey'] . "'  AND  " . $mod_tb_root_lang . "_language = 'Thai' ";

$sqlChecklist = array();
if (gettype($listGAllow) == 'array' && count($listGAllow) > 0) {
	foreach ($listGAllow as $idGroup) {
		$sqlChecklist[] = $mod_tb_root . "_gid = $idGroup ";
	}
	if ($_SESSION[$valSiteManage . 'core_session_level'] != "admin") {
		$sql .= " and ( " . implode(" or ", $sqlChecklist) . ") ";
	}
} else {
	if ($_SESSION[$valSiteManage . 'core_session_level'] != "admin") {
		$sql .= " and 1=0 ";
	}
}

$sql .= " ORDER BY " . $mod_tb_root . "_order DESC  LIMIT 0,5";
$query = wewebQueryDB($coreLanguageSQL, $sql);
$recordCount = wewebNumRowsDB($coreLanguageSQL, $query);
if ($recordCount >= 1) {
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<?php
		while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
			$valID = $row[0];
			$valName = $row[1];
			$valDateCredate = dateFormatReal($row[2]);
			$valTimeCredate = timeFormatReal($row[2]);
			$valStatus = $row[3];
			$valNameEn = rechangeQuot($row[4]);
			$valNameEn = chechNullVal($valNameEn);

			if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
				$valNameShow = $valName;
			} else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
				$valNameShow = $valName;
			}

		?>
			<tr>
				<td width="31" align="center" height="25" valign="top">&bull;</td>
				<td align="left" valign="top"><a href="../<?php echo $mod_fd_root ?>/viewContant.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>&viewID=1&inputLt=<?php echo $_SESSION[$valSiteManage . 'core_session_language'] ?>&valEditID=<?php echo $valID ?>" class="moreDetailAb"><?php echo txtLimit($valNameShow, 35) ?></a></td>
			</tr>
		<?php  } ?>
	</table>

<?php } else { ?>
	<div style="height:140px; overflow:hidden;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td height="125" align="center" valign="middle"><?php echo $langTxt["mg:nodate"] ?></td>
			</tr>
		</table>
	</div>
<?php } ?>
<script type="text/javascript">
	jQuery(function() {
		jQuery(".moreDetailAb").colorbox({
			width: "950",
			height: "600"
		});
	});
</script>