<section class="layout-body">
    <div class="default-header">
        <div class="wrapper">
            <div class="container">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{$ul}/home" class="link">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.856" height="15.857"
                                        viewBox="0 0 15.856 15.857">
                                        <path id="home-3"
                                            d="M15.43,6.9h0L8.96.428A1.459,1.459,0,0,0,6.9.428L.43,6.893.424,6.9A1.459,1.459,0,0,0,1.4,9.386l.045,0H1.7v4.76a1.71,1.71,0,0,0,1.709,1.708H5.937a.465.465,0,0,0,.465-.465V11.661a.78.78,0,0,1,.779-.779H8.674a.78.78,0,0,1,.779.779v3.732a.465.465,0,0,0,.465.465h2.531a1.71,1.71,0,0,0,1.709-1.708V9.389H14.4A1.46,1.46,0,0,0,15.43,6.9Zm0,0"
                                            transform="translate(0)" fill="#fff" />
                                    </svg>
                                </span>
                                {$languageFrontWeb->homepage->display->$currentLangWeb}
                            </a>
                        </li>
                        <li>
                            <a href="{$ul}/{$menuActive}" class="link">
                                {$language_modules.breadcrumb2}
                            </a>
                        </li>
                    </ol>
                </div>
                <h1 class="title">
                    {$language_modules.breadcrumb2}
                </h1>
                <div class="graphic">
                    <div class="obj">
                        <img src="{$template}/assets/img/uploads/obj-banner-about.png" alt="obj-banner-about"
                            class="lazy img-cover">
                    </div>
                </div>
            </div>
        </div>
        <figure class="cover">
            <img src="{$template}/assets/img/static/banner.jpg" alt="" class="lazy img-cover">
        </figure>
    </div>
    <div class="default-body">
        <div class="event-calendar">
            <div class="container">
                <div class="calendar-card">
                    <div class="header">
                        <form class="form-default">
                            <input type="hidden" name="date" value="{$req.date}">
                            <div class="top">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="row gutters-20 align-items-center">
                                            <div class="col-auto">
                                                <div class="typo-md fw-bold text-light">กลุ่ม</div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group form-select form-group-calendar -group">
                                                    <label class="control-label visually-hidden"
                                                        for="group">กลุ่ม</label>
                                                    <div class="select-wrapper">
                                                        <select class="select-calendar" name="group" id="group"
                                                            style="width: 100%;">
                                                            <option value="0">เลือกทั้งหมด</option>
                                                            {foreach $load_group->item as $keyload_group => $valueload_group}
                                                                <option value="">{$valueload_group->subject}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="row gutters-20">
                                            <div class="col">
                                                <div class="form-group form-select form-group-calendar -year">
                                                    <label class="control-label" for="year">ปี :</label>
                                                    <div class="select-wrapper">
                                                        <select class="select-calendar" name="year" id="year"
                                                            style="width: 100%;">
                                                            {for $index = $yearNow; $index >= $yearNow - 5; $index--}
                                                                <option value="{$index}" {if $YearCurrent eq $index}selected{/if} data-lang="{$langon}">{$index}</option>
                                                            {/for}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group form-select form-group-calendar -month">
                                                    <label class="control-label" for="month">เดือน :</label>
                                                    <div class="select-wrapper">
                                                        <select class="select-calendar -change-month" name="month" id="month"
                                                            style="width: 100%;">
                                                            {foreach $strMonthCut as $keystrMonthCut => $valuestrMonthCut}
                                                                {if $keystrMonthCut gte 1}
                                                                    <option value="{$keystrMonthCut}" {if $keystrMonthCut eq $myCalendarDateMonth}selected{/if}>{$valuestrMonthCut}</option>
                                                                {/if}
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="middle">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="month-topic">
                                            <span class="-append-month">{$MonthCurrent}</span> <span class="-append-year">{$YearCurrent}</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="row gutters-20">
                                            <div class="col">
                                                <div class="select">
                                                    <a href="javascript:void(0);" class="link active -click-datenow">
                                                        วันนี้
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="calendar-nav">
                                                    <a href="javascript:void(0);" class="link -click-prevmonth">
                                                        <span class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13.503"
                                                                height="23.616" viewBox="0 0 13.503 23.616">
                                                                <path id="Icon_ionic-ios-arrow-forward"
                                                                    data-name="Icon ionic-ios-arrow-forward"
                                                                    d="M15.317,18l8.937-8.93a1.681,1.681,0,0,0,0-2.384,1.7,1.7,0,0,0-2.391,0L11.738,16.8a1.685,1.685,0,0,0-.049,2.327L21.856,29.32a1.688,1.688,0,0,0,2.391-2.384Z"
                                                                    transform="translate(-11.246 -6.196)"
                                                                    fill="#e6e6e6" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <a href="javascript:void(0);" class="link -click-nextmonth">
                                                        <span class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13.503"
                                                                height="23.616" viewBox="0 0 13.503 23.616">
                                                                <path id="Icon_ionic-ios-arrow-forward"
                                                                    data-name="Icon ionic-ios-arrow-forward"
                                                                    d="M20.679,18,11.742,9.07a1.681,1.681,0,0,1,0-2.384,1.7,1.7,0,0,1,2.391,0L24.258,16.8a1.685,1.685,0,0,1,.049,2.327L14.14,29.32a1.688,1.688,0,0,1-2.391-2.384Z"
                                                                    transform="translate(-11.246 -6.196)"
                                                                    fill="#e6e6e6" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="body -append-calendar">
                        <!-- append -->
                    </div>
                </div>
                <div class="calendar-note">
                    <div class="whead">
                        <h2 class="title">หมายเหตุ</h2>
                    </div>
                    <ul class="item-list">
                        <li>
                            <div class="note">
                                <div class="box bg-current"></div>
                                <div class="txt">วันที่ปัจจุบัน</div>
                            </div>
                        </li>
                        <li>
                            <div class="note">
                                <div class="box bg-all"></div>
                                <div class="txt">ทั้งหมด</div>
                            </div>
                        </li>
                        {foreach $load_group->item as $keyload_group => $valueload_group}
                            <li>
                                <div class="note">
                                    <div class="box bg-event" style="background-color:{$valueload_group->color}"></div>
                                    <div class="txt">{$valueload_group->subject}</div>
                                </div>
                            </li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>

        <div class="event-list -append-list">
            <!-- append -->
        </div>
    </div>
</section>