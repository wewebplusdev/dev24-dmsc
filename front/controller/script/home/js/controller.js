// services filter
$('.services-filter').on('click', async function(){

    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $(this).addClass('active');
    }

    let array_gid = [];
    $('.services-filter.active').each(function() {
        array_gid.push($(this).data('id'));
    });

    if (array_gid.length > 0 || true) {
        const settings = {
            "url": `${path}${language}/reverse_proxy`,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": `application/json`,
            },
            "data": JSON.stringify({
                "controller": 'home',
                "method": 'getService',
                "gid": array_gid,
                "order": 'DESC',
                "page": 1,
                "limit": 15,
            }),
        };

        try {
            const result = await $.ajax(settings);

            if (result?.code === 1001 && result?._numOfRows > 0) {
                let strHTML = ``;
                result?.item?.list.forEach((value) => {
                    let url = (value.url && value.url !== '#' && value.url !== "") ? value.url : "javascript:void(0);";
                    let target = (value.url && value.url !== '#' && value.url !== "") ? value.target : "_self";
                    strHTML += `
                    <div class="swiper-slide">
                        <div class="item">
                            <a href="${url}" class="link" target="${target}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="thumbnail">
                                            <figure class="contain">
                                                <img src="${value.pic?.pictures || ''}"
                                                    alt="${value.pic?.subject || ''}" class="thumb-img lazy">
                                                <img src="${value.pic2?.pictures || ''}"
                                                    alt="${value.pic2?.subject || ''}" class="thumb-hover lazy">
                                            </figure>
                                        </div>
                                        <h5 class="title">${value.subject || ''}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    `;
                });
                $('#service-append').empty();
                $('#service-append').append(strHTML);
            } else {
                $('#service-append').empty();
            }
            reload_swiper();
        } catch (error) {
            console.error("Error occurred:", error);
        }
    }


    let value = eval('obj.' + propName); 

    let func = Function('obj' + propName);

    location.href = 'javascript:void(0)'; 
});
