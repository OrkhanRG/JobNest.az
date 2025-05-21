$(function () {
    const getParents = () => {
        let h = `<option value="">Yoxdur</option>`,
            el = $(`[data-role="parent_id"]`);

        el.prop("disabled", true).select2();

        $.get({
            url: job_categories_get_parents_route,
            success: function (d) {
                let data = d?.data;

                h += data.map((v, i) => `<option value="${v.id}">${v.name}</option>`).join('');
                el.html(h);
            },
            error: function (err) {
                // console.log(err)
            },
            complete: function () {
                el.prop("disabled", false);
            }
        });
    }

    getParents();

    $(document).on("submit", `[data-role="form-create"]`, function (e) {
        e.preventDefault();

        let parent = $(this).closest(".row"),
            requiredFields = ["name"],
            optionalFields = ["slug", "description", "icon", "parent_id", "is_active"],
            data = validateInput(parent, requiredFields, optionalFields);

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

        $.post({
            url: job_categories_create_route,
            contentType: false,
            processData: false,
            data: formData,
            success: function (d) {

                if (d.code === 201) {
                    notify("Uğurlu!", d.message, "success");
                    emptyInput(parent);
                    getParents();
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
                //
            }
        });
    })
});
