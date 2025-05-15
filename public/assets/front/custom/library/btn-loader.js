const startBtnLoading = (button) => {
    const $btn = $(button);
    const originalText = $btn.text();

    // Butonun orijinal metnini saklıyoruz
    $btn.prop("disabled", true).data("original-text", originalText);

    // Spinner ekliyoruz
    $btn.html(`<div class="inline-spinner" style="
        display:inline-block;
        width:18px;
        height:18px;
        border:2px solid transparent;
        border-top:2px solid white;
        border-radius:50%;
        animation:spin 0.6s linear infinite;
        vertical-align:middle;
    "></div>`);
};

const stopBtnLoading = (button, status = "success", delay = 2000) => {
    const $btn = $(button);

    // Duruma göre buton renklerini ayarlıyoruz
    const bgColors = {
        success: "#28a745",
        error: "#dc3545",
        warning: "#ffc107"
    };

    const textColors = {
        success: "#fff",
        error: "#fff",
        warning: "#000"
    };

    $btn.css({
        backgroundColor: bgColors[status],
        color: textColors[status]
    });

    // Duruma göre buton metnini değiştiriyoruz
    const label = {
        success: "Uğurlu!",
        error: "Xəta!",
        warning: "Diqqət!"
    }[status];

    $btn.html(label);

    // 2 saniye sonra butonu eski haline getiriyoruz
    setTimeout(() => {
        // Buton disabled özelliğini false yapıyoruz
        $btn.prop("disabled", false);

        // Spinner'ı temizliyoruz ve butonun orijinal metnini geri getiriyoruz
        $btn.html($btn.data("original-text"));

        // CSS renklerini sıfırlıyoruz
        $btn.css({
            backgroundColor: "",
            color: ""
        });
    }, delay);
};
