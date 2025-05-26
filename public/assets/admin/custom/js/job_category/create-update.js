$(function () {

    let parent_id_element = $(`[data-role="parent_id"]`),
        file_is_deleted = 0;
    const getParents = () => {
        let h = `<option value="">Yoxdur</option>`;
        parent_id_element.prop("disabled", true).select2();

        $.get({
            url: job_categories_get_parents_route,
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data;
                    h += data.map((v, i) => `<option value="${v.id}">${v.name}</option>`).join('');
                }

                parent_id_element.html(h);

                if (!!parent_id_element.data("selected-id")) {
                    parent_id_element.val(parent_id_element.data("selected-id")).trigger("change");
                }
            },
            error: function (err) {
                // console.log(err)
            },
            complete: function () {
                parent_id_element.prop("disabled", false);
            }
        });
    }

    getParents();

    $(document).on("submit", `[data-role="form"]`, function (e) {
        e.preventDefault();

        let parent = $(this).closest(".row"),
            requiredFields = ["name"],
            optionalFields = ["slug", "description", "icon", "parent_id", "is_active"],
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

        let iconFile = parent.find(`[data-role="icon"]`)[0]?.files[0];
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
                    getParents();
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
       $(`[data-role="icon"]`).val("");
       parent.find("img").attr("src", "");
       parent.addClass("d-none");
    });

    $(document).on("change", `[data-role="icon"]`, function (e) {
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
