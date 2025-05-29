$(function () {

    let role_element = $(`[data-role="role"]`),
        status_element = $(`[data-role="status"]`),
        file_is_deleted = 0;

    $(`[data-role="role"], [data-role="status"]`).select2();


    const getRoles = () => {
        let h = `<option value="">Rol Seçin</option>`;
        role_element.prop("disabled", true);

        $.get({
            url: users_get_roles_route,
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data;
                    h += data.map(v => `<option value="${v.id}">${v.label}</option>`).join('');
                }

                role_element.html(h);
            },
            error: function (err) {
                // console.log(err)
            },
            complete: function () {
                role_element.prop("disabled", false);
            }
        });
    }

    getRoles();

    $(document).on("submit", `[data-role="form"]`, function (e) {
        e.preventDefault();

        let parent = $(this).closest(".row"),
            requiredFields = ["name", "role", "status", "email", "password", "password_confirmation"],
            optionalFields = ["surname", "avatar"],
            data = validateInput(parent, requiredFields, optionalFields),
            route = $(this).attr("action"),
            request_type = $(this).attr("method"),
            submit_button = $(this).find("button");

        if (!data) {
            return;
        }

        let formData = new FormData();
        for (let key in data) {
            formData.append(key, data[key]);
        }

        let iconFile = parent.find(`[data-role="avatar"]`)[0]?.files[0];
        if (iconFile) {
            formData.append("icon", iconFile);
        }
        if (request_type === "PUT") {
            formData.append('_method', 'PUT')
            formData.append("file_is_deleted", file_is_deleted);
        }

        submit_button.prop("disabled", true);

        $.post({
            url: route,
            contentType: false,
            processData: false,
            data: formData,
            success: function (d) {

                if ([201, 202].includes(d.code)) {
                    notify("Uğurlu!", d.message, "success");
                    getRoles();
                    if (request_type === "POST") {
                        emptyInput(parent);

                        let preview_icon = $(`[data-role="preview-icon"]`);
                        preview_icon.addClass("d-none");
                        preview_icon.find("img").attr("src", "");
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
                    Swal.fire({
                        title: 'Xəta!',
                        text: err.message,
                        icon: "error",
                        confirmButtonText: 'Ok'
                    })
                }
            },
            complete: function () {
                submit_button.prop("disabled", false);
            }
        });
    })

    $(document).on("click", `[data-role="icon-close"]`, function (e) {
       let parent = $(`[data-role="preview-icon"]`);
       file_is_deleted = 1;
       $(`[data-role="avatar"]`).val("");
       parent.find("img").attr("src", "");
       parent.addClass("d-none");
    });

    $(document).on("change", `[data-role="avatar"]`, function (e) {
        const file = e.target.files[0],
              preview_el = $(`[data-role="preview-icon"]`);

        preview_el.removeClass("d-none");
        file_is_deleted = 0;

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview_el.find("img").attr('src', e.target.result).show();
            };

            reader.readAsDataURL(file);
        }
    })
});
