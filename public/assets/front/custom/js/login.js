$(function () {

    const modal_id = "#sign_up_popup2";
    let last_entered_email = null,
        token = null;

    const url = new URL(window.location.href);
    if (url.searchParams.has("token")) {
        token = getUrlParameter("token")?.trim();
        window.history.replaceState({}, document.title, "/");
    }

    $(document).on("click", `[data-role="btn-login"]`, function (e) {
        let parent = $(this).closest(".row"),
            requiredFields = ["email", "password"],
            data = validateInput(parent, requiredFields);

        if (!data) {
            return;
        }

        data["remember_me"] = $(`[data-role="remember_me"]`).prop("checked") ? 1 : 0;
        last_entered_email = data["email"];

        $.post({
            url: loginRoute,
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
                } else if (d.code === 403){
                    Swal.fire({
                        title: d.message,
                        footer: "Yeni doğrulama email'i üçün email'inizi yazaraq <b style='color:red'>Yenidən göndər</b> düyməsinə basın.",
                        input: "text",
                        inputAttributes: {
                            autocapitalize: "off"
                        },
                        inputValue: last_entered_email ?? "",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yenidən göndər",
                        didOpen: () => {
                            // Input'a odaklanıyoruz
                            const input = Swal.getInput();
                            if (input) {
                                input.focus();  // Input'a focus veriyoruz
                            }
                        },
                    });
                } else {
                    notify("Diqqət!", d.message, "warning")
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

    const forgot_password_modal_id = "#forgot_password_popup";
    $(document).on("click", `[data-role="btn-forgot-password"]`, function (e) {
        let parent = $(this).closest(".row"),
            requiredFields = ["email"],
            data = validateInput(parent, requiredFields);

        if (!data) {
            return;
        }

        $.post({
            url: forgotPasswordRoute,
            data,
            success: function (d) {
                if (d.code === 200){
                    notify("Uğurlu!", d.message, "success").then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                    emptyInput(parent)
                    $(`${forgot_password_modal_id}`).modal('toggle');
                } else {
                    notify("Diqqət!", d.message, "warning")
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
    })

    if (!!+$(`[data-role="show-reset-password-modal"]`).val()) {
        show_modal('reset_password_popup');
    }

    const reset_password_modal_id = "#reset_password_popup";
    $(document).on("click", `[data-role="btn-reset-password"]`, function (e) {
        let parent = $(this).closest(".row"),
            requiredFields = ["password", "password_confirmation"],
            data = validateInput(parent, requiredFields);

        if (!data) {
            return;
        }

        data["token"] = token;

        $.post({
            url: passwordResetRoute,
            data,
            success: function (d) {
                if (d.code === 202){
                    notify("Uğurlu!", d.message, "success").then((result) => {
                        if (result.isConfirmed) {
                            // location.reload();
                        }
                    })
                    emptyInput(parent)
                    $(`${reset_password_modal_id}`).modal('toggle');
                } else {
                    notify("Diqqət!", d.message, "warning")
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
    })
});
