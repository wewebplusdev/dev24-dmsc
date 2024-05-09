
// services filter
$('.services-filter').on('click', async function(){
    let action = $('.layout-body').data('action');
    let method = $('.layout-body').data('method');
    let page = $('.layout-body').data('page');
    let sort = $('.layout-body').data('sort');
    let limit = $('.layout-body').data('limit');
    let menu = $('.layout-body').data('menu');
    let masterkey = $('.layout-body').data('masterkey');

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
                "case": 'dynamic',
                "Controller": action,
                "method": method,
                "tid": array_gid,
                "order": sort,
                "page": page,
                "limit": limit,
            }),
        };
        const result = await $.ajax(settings);

        if (result?.code === 1001 && result?._numOfRows > 0) {
            let strHTML = ``;
            result?.item?.map((value) => {
                let url = (value.url != '#' && value.url != "") ? value.url : "#";
                let target = (value.url != '#' && value.url != "") ? value.target : "_self";
                strHTML += `
                <div class="item">
                    <a href="${url}" class="link" target="${target}">
                        <div class="card">
                            <div class="card-body">
                            <div class="thumbnail">
                                <figure class="contain">
                                <img src="${value.pic.pictures}" alt="${value.pic.pictures}"
                                    class="thumb-img lazy">
                                <img src="${value.pic2.pictures}" alt="${value.pic2.pictures}"
                                    class="thumb-hover lazy">
                                </figure>
                            </div>
                            <h4 class="title">${value.subject}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                `;
            });
            $('#service-append').empty();
            $('#service-append').append(strHTML);
        }else{
            $('#service-append').empty();
        }
        reload_swiper();

        const settings_page = {
            "url": `${path}${language}/${menu}/${masterkey}/pagination`,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": `application/json`,
            },
            "data": JSON.stringify({
                "method": method,
                "Controller": action,
                "tid": array_gid,
                "order": sort,
                "page": page,
                "limit": limit,
            }),
        };
        const result_page = await $.ajax(settings_page);
        $('.service-pagination').empty();
        $('.service-pagination').append(result_page);
    }
});