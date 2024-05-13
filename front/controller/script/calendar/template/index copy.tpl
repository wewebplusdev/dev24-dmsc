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
                        <form action="" class="form-default">
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
                                                        <select class="select-calendar" name="month" id="month"
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
                                            <span>{$MonthCurrent}</span> <span>{$YearCurrent}</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="row gutters-20">
                                            <div class="col">
                                                <div class="select">
                                                    <a href="{$ul}/{$menuActive}?date={$dateNow}" class="link active">
                                                        วันนี้
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="calendar-nav">
                                                    <a href="{$ul}/{$menuActive}?date={$PrevMonth}" class="link">
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
                                                    <a href="{$ul}/{$menuActive}?date={$NextMonth}" class="link">
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
                    <div class="body">
                        <!-- append -->
                        <table>
                            <tr>
                                <th>อาทิตย์</th>
                                <th>จันทร์</th>
                                <th>อังคาร</th>
                                <th>พุธ</th>
                                <th>พฤหัสบดี</th>
                                <th>ศุกร์</th>
                                <th>เสาร์</th>
                            </tr>
                            {if $startWeekDay > 0}
                                <tr>
                                    {assign var=numverOfdate value="1"}
                                    {for $index=1 to $startWeekDay}
                                        <td>
                                            <div class="box">&nbsp;</div>
                                        </td>
                                    {/for}
                                    {assign var=forloop value="{$index}"}
                                    {for $calendar=$index to 7}
                                        {assign var=check_d value="{$myCalendarDateArr[0]}-{$myCalendarDateArr[1]}-{$mCount|formatNum}"}
                                        {if $Checktoday==$check_d}
                                            {assign var=strOption value="tody"}
                                        {else}
                                            {assign var=strOption value=""}
                                        {/if}
                                        <td>
                                            <div class="box {$strOption}" onclick="">
                                                <div class="num">{$mCount}</div>
                                                {if $myCalendarEventList[$mCount]|gettype eq 'array' && $myCalendarEventList[$mCount]|count > 0}
                                                    {$keys = array_keys($myCalendarEventList[$mCount])}
                                                    {$firstKey = $keys[0]}
                                                    
                                                    {assign var="checkUrlShow" value="{$myCalendarEventList[$mCount][$firstKey]['url']|checkUrl}"}
                                                    {assign var="targetShow" value="_self"}
                                                    {if $checkUrlShow}
                                                        {assign var="news_urlShow" value="{$ul}/pageredirect/{$myCalendarEventList[$mCount][$firstKey]['tb']|page_redirect:$myCalendarEventList[$mCount][$firstKey]['masterkey']:$myCalendarEventList[$mCount][$firstKey]['id']:$myCalendarEventList[$mCount][$firstKey]['language']}"}
                                                        {$target = $myCalendarEventList[$mCount][$firstKey]['target']}
                                                    {else}
                                                        {assign var="news_urlShow" value="javascript:void(0);"}
                                                    {/if}
                                                    <div class="event-group">
                                                        <a href="{$news_urlShow}" target="{$targetShow}" class="link event-item" style="background-color:{$myCalendarEventList[$mCount][$firstKey]['color']}" title="{$myCalendarEventList[$mCount][$firstKey]['subject']}">
                                                            <small>{$myCalendarEventList[$mCount][$firstKey]['subject']}</small>
                                                        </a>
                                                        {if $myCalendarEventList[$mCount]|gettype eq 'array' && $myCalendarEventList[$mCount]|count > 1}
                                                            <div class="action">
                                                                <div class="link event-more">
                                                                    <div class="-more">
                                                                        + <span>{$myCalendarEventList[$mCount]|count - 1}</span> เพิ่มเติม
                                                                    </div>
                                                                    <div class="event-drop-show visually-hidden">
                                                                        <div class="date-current">
                                                                            <div class="today">
                                                                                <small>{$weekDay[date('w', strtotime($check_d))]}.</small>
                                                                                <div class="day">{$mCount}</div>
                                                                            </div>
                                                                            <span class="material-symbols-rounded close-event">cancel</span>
                                                                        </div>
                                                                        {foreach $myCalendarEventList[$mCount] as $keyList => $valueList}
                                                                            {assign var="checkUrl" value="{$valueList['url']|checkUrl}"}
                                                                            {assign var="target" value="_self"}
                                                                            {if $checkUrl}
                                                                                {assign var="news_url" value="{$ul}/pageredirect/{$valueList['tb']|page_redirect:$valueList['masterkey']:$valueList['id']:$valueList['language']}"}
                                                                                {$target = $valueList['target']}
                                                                            {else}
                                                                                {assign var="news_url" value="javascript:void(0);"}
                                                                            {/if}
                                                                            <a href="{$news_url}" target="{$target}" class="link event-item" style="background-color:{$valueList['color']}" title="{$valueList['subject']}">
                                                                                <small>{$valueList['subject']}</small>
                                                                            </a>
                                                                        {/foreach}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {/if}
                                                    </div>
                                                {/if}
                                            </div>
                                        </td>
                                        {$mCount = $mCount+1}
                                    {/for}
                                </tr>
                                {$mCount2 = $mCount}
                                {$countData = $numverOfdate}
                            {/if}

                            {assign var=colcount value="0"}
                            {for $mCount = $mCount2 to $endDayOfMonth}
                                {assign var=check_d value="{$myCalendarDateArr[0]}-{$myCalendarDateArr[1]}-{$mCount|formatNum}"}
                                {if $colcount == 0}
                                <tr>
                                {/if}
                                    {$colcount = $colcount + 1}
                                    {if $Checktoday==$check_d}
                                        {assign var=strOption value="tody"}
                                    {else}
                                        {assign var=strOption value=""}
                                    {/if}
                                    <td>
                                        <div class="box {$strOption}" onclick="">
                                            <div class="num">{$mCount}</div>
                                            {if $myCalendarEventList[$mCount]|gettype eq 'array' && $myCalendarEventList[$mCount]|count > 0}
                                                {$keys = array_keys($myCalendarEventList[$mCount])}
                                                {$firstKey = $keys[0]}

                                                {assign var="checkUrlShow" value="{$myCalendarEventList[$mCount][$firstKey]['url']|checkUrl}"}
                                                {assign var="targetShow" value="_self"}
                                                {if $checkUrlShow}
                                                    {assign var="news_urlShow" value="{$ul}/pageredirect/{$myCalendarEventList[$mCount][$firstKey]['tb']|page_redirect:$myCalendarEventList[$mCount][$firstKey]['masterkey']:$myCalendarEventList[$mCount][$firstKey]['id']:$myCalendarEventList[$mCount][$firstKey]['language']}"}
                                                    {$target = $myCalendarEventList[$mCount][$firstKey]['target']}
                                                {else}
                                                    {assign var="news_urlShow" value="javascript:void(0);"}
                                                {/if}
                                                <div class="event-group">
                                                    <a href="{$news_urlShow}" target="{$targetShow}" class="link event-item" style="background-color:{$myCalendarEventList[$mCount][$firstKey]['color']}" title="{$myCalendarEventList[$mCount][$firstKey]['subject']}">
                                                        <small>{$myCalendarEventList[$mCount][$firstKey]['subject']}</small>
                                                    </a>
                                                    {if $myCalendarEventList[$mCount]|gettype eq 'array' && $myCalendarEventList[$mCount]|count > 1}
                                                        <div class="action">
                                                            <div class="link event-more">
                                                                <div class="-more">
                                                                    + <span>{$myCalendarEventList[$mCount]|count - 1}</span> เพิ่มเติม
                                                                </div>
                                                                <div class="event-drop-show visually-hidden">
                                                                    <div class="date-current">
                                                                        <div class="today">
                                                                            <small>{$weekDay[date('w', strtotime($check_d))]}.</small>
                                                                            <div class="day">{$mCount}</div>
                                                                        </div>
                                                                        <span class="material-symbols-rounded close-event">cancel</span>
                                                                    </div>
                                                                    {foreach $myCalendarEventList[$mCount] as $keyList => $valueList}
                                                                        {assign var="checkUrl" value="{$valueList['url']|checkUrl}"}
                                                                        {assign var="target" value="_self"}
                                                                        {if $checkUrl}
                                                                            {assign var="news_url" value="{$ul}/pageredirect/{$valueList['tb']|page_redirect:$valueList['masterkey']:$valueList['id']:$valueList['language']}"}
                                                                            {$target = $valueList['target']}
                                                                        {else}
                                                                            {assign var="news_url" value="javascript:void(0);"}
                                                                        {/if}
                                                                        <a href="{$news_url}" target="{$target}" class="link event-item" style="background-color:{$valueList['color']}" title="{$valueList['subject']}">
                                                                            <small>{$valueList['subject']}</small>
                                                                        </a>
                                                                    {/foreach}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    {/if}
                                                </div>
                                            {/if}
                                        </div>
                                    </td>
                                    {if $colcount > 0 && $mCount eq $endDayOfMonth}
                                        {for $min=$colcount to 6}
                                            <td>
                                                <div class="box">&nbsp;</div>
                                            </td>
                                        {/for}
                                    {/if}
                                {if $colcount eq 7}
                                </tr>
                                {$colcount=0}
                                {/if}
                            {/for}
                        </table>
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

        {if $loadData->code eq 1001 && $loadData->_numOfRows gte 1}
            <div class="event-list">
                <div class="container">
                    <div class="title">รายการกิจกรรม</div>
                    {foreach $loadData->item as $keyload_data => $valueload_data}
                        {assign var="checkUrl" value="{$valueload_data->url|checkUrl}"}
                        {assign var="target" value="_self"}
                        {if $checkUrl}
                            {assign var="news_url" value="{$ul}/pageredirect/{$valueload_data->tb|page_redirect:$valueload_data->masterkey:$valueload_data->id:$valueload_data->language}"}
                            {$target = $valueload_data->target}
                        {else}
                            {assign var="news_url" value="javascript:void(0);"}
                        {/if}
                        <div class="item">
                            <a href="{$news_url}" target="{$target}" class="link">
                                <div class="row no-gutters align-items-end">
                                    <div class="col-auto mb-auto">
                                        <div class="dot" style="background-color:{$valueload_data->color}"></div>
                                    </div>
                                    <div class="col">
                                        <div class="date">{$valueload_data->date_display}</div>
                                        <div class="desc">{$valueload_data->subject}</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="read-more">
                                            อ่านต่อ
                                            <span class="material-symbols-rounded">expand_circle_right</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    {/foreach}
                </div>
            </div>
        {/if}
    </div>
</section>