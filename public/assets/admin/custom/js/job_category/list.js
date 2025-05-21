$(function () {
    const trComponent = (d, i) => {
        return `<tr>
                    <td>${ ++i }</td>
                    <td>
                        ${d.icon ? `<img width="50" src="/${ d.icon ?? "" }" alt="">` : ``}
                    </td>
                    <td>${ d.name ?? "" }</td>
                    <td>${ d.slug ?? "" }</td>
                    <td>
                        <iconify-icon class="fs-21 align-middle" icon="iconamoon:comment-duotone" data-toggle="tooltip" data-placement="top" title="${ d.description ?? "" }"></iconify-icon>
                    </td>
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


    const getAll = () => {
        let h = ``;

        $(`.table`).addClass("loader");

        $.get({
            url: job_categories_route,
            success: function (d) {
                let data = d?.data;
                h += data.map((v, i) => trComponent(v, i)).join("");

                $(`[data-role="table-body"]`).html(h);

            },
            error: function (err) {
                $(`[data-role="table-body"]`).html(tableMessage("Məlumat Tapılmadı"));
            },
            complete: function () {
                $(`.table`).removeClass("loader");
            }
        });
    }

    getAll();
});
