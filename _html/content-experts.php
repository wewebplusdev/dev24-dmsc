<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>

    <style>
        .layout-experts .content {

            padding: 40px 30px;
            font-size: 20px;
            line-height: 1.5;
        }

        .layout-experts .font18 {
            font-size: 18px;
            font-weight: 300;
        }

        .layout-experts .typo-xs {
            font-size: 16px;
            width: 100%;


        }

        .layout-experts .card-bottom {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .editor-content {
            margin: 0;
        }



        .layout-experts .image-cover {
            width: 240px;
            height: 280px;
        }

        .layout-experts .image-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .layout-experts .color-mode img {
            mix-blend-mode: screen;
        }

        .layout-experts .structure-column {
            padding: 40px 40px 40px 60px;
            font-size: 20px;

        }

        .layout-experts .title {
            font-size: 36px;
            color: var(--color-secondary);
            margin-bottom: 50px;
        }

        .layout-experts .item {
            -webkit-filter: drop-shadow(0px 10px 20px rgba(0, 0, 0, 0.1));
            filter: drop-shadow(0px 10px 20px rgba(0, 0, 0, 0.1));
            padding: 10px 20px;
            margin-bottom: 20px;
            color: var(--color-black);

        }

        .layout-experts .item a {
            text-decoration: none;
            color: var(--color-black);
        }

        .layout-experts .item a:hover {
            color: var(--color-primary);
        }

        .layout-experts .item .col-9 {
            padding: 0;
        }

        .layout-experts .opacity img {
            opacity: 0.1;
        }



        .layout-experts .item-wrapper {
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 2.25em), calc(100% - 2.25em) 100%, 0 100%);
            background-color: var(--color-light);
            border: 1px solid #EBEBEB;
            line-height: 1.5;
        }

        @media (max-width: 576px) {

            .layout-experts .item {
                display: flex;
                flex-direction: column;
                align-items: center;
                line-height: 3rem;
            }

            .layout-experts .item-wrapper {
                display: table;
                padding: 20px 20px 40px 20px;
                width: 350px;
            }

            .layout-experts .item-wrapper .card-bottom {
                padding: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .layout-experts .item-wrapper .card-bottom .text-primary {
                text-align: center;
            }

            .layout-experts .bottom-content {
                text-align: center;
            }

            .layout-experts .typo-xs {
                margin-left: 20px;
            }




            .layout-experts .item-wrapper .card-bottom .font18 {
                text-align: center;
                margin-bottom: 40px;
            }

            .layout-experts .text-back {
                bottom: 0;
            }

            .layout-experts .item-wrapper .card-top {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 20px;
            }

            .layout-experts .title {
                text-align: center;
            }
        }
    </style>
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
                                        เกี่ยวกับหน่วยงาน
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="link">
                                        โครงสร้างองค์กร
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="link">
                                        ทำเนียบผู้ทรงคุณวุฒิ
                                    </a>
                                </li>
                            </ol>
                        </div>
                        <h1 class="title">
                            ทำเนียบผู้ทรงคุณวุฒิ
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
            <div class="default-body">
                <!-- ck editor -->
                <div class="editor-content">
                    <div class="container">
                        <div class="layout-experts ">
                            <div title="ทำเนียบผู้บริหาร" class="title fw-bold ">ทำเนียบผู้ทรงคุณวุฒิ</div>

                            <div class="row ">

                                <div class="item col-xl-6 no-gutters ">
                                    <div class="item-wrapper row no-gutters">

                                        <div class="position-absolute opacity text-back"><img src="<?php echo $core_template; ?>/img/uploads/structure/background-2.png" alt=""></div>

                                        <div class="position-relative card-top col-sm-5">
                                            <div class="image-cover position-absolute">
                                                <img src="<?php echo $core_template; ?>/img/uploads/experts/experts1.png" alt="นางสาวประไพ วงศ์สินคงมั่น">
                                            </div>
                                            <div class=" image-cover">
                                                <img src="<?php echo $core_template; ?>/img/uploads/structure/user-back.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 card-bottom position-relative">

                                            <div>
                                                <div class="typo-md fw-bold text-primary">นางสาวประไพ วงศ์สินคงมั่น</div>
                                                <div class="font18">ตำแหน่งผู้ทรงคุณวุฒิด้านวิจัยและพัฒนา
                                                    วิทยาศาสตร์การแพทย์ (เคมี)
                                                    (นักวิทยาศาสตร์การแพทย์ทรงคุณวุฒิ)
                                                    หัวหน้าสำนักวิชการวิทยาศาสตร์การแพทย์</div>
                                            </div>
                                            <div class="typo-xs">


                                                <div class="row">
                                                    <div class="col-3 text-nowrap">ติดต่อ :</div>
                                                    <div class="col-9">0 2951 0000 ต่อ 99359</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="item col-xl-6 no-gutters ">
                                    <div class="item-wrapper row no-gutters">

                                        <div class="position-absolute opacity text-back"><img src="<?php echo $core_template; ?>/img/uploads/structure/background-2.png" alt=""></div>

                                        <div class="position-relative card-top col-sm-5">
                                            <div class="image-cover position-absolute">
                                                <img src="<?php echo $core_template; ?>/img/uploads/experts/experts2.png" alt="นายอภิวัฏ ธวัชสิน">
                                            </div>
                                            <div class=" image-cover">
                                                <img src="<?php echo $core_template; ?>/img/uploads/structure/user-back.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 card-bottom position-relative">

                                            <div>
                                                <div class="typo-md fw-bold text-primary">นายอภิวัฏ ธวัชสิน</div>
                                                <div class="font18">ตำแหน่งผู้ทรงคุณวุฒิด้านวิจัยและพัฒนา
                                                    วิทยาศาสตร์การแพทย์ (วิทยาศาสตร์กายภาพ)
                                                    (นักวิทยาศาสตร์การแพทย์ทรงคุณวุฒิ)</div>
                                            </div>
                                            <div class="typo-xs">


                                                <div class="row">
                                                    <div class="col-3 text-nowrap">ติดต่อ :</div>
                                                    <div class="col-9">0 2951 0000 ต่อ 98306</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="item col-xl-6 no-gutters ">
                                    <div class="item-wrapper row no-gutters">

                                        <div class="position-absolute opacity text-back"><img src="<?php echo $core_template; ?>/img/uploads/structure/background-2.png" alt=""></div>

                                        <div class="position-relative card-top col-sm-5">
                                            <div class="image-cover position-absolute">
                                                <img src="<?php echo $core_template; ?>/img/uploads/experts/experts3.png" alt="นางสิริภากร แสงกิจพร">
                                            </div>
                                            <div class=" image-cover">
                                                <img src="<?php echo $core_template; ?>/img/uploads/structure/user-back.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 card-bottom position-relative">

                                            <div>
                                                <div class="typo-md fw-bold text-primary">นางสิริภากร แสงกิจพร</div>
                                                <div class="font18">ตำแหน่งผู้ทรงคุณวุฒิด้านวิจัยและพัฒนา
                                                    วิทยาศาสตร์การแพทย์ (ชีววิทยา)
                                                    (นักวิทยาศาสตร์การแพทย์ทรงคุณวุฒิ)</div>
                                            </div>
                                            <div class="typo-xs">
                                                <div class="row">
                                                    <div class="col-3 text-nowrap">ติดต่อ :</div>
                                                    <div class="col-9">0 2951 0000 ต่อ 99121</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="item col-xl-6 no-gutters ">
                                    <div class="item-wrapper row no-gutters">

                                        <div class="position-absolute opacity text-back"><img src="<?php echo $core_template; ?>/img/uploads/structure/background-2.png" alt=""></div>

                                        <div class="position-relative card-top col-sm-5">
                                            <div class="position-absolute image-cover ">
                                                <img src="<?php echo $core_template; ?>/img/uploads/experts/experts-back.png" alt="">
                                            </div>


                                            <div class=" image-cover">
                                                <img src="<?php echo $core_template; ?>/img/uploads/structure/user-back.png" alt="">
                                            </div>

                                        </div>
                                        <div class="col-sm-7 card-bottom position-relative">

                                            <div>
                                                <div class="typo-md fw-bold text-primary">รอการแต่งตั้ง</div>
                                                <div class="font18">ตำแหน่งผู้ทรงคุณวุฒิด้านวิจัยและพัฒนา
                                                    วิทยาศาสตร์การแพทย์ (จุลชีววิทยา)
                                                    (นักวิทยาศาสตร์การแพทย์ทรงคุณวุฒิ)</div>
                                            </div>
                                            <div class="typo-xs">


                                                <div class="row">
                                                    <div class="col-3 text-nowrap">ติดต่อ :</div>
                                                    <div class="col-9">0 2951 0000 ต่อ 99364</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="item col-xl-6 no-gutters ">
                                    <div class="item-wrapper row no-gutters">

                                        <div class="position-absolute opacity text-back"><img src="<?php echo $core_template; ?>/img/uploads/structure/background-2.png" alt=""></div>

                                        <div class="position-relative card-top col-sm-5">
                                            <div class="image-cover position-absolute">
                                                <img src="<?php echo $core_template; ?>/img/uploads/experts/experts4.png" alt="นางนวลจันทร์ วิจักษณ์จินดา">
                                            </div>
                                            <div class=" image-cover">
                                                <img src="<?php echo $core_template; ?>/img/uploads/structure/user-back.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 card-bottom position-relative">

                                            <div>
                                                <div class="typo-md fw-bold text-primary">นางนวลจันทร์ วิจักษณ์จินดา</div>
                                                <div class="font18">ตำแหน่งผู้ทรงคุณวุฒิด้านวิจัยและพัฒนา
                                                    วิทยาศาสตร์การแพทย์ (ภูมิคุ้มกันวิทยา)
                                                    (นักวิทยาศาสตร์การแพทย์ทรงคุณวุฒิ)</div>
                                            </div>
                                            <div class="typo-xs">


                                                <div class="row">
                                                    <div class="col-3 text-nowrap">ติดต่อ :</div>
                                                    <div class="col-9">0 2951 0000 ต่อ 99701</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="item col-xl-6 no-gutters ">
                                    <div class="item-wrapper row no-gutters">

                                        <div class="position-absolute opacity text-back"><img src="<?php echo $core_template; ?>/img/uploads/structure/background-2.png" alt=""></div>

                                        <div class="position-relative card-top col-sm-5">
                                            <div class="image-cover position-absolute">
                                                <img src="<?php echo $core_template; ?>/img/uploads/experts/experts5.png" alt="นางสุภาพร ภูมิอมร">
                                            </div>
                                            <div class=" image-cover">
                                                <img src="<?php echo $core_template; ?>/img/uploads/structure/user-back.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 card-bottom position-relative">

                                            <div>
                                                <div class="typo-md fw-bold text-primary">นางสุภาพร ภูมิอมร</div>
                                                <div class="font18">ตำแหน่งผู้ทรงคุณวุฒิด้านวิจัยและพัฒนา
                                                    วิทยาศาสตร์การแพทย์ (เทคโนโลยีชีวภาพ)
                                                    (นักวิทยาศาสตร์การแพทย์ทรงคุณวุฒิ)</div>
                                            </div>
                                            <div class="typo-xs">


                                                <div class="row">
                                                    <div class="col-3 text-nowrap">ติดต่อ :</div>
                                                    <div class="col-9">0 2951 0000 ต่อ 99368</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="item col-xl-6 no-gutters ">
                                    <div class="item-wrapper row no-gutters">

                                        <div class="position-absolute opacity text-back"><img src="<?php echo $core_template; ?>/img/uploads/structure/background-2.png" alt=""></div>

                                        <div class="position-relative card-top col-sm-5">
                                            <div class="position-absolute image-cover ">
                                                <img src="<?php echo $core_template; ?>/img/uploads/experts/experts-back.png" alt="">
                                            </div>


                                            <div class=" image-cover">
                                                <img src="<?php echo $core_template; ?>/img/uploads/structure/user-back.png" alt="">
                                            </div>

                                        </div>
                                        <div class="col-sm-7 card-bottom position-relative">

                                            <div>
                                                <div class="typo-md fw-bold text-primary">รอการแต่งตั้ง</div>
                                                <div class="font18">ตำแหน่งผู้ทรงคุณวุฒิด้านวิจัยและพัฒนา
                                                    วิทยาศาสตร์การแพทย์ (มาตรฐานห้องปฏิบัติการ)
                                                    (นักวิทยาศาสตร์การแพทย์ทรงคุณวุฒิ)</div>
                                            </div>
                                            <div class="typo-xs">


                                                <div class="row">
                                                    <div class="col-3 text-nowrap">ติดต่อ :</div>
                                                    <div class="col-9">0 2951 0000 ต่อ 99011</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="item col-xl-6 no-gutters ">
                                    <div class="item-wrapper row no-gutters">

                                        <div class="position-absolute opacity text-back"><img src="<?php echo $core_template; ?>/img/uploads/structure/background-2.png" alt=""></div>

                                        <div class="position-relative card-top col-sm-5">
                                            <div class="position-absolute image-cover ">
                                                <img src="<?php echo $core_template; ?>/img/uploads/experts/experts-back.png" alt="">
                                            </div>


                                            <div class=" image-cover">
                                                <img src="<?php echo $core_template; ?>/img/uploads/structure/user-back.png" alt="">
                                            </div>

                                        </div>
                                        <div class="col-sm-7 card-bottom position-relative">
                                            <div>
                                                <div class="typo-md fw-bold text-primary">รอการแต่งตั้ง</div>
                                                <div class="font18">ตำแหน่งผู้ทรงคุณวุฒิด้านวิจัยและพัฒนา
                                                    วิทยาศาสตร์การแพทย์ (พิษวิทยา)
                                                    (นักวิทยาศาสตร์การแพทย์ทรงคุณวุฒิ)</div>
                                            </div>
                                            <div class="typo-xs">
                                                <div class="row">
                                                    <div class="col-3 text-nowrap">ติดต่อ :</div>
                                                    <div class="col-9">0 2951 0000 ต่อ 99012</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>









                            </div>


                        </div>
                    </div>
                </div>
                <!-- ck editor -->
            </div>
        </section>

        <?php include('inc/footer.php'); ?>
    </div>

    <?php include('inc/loadscript.php'); ?>

    <script>

    </script>
</body>

</html>