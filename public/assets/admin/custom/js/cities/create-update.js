$(function () {
    let selected_lang_id = $(`[data-role="selected-lang-id"]`).val()?.trim(),
        selected_country_id = $(`[data-role="selected-country-id"]`).val()?.trim(),
        changeTrigger = true;

    $(`[data-role="lang_id"], [data-role="country_id"]`).select2({
        width: "100%",
    });

    const getCountries = (lang_id) => {
        if (!lang_id) {
            notify("Dil seçin!", "", "warning");
            return false;
        }

        let h = `<option value="">Ölkə seçin</option>`,
            data = {lang_id};

        $(`[data-role="country_id"]`).prop("disabled", true).select2();

        $.get({
            url: country_get_all_route,
            data,
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data?.list;
                    h += data.map((v, i) => `<option value="${v.id}">${v.name}</option>`).join('');
                }

                $(`[data-role="country_id"]`).html(h);
            },
            error: function (err) {
                // console.log(err)
            },
            complete: function () {
                $(`[data-role="country_id"]`).prop("disabled", false);

                if (selected_country_id && $('[data-role="country_id"] option').length > 1) {
                    $('[data-role="country_id"]').val(selected_country_id).trigger("change");
                }
            }
        });
    }

    if (selected_lang_id) {
        $('[data-role="lang_id"]').val(selected_lang_id).trigger("change");
        getCountries(selected_lang_id);
    }

    $(document).on("submit", `[data-role="form"]`, function (e) {
        e.preventDefault();

        let parent = $(this).closest(".row"),
            requiredFields = ["name", "short_name", "country_id", "lang_id", "region_code"],
            optionalFields = ["is_active"],
            route = $(this).attr("action"),
            request_type = $(this).attr("method").toUpperCase(),
            submit_button = $(this).find("button"),
            data = validateInput(parent, requiredFields, optionalFields);

        if (!data) {
            return;
        }

        let formData = new FormData();
        for (let key in data) {
            formData.append(key, data[key]);
        }

        if (request_type === "PUT") {
            formData.append('_method', 'PUT')
        }

        submit_button.prop("disabled", true);
        $.post({
            url: route,
            contentType: false,
            processData: false,
            data: formData,
            success: function (d) {
                if ([201, 202].includes(d.code)) {
                    notify(d.message, "", "success");
                    if (request_type === "POST") {
                        changeTrigger = false;
                        emptyInput(parent);
                        changeTrigger = true;
                    }
                } else {
                    notify("Diqqət!", d.message, "warning");
                }
            },
            error: function (err) {
                if (err.status === 422) {
                    err = err.responseJSON;
                    let errors = err.errors;
                    validateByRequest(parent, errors);
                }

                if (err?.code === 500) {
                    notify("Xəta!", err.message, "error", "Ok");
                }
            },
            complete: function () {
                submit_button.prop("disabled", false);
            }
        });
    })

    $(document).on("change", `[data-role="lang_id"]`, function (e) {
        console.log({changeTrigger})
        if (!changeTrigger) {
            return;
        }

        let lang_id = $(this).val()?.trim();
        getCountries(lang_id);
    })
});
