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

    for (let field of allFields) {
        let input = parent.find(`[data-role="${field}"]`),
            value = input.val()?.trim();

        if (input.attr("type") === "checkbox") {
            data[field] = input.prop("checked") ? 1 : 0;
        } else {
            data[field] = value;
        }
        input.removeClass("is-invalid");
        input.siblings(".invalid-feedback").remove();

        if (requiredFields.includes(field) && !value) {
            isValid = false;
            input.addClass("is-invalid");
            input.after(validationComponent());
            continue;
        }

        if (field === "email") {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                input.addClass("is-invalid");
                input.after(validationComponent("Yanış email formatı."));
            }
        }

    }

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
    return undefined;
};

function filter_url(obj, reload = true) {
    const url = new URL(window.location.href);

    // Tüm mevcut parametreleri al
    const params = new URLSearchParams(url.search);

    // Objeye göre güncelle
    Object.entries(obj).forEach(([key, value]) => {
        if (value === null || value === undefined || value === '') {
            params.delete(key);
        } else {
            const safeValue = decodeURIComponent(value.toString());
            params.set(key, safeValue);
        }
    });

    // `+` yerine `%20` görünmesi için kendimiz encode ediyoruz
    const encodedParams = Array.from(params.entries())
        .map(([key, val]) => `${encodeURIComponent(key)}=${encodeURIComponent(val)}`)
        .join('&');

    const newUrl = url.origin + url.pathname + (encodedParams ? `?${encodedParams}` : '');

    if (reload) {
        window.history.pushState({}, '', newUrl);
    }

    return newUrl;
}
