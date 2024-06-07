// services filter
$('.services-filter').on('click', async function(){

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
                "Controller": 'home',
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
            result?.item?.list.forEach((value) => {
                let url = (value.url != '#' && value.url != "") ? value.url : "#";
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
                                                alt="${value.pic.subject}" class="thumb-img lazy" width="100" height="100">
                                            <img src="${value.pic2.pictures}"
                                                alt="${value.pic2.subject}" class="thumb-hover lazy" width="100" height="100">
                                        </figure>
                                    </div>
                                    <h5 class="title">${value.subject}</h5>
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
    }
});

(async() => {
    const settings = {
        "url": `${path}${language}/reverse_proxy`,
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": `application/json`,
        },
        "data": JSON.stringify({
            "Controller": 'home',
            "method": 'getService',
            "order": 'DESC',
            "page": 1,
            "limit": 15,
        }),
    };

    setTimeout(async function() {
        const result = await $.ajax(settings);
    
        if (result?.code === 1001 && result?._numOfRows > 0) {
            let strHTML = ``;
            result?.item?.list.forEach((value) => {
                let url = (value.url != '#' && value.url != "") ? value.url : "#";
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
                                                alt="${value.pic.subject}" class="thumb-img lazy" width="100" height="100">
                                            <img src="${value.pic2.pictures}"
                                                alt="${value.pic2.subject}" class="thumb-hover lazy" width="100" height="100">
                                        </figure>
                                    </div>
                                    <h5 class="title">${value.subject}</h5>
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
    }, 5000);
    
})();