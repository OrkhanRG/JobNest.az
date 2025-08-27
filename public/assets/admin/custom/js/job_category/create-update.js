$(function () {

    let parent_id_element = $(`[data-role="parent_id"]`),
        file_is_deleted = 0,
        edit_id = $(`[data-role="edit-id"]`).val()?.trim();

    $(`[data-role="seo_keywords"]`).tagsinput()

    const getParents = () => {
        let h = `<option value="">Yoxdur</option>`,
            data = {
                id: edit_id
            };

        parent_id_element.prop("disabled", true).select2();

        $.get({
            url: job_categories_get_parents_route,
            data,
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data;
                    h += data.map((v, i) => `<option value="${v.id}">${v.name}</option>`).join('');
                }

                parent_id_element.html(h);


                if (!!edit_id) {
                    let parent_id = parent_id_element.data("parent-id");
                    parent_id_element.val(parent_id !== edit_id ? parent_id : "").trigger("change");
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

    $(document).on("keydown", `[data-role="form"]`, function (e){
        console.log("key: " + e.key);
        if (e.key === "Enter") {
            e.preventDefault();
        }
    });

    $(document).on("submit", `[data-role="form"]`, function (e) {
        e.preventDefault();

        let parent = $(this).closest(".row"),
            requiredFields = ["name"],
            optionalFields = ["slug", "description", "icon", "parent_id", "is_active", "is_featured", "seo_title", "seo_description", "seo_keywords"],
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
