<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
</head>

<body>

    <div class="global-container">
        <section class="layout-body">
            <div class="defailt-body">
                <div class="content">
                    <div class="logo-person">
                        <img src="<?php echo $core_template; ?>/img/uploads/logo-person.png" alt="">
                    </div>
                </div>
                <div class="bg-cio">
                    <img src="<?php echo $core_template; ?>/img/background/bg-cio.png" alt="">
                </div>
                <div class="bg-text">
                    <div class="position-relative">
                        <div class="text"> </div>
                        <div class="bg-left"><img src="<?php echo $core_template; ?>/img/background/bg-text-left.png" alt=""></div>
                        <div class="bg-right"><img src="<?php echo $core_template; ?>/img/background/bg-text-right.png" alt=""></div>
                        <div class="position-text">
                            <h2>นายแพทย์พิเชฐ บัญญัติ</h2>
                            <p>รองอธิบดีกรมวิทยาศาสตร์การแพทย์</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="contact">
                        <div class="title-contact">
                            <h3 class="title">ข้อมูลการติดต่อ</h3>
                        </div>
                        <div class="row">


                            <div class="col-sm-4">
                                <p>ที่อยู่</p>
                                <p>เบอร์โทรศัพท์</p>
                                <p>โทรสาร</p>
                                <p>ที่อยู่ไปรษณีย์อิเล็กทรอนิกส์</p>
                            </div>
                            <div class="col-sm-8">
                                <p>-</p>
                                <p>0-2591-5453 ต่อ 99008</p>
                                <p>-</p>
                                <p>phichet.b@dmsc.mail.gp.th</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


</body>

</html>

<style>
    .defailt-body {
        position: relative;
    }

    .content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .logo-person {
        display: flex;
        justify-content: center;
    }

    .bg-text {
        position: relative;
    }

    .bg-left {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0.2;
        mix-blend-mode: multiply;
    }

    .bg-right {
        position: absolute;
        right: 0;
        top: 0;
        opacity: 0.2;
        mix-blend-mode: multiply;
    }

    .text {
        background: linear-gradient(to top, #01377D, #2AB170);
        width: 100%;
        height: 180px;
        background-size: cover;
    }

    .position-text p {
        text-align: center;
        margin-top: 10px;
    }

    .position-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
    }

    .text img {
        position: absolute;
        left: 0;
    }

    .title-contact {
        color: #01377D;
        font-size: 36px;
    }

    .contact {
        margin-top: 50px;
    }

    .row {
        margin-top: 30px;
        color: black;
    }

    .bg-cio {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>