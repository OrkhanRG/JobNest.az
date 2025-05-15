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
