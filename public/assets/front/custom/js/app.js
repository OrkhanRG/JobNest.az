$('#sign_up_popup2, #sign_up_popup').on('hidden.bs.modal', function () {
    const modal = $(this);
    modal.find(".is-invalid").removeClass("is-invalid");
    modal.find(".invalid-feedback").remove();
});
