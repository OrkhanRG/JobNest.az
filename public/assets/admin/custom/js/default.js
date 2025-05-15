const noContent = (message = null) => {
    return `<tr>
                <td colSpan="7" class="text-center">${message ?? "Məlumat Tapılmadı!"}</td>
            </tr>`;
}
