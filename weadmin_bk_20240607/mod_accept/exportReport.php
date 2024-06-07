<?php
@include("../lib/session.php");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="report_accept_' . date('Y-m-d') . '.xls"'); #ชื่อไฟล์
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
if ($_REQUEST['language_export'] == "Thai") {
	include("language_thai.php");
} else {
	include("language_eng.php");
}
$masterkey = $_REQUEST['masterkey'];
$menukeyid = $_REQUEST['menukeyid'];

logs_access('3', 'Export');

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>

<BODY>
	<table border="1" cellspacing="1" cellpadding="2" align="center">
		<tbody>
			<tr>
				<td width="56" height="30" align="center" bgcolor="#eeeeee" class="bold" valign="middle">ลำดับ</td>
				<td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">IP Address</td>
				<td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">Token</td>
				<td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">วันที่สร้าง</td>
			</tr>

			<?php
			$sql = str_replace('\\', '', $_POST['sql_export']);
			$query = wewebQueryDB($coreLanguageSQL, $sql);
			$count_record = wewebNumRowsDB($coreLanguageSQL, $query);
			$date_print = date("Y-m-d H:i:s");

			if ($count_record >= 1) {
				$index = 1;
				while ($row_member = wewebFetchArrayDB($coreLanguageSQL, $query)) {
					$row_id = $row_member[0];

					$valDateCredate = dateFormatReal($row_member['credate']);
					$valTimeCredate = timeFormatReal($row_member['credate']);
					$valIP = $row_member['ipaddress'];
					$valIProuter = $row_member['iprouter'];
					$valToken = $row_member['token'];
					$valSecretKey = $row_member['secretkey'];
			?>

					<tr bgcolor="#ffffff">
						<td height="30" align="center" valign="middle"><?php echo $index ?></td>
						<td align="left" valign="middle"><?php echo $valIP ?></td>
						<td align="left" valign="middle">'<?php echo $valToken ?></td>
						<td align="left" valign="middle"><?php echo $valDateCredate . " " . $valTimeCredate ?></td>
					</tr>
				<?php
					$index++;
				}
				?>


			<?php } ?>
		</tbody>
	</table>
	<table border="0" cellspacing="1" cellpadding="2" align="left">
		<tbody>
			<tr>
				<td width="175" align="right" valign="middle" class="bold">Print date : </td>
				<td width="175" align="left" valign="middle"><?php echo $date_print ?></td>
			</tr>
		</tbody>
	</table>
</BODY>

</HTML>