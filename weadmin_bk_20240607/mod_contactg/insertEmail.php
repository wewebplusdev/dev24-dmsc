<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");


$sql = "SELECT " . $mod_tb_root_email . "_email FROM " . $mod_tb_root_email . "  WHERE " . $mod_tb_root_email . "_email='" . $_REQUEST['inputEmail'] . "'  AND   " . $mod_tb_root_email . "_gid='" . $_REQUEST['valEditID'] . "' And " . $mod_tb_root_email . "_key='" . $_REQUEST["masterkey"] . "'";
//print_pre($sql);

$query = wewebQueryDB($coreLanguageSQL, $sql);
$count_record = wewebNumRowsDB($coreLanguageSQL, $query);
if ($count_record <= 0) {

    $insert = array();
    $insert[$mod_tb_root_email . "_key"] = "'" . $_REQUEST['masterkey'] . "'";
    $insert[$mod_tb_root_email . "_email"] = "'" . changeQuot($_REQUEST['inputEmail']) . "'";

    $sql = "INSERT INTO " . $mod_tb_root_email . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);

    //print_pre($sql);
} else {
?>
    <script language="JavaScript" type="text/javascript">
        jQuery("#boxAlertEmail").show();
    </script>
<?php
}
?>

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
    <?php
    $sql = "SELECT " . $mod_tb_root_email . "_email," . $mod_tb_root_email . "_id FROM " . $mod_tb_root_email . "  WHERE " . $mod_tb_root_email . "_key='" . $_REQUEST["masterkey"] . "' ORDER BY " . $mod_tb_root_email . "_id ASC ";

    //print_pre($sql);
    $query = wewebQueryDB($coreLanguageSQL, $sql);
    $numRowCount = wewebNumRowsDB($coreLanguageSQL, $query);
    if ($numRowCount >= 1) {
        $num_email = 0;
        while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
            $num_email++;
            $valEmailNew = rechangeQuot($row[0]);
            $valEmailID = $row[1];

    ?>
            <tr>
                <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo number_format($num_email) ?>.<span class="fontContantAlert"></span></td>
                <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                    <div class="formDivView"><a href="javascript:void(0)" onclick="document.myForm.valDelFile.value=<?php echo $valEmailID ?>; modDelEmail('deleteEmail.php')"><img src="../img/btn/delete.png" align="absmiddle" title="Delete email" hspace="5" border="0" /></a> <?php echo $valEmailNew ?></div>
                </td>
            </tr>

    <?php  }
    } ?>
</table>
<script language="JavaScript" type="text/javascript">
    document.myForm.inputEmail.value = ''
    document.myForm.inputEmail.focus();
</script>