<header class="layout-header">
    <div class="top-bar">
        <div class="container">
            <div class="nav-lang" data-aos="fade-left">
                <div class="row justify-content-end align-items-center gutters-10">
                    <div class="col-auto">
                        <div class="nav-label">เลือกภาษา</div>
                    </div>
                    {foreach $languageWeb as $keyLangWeb => $valueLangWeb}
                        <div class="col-auto">
                            <a title="{$valueLangWeb->subject}" class="nav-lang-th{if $currentLangWeb eq $valueLangWeb->subject} active{/if}" target="_self" href="{$ul}/lang/{$valueLangWeb->short}">
                                <span class="visually-hidden">{$valueLangWeb->subject}</span>
                                <img src="{$template}/assets/img/icon/lang-{$valueLangWeb->short}.svg" alt="th" class="flag">
                            </a>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container align-items-lg-end">
            <a class="navbar-brand" href="index.php">
                <div class="brand-logo">
                    <img src="{$template}/assets/img/static/brand-header.png" alt="DMSC LOGO">
                </div>
                <div class="brand-txt">
                    <div class="title">
                        {$settingWeb.subject}
                    </div>
                    <div class="subtitle">
                        {$settingWeb.subjectoffice}
                    </div>
                </div>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
                <ul class="main-menu navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="หน้าหลัก">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void;" title="เกี่ยวกับหน่วยงาน"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เกี่ยวกับหน่วยงาน</a>
                            <div class="dropdown-menu full-dropdown-menu">
                                <div class="container-dropdown-menu">
                                    <div class="submenu-row">
                                        <div class="submenu-col"></div>
                                        <div class="submenu-col sub1menu">
                                            <div class=" mCustomScrollbar">
                                                <!-- sub1menu -->
                                                <ul class="nav-list fluid">
                                                    <li>
                                                        <a href="" class="link active">เกี่ยวกับเรา</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="link">โครงสร้างองค์กร</a>
                                                    </li>
                                                    <li class="has-submenu">
                                                        <a href="javascript:void(0)" class="link"
                                                            id="sub1menu-1">เว็บไซต์ส่วนกลาง & ส่วนภูมิภาค</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="link">เอกสารเผยแพร่</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="submenu-col sub2menu" data-submenu-parent="sub1menu-1">
                                            <div class="scroll-wrapper mCustomScrollbar">
                                                <!-- sub2menu -->
                                                <div class="back-menu">เว็บไซต์ส่วนกลาง & ส่วนภูมิภาค</div>
                                                <ul class="nav-list fluid">
                                                    <li class="has-submenu">
                                                        <a href="javascript:void(0)" class="link active"
                                                            id="sub2menu-1">ส่วนกลาง</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="link">ส่วนภูมิภาค</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="submenu-col sub3menu" data-submenu-parent="sub2menu-1">
                                            <div class="scroll-wrapper mCustomScrollbar">
                                                <!-- sub3menu -->
                                                <div class="back-menu">ส่วนกลาง</div>
                                                <ul class="nav-list fluid">
                                                    <li><a href="#" class="link">สำนักงานเลขานุการกรม</a></li>
                                                    <li><a href="https://www.youtube.com/" class="link"
                                                            target="_blank">กองแผนงานและวิชาการ</a></li>
                                                    <li><a href="#" class="link">ศูนย์เทคโนโลยีสารสนเทศ</a></li>
                                                    <li><a href="#" class="link">สำนักเครื่องสำอางและวัตถุอันตราย</a>
                                                    </li>
                                                    <li><a href="#" class="link">สถาบันวิจัยสมุนไพร</a></li>
                                                    <li><a href="#" class="link">สถาบันวิจัยวิทยาศาสตร์สาธารณสุข</a>
                                                    </li>
                                                    <li><a href="#" class="link">สำนักมาตรฐานห้องปฏิบัติการ</a></li>
                                                    <li><a href="#" class="link">กลุ่มพัฒนาระบบบริหาร</a></li>
                                                    <li><a href="#" class="link">สถาบันชีววัตถุ</a></li>
                                                    <li><a href="#" class="link">สำนักยาและวัตถุเสพติด</a></li>
                                                    <li><a href="#" class="link">สำนักคุณภาพและความปลอดภัยอาหาร</a></li>
                                                    <li><a href="#" class="link">กลุ่มงานจริยธรรม</a></li>
                                                    <li><a href="#" class="link">สถาบันชีววิทยาศาสตร์ทางการแพทย์</a>
                                                    </li>
                                                    <li><a href="#" class="link">สำนักวิชาการวิทยาศาสตร์การแพทย์</a>
                                                    </li>
                                                    <li><a href="#" class="link">สำนักรังสีและเครื่องมือแพทย์</a></li>
                                                    <li><a href="#" class="link">กลุ่มตรวจสอบภายใน</a></li>
                                                    <li><a href="#" class="link">กองทดสอบความชำนาญ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" title="ซีไอโอ"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ซีไอโอ</a>
                            <div class="dropdown-menu full-dropdown-menu">
                                <div class="container-dropdown-menu">
                                    <div class="submenu-row">
                                        <div class="submenu-col"></div>
                                        <div class="submenu-col sub1menu">
                                            <div class=" mCustomScrollbar">
                                                <!-- sub1menu -->
                                                <ul class="nav-list fluid">
                                                    <li>
                                                        <a href="" class="link">รายละเอียดเกี่ยวกับซีไอโอ</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="link">วิสัยทัศน์ และนโยบายต่างๆ </a>
                                                    </li>
                                                    <li class="has-submenu">
                                                        <a href="javascript:void(0)" class="link"
                                                            id="sub1menu-21">การบริหารงานด้าน ICT</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="submenu-col sub2menu" data-submenu-parent="sub1menu-21">
                                            <div class="scroll-wrapper mCustomScrollbar">
                                                <!-- sub2menu -->
                                                <div class="back-menu">ผู้บริหารเทคโนโลยีสารสนเทศระดับกอง</div>
                                                <ul class="nav-list fluid">
                                                    <li>
                                                        <a href=""
                                                            class="link">เจ้าหน้าที่ประสานงานคุ้มครองข้อมูลส่วนบุคคล</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="link">ส่วนภูมิภาค</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.php" title="ข่าว">ข่าว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="knowledge.php" title="คลังความรู้">คลังความรู้</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php" title="บริการ">บริการ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="information.php" title="ระบบสารสนเทศ">ระบบสารสนเทศ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bigdata.php" title="Big Data">Big Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" title="ติดต่อ">ติดต่อ</a>
                    </li>
                </ul>
                <div class="nav-search">
                    <form class="form-default form-search" role="search">
                        <div class="input-group">
                            <a href="javascript:void(0)" class="btn-link">
                                <span class="visually-hidden">Search</span>
                                <span data-feather="search"></span>
                            </a>
                            <input class="form-control" type="search" placeholder="ค้นหา" aria-label="Search">
                        </div>
                    </form>
                    <a href="javascript:void(0)" class="close-search">
                        <span data-feather="x"></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>