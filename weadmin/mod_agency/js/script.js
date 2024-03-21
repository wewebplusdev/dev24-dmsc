


function initialize() {
    let data_page = $('#map_canvas').data('page');
    let status = true;
    if (data_page == "view") {
        status = false;
    }
    let lat_attribute = $('#latInput').val();
    let long_attribute = $('#longInput').val();
    let lat_marker = ''
    let long_marker = '';
    if ((lat_attribute === '' || lat_attribute == 0.000000) && (long_attribute === '' || long_attribute == 0.000000)) {
        lat_marker = 13.8808189;
        long_marker = 100.5650459;
    } else {
        lat_marker = lat_attribute;
        long_marker = long_attribute;
    }
    const map = new google.maps.Map(document.getElementById("map_canvas"), {
        zoom: 10,
        center: { lat: parseFloat(lat_marker), lng: parseFloat(long_marker) },
        mapTypeId: "terrain",
    });

    var myMarker_site = new google.maps.Marker({
        position: new google.maps.LatLng(parseFloat(lat_marker), parseFloat(long_marker)),
        map,
        draggable: status
    });
    if (data_page != "view") {
        google.maps.event.addListener(myMarker_site, 'dragend', function(evt) {
            $('#latInput').val(evt.latLng.lat().toFixed(6));
            $('#longInput').val(evt.latLng.lng().toFixed(6));
        });
    }
}
