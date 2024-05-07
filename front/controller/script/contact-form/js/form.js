(() => {
    load_recaptch();
})();

const reload_form = () => {
    $('#form-contact')[0].reset();
    $('.-form-contact').show();
    $('.-form-success').hide();
}

$('#form-contact').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        $('#form-contact').validator('validate');
    } else {
        e.preventDefault();

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
                    $('#form-contact')[0].reset();
                    $('.-form-contact').hide();
                    $('.-form-success').show();
                }else{
                    Swal.fire({
                        icon: res.icon,
                        title: res.title,
                        text: res.text,
                        timerProgressBar: true,
                        showConfirmButton: true,
                        showCancelButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    load_recaptch();
                    $('#form-contact')[0].reset();
                    $('.-form-contact').show();
                    $('.-form-success').hide();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }
    $("#submit-form").attr("disabled", false);
    return false;
});
