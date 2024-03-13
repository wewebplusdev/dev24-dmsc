<?
include("lib/session.php");

if ($_SESSION[$valSiteManage . "core_session_language"] == "") {
    $_SESSION[$valSiteManage . "core_session_language"] = "Thai";
}

include("lib/config.php");

include("lib/connect.php");
// print_r('xx');die;
$_SESSION[$valSiteManage . "core_session_id"] = 0;
$_SESSION[$valSiteManage . "core_session_name"] = "";
$_SESSION[$valSiteManage . "core_session_level"] = "";
$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
$_SESSION[$valSiteManage . "core_session_groupid"] = 0;
$_SESSION[$valSiteManage . "core_session_permission"] = "";
$_SESSION[$valSiteManage . "core_session_logout"] = "";
$_SESSION[$valSiteManage . "core_session_login_time"] = 0;
$_SESSION[$valSiteManage . "core_session_last_activity"] = 0;

include("core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <link href="css/theme.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />


    <title><?= $core_name_title ?></title>


    <script language="JavaScript" type="text/javascript" src="js/jquery-1.9.0.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery.blockUI.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/scriptCoreWeweb.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $recaptcha_sitekey ?>"></script>

    <script language="JavaScript" type="text/javascript">
        jQuery(function() {
            jQuery('form#myFormLogin').submit(function() {
                with(document.myFormLogin) {
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
                // reload
                load_recaptch();
                return false;
            });

            // ready
            load_recaptch();
        });

        function load_recaptch() {
            grecaptcha.ready(function() {
                // do request for recaptcha token
                // response is promise with passed token
                grecaptcha.execute($('#g-recaptcha-response').data('secret'), {
                        action: 'validate_captcha'
                    })
                    .then(function(token) {
                        // add token value to form
                        document.getElementById('g-recaptcha-response').value = token;
                    });
            });
        }
    </script>

    <style type="text/css">
        @media (max-width: 768px) {
            .loginBack {
                height: auto;
                padding: 40px 15px;
            }

            .new_login .login-form {
                margin-top: 0;
                width: 100%;
                position: relative;
                top: 0;
                transform: translate(0);
            }

            .new_login .login-form .header {
                height: 140px;
                background-size: cover;
            }

            .new_login .login-form .header .brand {
                padding-top: 40px;
            }

            .new_login .login-form .header .brand img {
                width: 160px;
            }

            .new_login .login-form .body .title {
                font-size: 26px;
                margin-bottom: 20px;
            }

            .new_login .login-form .body .title small {
                font-size: 17px;
            }

            .new_login .login-form .body {
                padding: 30px 20px;
            }

            .new_login .footerBackOffice,
            .new_login .footerBackOffice * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .new_login .footerBackOffice {
                position: relative;
                min-width: inherit;
                padding: 15px 15px;
            }

            .new_login .footerBackOffice>div,
            .new_login .footerBackOffice>div>div {
                display: block;
                width: auto;
                padding: 0;
            }

            .new_login .footerBackOffice .imgLogo {
                margin: 0 0 10px 0;
                text-align: center;
                font-size: 11px;
            }

            .new_login .footerBackOffice .divLogin {
                margin: 0;
                text-align: center;
                font-size: 12px;
            }
        }
    </style>

</head>

<body>
    <div class="login-page" style="background-image: none;">
        <div class="loginBack" style="padding: 0;">
            <div class="loginNew-wrapper">
                <div class="d-flex">
                    <div class="collumn col-left d-flex flex-lg-row-fluid" style="background-image: url('../upload/core/<?= $valPicBgSystem ?>');">
                        <address>
                            <?php echo  $langTxt["login:footecopy"] ?> 
                        </address>
                    </div>
                    <div class="collumn col-right d-flex flex-lg-row-fluid">
                        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                            <div class="login-body">
                                <div class="login-form">
                                    <div class="body">
                                        <div class="brand">
                                            <img src="../upload/core/<?= $valPicSystem ?>" alt="">
                                        </div>
                                        <div class="title">
                                            ยินดีต้อนรับเข้าสู่ระบบ
                                            <br>
                                            <small><?= $valNameSystem ?></small>
                                        </div>
                                        <form class="form-default" action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                                            <input id="inputUrl" name="inputUrl" type="hidden" value="<?= $uID ?>">
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
                                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" data-secret="<?php echo $recaptcha_sitekey ?>">
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
    jQuery(function() {
        //===== Password
        $('[data-toggle="password"]').click(function() {
            var passwordInput = document.getElementById('input' + this.id);
            var passStatus = document.getElementById(this.id);
            if (passwordInput.type == 'password') {
                passwordInput.type = 'text';
                passStatus.className = 'feather icon-eye';
            } else {
                passwordInput.type = 'password';
                passStatus.className = 'feather icon-eye-off';
            }
        });
    });
</script>

</html>