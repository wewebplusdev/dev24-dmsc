<?
include("lib/session.php");
if ($_SESSION[$valSiteManage . "core_session_language"] == "") {
    $_SESSION[$valSiteManage . "core_session_language"] = "Thai";
}

include("lib/config.php");
include("lib/connect.php");

$_SESSION[$valSiteManage . "core_session_id"] = 0;
$_SESSION[$valSiteManage . "core_session_name"] = "";
$_SESSION[$valSiteManage . "core_session_level"] = "";
$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
$_SESSION[$valSiteManage . "core_session_groupid"] = 0;
$_SESSION[$valSiteManage . "core_session_permission"] = "";
$_SESSION[$valSiteManage . "core_session_logout"] = "";


include("core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="googlebot" content="noindex, nofollow">
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="css/theme.css" rel="stylesheet"/>
        <link href="css/font-awesome.min.css" rel="stylesheet"/>
        <title><?= $core_name_title ?></title>
        <script language="JavaScript"  type="text/javascript" src="js/jquery-1.9.0.js"></script>
        <script language="JavaScript"  type="text/javascript" src="js/jquery.blockUI.js"></script>
        <script language="JavaScript"  type="text/javascript" src="js/scriptCoreWeweb.js"></script>

        <script language="JavaScript" type="text/javascript" src="https://oneaccount.dmcr.go.th/cdn/js/validation.js"></script>
        <script language="JavaScript" type="text/javascript" src="https://oneaccount.dmcr.go.th/cdn/js/cookie.js"></script>
        <script language="JavaScript" type="text/javascript" src="https://oneaccount.dmcr.go.th/cdn/js/controller.api.js"></script>
        <script language="JavaScript" type="text/javascript" src="lib/ActiveDirectory/validation/js/controller.url.js<?php echo $lastModify ?>"></script>
        <script language="JavaScript" type="text/javascript" src="lib/ActiveDirectory/validation/js/function.js<?php echo $lastModify ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script language="JavaScript"  type="text/javascript">
            jQuery(function () {

                jQuery('form#myFormLogin').submit(function () {
                    with (document.myFormLogin) {
                        if (inputUser.value == '') {
                            inputUser.focus();
                            return false;
                        }
                        if (inputPass.value == '') {
                            inputPass.focus();
                            return false;
                        }
                    }

                    checkLoginUser();
                    return false;
                });
            });
        </script>
                
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-LN55FFT0J6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-LN55FFT0J6');
        </script> -->
    </head>

    <body>
        <div class="login-page" style=" background-image: none; ">
            <div class="loginBack" style=" padding: 0; ">
                <div class="loginNew-wrapper">
                    <div class="d-flex">
                        <div class="collumn col-left d-flex flex-lg-row-fluid">
                            <address>
                                <?php echo  $langTxt["login:footecopy"] ?> 
                                <!-- <i class="versionsmall"><?php echo 'Current PHP Version: ' . phpversion(); ?></i> -->
                            </address>
                        </div>
                        <div class="collumn col-right d-flex flex-lg-row-fluid">
                            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                                <div class="login-body">
                                    <div class="login-form">
                                        <div class="body">
                                            <div class="brand">
                                                <img src="img/new-brand.png" alt="">
                                            </div>
                                        <div class="title">
                                            ยินดีต้อนรับเข้าสู่ระบบ
                                            <br>
                                            <small>ระบบ QR Code  กรมทรัพยากรทางทะเลและชายฝั่ง</small>
                                        </div>
                                        <form class="form-default" action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                                            <div class="form-group">
                                                <label class="control-label">ชื่อผู้ใช้งาน</label>
                                                <div class="control-group">
                                                    <span class="feather icon-user"></span>
                                                    <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">รหัสผ่าน</label>
                                                <div class="control-group">
                                                    <span class="feather icon-unlock"></span>
                                                    <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="">
                                                    <button type="button" id="Pass" data-toggle="password" class="feather icon-eye-off"></button>
                                                </div>
                                            </div>
                                            <div class="form-btn">
                                                <input class="btn btn-primary" name="input" type="submit" value="<?= $langTxt["login:btn"] ?>" onclick="submitLogin();" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                <div class="copy-rights">
                                    <?php echo  $langTxt["login:footecontact"] ?>
                                </div>
                                <i class="versionsmall"><?php echo 'Current PHP Version: ' . phpversion(); ?></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="loadCheckComplete"></div>
            </div>

            <div id="tallContent" style="display:none">
                <span style="font-size:18px;">Please waiting..</span>
                <div style="height:10px;"></div>
                <img src="img/loader/login.gif" />
            </div>
            <? wewebDisconnect($coreLanguageSQL); ?>
        </div>
    </body>

    <script type="text/javascript">
        jQuery(function(){
            //===== Password
            $('[data-toggle="password"]').click(function(){
                var passwordInput = document.getElementById('input' + this.id);
                var passStatus = document.getElementById(this.id);
                if (passwordInput.type == 'password'){
                    passwordInput.type='text';
                    passStatus.className='feather icon-eye';
                }
                else{
                    passwordInput.type='password';
                    passStatus.className='feather icon-eye-off';
                }
            });
        });
    </script>
</html>
