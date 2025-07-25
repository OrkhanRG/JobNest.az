$(function () {
    let keyword,
        lang_id,
        is_active;

    let offset = 0,
        count = 0,
        isLoading = false;

    const timer = new AjaxTimer(`[data-role="table-total-time"]`);

    $(`[data-role="is_active"], [data-role="lang_id"]`).select2({
        width: '100%',
    });

    const setFilter = () => {
        keyword = $(`[data-role="keyword"]`).val()?.trim();
        lang_id = $(`[data-role="lang_id"]`).val()?.trim();
        is_active = $(`[data-role="is_active"]`).val()?.trim();
    }

    const resetFilter = () => {
        keyword = "";
        lang_id = "";
        is_active = "";

        $(`[data-role="keyword"]`).val(keyword);
        $(`[data-role="lang_id"]`).val(lang_id);
        $(`[data-role="is_active"]`).val(is_active);
    }

    const loadFilter = () => {
        keyword = getUrlParameter('keyword') ?? "";
        lang_id = getUrlParameter('lang_id') ?? "";
        is_active = getUrlParameter('is_active') ?? "";

        if (keyword) {
            $(`[data-role="keyword"]`).val(keyword);
        }

        if (+lang_id) {
            $(`[data-role="lang_id"]`).val(lang_id).trigger("change");
        }

        if (+is_active) {
            $(`[data-role="is_active"]`).val(is_active).trigger("change");
        }
    }

    loadFilter();

    const trComponent = (d, i) => {
        return  `<tr data-id="${d.id}">
                    <td>
                        ${++i + offset}
                    </td>
                    <td data-row="key">
                        <span>${d.name}</span>
                    </td>
                    <td>
                        <span>
                           <span class="fi fi-${d.short_name === "en" ? "us" : d.short_name} fs-20"></span> - ${d.short_name.toUpperCase()}
                        </span>
                    </td>
                    <td>
                        <span>+${d.phone_prefix}</span>
                    </td>
                    <td>
                        <span class="fi fi-${d?.language?.code === "en" ? "us" : d?.language?.code} fs-20" title="${d?.language?.native_name ?? ""}"></span>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="change-status" id="switch${d.id}" ${+d.is_active ? "checked" : ""}>
                        </div>
                    </td>
                    <td width="100px" class="text-end">
                        <a href="${countries_edit_route.replace('country_id', d.id)}">
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
            lang_id,
            is_active,
            offset
        };

        if (first_time) {
            filter_url({
                keyword,
                lang_id,
                is_active
            });
        }

        $(`[data-role="table"]`).addClass("loader");
        timer.start();

        isLoading = true;
        $(`[data-role="loader"]`).show();

        $.get({
            url: countries_route,
            data,
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data?.list;
                    count = d?.data?.count || 0;

                    if (count) {
                        h += data.map((v, i) => trComponent(v, i)).join("");
                    } else {
                        h += tableMessage(null, 8);
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
                timer.stop();
                isLoading = false;
                $(`.table`).removeClass("loader");
                $(`[data-role="loader"]`).hide();
                $(`[data-role="filter-apply"]`).prop("disabled", false);
                $(`[data-role="filter-reset"]`).prop("disabled", false);

            }
        });
    }

    getAll();

    $(document).on("click", `[data-role="btn-delete"]`, function () {
        let tr = $(this).closest("tr"),
            key = tr.find(`[data-row="key"]`).text()?.trim(),
            id = tr.data("id");

        Swal.fire({
            title: ` <b class="text-danger">${key}</b> ölkəsini silmək istədiyinizə əminsiniz?`,
            showDenyButton: true,
            confirmButtonText: "Sil",
            denyButtonText: `İmtina`
        }).then((result) => {
            if (result.isConfirmed) {
                $.post({
                    url: countries_delete_route.replace('country_id', id),
                    data: {
                        id,
                        _method: "DELETE"
                    },
                    success: function (d) {
                        if ([201, 202].includes(d.code)) {
                            count--;
                            tr.remove();
                            $(`[data-role="table-total-count"]`).html(count);
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
            } else {
                notify("İmtina edildi! 👍", null, "info");
            }
        });
    });

    $(document).on("change", `[data-role="change-status"]`, function () {
        let self = $(this),
            tr = self.closest("tr"),
            key = tr.find(`[data-row="key"]`).text()?.trim(),
            id = tr.data("id");

        let data = {
            key: "is_active",
            value: self.prop("checked") ? "1" : "0",
            _method: "PUT"
        };

        Swal.fire({
            title: ` <b class="text-danger">${key}</b> ölkəsinin statusunu dəyişmək istədiyinizə əminsiniz?`,
            showDenyButton: true,
            confirmButtonText: "Dəyişdir",
            denyButtonText: `İmtina`
        }).then((result) => {
            if (result.isConfirmed) {
                $.post({
                    url: countries_change_status_route.replace('country_id', id),
                    data,
                    success: function (d) {
                        if ([201, 202].includes(d.code)) {
                            notify(d.message, "", "success");
                        } else if ([422].includes(d.code)) {
                            notify("Xəta!", d.message, "error")
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
            } else {
                notify("İmtina edildi! 👍", null, "info");
                self.prop("checked", !self.prop("checked"))
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
        if (isLoading || $(`[data-role="table-body"] tr`).length >= count) return;
        offset = $(`[data-role="table-body"] tr`).length;

        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();
        const documentHeight = $(document).height();

        if (scrollTop + windowHeight + 100 >= documentHeight) {
            getAll(false);
        }
    });
});
