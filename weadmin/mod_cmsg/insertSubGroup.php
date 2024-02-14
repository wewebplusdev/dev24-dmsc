<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

if ($_REQUEST['execute'] == "insert") {

   $sql = "SELECT MAX(" . $mod_tb_root_subgroup . "_order) FROM " . $mod_tb_root_subgroup;
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
   $maxOrder = $Row[0] + 1;

   $insert = array();
   // $insert[$mod_tb_root_subgroup."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
   $insert[$mod_tb_root_subgroup . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
   // $insert[$mod_tb_root_subgroup."_coreid"] = "'".changeQuot($_REQUEST['inputGroupID'])."'";
   $insert[$mod_tb_root_subgroup . "_timekm"] = "'" . $_POST["inputTimeKm"] . "'";
   $insert[$mod_tb_root_subgroup . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$mod_tb_root_subgroup . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
   $insert[$mod_tb_root_subgroup . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$mod_tb_root_subgroup . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
   $insert[$mod_tb_root_subgroup . "_col"] = "'" . $_POST["inputColor"] . "'";
   $insert[$mod_tb_root_subgroup . "_pic"] = "'" . $_POST["picname"] . "'";
   $insert[$mod_tb_root_subgroup . "_pic2"] = "'" . $_POST["picname2"] . "'";
   $insert[$mod_tb_root_subgroup . "_credate"] = "NOW()";
   $insert[$mod_tb_root_subgroup . "_lastdate"] = "NOW()";
   $insert[$mod_tb_root_subgroup . "_status"] = "'Disable'";
   // $insert[$mod_tb_root_subgroup."_typeInfo"] = "0";
   $insert[$mod_tb_root_subgroup . "_order"] = "'" . $maxOrder . "'";

   $sql = "INSERT INTO " . $mod_tb_root_subgroup . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
   // print_pre($sql);die;
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $contantID = wewebInsertID($coreLanguageSQL);

   $insertlang = array();
   $insertlang[$mod_tb_root_subgroup_lang . "_cid"] = "'" . $contantID . "'";
   $insertlang[$mod_tb_root_subgroup_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
   $insertlang[$mod_tb_root_subgroup_lang . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
   $insertlang[$mod_tb_root_subgroup_lang . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
   $insertlang[$mod_tb_root_subgroup_lang . "_title"] = "'" . changeQuot($_REQUEST['inputComment']) . "'";

   $sql = "INSERT INTO " . $mod_tb_root_subgroup_lang . "(" . implode(",", array_keys($insertlang)) . ") VALUES (" . implode(",", array_values($insertlang)) . ")";
   // print_pre($sql);die;
   $Query = wewebQueryDB($coreLanguageSQL, $sql);

   $insert_per = array();
   if ($_SESSION[$valSiteManage . 'core_session_level'] != "admin" && ( $_SESSION[$valSiteManage . 'core_session_groupid'] > 0)) {
      $insert_per[$mod_tb_permisGroup . "_misid"] = "" . $_SESSION[$valSiteManage . 'core_session_groupid'] . "";
      $insert_per[$mod_tb_permisGroup . "_cmgid"] = "" . $contantID . "";
      $insert_per[$mod_tb_permisGroup . "_status"] = "'Enable'";
      $insert_per[$mod_tb_permisGroup . "_masterkey"] = "'" . $_POST['masterkey'] . "'";

      $sql = "INSERT INTO " . $mod_tb_permisGroup . "(" . implode(",", array_keys($insert_per)) . ") VALUES (" . implode(",", array_values($insert_per)) . ")";
      // print_pre($sql);
      $Query = wewebQueryDB($coreLanguageSQL, $sql);
   }

   logs_access('3', 'Insert Group');
}
?>
<?php include("../lib/disconnect.php"); ?>
<form action="subgroup.php" method="post" name="myFormAction" id="myFormAction">
   <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
   <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
   <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
   <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputgroupid'] ?>" />
   <input name="inputgroupID" type="hidden" id="inputgroupID" value="<?php echo $_REQUEST['inputgroupID'] ?>" />

   <?php require_once './inc-inputsearch.php'; ?>
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
