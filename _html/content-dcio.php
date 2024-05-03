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
                <div class="background-cio">
                    <img src="<?php echo $core_template; ?>/img/background/bg-cio.png" alt="backgroundinside-cio">
                </div>
                <div class="logo-person">
                    <img src="<?php echo $core_template; ?>/img/uploads/logo-person.png" alt="image-CIO">
                </div>
                <div class="bg-text">
                    <img src="<?php echo $core_template; ?>/img/uploads/bg-text.png" alt="background-text">
                    <div class="text-name">
                      <div class="position-name">
                            <div class="name">นายแพทย์พิเชฐ บัญญัติ</div>
                            <div class="position-work">รองอธิบดีกรมวิทยาศาสตร์การแพทย์</div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="contact">
                    <div class="title-contact">
                        <h3 title="ข้อมูลการติดต่อ">ข้อมูลการติดต่อ</h3>
                    </div>
                    <div class="row d-contact">
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
    .background-cio {
        position: relative;
        width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 0;
    }

    .logo-person {
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
    }

    .bg-text {
        position: relative;
        background: linear-gradient(to top, #01377D, #2AB170);
        height: 180px;
        z-index: 2;
    }

    .bg-text img {
        width: 100%;
        height: 180px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.2;
    }

    .text-name {
        position: absolute;
        color: white;
        width: 100%;
        height: 100%;
        top: 0;
    }

    .position-name {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100%;
    }

    .name {
        font-size: 40px;
    }

    .position-work {
        font-size: var(--typo-md);
    }

    .title-contact {
        color: #01377D;
        font-size: 36px;
    }

    .contact {
        margin-top: 50px;
    }

    .d-contact {
        margin-top: 30px;
        color: black;
    }
    .d-contact p{
        font-size: var(--typo-md);
    }
 



@media (max-width: 1440px) {
   
    .logo-person img {width: 300px;}
}
@media (max-width: 1199px) {
    
    .bg-text {height: 150px;}
    .bg-text img {height: 150px;}
    .name{font-size: var(--typo-xl);}
    .position-work{font-size: var(--typo-default);}
}

@media (max-width: 991px) {
    .logo-person img{width: 250px;}
}

@media (max-width: 767px) {
    .bg-text {height: 100px;}
    .bg-text img {height: 100px;}
    .name{font-size: var(--typo-lg);}
    .position-work{font-size: var(--typo-xs);}
    .title-contact h3{font-size: var(--typo-lg);}
    .d-contact p{font-size: var(--typo-sm);}
    .logo-person img{width: 200px;}
}

@media (max-width: 575px) {
    .logo-person img{width: 150px;}
   .name{font-size: var(--typo-md);}
    .position-work{font-size: 16px;}
    .title-contact h3{font-size: var(--typo-md);}
    .d-contact p{font-size: 16px;}
} 
</style>

<script>
    $('.background-cio').closest('.default-body').addClass('pt-0');
    $('.background-cio').closest('.default-body').addClass('pb-0');
</script>

