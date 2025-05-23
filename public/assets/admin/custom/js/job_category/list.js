$(function () {
    let offset = 0,
        count = 0,
        isLoading = false;

    const timer = new AjaxTimer(`[data-role="table-total-time"]`);

    const trComponent = (d, i) => {
        return `<tr>
                    <td>${ ++i + offset }</td>
                    <td>
                        ${d.icon ? `<img width="50" src="/${ d.icon ?? "" }" alt="">` : ``}
                    </td>
                    <td>${ d.name ?? "" }</td>
                    <td>${ d.slug ?? "" }</td>
                    <td>
                        <iconify-icon class="fs-21 align-middle" icon="iconamoon:comment-duotone" data-toggle="tooltip" data-placement="top" title="${ d.description ?? "" }"></iconify-icon>
                    </td>
                    <td width="100px" class="text-end">
                        <a href="${job_categories_edit_route.replace('category_id', d.id)}">
                            <iconify-icon class="text-success fs-21 align-middle" icon="iconamoon:edit-duotone"></iconify-icon>
                        </a>

                        <a href="#3">
                            <iconify-icon class="text-danger fs-21 align-middle" icon="iconamoon:trash-duotone"></iconify-icon>
                        </a>
                    </td>
                </tr>`;
    }

    const getAll = (first_time = true) => {
        let h = ``;

        let data = {offset};

        $(`.table`).addClass("loader");
        timer.start();

        isLoading = true;
        $(`[data-role="loader"]`).show();

        $.get({
            url: job_categories_route,
            data,
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data?.categories;
                    count = d?.data?.count || 0;

                    h += data.map((v, i) => trComponent(v, i)).join("");

                    if (first_time) {
                        $(`[data-role="table-body"]`).html(h);
                        $(`[data-role="table-total-count"]`).html(count);
                    } else {
                        $(`[data-role="table-body"]`).append(h);
                    }
                } else {
                    $(`[data-role="table-body"]`).html(tableMessage("Məlumat Tapılmadı"));
                }
            },
            error: function (err) {
                $(`[data-role="table-body"]`).html(tableMessage("Internal Server Error"));
            },
            complete: function () {
                $(`.table`).removeClass("loader");
                timer.stop();
                isLoading = false;
                $(`[data-role="loader"]`).hide();
            }
        });
    }

    getAll();

    $(window).on('scroll', function () {
        if (isLoading ||offset >= count) return;
        offset = $(`.table tbody tr`).length;

        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();
        const documentHeight = $(document).height();

        if (scrollTop + windowHeight + 100 >= documentHeight) {
            getAll(false);
        }
    });
});
