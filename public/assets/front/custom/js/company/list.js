const advancedScroller = new SmartInfinityScroll({
    apiUrl: '/companies/list',
    method: 'GET',
    headers: {
        'Authorization': 'Bearer your-token',
        'X-Custom-Header': 'value'
    },

    container: '#companies-container',
    scrollContainer: window,

    page: 1,
    perPage: 24,
    pageParam: 'page',
    limitParam: 'limit',

    extraParams: {
        keyword: 'test'
    },

    dynamicParams: () => {
        return {
            keyword: document.querySelector('#search-input')?.value || ''
        };
    },

    dataPath: 'data.list',
    countPath: 'data.count',

    triggerDistance: 100,
    minLoadTime: 1200,
    throttleDelay: 100,
    enableAnimation: true,
    itemDelay: 120,
    skeletonCount: 4,

    preloadPages: 1,
    enableCache: false,
    retryAttempts: 3,

    itemTemplate: (company, index) => {
        return `
            <div class="twm-employer-grid-style1 mb-5">
                <div class="twm-media">
                    <img src="${public_path(company.logo ?? "assets/front/custom/images/companies/default.png")}" alt="#">
                </div>
                <div class="twm-mid-content">
                    <a href="" class="twm-job-title">
                        <h4>${company.name}</h4>
                    </a>
                    <p class="twm-job-address">
                        ${company.map_address || company.address ? `<i class="fas fa-location-arrow text-danger"></i>` : ``}
                        ${company.map_address ?? company.address ?? ""}
                    </p>
                    ${company.industry ? `<i class="fas fa-industry text-primary"></i>` : ``}
                    <a href="" class="twm-job-websites site-text-primary">${company.industry ? company.industry.label : ""}</a>
                </div>
                <div class="twm-right-content">
                    <div class="twm-jobs-vacancies"><span>${Math.floor(Math.random() * 100) + 1}</span>Vakansiyalar</div>
                </div>
            </div>
        `;
    },

    skeletonTemplate: (index) => {
        return `
            <div class="col-lg-3 col-md-3 mb-4" style="padding-inline: 12px">
                <div class="company-skeleton-card">
                    <div class="skeleton-header">
                        <div class="skeleton-logo shimmer"></div>
                        <div class="skeleton-rating shimmer"></div>
                    </div>
                    <div class="skeleton-body">
                        <div class="skeleton-line skeleton-title shimmer"></div>
                        <div class="skeleton-line skeleton-address shimmer"></div>
                        <div class="skeleton-meta">
                            <div class="skeleton-badge shimmer"></div>
                            <div class="skeleton-size shimmer"></div>
                        </div>
                        <div class="skeleton-description">
                            <div class="skeleton-line shimmer"></div>
                            <div class="skeleton-line shimmer"></div>
                        </div>
                    </div>
                    <div class="skeleton-footer">
                        <div class="skeleton-vacancies shimmer"></div>
                        <div class="skeleton-actions shimmer"></div>
                    </div>
                </div>
            </div>
        `;
    },

    messages: {
        loading: 'Şirkətlər yüklənir...',
        finished: 'Bütün şirkətlər yükləndi',
        error: 'Şirkətlər yüklənərkən xəta baş verdi',
        retry: 'Yenidən cəhd et',
        empty: 'Heç bir şirkət tapılmadı'
    },

    onStart: (page, loadedCount) => {
        console.log(`📥 Səhifə ${page} yüklənir. Hazırda yüklənmiş: ${loadedCount}`);
        document.body.classList.add('infinity-loading');
    },

    onProgress: (item, currentIndex, totalCount) => {
        const progress = (currentIndex / totalCount) * 100;
        const progressBar = document.querySelector('#loading-progress');
        if (progressBar) {
            progressBar.style.width = `${progress}%`;
        }
    },

    onSuccess: (items, loadedCount, totalCount) => {
        console.log(`✅ ${items.length} şirkət yükləndi. Cəmi: ${loadedCount}/${totalCount}`);
        document.body.classList.remove('infinity-loading');
    },

    onError: (error, retryCount) => {
        console.error(`❌ Xəta: ${error.message}. Retry: ${retryCount}`);
    },

    onComplete: (loadedCount, totalCount) => {
        console.log(`🎉 Hamısı yükləndi: ${loadedCount}/${totalCount}`);
    },

    onEmpty: () => {
        console.log('📭 Heç bir şirkət tapılmadı');
    },

    debug: false
});
