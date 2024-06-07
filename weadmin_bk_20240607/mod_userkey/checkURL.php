<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

// print_pre($_POST);

    if (!empty($_POST["id"])) {
        $sql_old = "SELECT ";
        $sql_old .= " ".$mod_tb_root."_link as url ";
        $sql_old .= " FROM ".$mod_tb_root;
        $sql_old .= " WHERE ".$mod_tb_root."_masterkey='".$_POST["masterkey"]."' AND  
                        ".$mod_tb_root."_link 	='".$_POST["inputurl"]."' AND
                        ".$mod_tb_root."_id	='".$_POST["id"]."'
        ";

        $Query_old = wewebQueryDB($coreLanguageSQL, $sql_old);
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query_old);
        $old_url = trim($Row['url']);
    } else {
        $old_url = '';
    }    

    $sql_check = "SELECT ";
    $sql_check .= " ".$mod_tb_root."_link as url ";
    $sql_check .= " FROM ".$mod_tb_root;
    $sql_check .= " WHERE ".$mod_tb_root."_masterkey='".$_POST["masterkey"]."' AND  
                    ".$mod_tb_root."_link 	='".$_POST["inputurl"]."'
    ";
    // print_pre($sql_check);die;
    $Query_check = wewebQueryDB($coreLanguageSQL,$sql_check);
    $count_check = wewebNumRowsDB($coreLanguageSQL, $Query_check);
    // print_pre($count_check);die;

    if ($_POST["inputurl"] == $old_url) {
        $output = array(
            "status" => "old",
            "old" => $old_url
        );
        echo json_encode($output);
    } else {
        if ($count_check > 0) {
            $output = array(
                "status" => "error",
                "old" => $old_url
            );
            echo json_encode($output);
        } else {
            $output = array(
                "status" => "success"
            );
            echo json_encode($output);
        }
    }
?>