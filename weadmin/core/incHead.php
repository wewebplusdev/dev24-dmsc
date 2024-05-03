
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<link href="../js/select2/css/selectList2.css?v=<?php echo date('YmdHis'); ?>" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<!-- <script src="../js/bootstrap@4.6.2.css"></script>
<link href="../css/bootstrap@4.6.2.css" rel="stylesheet"/> -->

<link href="../css/font-awesome.min.css" rel="stylesheet"/>
<meta id="viewport_meta" name="viewport" content="width=1360" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<div class="headBackOffice" style="display: none;">
    <div class="imgLogo">
        <a href="../core/index.php"><img src="<?=$core_pathname_crupload?>/<?=$valPicSystem?>" height="38" /></a>
    </div>
    <div class="txtLogoLogin">
            <h1 class="titleInner"><?=$valNameSystem?></h1>
            <h3 class="subtitleInner"><?=$valTitleSystem?></h3>
    </div>
    <div class="divLogin" >


        <!-- j10 -->
        <div class="divLogin-img">
            <?
            $valPicProfileTop = load_picmemberBack($_SESSION[$valSiteManage . "core_session_id"]);
            if (is_file($valPicProfileTop)) {
                $valPicProfileTop = $valPicProfileTop;
            } else {
                $valPicProfileTop = "../img/btn/nouser.jpg";
            }

            if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                $valLinkViewUser = "#";
            } else {
                $valLinkViewUser = "../core/userView.php";
            }
            ?>
            <a href="<?= $valLinkViewUser ?>">
                <div style="width:30px; height:30px;  background:url(<?= $valPicProfileTop ?>) center no-repeat; background-size: cover;background-repeat: no-repeat;   "></div>
            </a>
        </div>
        <div class="divLogin-name">
            <a href="<?= $valLinkViewUser ?>"><?= $_SESSION[$valSiteManage . "core_session_name"] ?></a>
        </div>
        <div class="divLogin-btn">
            <a href="javascript:void(0)" onclick="clickInSubMenuTop()" id="showSubMenuTop" title="<?= $langTxt["menu:topmenu"] ?>">
                <span class="fa fa-bars"></span>
            </a>
        </div>
        <!-- j10 -->

        <!-- <table  border="0" cellspacing="0" cellpadding="0" align="right">
            <tr>
                <td style="padding-right:10px;" >
                    <?
                    $valPicProfileTop = load_picmemberBack($_SESSION[$valSiteManage . "core_session_id"]);
                    if (is_file($valPicProfileTop)) {
                        $valPicProfileTop = $valPicProfileTop;
                    } else {
                        $valPicProfileTop = "../img/btn/nouser.jpg";
                    }

                    if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                        $valLinkViewUser = "#";
                    } else {
                        $valLinkViewUser = "../core/userView.php";
                    }
                    ?>
                    <div style="width:29px; height:29px;  background:url(<?= $valPicProfileTop ?>) center no-repeat; border:#ffffff solid 1px;  background-size: cover;background-repeat: no-repeat;   "><a href="<?= $valLinkViewUser ?>"><img src="../img/btn/boxprofile.png" /></a></div></td>
                <td style="padding-right:10px;" ><a href="<?= $valLinkViewUser ?>"><?= $_SESSION[$valSiteManage . "core_session_name"] ?></a></td>
                <td><a href="javascript:void(0)" onclick="clickInSubMenuTop()" id="showSubMenuTop" title="<?= $langTxt["menu:topmenu"] ?>"><img src="../img/btn/submenu.png" /></a></td>
            </tr>
        </table> -->

    </div>
</div>
<div class="clearAll"></div>
<!-- <div class="menuSub" id="divSubMenuTop">
    <div class="menuSubManage" >
        <ul>
        <? if ($_SESSION[$valSiteManage . "core_session_groupid"] == "11" && $_SESSION[$valSiteManage . "core_session_typeusermini"] == 0) { ?>
            <li><a href="../core/userMiniManage.php" title="<?= $langTxt["nav:userManage2"] ?>"><span class="fa fa-user"></span><?= $langTxt["nav:userManage2"] ?></a></li>
            <? }else{?>
        <? if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
            <li><a href="../core/userManage.php" title="<?= $langTxt["nav:userManage2"] ?>"><span class="fa fa-user"></span><?= $langTxt["nav:userManage2"] ?></a></li>
            <li><a href="../core/permisManage.php"  title="<?= $langTxt["nav:perManage2"] ?>"><span class="fa fa-cog"></span><?= $langTxt["nav:perManage2"] ?></a></li><? } ?>
        <? if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
           <li><a href="../core/menuManage.php" title="<?= $langTxt["nav:menuManage2"] ?>"><span class="fa fa-list"></span><?= $langTxt["nav:menuManage2"] ?></a></li>
            <li><a href="../core/setting.php" title="<?= $langTxt["nav:setting"] ?>"><span class="fa fa-cogs"></span><?= $langTxt["nav:setting"] ?></a></li><? } ?>
        

            <?php } ?>
            <li><a href="javascript:void(0)"onclick="checkLogoutUser();" title="<?= $langTxt["menu:logout"] ?>"><span class="fa fa-sign-out"></span><?= $langTxt["menu:logout"] ?></a></li>
        </ul>
    </div>
</div> -->
<div class="clearAll"></div>

<input id="pathTojs" type="hidden" value="<?=$core_pathname_folderlocal;?>">
