<?

include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

$sql = "DELETE FROM " . $mod_tb_permisGroup . " where " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_masterkey = '" . $_POST['masterkey'] . "'";
$Query = wewebQueryDB($coreLanguageSQL, $sql);

foreach ($_POST['permis'] as $idG => $valuePermis) {
   foreach ($valuePermis as $idMis => $status) {
      $insert[$mod_tb_permisGroup . "_misid"] = "" . $idMis . "";
      $insert[$mod_tb_permisGroup . "_cmgid"] = "" . $idG . "";
      $insert[$mod_tb_permisGroup . "_status"] = "'Enable'";
      $insert[$mod_tb_permisGroup . "_masterkey"] = "'" . $_POST['masterkey'] . "'";

      $sql = "INSERT INTO " . $mod_tb_permisGroup . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);
   }
}

