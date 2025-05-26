const tableMessage = (message = null, colspan = 6) => {
    return `<tr>
                <td colspan="${colspan}" class="text-center">${message ?? "Məlumat Tapılmadı!"}</td>
            </tr>`;
}

document.addEventListener('DOMContentLoaded', function () {
    const icon = document.querySelector('.form-filter');
    const collapse = document.getElementById('formFilter');

    collapse.addEventListener('shown.bs.collapse', function () {
        icon.classList.add('active-filter');
    });

    collapse.addEventListener('hidden.bs.collapse', function () {
        icon.classList.remove('active-filter');
    });

    if (collapse.classList.contains('show')) {
        icon.classList.add('active-filter');
    }
});
