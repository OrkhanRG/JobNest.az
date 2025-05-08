$(function () {

    const modal_id = "#sign_up_popup2";
    let last_entered_email = null;

    $(document).on("click", `[data-role="btn-login"]`, function (e) {
        let parent = $(this).closest(".row"),
            requiredFields = ["email", "password"],
            data = validateInput(parent, requiredFields);

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

    $(document).on("click", `[data-role="btn-forgot-password"]`, function (e) {
        let parent = $(this).closest(".row"),
            requiredFields = ["email"],
            data = validateInput(parent, requiredFields);

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
                    $(`${modal_id}`).modal('toggle');
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
