function init_map()
{
    var myOptions = {
        zoom:13,
        center:new google.maps.LatLng(50.4725909,30.367351999999983),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
    marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(50.4725909,30.367351999999983)});
    infowindow = new google.maps.InfoWindow({content:'<strong>Help4Car</strong><br>Киев, Служебная 4б<br>'});
    google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
    infowindow.open(map,marker);
}
    google.maps.event.addDomListener(window, 'load', init_map);
//# sourceMappingURL=map.js.map
