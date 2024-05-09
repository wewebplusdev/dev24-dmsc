const validate_step = (action) => {
    let data_array = new Array();
    let status = true;

    switch (action) {
        default:
            data_array.push($('#inputTopic').val());
            data_array.push($('#inputDesc').val());
            data_array.push($('#inputName').val());
            data_array.push($('#inputAddress').val());
            data_array.push($('#inputTel').val());
            data_array.push($('#inputEmail').val());

            data_array.map((v) => {
                if (!v.trim()) {
                    status = false;
                }
            });

            if (!status) {
                $('#form-contact').validator('validate');
            } else {
                changeTxt('step2');
                $('.-form-step1').hide();
                $('.-form-step2').show();
                $('.current-progress.progress-step2').addClass('active');
                $('#form-contact').validator('validate');
            }
            break;
    }
    return status;
}


(() => {
    load_recaptch();
})();

const reload_form = () => {
    load_recaptch();
    $('#form-contact')[0].reset();
    $('.-form-step1').show();
    $('.-form-step2').hide();
    $('.-form-step3').hide();

    $('.current-progress').removeClass('active');
    $('.progress-step1').addClass('active');
    changeTxt('step1');
}

const changeTxt = (step) => {
    let txt_step = $('.info-form').data('step');
    let txt_step1 = $('.info-form').data('step1');
    let txt_step2 = $('.info-form').data('step2');
    let txt_step3 = $('.info-form').data('step3');

    switch (step) {
        case 'step3':
            $('.title.title-form').text(`${txt_step} : 3 ${txt_step3}`);
            break;
        case 'step2':
            $('.title.title-form').text(`${txt_step} : 2 ${txt_step2}`);
            break;
        default:
            $('.title.title-form').text(`${txt_step} : 1 ${txt_step1}`);
            break;
    }
}

$('#form-contact').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        $('#form-contact').validator('validate');
    } else {
        e.preventDefault();

        $("#submit-form").attr("disabled", true);
        let formData = new FormData($("#form-contact")[0]);
        $.ajax({
            url: `${path}${language}/contact-form/insert-corruption`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res, textStatus, jqXHR) {
                if (res?.code == 1001) {
                    $('#form-contact')[0].reset();
                    changeTxt('step3');
                    $('.current-progress.progress-step3').addClass('active');
                    $('.-form-step1').hide();
                    $('.-form-step2').hide();
                    $('.-form-step3').show();
                } else {
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
                            let timerInterval = setInterval(() => {
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        timer: 3000,
                    });
                    load_recaptch();
                    $('#form-contact')[0].reset();
                    changeTxt('step1');
                    $('.current-progress').removeClass('active');
                    $('.progress-step1').addClass('active');
                    $('.-form-step1').show();
                    $('.-form-step2').hide();
                    $('.-form-step3').hide();
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
