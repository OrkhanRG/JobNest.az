const tableMessage = (message = null, colspan = 6) => {
    return `<tr>
                <td colspan="${colspan}" class="text-center">${message ?? "Məlumat Tapılmadı!"}</td>
            </tr>`;
}

document.addEventListener('DOMContentLoaded', function () {
    const icon = document.querySelector('.form-filter');
    const collapse = document.getElementById('formFilter');
    activateFilterBtn(icon, collapse);
});
