var path = $("base").attr("href");

$('.switch-alnguage').on('click', function(){
    let lang_short = $(this).data('short');
    let lang = $(this).data('lang');
    let current_lang = $('html').attr('lang');
   
    if (current_lang != lang_short) {
        $.removeCookie('web_language', { path: '/' }); // uniqid pdpa
        let date = new Date();
        let day = 7;
        let hour = 24;
        let minutes = 60;
        date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
        $.cookie('web_language', lang, {
            expires: date,
            path: '/'
        });
        location.href = `${path}${current_lang}/lang/${lang_short}`;
    }
});