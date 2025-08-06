$(function () {
    let keyword,
        is_active;

    let offset = 0,
        count = 0,
        isLoading = false;

    const timer = new AjaxTimer(`[data-role="table-total-time"]`);

    const setFilter = () => {
        offset = 0;
        keyword = $(`[data-role="keyword"]`).val()?.trim();
        is_active = $(`[data-role="is_active"]`).val()?.trim();
    }

    const resetFilter = () => {
        offset = 0;
        keyword = "";
        is_active = "";

        $(`[data-role="keyword"]`).val(keyword);
        $(`[data-role="is_active"]`).val(is_active);
    }

    const loadFilter = () => {
        keyword = getUrlParameter('keyword') ?? "";
        is_active = getUrlParameter('is_active') ?? "";

        if (+is_active) {
            $(`[data-role="is_active"]`).val(is_active).trigger("change");
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
                    <td data-row="name">
                        <span>${d.name ?? ""}</span>
                    </td>
                    <td data-row="label">
                        <span>${d.label ?? ""}</span>
                    </td>
                    <td data-row="label">
                        <iconify-icon class="text-primary fs-21 align-middle cursor-pointer" icon="tabler:lock-check" data-role="set-permissions" data-bs-toggle="modal" data-bs-target="#setPermissions">
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="change-status" id="switch${d.id}" ${+d.is_active ? "checked" : ""}>
                        </div>
                    </td>
                    <td width="100px" class="text-end">
                        <a href="${roles_edit_route.replace('role_id', d.id)}">
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
                is_active
            });
        }

        $(`[data-role="table"]`).addClass("loader");
        timer.start();

        isLoading = true;
        $(`[data-role="loader"]`).show();

        $.get({
            url: roles_route,
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
            title: ` <b class="text-danger">${name}</b> rolunu silmək istədiyinizə əminsiniz?`,
            showDenyButton: true,
            confirmButtonText: "Sil",
            denyButtonText: `İmtina`
        }).then((result) => {
            if (result.isConfirmed) {
                $.post({
                    url: roles_delete_route.replace('role_id', id),
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
            name = tr.find(`[data-row="name"]`).text()?.trim(),
            id = tr.data("id");

        let data = {
            is_active: self.prop("checked") ? "1" : "0",
            _method: "PUT"
        };

        Swal.fire({
            title: ` <b class="text-danger">${name}</b> istifadəçisinin rolunun statusunu dəyişmək istədiyinizə əminsiniz?`,
            showDenyButton: true,
            confirmButtonText: "Dəyişdir",
            denyButtonText: `İmtina`
        }).then((result) => {
            if (result.isConfirmed) {
                $.post({
                    url: roles_change_status_route.replace('role_id', id),
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
            if (selected_role_id) {
                setFilterFromPermissions();
                getPermissionsByRole(selected_role_id);
            } else {
                setFilter();
                getAll();
            }
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

    //------------------------------TABLE_SET_PERMISSIONS----------------------------------------------
    let keyword_set_permissions;

    let offset_set_permissions = 0,
        count_set_permissions = 0,
        isLoadingSetPermissions = false;

    const timerSetPermissions = new AjaxTimer(`[data-role="table-total-time-set-permissions"]`);

    const setFilterFromPermissions = () => {
        keyword_set_permissions = $(`[data-role="keyword_set_permissions"]`).val()?.trim();
    }

    const resetFilterFromPermissions = () => {
        keyword_set_permissions = "";
        $(`[data-role="keyword_set_permissions"]`).val(keyword_set_permissions);
    }

    const trComponentSetPermissions = (d, i) => {
        return  `<tr data-id="${d.id}">
                    <td>
                        ${++i + offset}
                    </td>
                    <td data-row="name">
                        <span>${d.name ?? ""}</span>
                    </td>
                    <td data-row="label">
                        <span>${d.label ?? ""}</span>
                    </td>
                    <td>
                        <iconify-icon data-role="btn-detach-permission" class="text-danger fs-21 align-middle cursor-pointer" icon="iconamoon:trash-duotone">
                    </td>
                 </tr>`;
    };

    const getPermissionsByRole = (role_id, first_time = true) => {
        let h = ``;

        let data = {
            keyword: keyword_set_permissions,
            offset: offset_set_permissions
        };

        // if (first_time) {
        //     filter_url({
        //         keyword_set_permissions,
        //     });
        // }

        $(`[data-role="table-set-permissions"]`).addClass("loader");
        timerSetPermissions.start();

        isLoadingSetPermissions = true;
        $(`[data-role="loader-set-permissions"]`).show();

        $.get({
            url: get_permissions_by_role_route.replace('role_id', role_id),
            data,
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data?.list;
                    count_set_permissions = d?.data?.count || 0;

                    if (count_set_permissions) {
                        h += data.map((v, i) => trComponentSetPermissions(v, i)).join("");
                    } else {
                        h += tableMessage();
                    }

                    if (first_time) {
                        $(`[data-role="table-body-set-permissions"]`).html(h);
                        $(`[data-role="table-total-count-set-permissions"]`).html(count_set_permissions);
                    } else {
                        $(`[data-role="table-body-set-permissions"]`).append(h);
                    }
                } else {
                    $(`[data-role="table-body-set-permissions"]`).html(tableMessage("Məlumat Tapılmadı"));
                }
            },
            error: function (err) {
                $(`[data-role="table-body-set-permissions"]`).html(tableMessage("Internal Server Error"));
            },
            complete: function () {
                timerSetPermissions.stop();
                isLoadingSetPermissions = false;
                $(`[data-role="table-set-permissions"]`).removeClass("loader");
                $(`[data-role="loader-set-permissions"]`).hide();
                $(`[data-role="filter-apply-set-permissions"]`).prop("disabled", false);
                $(`[data-role="filter-reset-set-permissions"]`).prop("disabled", false);
            }
        });
    }

    let select_element_permissions = $(`[data-role="permissions"]`);
    const getPermissions = () => {
        let h = ``;
        select_element_permissions.prop("disabled", true).select2({
            width: '100%'
        });

        $.get({
            url: get_all_permissions_route,
            data: {
                only_dont_used: 1,
                role_id: selected_role_id
            },
            success: function (d) {
                if (d.code === 200) {
                    let data = d?.data?.list;
                    h += data.map((v, i) => `<option value="${v.id}">${v.label}</option>`).join('');
                } else if (d.code === 204) {
                    notify("Diqqət!", d.message, "error");
                }

                select_element_permissions.html(h);
            },
            error: function (err) {
                // console.log(err)
            },
            complete: function () {
                select_element_permissions.prop("disabled", false);
            }
        });
    }

    let selected_role_id = null;
    $(document).on("click", `[data-role="set-permissions"]`, function () {
        $(`[data-role="table-body-set-permissions"]`).html("");
        $(`[data-role="table-total-count-set-permissions"]`).html(0);
        selected_role_id = $(this).parents("tr").data("id");
        getPermissionsByRole(selected_role_id);
        getPermissions();
    });

    $(document).on("click", `[data-role="btn-detach-permission"]`, function () {
        if (!selected_role_id) {
            notify("Diqqət!", "Rol seçilməyib!", "warning");
        }

        let tr = $(this).closest("tr"),
            name = tr.find(`[data-row="name"]`).text()?.trim(),
            id = tr.data("id");

        Swal.fire({
            title: ` <b class="text-danger">${name}</b> icazəsini roldan çıxarmaq istədiyinizə əminsiniz?`,
            showDenyButton: true,
            confirmButtonText: "Bəli",
            denyButtonText: `Xeyr`
        }).then((result) => {
            if (result.isConfirmed) {
                $.post({
                    url: detach_permission_from_role_route.replace('role_id', selected_role_id).replace('permission_id', id),
                    data: {
                        id,
                        _method: "DELETE"
                    },
                    success: function (d) {
                        if ([201, 202].includes(d.code)) {
                            count_set_permissions--;
                            tr.remove();
                            $(`[data-parent-id="${id}"]`).remove();
                            $(`[data-role="table-total-count-set-permissions"]`).html(count_set_permissions);
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

    $(document).on("click", `[data-role="filter-apply-set-permissions"]`, function () {
        $(this).prop("disabled", true);
        setFilterFromPermissions();

        if (selected_role_id) {
            getPermissionsByRole(selected_role_id);
        }
    });

    $(document).on("click", `[data-role="filter-reset-set-permissions"]`, function () {
        $(this).prop("disabled", true);
        resetFilterFromPermissions();

        if (selected_role_id) {
            getPermissionsByRole(selected_role_id);
        }
    });

    $(document).on('hide.bs.modal', '#setPermissions', function () {
        selected_role_id = null;
        $(`#setRolePermissionsFilterIcon`).removeClass("active-filter");
        $(`#setRolePermissionsIcon`).removeClass("active-filter");
        $(`#setRolePermissionsFilter`).collapse("hide");
        $(`#setRolePermissions`).collapse("hide");
        $(`[data-role="keyword_set_permissions"]`).val("");
    });

    $(document).on("click", `[data-role="apply-set-permissions"]`, function () {
        if (!selected_role_id) {
            notify("Diqqət!", "Rol seçilməyib!", "warning");
        }

        let self = $(this),
            select_permission = $(`[data-role="permissions"]`),
            permission_ids = select_permission.val(),
            data = {permission_ids, _method: "PUT"};

        self.prop("disabled", true);
        $.post({
            url: role_set_permission_route.replace('role_id', selected_role_id),
            data,
            success: function (d) {
                if ([201, 202].includes(d.code)) {
                    notify(d.message, "", "success");
                    select_permission.val([]);
                    getPermissionsByRole(selected_role_id);
                    getPermissions();
                } else {
                    notify("Diqqət!", d.message, "warning");
                }
            },
            error: function (err) {
                if (err?.code === 500) {
                    notify("Xəta!", err.message, "error", "Ok");
                }
            },
            complete: function () {
                self.prop("disabled", false);
            }
        });
        console.log({permission_ids});
        //success olanda getPermissions() cagir
    });

    const icon_set_permissions_filter = document.querySelector('#setRolePermissionsFilterIcon'),
        collapse_set_permissions_filter = document.getElementById('setRolePermissionsFilter');
    activateFilterBtn(icon_set_permissions_filter, collapse_set_permissions_filter);

    const icon_set_permissions = document.querySelector('#setRolePermissionsIcon'),
        collapse_set_permissions = document.getElementById('setRolePermissions');
    activateFilterBtn(icon_set_permissions, collapse_set_permissions);

    $(window).on('scroll', function () {

        if (isLoadingSetPermissions || $(`[data-role="table-body-set-permissions"] tr`).length >= offset_set_permissions) return;
        offset_set_permissions = $(`[data-role="table-body-set-permissions"] tr`).length;

        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();
        const documentHeight = $(document).height();

        if (scrollTop + windowHeight + 100 >= documentHeight) {
            if (selected_role_id) {
                getPermissionsByRole(selected_role_id, false);
            }
        }
    });
});
