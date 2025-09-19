let map, marker, geocoder;

const initMap = () => {
    const defaultCenter = {
        lat: parseFloat(defaultLat),
        lng: parseFloat(defaultLng)
    };

    map = new google.maps.Map(document.getElementById("map-div"), {
        zoom: 13,
        center: defaultCenter,
        mapTypeControl: true,
        streetViewControl: true,
        fullscreenControl: true
    });

    geocoder = new google.maps.Geocoder();
    marker = new google.maps.Marker({
        position: defaultCenter,
        map: map,
        draggable: true,
        title: "Şirkət Məkanı"
    });

    if (defaultLat && defaultLng) {
        updateLocationInfo(defaultLat, defaultLng);
    }

    map.addListener("click", function(event) {
        const lat = event.latLng.lat();
        const lng = event.latLng.lng();

        marker.setPosition(event.latLng);
        updateLocationInfo(lat, lng);
    });

    marker.addListener("dragend", function(event) {
        const lat = event.latLng.lat();
        const lng = event.latLng.lng();

        updateLocationInfo(lat, lng);
    });
}

const updateLocationInfo = (lat, lng) => {
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
    document.getElementById('selected-coordinates').textContent = lat.toFixed(6) + ', ' + lng.toFixed(6);

    geocoder.geocode({
        location: { lat: lat, lng: lng }
    }, function(results, status) {
        if (status === "OK") {
            if (results[0]) {
                const address = results[0].formatted_address;
                document.getElementById('selected-address').textContent = address;
                document.getElementById('map_address').value = address;
                document.getElementById('selected-location-info').style.display = 'block';
            }
        } else {
            console.error("Geocoder failed: " + status);
        }
    });
}

const searchLocation = () => {
    const address = document.getElementById('search-address').value;

    if (!address) {
        alert('Zəhmət olmasa axtarış üçün ünvan daxil edin');
        return;
    }

    geocoder.geocode({ address: address }, function(results, status) {
        if (status === "OK") {
            map.setCenter(results[0].geometry.location);
            marker.setPosition(results[0].geometry.location);

            const lat = results[0].geometry.location.lat();
            const lng = results[0].geometry.location.lng();

            updateLocationInfo(lat, lng);
        } else {
            alert("Axtarış nəticə vermədi: " + status);
        }
    });
}

window.initMap = initMap;
