const validationComponent = (message= null) => {
    return `<div class="invalid-feedback">
                ${message ?? "Bu sahə mütləq doldurulmalıdır."}
            </div>`;
}

const removeErrors = (parent) => {
    parent.find("input").each(function () {
        $(this).removeClass("is-invalid");
        $(this).siblings(".invalid-feedback").remove();
    });
}

const emptyInput = (parent) => {
    parent.find("input, textarea, select").val("").removeClass("is-invalid");
    parent.find(".invalid-feedback").remove();
}

const validateByRequest = (parent, errors) => {
    removeErrors(parent);

    for (let field in errors) {
        let input = parent.find(`[data-role="${field}"]`);
        if (input.length) {
            input.addClass("is-invalid");
            input.siblings(".invalid-feedback").remove();

            errors[field].forEach(errorMessage => {
                input.after(validationComponent(errorMessage));
            });
        }
    }
}

const validateInput = (parent, requiredFields, optionalFields = []) => {
    let isValid = true,
        data = {};

    const allFields = [...requiredFields, ...optionalFields];

    allFields.forEach(field => {
        let input = parent.find(`[data-role="${field}"]`),
            value = input.val()?.trim();

        data[field] = value;
        input.removeClass("is-invalid");
        input.siblings(".invalid-feedback").remove();

        if (requiredFields.includes(field) && !value) {
            isValid = false;
            input.addClass("is-invalid");
            input.after(validationComponent());
            return;
        }

        if (field === "email") {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                input.addClass("is-invalid");
                input.after(validationComponent("Yanış email formatı."));
            }
        }

    });

    if (data["password"] && data["password_confirmation"]) {
        if (data["password"] !== data["password_confirmation"]) {
            isValid = false;

            const passInput = parent.find(`[data-role="password"]`),
                  passConfInput = parent.find(`[data-role="password_confirmation"]`);

            [passInput, passConfInput].forEach(input => {
                input.addClass("is-invalid");
                input.siblings(".invalid-feedback").remove();
                input.after(validationComponent("Şifrələr uyğun deyil!"));
            });
        }
    }

    if (!isValid) return;

    return data;
}

const show_modal = (modal_id) => {
    let myModal = new bootstrap.Modal(document.getElementById(modal_id));
    myModal.show();
}

const getUrlParameter = (sParam) => {
    let sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
