$(function () {
    let selected_lang_id = $(`[data-role="selected-lang-id"]`).val()?.trim();

    $(`[data-role="lang_id"]`).select2({
        width: "100%",
    });

    if (selected_lang_id) {
        $('[data-role="lang_id"]').val(selected_lang_id).trigger("change");
    }

    $(document).on("submit", `[data-role="form"]`, function (e) {
        e.preventDefault();

        let parent = $(this).closest(".row"),
            requiredFields = ["name", "short_name", "lang_id"],
            optionalFields = ["phone_prefix", "is_active"],
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
                        emptyInput(parent);
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

    $(document).on("input", `[data-role="short_name"]`, function (e) {
        $(this).val($(this).val().toLowerCase().split(" ").join("_"));
    })
});
