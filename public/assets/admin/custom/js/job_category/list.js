$(function () {
    let keyword, is_active;

    let offset = 0,
        count = 0,
        isLoading = false;

    const timer = new AjaxTimer(`[data-role="table-total-time"]`);

    const setFilter = () => {
        offset = 0;
        keyword = $(`[data-role="keyword"]`).val()?.trim();
        is_active = $(`[data-role="status"]`).val()?.trim();
    }

    const resetFilter = () => {
        offset = 0;
        keyword = "";
        is_active = "";

        $(`[data-role="keyword"]`).val(keyword);
        $(`[data-role="status"]`).val(is_active);
    }

    const loadFilter = () => {
        keyword = getUrlParameter('keyword') ?? "";
        is_active = getUrlParameter('is_active') ?? "";

        if (+is_active) {
            $(`[data-role="status"]`).val(is_active);
        }

        if (keyword) {
            $(`[data-role="keyword"]`).val(keyword);
        }
    }

    loadFilter();

    const trComponent = (d, i = 0, prefix = "", parent_id = "") => {
        let index = ++i + offset,
            fullIndex = prefix + index,
            html = renderRow(d, index, prefix, parent_id);

        if (Array.isArray(d.children) && d.children.length > 0) {
            d.children.forEach((child, i2) => {
                html += trComponent(child, i2, fullIndex + ".", d.id);
            });
        }

        return html;
    };

    const renderRow = (item, index, prefix, parent_id) => {
        let is_parent = prefix === "",
            level = prefix === "" ? 0 : prefix.split('.').length,
            paddingLeft = level * 20;

        return `<tr class="${is_parent ? "fw-bold" : ""}" data-id="${item.id}" ${prefix !== "" ? `data-parent-id="${parent_id}"` : "" }>
                <td style="padding-left: ${paddingLeft}px">
                    ${prefix}${index}
                </td>
                <td>
                    ${item.icon ? `<img width="50" src="/${item.icon}" alt="">` : ``}
                </td>
                <td data-row="name">${item.name ?? ""}</td>
                <td>${item.slug ?? ""}</td>
                <td>
                    <iconify-icon class="fs-21 align-middle" icon="iconamoon:comment-duotone" data-toggle="tooltip" data-placement="top" title="${item.description ?? ""}"></iconify-icon>
                </td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" data-role="change-status" id="switch${item.id}" ${+item.is_active ? "checked" : ""}>
                    </div>
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

        let data = {
            keyword,
            is_active,
            offset
        };

        if (first_time) {
            filter_url({
                keyword,
                is_active,
            });
        }

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

                    if (count) {
                        h += data.map((v, i) => trComponent(v, i)).join("");
                    } else {
                        h += tableMessage();
                    }

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
                $(`[data-role="filter-apply"]`).prop("disabled", false);
                $(`[data-role="filter-reset"]`).prop("disabled", false);
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
                            count--;
                            tr.remove();
                            $(`[data-parent-id="${id}"]`).remove();
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

    $(document).on("change", `[data-role="change-status"]`, function () {
        let self = $(this),
            tr = self.closest("tr"),
            name = tr.find(`[data-row="name"]`).text()?.trim(),
            id = tr.data("id");

        let data = {
            is_active: self.prop("checked") ? "1" : "0",
            _method: "DELETE"
        };

        Swal.fire({
            title: ` <b class="text-danger">${name}</b> statusunu dəyişmək istədiyinizə əminsiniz?`,
            showDenyButton: true,
            confirmButtonText: "Dəyişdir",
            denyButtonText: `İmtina`
        }).then((result) => {
            if (result.isConfirmed) {
                $.post({
                    url: job_categories_change_status_route.replace('category_id', id),
                    data,
                    success: function (d) {
                        if ([201, 202].includes(d.code)) {
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
                self.prop("checked", !self.prop("checked"));
            } else {
                self.prop("checked", !self.prop("checked"));
            }
        });
    });

    $(document).on("click", `[data-role="filter-apply"]`, function () {
       $(this).prop("disabled", true);
       setFilter();
       getAll();
    });

    $(document).on("keyup", function (e) {
        if (e.key === "Enter") {
            const $button = $(`[data-role="filter-apply"]`);
            $button.prop("disabled", true);
            setFilter();
            getAll();
        }
    });

    $(document).on("click", `[data-role="filter-reset"]`, function () {
        $(this).prop("disabled", true);
        resetFilter();
        getAll();
    });

    $(window).on('scroll', function () {

        if (isLoading || $(`.table tbody tr`).length >= count) return;
        offset = $(`.table tbody tr`).length;

        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();
        const documentHeight = $(document).height();

        if (scrollTop + windowHeight + 100 >= documentHeight) {
            getAll(false);
        }
    });
});
