
// load calendar
$(document).ready(async function () {
    let date_calendar = $('input[name="date"]').val();
    await load_calendar(date_calendar);
});

const month = {
    th:['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
    en:['January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'],
}

// add event listener
$('.-click-datenow').on('click', async function(){
    // Get the current date
    var current = moment().utc();
    // converse to datetime
    let formattedDate = current.format('YYYY-MM-DD');
    // substr last 3 digit
    let result = moment(formattedDate , 'YYYY-MM-DD').utc().toDate().getTime().toString().slice(0,-3);
    // set current
    $('input[name="date"]').val(result);

    // reset year and month
    let reset = moment(formattedDate , 'YYYY-MM-DD').utc().toDate();
    let year = reset.getFullYear();
    let month = reset.getMonth()+1;
    if (language == 'th') {
        year = year + 543;
    }
    // trigger event from mon & year
    $(".-change-month").val(month).change();
    $(".-change-year").val(year).change();
});

$('.-click-prevmonth').on('click', async function(){
    // get current
    let date_calendar = $('input[name="date"]').val();
    // converse to datetime
    var current = moment.unix(date_calendar).utc();
    // prev month
    current.subtract(1, 'month');
    // converse to datetime
    let formattedDate = current.format('YYYY-MM-DD');
    // substr last 3 digit
    let result = moment(formattedDate , 'YYYY-MM-DD').utc().toDate().getTime().toString().slice(0,-3);
    // set current
    $('input[name="date"]').val(result);
    await load_calendar(result);
});

$('.-click-nextmonth').on('click', async function(){
    // get current
    let date_calendar = $('input[name="date"]').val();
    // converse to datetime
    var current = moment.unix(date_calendar).utc();
    // prev month
    current.add(1, 'month');
    // converse to datetime
    let formattedDate = current.format('YYYY-MM-DD');
    // substr last 3 digit
    let result = moment(formattedDate , 'YYYY-MM-DD').utc().toDate().getTime().toString().slice(0,-3);
    // set current
    $('input[name="date"]').val(result);
    await load_calendar(result);
});

$('.-change-month').on('change', async function(){
    let this_month = ($(this).find(':selected').val()-1);
    // get current
    let date_calendar = $('input[name="date"]').val();
    // converse to datetime
    var current = moment.unix(date_calendar).utc();
    let formattedDate = current.format('YYYY-MM-DD');
    let converse = moment(formattedDate , 'YYYY-MM-DD').utc().toDate();
    // jump month
    converse.setMonth(this_month);
    // substr last 3 digit
    let result = converse.getTime().toString().slice(0,-3);
    // set current
    $('input[name="date"]').val(result);
    await load_calendar(result);
});

$('.-change-year').on('change', async function(){
    let this_year = ($(this).find(':selected').val());
    if (language == 'th') {
        this_year = this_year - 543;
    }
    // get current
    let date_calendar = $('input[name="date"]').val();
    // converse to datetime
    var current = moment.unix(date_calendar).utc();
    let formattedDate = current.format('YYYY-MM-DD');
    let converse = moment(formattedDate , 'YYYY-MM-DD').utc().toDate();
    // jump year
    converse.setFullYear(this_year);
    // substr last 3 digit
    let result = converse.getTime().toString().slice(0,-3);
    // set current
    $('input[name="date"]').val(result);
    await load_calendar(result);
});

$('.-change-group').on('change', async function(){
    // get current
    let date_calendar = $('input[name="date"]').val();
    await load_calendar(date_calendar);
});

async function load_calendar(date_calendar){
    let group_id = $('.-change-group :selected').val();
    // body calendar
    const settings = {
        "url": `${path}${language}/calendar/load-calendar`,
        "method": "POST",
        "timeout": 0,
        "data": {
            "date": date_calendar,
            "gid": group_id,
        },
    };
    const result = await $.ajax(settings);
    $('.-append-calendar').empty();
    $('.-append-calendar').append(result);

    // list item
    const settings_list = {
        "url": `${path}${language}/calendar/load-list`,
        "method": "POST",
        "timeout": 0,
        "data": {
            "date": date_calendar,
            "gid": group_id,
            "keyword": searchtxt,
        },
    };
    const result_list = await $.ajax(settings_list);
    $('.-append-list').empty();
    $('.-append-list').append(result_list);

    // change month
    var current = moment.unix(date_calendar).utc().toDate();
    $('.-append-month').text(month[language][current.getMonth()]);
    if (language == 'th') {
        $('.-append-year').text(current.getFullYear()+543);
    }else{
        $('.-append-year').text(current.getFullYear());
    }

    // reload event
    await reload_event();
}

async function reload_event(){
    $('.close-event').click(function () {
        $(this).closest('.event-drop-show').addClass('visually-hidden');
    })
    
    $('.event-more .-more').click(function () {
        $(this).closest('.action').find('.event-drop-show').removeClass('visually-hidden');
    })
    
    $('.event-group .event-item').each(function () {
        strHTML = `
        <span class="tooltip" style="display:none;">${$(this).attr('title')}</span>
      `;
        $(this).append(strHTML);
    });
}