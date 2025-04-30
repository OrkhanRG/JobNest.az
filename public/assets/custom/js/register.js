$(function () {

    $(document).on("click", `[data-role="register-candidate"]`, function (e) {
        let parent = $(this).closest(".row");
        let fields = ["name", "surname", "email", "password", "password_confirmation"];

        let data = validateInput(parent, fields);
        data["user_type"] = $(this).data("user-type");

        $.post({
            url: registerRoute,
            data,
            success: function (data) {
                console.log(data);
            },
            error: function (err) {
                if (err.status === 422) {
                    let errors = err.responseJSON.errors;
                    validateByRequest(parent, errors);
                }
            },
            complete: function () {
                //
            }
        });
    });
});
