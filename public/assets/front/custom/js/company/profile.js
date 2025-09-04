$(() => {
    let selected_country_id = $(`[data-role="selected-country-id"]`).val(),
        selected_city_id = $(`[data-role="selected-city-id"]`).val(),
        deleted_files = [];

    // const imagePreview = new ImagePreview();
    // imagePreview.initMultiple(['logo', 'background']);

    const phone_mask = IMask($(`[data-role="phone"]`).get(0), {
        mask: '+{994}-(00)-000-00-00',
        placeholder: '+{994}(00)-000-00-00',
    });

    const $founded_year = $('[data-role="founded_year"]');

    $founded_year.on('input', function() {
        let val = $(this).val().replace(/\D/g, '');

        if(val.length > 4) {
            val = val.substring(0,4);
        }
        $(this).val(val);
    });

    $founded_year.on('blur', function() {
        if($(this).val().length !== 4) {
            $(this).val('');
        }
    });

    const getCities = (country_id = null) => {
        let h = `<option disabled selected value="">Şəhər Seçin</option>`,
            $select = $(`[data-role="city_id"]`),
            data = {country_id};

        $select.prop("disabled", true).addClass("loader loader-sm");

        $.get({
            url: get_cities_route,
            data,
            success: function(d) {
                let data = d.data?.list ?? [];
                h += data.map((v) => `<option value="${v.id}">${v.name}</option>`).join('');

                $select.html(h);

                if (selected_city_id) {
                    $select.val(selected_city_id);
                }
            },
            error: function(e) {
            },
            complete: function() {
                $select.prop("disabled", false).removeClass("loader loader-sm");
                $select.selectpicker('refresh');
            }
        });
    }

    const getCountries = () => {
        let h = `<option disabled selected value="">Ölkə Seçin</option>`,
            $select = $(`[data-role="country_id"]`);

        $select.prop("disabled", true).addClass("loader loader-sm");

        $.get({
            url: get_countries_route,
            success: function(d) {
                let data = d.data?.list ?? [];
                h += data.map((v) => `<option value="${v.id}">${v.name}</option>`).join('');

                $select.html(h);

                if (selected_country_id) {
                    $select.val(selected_country_id).trigger("change");
                }
            },
            error: function(e) {
            },
            complete: function() {
                $select.prop("disabled", false).removeClass("loader loader-sm");
                $select.selectpicker('refresh');
            }
        });
    }

    getCountries();

    $(document).on('change', `[data-role="country_id"]`, function() {
        let country_id = $(this).val();
        $(`[data-role="country_id"]`).prop("disabled", true);

        if(country_id) {
            getCities(country_id);
        }
    });

    $(document).on("submit", `[data-role="profile-form"]`, function (e) {
        e.preventDefault();

        let parent = $(this).closest(".row"),
            requiredFields = ["name", "email"],
            optionalFields = [
                "phone",
                "contact_email",
                "website",
                "tagline",
                "country_id",
                "city_id",
                "address",
                "latitude",
                "longitude",
                "map_address",
                "industry",
                "company_type",
                "company_size",
                "founded_year",
                "description",
                "logo",
                "background_image"
            ],
            data = validateInput(parent, requiredFields, optionalFields),
            route = $(this).attr("action"),
            request_type = $(this).attr("method"),
            btnLoader = new SmartButton(),
            btn = $(`[data-role="btn-profile-save"]`);

        btnLoader.setLoading(btn);
        if (!data) {
            btnLoader.setError(btn, "Xəta!");
            return;
        }

        let formData = new FormData();
        for (let key in data) {
            formData.append(key, data[key] ?? null);
        }

        let logoFile = parent.find(`[data-role="logo"]`)[0]?.files[0];
        if (logoFile) {
            formData.append("logo", logoFile);
        }

        let backgroundFile = parent.find(`[data-role="background_image"]`)[0]?.files[0];
        if (backgroundFile) {
            formData.append("background_image", backgroundFile);
        }


        if (request_type === "PUT") {
            formData.append('_method', 'PUT')
            formData.append("deleted_files", deleted_files);
        }

        $.post({
            url: route,
            contentType: false,
            processData: false,
            data: formData,
            success: function (d) {

                if ([201, 202].includes(d.code)) {
                    btnLoader.setSuccess(btn, "Güncəlləndi!");
                    if (request_type === "POST") {
                        emptyInput(parent);
                    }
                } else {
                    notify("Diqqət!", d.message, "warning");
                    btnLoader.setWarning(btn, "Diqqət!");
                }

            },
            error: function (err) {
                if (err.status === 422) {
                    err = err.responseJSON;
                    let errors = err.errors;
                    validateByRequest(parent, errors);
                }

                if (err?.code === 500) {
                    Swal.fire({
                        title: 'Xəta!',
                        text: err.message,
                        icon: "error",
                        confirmButtonText: 'Ok'
                    })
                }

                btnLoader.setError(btn, "Xəta!");
            },
            complete: function () {
            }
        });
    });

    $(document).on("click", `[data-role="remove-file"]`, function () {
       let input_name = $(this).closest(".form-group").find("input").data("role");

       if (!deleted_files.includes(input_name)) {
           deleted_files.push(input_name);
       }
    });

});

//--------------------------Google Map Codes--------------------------

let map, marker, geocoder;

const initMap = () => {
    const defaultCenter = {
        lat: parseFloat(defaultLat),
        lng: parseFloat(defaultLng)
    };

    map = new google.maps.Map(document.getElementById("company-map"), {
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

