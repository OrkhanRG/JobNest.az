const tableMessage = (message = null, colspan = 6) => {
    return `<tr>
                <td colspan="${colspan}" class="text-center">${message ?? "Məlumat Tapılmadı!"}</td>
            </tr>`;
}
