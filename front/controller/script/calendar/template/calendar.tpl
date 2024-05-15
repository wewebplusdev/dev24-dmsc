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
                                {assign var="news_urlShow" value="{$ul}/pageredirect/{$myCalendarEventList[$mCount][$firstKey]['tb']|pageRedirect:$myCalendarEventList[$mCount][$firstKey]['masterkey']:$myCalendarEventList[$mCount][$firstKey]['id']:$myCalendarEventList[$mCount][$firstKey]['language']}"}
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
                                                        {assign var="news_url" value="{$ul}/pageredirect/{$valueList['tb']|pageRedirect:$valueList['masterkey']:$valueList['id']:$valueList['language']}"}
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
                            {assign var="news_urlShow" value="{$ul}/pageredirect/{$myCalendarEventList[$mCount][$firstKey]['tb']|pageRedirect:$myCalendarEventList[$mCount][$firstKey]['masterkey']:$myCalendarEventList[$mCount][$firstKey]['id']:$myCalendarEventList[$mCount][$firstKey]['language']}"}
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
                                                    {assign var="news_url" value="{$ul}/pageredirect/{$valueList['tb']|pageRedirect:$valueList['masterkey']:$valueList['id']:$valueList['language']}"}
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