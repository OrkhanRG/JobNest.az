$(function () {

    $(document).on("click", `[data-role="register-candidate"]`, function (e) {
        let parent = $(this).closest(".row");
        let requiredFields = ["name", "surname", "email", "password", "password_confirmation"];

        let data = validateInput(parent, requiredFields);
        data["user_type"] = $(this).data("user-type");

        $.post({
            url: registerRoute,
            data,
            success: function (d) {
                Swal.fire({
                    title: d.code === 200 ? "Uğurlu!" : "Xəta!",
                    text: d.message,
                    icon: d.code === 200 ? "success" : "error",
                    confirmButtonText: 'Ok'
                })
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
        data["user_type"] = $(this).data("user-type");

        $.post({
            url: registerRoute,
            data,
            success: function (d) {
                Swal.fire({
                    title: d.code === 200 ? "Uğurlu!" : "Xəta!",
                    text: d.message,
                    icon: d.code === 200 ? "success" : "error",
                    confirmButtonText: 'Ok'
                })
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
});
