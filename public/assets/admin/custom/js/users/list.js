$(function () {
    let keyword,
        status,
        role,
        statues = {0:"Deaktiv", 1:"Aktiv", 2:"Gözləmədə"};

    let offset = 0,
        count = 0,
        isLoading = false;

    const timer = new AjaxTimer(`[data-role="table-total-time"]`);

    $(`[data-role="role"], [data-role="status"]`).select2({
        width: '100%',
    });

    const setFilter = () => {
        keyword = $(`[data-role="keyword"]`).val()?.trim();
        status = $(`[data-role="status"]`).val()?.trim();
        role = $(`[data-role="role"]`).val()?.trim();
    }

    const resetFilter = () => {
        keyword = "";
        status = "";
        role = "";

        $(`[data-role="keyword"]`).val(keyword);
        $(`[data-role="status"]`).val(status);
        $(`[data-role="role"]`).val(role);
    }

    const loadFilter = () => {
        keyword = getUrlParameter('keyword') ?? "";
        status = getUrlParameter('status') ?? "";
        role = getUrlParameter('role') ?? "";

        if (+status) {
            $(`[data-role="status"]`).val(status).trigger("change");
        }

        if (role) {
            $(`[data-role="role"]`).val(role).trigger("change");
        }

        if (keyword) {
            $(`[data-role="keyword"]`).val(keyword);
        }
    }

    loadFilter();

    const trComponent = (d, i) => {
        return  `<tr data-id="${d.id}">
                    <td>
                        ${++i + offset}
                    </td>
                    <td>
                        ${d.avatar ? `<img width="50" src="/${d.avatar}" alt="">` : ``}
                    </td>
                    <td data-row="name">
                        <span>${d.name ?? ""} ${d.surname ?? ""}</span>
                        ${["developer", "admin", "moderator"].includes(d?.roles?.name) ? `<iconify-icon class="text-success fs-21 align-middle" icon="mdi:administrator-outline"></iconify-icon>` : `` }
                    </td>
                    <td>${d.email ?? ""}</td>
                    <td>
                        <span class="badge bg-${d.roles.name === 'candidate' ? 'secondary'
                                              : d.roles.name === 'company' ? 'info' : 'primary' }">${d.roles.label ?? ""}</span>
                    </td>
                    <td>
                        <span class="badge bg-${d.status === 1 ? 'success'
                                            : (d.status === 2 ? 'warning' : 'danger')}">${statues[d.status] ?? "-"}</span>
                    </td>
                    <td width="100px" class="text-end">
                        <a href="${users_edit_route.replace('category_id', d.id)}">
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
            status,
            role,
            offset
        };

        if (first_time) {
            filter_url({
                keyword,
                status,
                role
            });
        }

        $(`.table`).addClass("loader");
        timer.start();

        isLoading = true;
        $(`[data-role="loader"]`).show();

        $.get({
            url: users_route,
            data,
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data?.list;
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
                    url: users_delete_route.replace('category_id', id),
                    data: {
                        id,
                        _method: "DELETE"
                    },
                    success: function (d) {
                        if ([201, 202].includes(d.code)) {
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
                    url: users_change_status_route.replace('category_id', id),
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
