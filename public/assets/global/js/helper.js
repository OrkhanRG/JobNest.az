const notify = (title, text = null, icon = "success", btn_confirm_text = "Ok", show_close_btn = false, show_cancel_btn = false, focus_confirm_btn = false) => {
    return Swal.fire({
        title: title,
        text: text ?? "",
        icon: icon,
        confirmButtonText: btn_confirm_text ?? "OK",
        showCloseButton: show_close_btn,
        showCancelButton: show_cancel_btn,
        focusConfirm: focus_confirm_btn,
    });
}

const getBase64FromSelector = (selector) => {
    return new Promise((resolve, reject) => {
        const input = document.querySelector(`[${selector}]`);
        if (!input || !input.files || !input.files[0]) {
            resolve(undefined);
            return;
        }

        const file = input.files[0],
              reader = new FileReader();

        reader.onload = () => resolve(reader.result);
        reader.onerror = (err) => reject(err);

        reader.readAsDataURL(file);
    });
}

const public_path = (url) => {
    return "../../../" + url;
}

$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
    console.log('AJAX Error:', jqxhr.status);

    if (jqxhr.status === 401 || jqxhr.status === 419) {
        window.location.href = '/';
    }
});

const route = (name, params = {}) => {
    const routes = window.LaravelRoutes || {};

    if (!routes[name]) {
        throw new Error(`Route "${name}" not found`);
    }

    let url = routes[name];

    for (const [key, value] of Object.entries(params)) {
        url = url.replace(`{${key}}`, value);
    }

    return url;
}
