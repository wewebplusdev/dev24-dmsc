<?php
@include("../lib/session.php");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="report_log_' . date('Y-m-d') . '.xls"'); #ชื่อไฟล์
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

logs_access('3', 'Export');
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">


<HEAD>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style type="text/css">
        <!--
        .bold {
            font-weight: bold;
        }
        -->
    </style>
</HEAD>

<BODY>
    <table border="1" cellspacing="1" cellpadding="2" align="left">
        <tbody>
            <tr>
      <td width="56" height="30" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langMod["export:no"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["mg:subject"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php echo $langTxt["us:creby"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php echo $langMod["home:accesscode"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php echo $langMod["home:access"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:tokendata"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langMod["tit:Sessiondata"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php echo $langTxt["home:date"] ?></td>            
      </tr>

            <?php
            $sql = str_replaceExport($_POST['sql_export'], "0");
            // print_pre($sql);die;
            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
            $date_print = DateFormat(date("Y-m-d H:i:s"));
            $index_row = 1;
            if ($count_record >= 1) {
                $index = $count_record;
                while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
                        $valStatusType = $row['type'];
                        $valStatusCode = $row['sid'];
                        $valNameService = rechangeQuot($row['action']);
						$valName = rechangeQuot($row['sname']);
						if($valName==""){
							$valName="-";
						}

                        $valDateCredate = dateFormatReal($row['credate']);
                        $valTimeCredate = timeFormatReal($row['credate']);
						
						 $valNameSesionID = rechangeQuot($row['sessid']);
						  $valNameToken = rechangeQuot($row['token']);

            ?>

                    <tr bgcolor="#ffffff">
                        <td height="30" align="center" valign="middle"><?php echo  $index_row ?></td>
                        <td align="left" valign="middle"><strong><?php echo $valNameService ?></strong></td>
                        <td align="center" valign="middle"><?php echo $valName ?></td>
                        <td align="center" valign="middle"><?php echo $valStatusCode ?></td>
                        <td align="center" valign="middle"><?php echo $valStatusType ?></td>
                        <td align="center" valign="middle"><?php echo $valNameToken; ?></td>
                        <td align="center" valign="middle"><?php echo $valNameSesionID; ?></td>
                        <td align="center" valign="middle">'<?php echo $valDateCredate." ".$valTimeCredate ?></td>
                    </tr>

            <?php
                    $index--;
                    $index_row++;
                }
                $count_totalrecord = $count_record + 1;
            }
            ?>
        </tbody>
    </table>

    <table border="0" cellspacing="1" cellpadding="2" align="left">
        <tbody>
            <tr>
                <td width="175" align="right" valign="middle" class="bold">Print date : </td>
                <td width="175" align="left" valign="middle"><?php echo  $date_print ?></td>
            </tr>
        </tbody>
    </table>
</BODY>

</HTML>