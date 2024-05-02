<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
</head>

<body>

    <div class="global-container">
        <?php include('inc/header.php'); ?>

        <section class="layout-body">
            <div class="default-header">
                <div class="wrapper">
                    <div class="container">
                        <div class="breadcrumb-block">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#" class="link">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.856" height="15.857" viewBox="0 0 15.856 15.857">
                                                <path id="home-3" d="M15.43,6.9h0L8.96.428A1.459,1.459,0,0,0,6.9.428L.43,6.893.424,6.9A1.459,1.459,0,0,0,1.4,9.386l.045,0H1.7v4.76a1.71,1.71,0,0,0,1.709,1.708H5.937a.465.465,0,0,0,.465-.465V11.661a.78.78,0,0,1,.779-.779H8.674a.78.78,0,0,1,.779.779v3.732a.465.465,0,0,0,.465.465h2.531a1.71,1.71,0,0,0,1.709-1.708V9.389H14.4A1.46,1.46,0,0,0,15.43,6.9Zm0,0" transform="translate(0)" fill="#fff" />
                                            </svg>
                                        </span>
                                        ซีไอโอ
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="link">
                                        รายละเอียดเกี่ยวกับซีไอโอ
                                    </a>
                                </li>
                            </ol>
                        </div>
                        <h1 class="title">
                            รายละเอียดเกี่ยวกับซีไอโอ
                        </h1>
                        <div class="graphic">
                            <div class="obj">
                                <img src="<?php echo $core_template; ?>/img/uploads/obj-banner-about.png" alt="obj-banner-about" class="lazy img-cover">
                            </div>
                        </div>
                    </div>
                </div>
                <figure class="cover">
                    <img src="<?php echo $core_template; ?>/img/static/banner.jpg" alt="" class="lazy img-cover">
                </figure>
            </div>
            <!-- ck editor -->
            <div class="default-body">
                <div class="content"></div>
                <div class="bg-cio">
                    <img src="<?php echo $core_template; ?>/img/background/bg-cio.png" alt="background">
                </div>
                <div class="logo-person">
                    <img src="<?php echo $core_template; ?>/img/uploads/logo-person.png" alt="รูปภาพ">
                </div>
                <div class="bg-text">
                    <div class="position-relative">
                        <div class="text"> </div>
                        <div class="bg-left"><img src="<?php echo $core_template; ?>/img/background/bg-text-left.png" alt="background"></div>
                        <div class="bg-right"><img src="<?php echo $core_template; ?>/img/background/bg-text-right.png" alt="background"></div>
                        <div class="position-text">
                            <h2 title="ชื่อ">นายแพทย์พิเชฐ บัญญัติ</h2>
                            <p title="ตําแหน่ง">รองอธิบดีกรมวิทยาศาสตร์การแพทย์</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="contact">
                        <div class="title-contact">
                            <h3 title="ข้อมูลการติดต่อ" class="title">ข้อมูลการติดต่อ</h3>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p title="ที่อยู่">ที่อยู่</p>
                                <p title="เบอร์โทร">เบอร์โทรศัพท์</p>
                                <p title="โทรสาร">โทรสาร</p>
                                <p title="อีเมล">ที่อยู่ไปรษณีย์อิเล็กทรอนิกส์</p>
                            </div>
                            <div class="col">
                                <p>-</p>
                                <p>0-2591-5453 ต่อ 99008</p>
                                <p>-</p>
                                <p>phichet.b@dmsc.mail.gp.th</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ck editor -->
        </section>
        <?php include('inc/footer.php'); ?>
    </div>
    <?php include('inc/loadscript.php'); ?>

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
        position: absolute;
        top: 310px;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .bg-text {
        position: relative;
    }

    .text {
        background: linear-gradient(to top, #01377D, #2AB170);
        width: 100%;
        height: 180px;
        background-size: cover;
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

@media (max-width: 1440px) {
    .logo-person {
        top: 250px;
    }
    .logo-person img {
        width: 300px;
        height: 400px;
    }
}

@media (max-width: 1199px) {
    .logo-person {
        top: 200px;
    }
}

@media (max-width: 991px) {
    .logo-person {
        top: 170px;
    }
    .logo-person img{
        width: 180px;
        height: 250px;
    }
    .text {
        height: 100px;
    }
    .position-text h2{
        font-size: 28px;
    }
    .position-text p{
        font-size: 18px;
    }
    .bg-left img{
        height: 100px;
    }
    .bg-right img{
        height: 100px;
    }
}

@media (max-width: 767px) {
    .logo-person {
        top: 120px;
    }
    .title-contact {
        font-size: 28px;
    }
    .col p{
        font-size: 18px;
    }
}

@media (max-width: 575px) {
    .logo-person {
        top: 85px;
    }
    .logo-person img{
        width: 130px;
        height: 180px;
    }
    .position-text h2{
        font-size: 20px;
    }
    .position-text p{
        font-size: 14px;
    }
    .title-contact {
        font-size: 20px;
    }
    .text {
        height: 80px;
    }
    .bg-left img{
        height: 80px;
    }
    .bg-right img{
        height: 80px;
    }
}

</style>