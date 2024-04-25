(() => {
    load_recaptch();
})();

$('#form-contact').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        $('#form-contact').validator('validate');
    } else {
        e.preventDefault();
        console.log('in come');

        $("#submit-form").attr("disabled", true);
        var formData = new FormData($("#form-contact")[0]);
        $.ajax({
            url: `${path}${language}/contact-form/insert-global`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res, textStatus, jqXHR) {
                if (res?.code == 1001) {
                    alert('insert success');
                }else{
                    alert('insert fail');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }
    return false;
});

function load_recaptch() {
    grecaptcha.ready(function() {
    // do request for recaptcha token
    // response is promise with passed token
        grecaptcha.execute($('#g-recaptcha-response').data('secret'), {action:'validate_captcha'})
                .then(function(token) {
            // add token value to form
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
}