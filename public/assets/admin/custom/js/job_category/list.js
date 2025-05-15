$(function () {
    const trComponent = (d, i) => {
        return `<tr>
                    <td>${ ++i }</td>
                    <td>${ d.icon ?? "" }</td>
                    <td>${ d.name ?? "" }</td>
                    <td>${ d.parent_name ?? "" }</td>
                    <td>${ d.slug ?? "" }</td>
                    <td>${ d.description ?? "" }</td>
                    <td width="100px" class="text-end">
                        <a href="#1">
                            <iconify-icon class="text-primary fs-21 align-middle" icon="iconamoon:eye-duotone"></iconify-icon>
                        </a>

                        <a href="#2">
                            <iconify-icon class="text-success fs-21 align-middle" icon="iconamoon:edit-duotone"></iconify-icon>
                        </a>

                        <a href="#3">
                            <iconify-icon class="text-danger fs-21 align-middle" icon="iconamoon:trash-duotone"></iconify-icon>
                        </a>
                    </td>
                </tr>`;
    }

    $(`[data-role="table-body"]`).html(trComponent({}, 0));

    const getAll = () => {
        $.get({
            url: job_categories_route,
            success: function (d) {
                console.log({d});
                if (d.code === 200){
                    notify(d.message, "", "success")
                } else {
                    notify("Diqqət!", d.message, "warning")
                }
            },
            error: function (err) {
                // console.log(err)
            },
            complete: function () {
                //
            }
        });
    }

    getAll();
});
