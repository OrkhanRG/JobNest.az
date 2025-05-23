$(function () {
    let offset = 0,
        count = 0,
        isLoading = false;

    const timer = new AjaxTimer(`[data-role="table-total-time"]`);

    const trComponent = (d, i) => {
        let index = ++i + offset;
        let html = renderRow(d, index);

        if (Array.isArray(d.children) && d.children.length > 0) {
            d.children.forEach((child, i2) => {
                html += renderRow(child, ++i2, `${index}.`, d.id);
            });
        }

        return html;
    };

    const renderRow = (item, index, prefix = "", parent_id = "") => {
        return `<tr data-id="${item.id}" ${prefix !== "" ? `data-parent-id="${parent_id}"` : "" }>
                    <td>
                        ${prefix === "" ? `<b>${prefix}${index}</b>` : `&nbsp &nbsp &nbsp ${prefix}${index}`}
                    </td>
                    <td>
                        ${item.icon ? `<img width="50" src="/${item.icon}" alt="">` : ``}
                    </td>
                    <td data-row="name">${item.name ?? ""}</td>
                    <td>${item.slug ?? ""}</td>
                    <td>
                        <iconify-icon class="fs-21 align-middle" icon="iconamoon:comment-duotone" data-toggle="tooltip" data-placement="top" title="${item.description ?? ""}"></iconify-icon>
                    </td>
                    <td width="100px" class="text-end">
                        <a href="${job_categories_edit_route.replace('category_id', item.id)}">
                            <iconify-icon class="text-success fs-21 align-middle" icon="iconamoon:edit-duotone"></iconify-icon>
                        </a>
                        <iconify-icon data-role="btn-delete" class="text-danger fs-21 align-middle cursor-pointer" icon="iconamoon:trash-duotone"></iconify-icon>
                    </td>
                </tr>`;
    };


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

    $(document).on("click", `[data-role="btn-delete"]`, function () {
        let tr = $(this).closest("tr"),
            name = tr.find(`[data-row="name"]`).text()?.trim(),
            id = tr.data("id");

        Swal.fire({
            title: ` <b class="text-danger">${name}</b> kateqoriyasını silmək istədiyinizə əminsiniz?`,
            showDenyButton: true,
            confirmButtonText: "Sil",
            denyButtonText: `İmtina`
        }).then((result) => {
            if (result.isConfirmed) {
                $.post({
                    url: job_categories_delete_route.replace('category_id', id),
                    data: {
                        id,
                        _method: "DELETE"
                    },
                    success: function (d) {
                        if ([201, 202].includes(d.code)) {
                            tr.remove();
                            tr.find(`[data-parent-id="${id}"]`).remove();
                            notify("Uğurlu!", d.message, "success");
                        } else {
                            notify("Diqqət!", d.message, "warning");
                        }
                    },
                    error: function (err) {
                        if (err?.code === 500) {
                            notify("Xəta!", err.message, "error");
                        }
                    },
                    complete: function () {
                    }
                });
            } else if (result.isDenied) {
                notify("İmtina edildi! 👍", null, "info");
            }
        });
    });

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
