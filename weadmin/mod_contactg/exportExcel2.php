<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function_for_phpexcel.php");
include("config.php");

error_reporting(1);

require_once 'exportReport_function.php';
$fncPHPExcel = new fncPHPExcel;

/** Include PHPExcel */
require_once '../lib/PHPExcel8/PHPExcel.php';
$objPHPExcel = new PHPExcel();

$thead_cell_style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'C7C7CC')
    ),
);

$thead_no_cell_style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'C7C7CC')
    )
);

$tbody_cell_style = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'FFFFFF')
    )
);

$topic_style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
    'font' => [
        'size' => 16,
        'bold' => true,
    ],
);

$text_right_style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
    )
);

$text_hyperlink_style = array(
    'font' => array(
        'color' => array('rgb' => '0000FF'),
        'underline' => 'single'
    )
);

$font_bold_style = array(
    'font' => [
        'bold' => true,
    ],
);

$sheet_num = 0;
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('รายงาน');

$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(16.86);
$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(16.86);

$txtHeadExp = strtotime(date('Y-m-d H:i:s'));
$active_row = 1;
$objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, 'Export Report');
$objPHPExcel->getActiveSheet()->getStyle('A' . $active_row)->applyFromArray($font_bold_style);
$objPHPExcel->getActiveSheet()->getStyle("C" . $active_row)->applyFromArray($font_bold_style);
$objPHPExcel->getActiveSheet()->getStyle("C" . $active_row)->applyFromArray($text_right_style);
$active_row++;
$objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "Export Date: " . date("Y-m-d H:i"));
$active_row++;
$active_row++;

$sql = str_replaceExportExcel($_POST['sql_export'], "0");
$queryList = wewebQueryDB($coreLanguageSQL, $sql);
$numRows = wewebNumRowsDB($coreLanguageSQL, $queryList);
if ($numRows > 0) {
    // start create excel header
    $objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "ลำดับ");
    // $objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, $langModExcel["meu:group2"]);
    $objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, $langModExcel["txt:name"]);
    $objPHPExcel->getActiveSheet()->setCellValue("C" . $active_row, $langModExcel["txt:address"]);
    $objPHPExcel->getActiveSheet()->setCellValue("D" . $active_row, $langModExcel["txt:email"]);
    $objPHPExcel->getActiveSheet()->setCellValue("E" . $active_row, $langModExcel["txt:tel"]);
    $objPHPExcel->getActiveSheet()->setCellValue("F" . $active_row, $langModExcel["txt:subject"]);
    $objPHPExcel->getActiveSheet()->setCellValue("G" . $active_row, $langModExcel["txt:title"]);

    $objPHPExcel->getActiveSheet()->setCellValue("H" . $active_row, $langModExcel["txt:name_report"]);
    $objPHPExcel->getActiveSheet()->setCellValue("I" . $active_row, $langModExcel["txt:rank_report"]);
    $objPHPExcel->getActiveSheet()->setCellValue("J" . $active_row, $langModExcel["txt:fac_report"]);
    $objPHPExcel->getActiveSheet()->setCellValue("K" . $active_row, $langModExcel["txt:corruption_report"]);
    $objPHPExcel->getActiveSheet()->setCellValue("L" . $active_row, $langModExcel["txt:rich_report"]);
    $objPHPExcel->getActiveSheet()->setCellValue("M" . $active_row, $langModExcel["txt:confirm_report"]);

    $objPHPExcel->getActiveSheet()->setCellValue("N" . $active_row, $langModExcel["txt:ip"]);
    $objPHPExcel->getActiveSheet()->setCellValue("O" . $active_row, $langModExcel["txt:credate"]);
    $objPHPExcel->getActiveSheet()->setCellValue("P" . $active_row, $langModExcel["txt:status"]);
    $objPHPExcel->getActiveSheet()->getStyle('A' . $active_row . ':P' . $active_row)->applyFromArray($thead_cell_style);
    $active_row++;
    $index = 1;
    foreach ($queryList as $keyList => $valueList) {
        // $valGroupName = rechangeQuot($valueList['group_subject']);
        $valSubject = rechangeQuot($valueList['subject']);
        $valAddress = rechangeQuot($valueList['address']);
        $valTitle = rechangeQuot($valueList['title']);
        $valName = rechangeQuot($valueList['name']);
        $valEmail = rechangeQuot($valueList['email']);
        $valTel = rechangeQuot($valueList['tel']);
        $valIP = rechangeQuot($valueList['ip']);
        $valStatus = rechangeQuot($valueList['status']);
        $valCredate = DateFormat($valueList['credate']);

        $valComplaintName = rechangeQuot($valueList['complaint_name']);
        $valComplaintTime = rechangeQuot($valueList['complaint_time']);
        $valComplaintFac = rechangeQuot($valueList['complaint_fac']);
        $valComplaintDesc1 = rechangeQuot($valueList['complaint_desc1']);
        $valComplaintDesc2 = rechangeQuot($valueList['complaint_desc2']);
        $valComplaintConfirm = rechangeQuot($valueList['complaint_confirm']);

        $objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, $index);
        // $objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, $valGroupName);
        $objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, $valName);
        $objPHPExcel->getActiveSheet()->setCellValue("C" . $active_row, $valAddress);
        $objPHPExcel->getActiveSheet()->setCellValue("D" . $active_row, $valEmail);
        $objPHPExcel->getActiveSheet()->setCellValue("E" . $active_row, $valTel);
        $objPHPExcel->getActiveSheet()->setCellValue("F" . $active_row, $valSubject);
        $objPHPExcel->getActiveSheet()->setCellValue("G" . $active_row, $valTitle);

        $objPHPExcel->getActiveSheet()->setCellValue("H" . $active_row, $valComplaintName);
        $objPHPExcel->getActiveSheet()->setCellValue("I" . $active_row, $valComplaintTime);
        $objPHPExcel->getActiveSheet()->setCellValue("J" . $active_row, $modValueFac[$valComplaintFac]);
        $objPHPExcel->getActiveSheet()->setCellValue("K" . $active_row, $valComplaintDesc1);
        $objPHPExcel->getActiveSheet()->setCellValue("L" . $active_row, $valComplaintDesc2);
        $objPHPExcel->getActiveSheet()->setCellValue("M" . $active_row, $modValueConfirm[$valComplaintConfirm]);

        $objPHPExcel->getActiveSheet()->setCellValue("N" . $active_row, $valIP);
        $objPHPExcel->getActiveSheet()->setCellValue("O" . $active_row, $valCredate);
        $objPHPExcel->getActiveSheet()->setCellValue("P" . $active_row, $valStatus);
        $objPHPExcel->getActiveSheet()->getStyle('A' . $active_row . ':P' . $active_row)->applyFromArray($tbody_cell_style);
        $active_row++;
        $index++;
    }
}

$filename = "report_contact_corruption_" . date("YmdHi") . ".xls";
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
