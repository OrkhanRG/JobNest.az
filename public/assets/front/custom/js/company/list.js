$(() => {
    let page = 1,
        limit = 24,
        isLoading = false,
        hasMore = true,
        keyword = $('[data-role="keyword"]').val().trim(),
        order = $('[data-role="order"]').val().trim();

    const container = $('#companies-container');
    const noResultsMessage = $('#no-results-message');

    const resetInitialParameters = () => {
        container.empty();
        noResultsMessage.hide();
        page = 1;
        hasMore = true;
        isLoading = false;
    }

    const createCompanyCard = (company) => {
        const logoUrl = public_path(company.logo ?? "assets/front/custom/images/companies/default.png");
        const detailUrl = route("front.company", {slug: company.slug});
        return `
            <div class="col-lg-3 col-md-3">
                <div class="twm-employer-grid-style1 mb-5">
                    <div class="twm-media">
                        <img src="${logoUrl}" alt="${company.name}">
                    </div>
                    <div class="twm-mid-content">
                        <a href="${detailUrl}" class="twm-job-title">
                            <h4>${company.name}</h4>
                        </a>
                        <p class="twm-job-address">
                            ${company.map_address || company.address ? `<i class="fas fa-location-arrow text-danger"></i>` : ``}
                            ${company.address || company.map_address || 'Ünvan qeyd edilməyib'}
                        </p>
                         ${company.industry ? `<i class="fas fa-industry text-primary"></i>` : ``}
                        <a href="${detailUrl}" class="twm-job-websites site-text-primary">${company.industry ? company.industry.label : 'Sənaye yoxdur'}</a>
                    </div>
                    <div class="twm-right-content">
                        <div class="twm-jobs-vacancies"><span>${ Math.floor(Math.random() * 101) }</span>Vakansiya</div>
                    </div>
                </div>
            </div>
        `;
    };

    const createSkeleton = () => {
        return `
            <div class="col-lg-3 col-md-3">
                <div class="twm-employer-grid-style1 mb-5 skeleton-card">
                    <div class="twm-media skeleton skeleton-img"></div>
                    <div class="twm-mid-content">
                        <div class="skeleton skeleton-title"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text-short"></div>
                    </div>
                </div>
            </div>
        `;
    };

    const showSkeletons = () => {
        let skeletons = '';
        for (let i = 0; i < limit; i++) {
            skeletons += createSkeleton();
        }
        container.append(skeletons);
    };

    const hideSkeletons = () => {
        container.find('.skeleton-card').parent().remove();
    };

    const loadCompanies = () => {
        if (isLoading || !hasMore) return;

        isLoading = true;
        noResultsMessage.hide();
        showSkeletons();

        $.ajax({
            url: route("front.companies.list"),
            type: 'GET',
            data: { page, limit, keyword, order },
            success: function(response) {
                hideSkeletons();
                if (response.data && response.data.list.length > 0) {
                    const companies = response.data.list;
                    companies.forEach(company => {
                        container.append(createCompanyCard(company));
                    });

                    const pagination = response.data.pagination;
                    if (pagination.current_page >= pagination.last_page) {
                        hasMore = false;
                    }
                    page++;
                } else {
                    hasMore = false;
                    if (page === 1) {
                        noResultsMessage.show();
                    }
                }
            },
            error: function(xhr) {
                hideSkeletons();
                if (xhr.status === 204) {
                    hasMore = false;
                    if (page === 1) {
                        noResultsMessage.show();
                    }
                } else {
                    console.error("Xəta baş verdi:", xhr.responseText);
                }
            },
            complete: function() {
                isLoading = false;
                checkPositionAndLoad();
            }
        });
    };

    let searchTimeout;
    $('[data-role="keyword"]').on('keyup', function() {
        clearTimeout(searchTimeout);
        const currentKeyword = $(this).val()?.trim();

        searchTimeout = setTimeout(() => {
            if (keyword !== currentKeyword) {
                keyword = currentKeyword;
                resetInitialParameters();
                filter_url({keyword})
                loadCompanies();
            }
        }, 500);
    });

    let orderTimeout;
    $(`[data-role="order"]`).on('change', function() {
        clearTimeout(orderTimeout);
        const currentOrder = $(this).val()?.trim();

        orderTimeout = setTimeout(() => {
            if (order !== currentOrder) {
                order = currentOrder;
                resetInitialParameters();
                filter_url({order})
                loadCompanies();
            }
        })
    })

    function checkPositionAndLoad() {
        if (isLoading || !hasMore) {
            return;
        }

        const footer = $('#page-footer');
        if (footer.length === 0) {
            return;
        }

        const footerTopPosition = footer.offset().top;
        const windowBottomPosition = $(window).scrollTop() + $(window).height();

        if (windowBottomPosition >= footerTopPosition - 200) {
            loadCompanies();
        }
    }

    $(window).on('scroll', checkPositionAndLoad);
    $(window).on('load', checkPositionAndLoad);

    loadCompanies();
});
