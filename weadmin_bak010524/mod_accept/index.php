<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<!-- start Modal -->
<link rel="stylesheet" href="template/css/custom-bootstrap.css">
<!-- <link rel="stylesheet" href="template/css/bootstrap-theme.min.css"> -->

<!-- <script src="template/js/bootstrap.min.js"></script> -->
<script src="template/js/custom-jquery.min.js"></script>
<script src="template/js/custom-bootstrap.min.js"></script>


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<!-- end Modal -->
<link href="../css/theme.css" rel="stylesheet"/>

<title><?php echo $core_name_title?></title>

<link rel="stylesheet" href="../js/jquery-ui-1.9.0.css">
<script language="JavaScript"  type="text/javascript" src="../js/jquery-1.9.0.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/jquery-ui-1.9.0.js"></script>

<!-- <script language="JavaScript"  type="text/javascript" src="../js/jquery-1.9.0.js"></script> -->
<script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>

<script type="text/javascript">
	jQuery(function() {
		boxContantLoad('../<?php echo $mod_fd_root?>/loadContant.php');
	});
</script>

</head>
<body>
<div class="allBackOffice">
	<!-- #################### Head ###############  -->
			<?php include("../core/incHead.php");?>
	<!-- #################### Main ###############  -->
     <div class="mainBackOffice">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
                <td  class="tbLeftMenu" align="left"  valign="top">
                	<div class="mLeftBackOffice">
                    	<?php include("../core/incLeft.php");?>
                    </div>
            </td>
                <td  align="left" class="borderLeft" valign="top">
                <form action="?" method="post" name="myFormHome" id="myFormHome">
                <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey']?>" />
                <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid']?>" />
                <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch']?>" />
                <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow']?>" />
                <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize']?>" />
                <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby']?>" />
                <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh']?>" />
                <input name="valEditID" type="hidden" id="valEditID" value="" />
                <input name="inputLt" type="hidden" id="inputLt" value="" />
                <input name="inputTh" type="hidden" id="inputTh" value="<?php echo $_REQUEST['inputTh']?>" />
                <input name="sdateInput" type="hidden" id="sdateInput" value="<?php echo $_REQUEST['sdateInputSe']?>" />
                <input name="edateInput" type="hidden" id="edateInput" value="<?php echo $_REQUEST['edateInputSe']?>" />
                </form>
                	<div class="mRightBackOffice" id="boxContantLoad">
                    			<?php include("../core/incWaitting.php")?>
                    </div>
           	</td>
          </tr>
        </table>
    </div>
    <div class="clearAll" ></div>
	<!-- #################### Footer ###############  -->
    <?php include("../core/incFooter.php");?>
    <?php include("../core/incLoderBox.php");?>
    
</div>
</body>
</html>
