$(function () {

    const modal_id = "#sign_up_popup"

    $(document).on("click", `[data-role="register-candidate"]`, function (e) {
        let parent = $(this).closest(".row");
        let requiredFields = ["name", "surname", "email", "password", "password_confirmation"];

        let data = validateInput(parent, requiredFields);

        if (!data) {
            return;
        }

        data["user_type"] = $(this).data("user-type");

        $.post({
            url: registerRoute,
            data,
            success: function (d) {

                if (d.code === 200){

                    notify("Uğurlu!", d.message, "success").then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                    emptyInput(parent)
                    $(`${modal_id}`).modal('toggle');
                } else {
                    notify("Xəta!", d.message, "error")
                }

            },
            error: function (err) {
                err = err.responseJSON;
                if (err.status === 422) {
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
    });

    $(document).on("click", `[data-role="register-company"]`, function (e) {
        let parent = $(this).closest(".row");
        let requiredFields = ["name", "email", "password", "password_confirmation"],
            optionalField = ["phone"];

        let data = validateInput(parent, requiredFields, optionalField);

        if (!data) {
            return;
        }

        data["user_type"] = $(this).data("user-type");

        $.post({
            url: registerRoute,
            data,
            success: function (d) {
                if (d.code === 200){
                    notify("Uğurlu!", d.message, "success");
                    emptyInput(parent)
                    $(`${modal_id}`).modal('toggle');
                } else {
                    notify("Xəta!", d.message, "error");
                }
            },
            error: function (err) {
                err = err.responseJSON;
                if (err.status === 422) {
                    let errors = err.errors;
                    validateByRequest(parent, errors);
                    stopBtnLoading(this, "error");
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
            }
        });
    });
});
