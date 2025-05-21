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

function getBase64FromSelector(selector) {
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
