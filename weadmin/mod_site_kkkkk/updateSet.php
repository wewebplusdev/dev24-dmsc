<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Manage Contant</title>
    </head>
    <body>
        <?php
        if ($execute == "update") {
            print_pre($_POST);die;
            $update=array();
            $update[] = $mod_tb_setlang . "_social  	='" . serialize($_POST['social']) . "'";
            $update[] = $mod_tb_setlang . "_config  	='" . serialize($_POST['info']) . "'"; 
            $update[] = $mod_tb_setlang . "_fac  	='" . serialize($_POST['inputfaction']) . "'";
            $update[] = $mod_tb_setlang . "_addresspic  	='" . $_POST['picname'] . "'";
            $update[] = $mod_tb_setlang . "_qr  	='" . $_POST['picQR'] . "'";
            $update[] = $mod_tb_setlang . "_hotlinepic  	='" . $_POST['picHT'] . "'";
            $update[] = $mod_tb_setlang . "_callape  	='" . serialize($_POST['callape']) . "'";
            $update[] = $mod_tb_setlang . "_piccallape  	='" . $_POST['picnameCallape'] . "'";
            $update[] = $mod_tb_set . "_piccallape  	='" . $_POST['picnameCallape'] . "'";

            $sql = "UPDATE " . $mod_tb_setlang . " SET " . implode(",", $update) . " WHERE " . $mod_tb_setlang . "_containid='" . $_POST["valEditID"] . "' AND  " . $mod_tb_setlang . "_language='" . $_REQUEST['inputLt'] ."'";
            // print_pre($sql);die;
            $Query=wewebQueryDB($coreLanguageSQL,$sql);
           
            $updatemain = array();
            $updatemain[] = $mod_tb_set . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
            $updatemain[] = $mod_tb_set . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
            $updatemain[] = $mod_tb_set . "_lastdate=NOW()";

            $sql = "UPDATE " . $mod_tb_set . " SET " . implode(",", $updatemain) . " WHERE " . $mod_tb_set . "_id='" . $_POST["valEditID"] . "' ";
            $Query=wewebQueryDB($coreLanguageSQL,$sql);

            logs_access('3', 'Update Group');
            // print_pre($sql);
            ?>
        <?php } ?>
        <?php include("../lib/disconnect.php"); ?>
        <form action="set.php" method="post" name="myFormAction" id="myFormAction">
            <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
            <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
            <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $_REQUEST['module_pageshow'] ?>" />
            <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $_REQUEST['module_pagesize'] ?>" />
            <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $_REQUEST['module_orderby'] ?>" />
            <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
        </form>
        <script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
    </body></html>
