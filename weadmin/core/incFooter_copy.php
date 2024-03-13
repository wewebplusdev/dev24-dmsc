<!-- <div class="footerBackOffice">
    <div class="imgLogo"><?= $langTxt["login:footecopy"] ?> <i class="versionsmall"><?php echo 'Current PHP Version: ' . phpversion(); ?></i></div>
    <div class="divLogin"><?= $langTxt["login:footecontact"] ?></div>
</div> -->

<!-- <script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200){  
            $('.divRightHead').addClass('fixed');
            $('.divRightMain').addClass('tiny');
        }
        else{
            $('.divRightHead').removeClass('fixed');
            $('.divRightMain').removeClass('tiny');
        }
    });
</script> -->

<script language="JavaScript" type="text/javascript" src="../js/select2/js/select2.js"></script>
<script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 260){  
            $('.mLeftBackOffice').addClass('tiny');
            $('.divRightHead').addClass('fixed');
            $('.divRightNav').addClass('fixed');
            $('.divRightMain').addClass('tiny');
        }
        else{
            $('.mLeftBackOffice').removeClass('tiny');
            $('.divRightHead').removeClass('fixed');
            $('.divRightNav').removeClass('fixed');
            $('.divRightMain').removeClass('tiny');
        }
    });

    $('.divBtn-menu a').click(function(){
        $('.navControl').addClass('open');
        $('.divBtnmenu-close').addClass('active')
    });
    $('.divBtnmenu-close').click(function(){
        $('.navControl').removeClass('open');
        $(this).removeClass('active')
    });
    $('.navControl-overlay').click(function(){
        $('.navControl').removeClass('open');
        $('.divBtnmenu-close').removeClass('active');
    });
</script>

<div class="footerBackOffice f-main">
    <div>
	    <div class="imgLogo">
            <?php echo $langTxt["login:footecopy"]; ?> 
        </div>
        <div class="divLogin">
            <?php echo $langTxt["login:footecontact"]; ?>
            <br><br>
            <i class="versionsmall mt-3"><?php echo 'Current PHP Version: ' . phpversion(); ?></i>
        </div>
	</div>
    <!-- Copyright © DMCR All rights reserved. -->
</div>
<!-- <style>
    .versionsmall {
        color: #616161;
    }
</style> -->

<div id="scrollToTopBtn">
    <?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/>
</div>

<div id="loadCheckComplete"></div>
<div class="clearAll"></div>
<? include("../lib/disconnect.php"); ?>

<style type="text/css">
    .fontContantTbTime a{
        color: #999;
    }
    .fontContantTbTime a:hover{color: #2671c2;}
</style>