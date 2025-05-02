$(function () {

    const modal_id = "#sign_up_popup2";

    $(document).on("click", `[data-role="btn-login"]`, function (e) {
        let parent = $(this).closest(".row"),
            requiredFields = ["email", "password"],
            data = validateInput(parent, requiredFields);

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

});
