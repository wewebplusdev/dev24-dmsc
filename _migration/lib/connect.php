<?php
include 'adodb5/adodb.inc.php';

## adodb start ##
$dbOld = NewADOConnection($coreLanguageSQL);
$dbOld->Connect($_env['old']['hostname'], $_env['old']['username'], $_env['old']['password'], $_env['old']['dbname']);

$dbOld->charSet = "SET NAMES " . $core_db_charecter_set['charset'];
$dbOld->Execute("SET character_set_results=" . $core_db_charecter_set['charset']);
$dbOld->Execute("SET collation_connection=" . $core_db_charecter_set['collation']);
$dbOld->Execute("SET NAMES '" . $core_db_charecter_set['charset'] . "'");
$dbOld->cacheSecs = 3600 * 12;

## adodb start ##
$db = NewADOConnection($coreLanguageSQL);
$db->Connect($_env['new']['hostname'], $_env['new']['username'], $_env['new']['password'], $_env['new']['dbname']);

$db->charSet = "SET NAMES " . $core_db_charecter_set['charset'];
$db->Execute("SET character_set_results=" . $core_db_charecter_set['charset']);
$db->Execute("SET collation_connection=" . $core_db_charecter_set['collation']);
$db->Execute("SET NAMES '" . $core_db_charecter_set['charset'] . "'");
$db->cacheSecs = 3600 * 12;
