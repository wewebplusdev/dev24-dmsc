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
                <div class="container">
                    <div class="content">
                        <div class="logo">
                            <img src="<?php echo $core_template; ?>/img/uploads/img-logo.png" alt="">
                        </div>
                        <h2 class="title-lg">ตราสัญลักษณ์ กรมวิทยาศาสตร์การแพทย์</h2>
                    </div>
                </div>
                <div class="bg-img">
                    <img src="<?php echo $core_template; ?>/img/uploads/sky.png" alt="">
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
        height: 100%;
    }

    .logo {
        display: flex;
        justify-content: center;
        margin-top: 60px;
    }

    .title-lg {
        font-size: 48px;
        text-align: center;
        margin-top: 50px;
        color: #01377D;
    }

    .bg-img {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>