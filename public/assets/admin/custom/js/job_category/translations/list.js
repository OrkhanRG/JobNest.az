$(function () {
    let keyword,
        job_category_id,
        lang_id;

    let offset = 0,
        count = 0,
        isLoading = false;

    const timer = new AjaxTimer(`[data-role="table-total-time"]`);

    $(`[data-role="lang_id"], [data-role="job_category_id"]`).select2({
        width: '100%',
    });

    const setFilter = () => {
        offset = 0;
        keyword = $(`[data-role="keyword"]`).val()?.trim();
        job_category_id = $(`[data-role="job_category_id"]`).val()?.trim();
        lang_id = $(`[data-role="lang_id"]`).val()?.trim();
    }

    const resetFilter = () => {
        offset = 0;
        keyword = "";
        job_category_id = "";
        lang_id = "";

        $(`[data-role="keyword"]`).val(keyword);
        $(`[data-role="job_category_id"]`).val(job_category_id).trigger("change");
        $(`[data-role="lang_id"]`).val(lang_id).trigger("change");
    }

    const loadFilter = () => {
        keyword = getUrlParameter('keyword') ?? "";
        job_category_id = getUrlParameter('job_category_id') ?? "";
        lang_id = getUrlParameter('lang_id') ?? "";

        if (keyword) {
            $(`[data-role="keyword"]`).val(keyword);
        }

        if (+lang_id) {
            $(`[data-role="lang_id"]`).val(lang_id).trigger("change");
        }

        if (+job_category_id) {
            $(`[data-role="job_category_id"]`).val(job_category_id).trigger("change");
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
                        ${d?.job_category?.name ?? ""}
                    </td>
                    <td>
                        <span class="fi fi-${d?.language?.code === "en" ? "us" : d?.language?.code} fs-20" title="${d?.language?.native_name ?? ""}"></span>
                    </td>
                    <td width="100px" class="text-end">
                        <a href="${job_category_translation_edit_route.replace('job_category_translation_id', d.id)}">
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
            job_category_id,
            lang_id,
            offset
        };

        if (first_time) {
            filter_url({
                keyword,
                job_category_id,
                lang_id
            });
        }

        $(`[data-role="table"]`).addClass("loader");
        timer.start();

        isLoading = true;
        $(`[data-role="loader"]`).show();

        $.get({
            url: job_category_translation_route,
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
            title: ` <b class="text-danger">${key}</b> tərcüməsini silmək istədiyinizə əminsiniz?`,
            showDenyButton: true,
            confirmButtonText: "Sil",
            denyButtonText: `İmtina`
        }).then((result) => {
            if (result.isConfirmed) {
                $.post({
                    url: job_category_translation_delete_route.replace('job_category_translation_id', id),
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
