// services filter
$('.services-filter').on('click', async function(){
    let gid = $(this).data('id');

    const settings = {
        "url": `${path}/reverse_proxy`,
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": `application/json`,
        },
        "data": JSON.stringify({
            "gid": gid,
        }),
    };
    const result = await $.ajax(settings);
});