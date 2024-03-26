// services filter
$('.services-filter').on('click', async function(){
    let gid = $(this).data('id');

    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    }else{
        $(this).addClass('active');
    }
    let array_gid = new Array;
    $('.services-filter.active').map((key,value) => {
        array_gid.push($(value).data('id'));
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
        const result = await $.ajax(settings);

        if (result?.code === 1001 && result?._numOfRows > 0) {
            let strHTML = ``;
            result?.item?.list.map((value) => {
                let url = (value.url != '#' && value.url != "") ? value.url : "javascript:void(0);";
                let target = (value.url != '#' && value.url != "") ? value.target : "_self";
                strHTML += `
                <div class="swiper-slide">
                    <div class="item">
                        <a href="${url}" class="link" target="${target}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="thumbnail">
                                        <figure class="contain">
                                            <img src="${value.pic.pictures}"
                                                alt="${value.pic.subject}" class="thumb-img lazy">
                                            <img src="${value.pic.pictures}"
                                                alt="${value.pic.subject}" class="thumb-hover lazy">
                                        </figure>
                                    </div>
                                    <h5 class="title">${value.subject}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                `
            });
            $('#service-append').empty();
            $('#service-append').append(strHTML);
        }else{
            $('#service-append').empty();
        }
        reload_swiper();
    }
});
