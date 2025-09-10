/**
 * Smart Infinity Scroll Library - Fixed Version
 * Universal infinity scroll kütüphanəsi - hər cür data üçün
 * Backend formatınıza uygun: {message:"", code:"", data: {list:[], count:""}}
 * Author: Assistant
 * Version: 2.1.0
 *
 * Fixes:
 * 1. Loading state protection - ajax bitmədən yeni sorğu getməz
 * 2. Extra parameters support - filter və digər parametrlər
 */

class SmartInfinityScroll {
    constructor(options = {}) {
        this.config = {
            container: '.infinity-container',
            apiUrl: null,
            method: 'GET',
            headers: {},

            page: 1,
            perPage: 8,
            pageParam: 'page',
            limitParam: 'limit',

            extraParams: {},
            dynamicParams: null,

            dataPath: 'data.list',
            countPath: 'data.count',

            itemTemplate: null,
            skeletonTemplate: null,

            triggerDistance: 200,
            scrollContainer: window,
            skeletonCount: 4,
            minLoadTime: 1000,

            enableAnimation: true,
            itemDelay: 120,

            preloadPages: 0,

            messages: {
                loading: 'Yüklənir...',
                finished: 'Bütün məlumatlar yükləndi',
                error: 'Xəta baş verdi',
                retry: 'Yenidən cəhd et',
                empty: 'Məlumat tapılmadı'
            },

            onStart: null,
            onProgress: null,
            onSuccess: null,
            onError: null,
            onComplete: null,
            onEmpty: null,

            throttleDelay: 100,
            retryAttempts: 3,
            enableCache: false,
            debug: false
        };

        this.config = { ...this.config, ...options };

        this.isLoading = false;
        this.hasMore = true;
        this.currentPage = this.config.page;
        this.totalCount = 0;
        this.loadedCount = 0;
        this.allData = [];
        this.retryCount = 0;
        this.cache = new Map();

        this.loadingPromise = null;
        this.lastScrollTime = 0;
        this.scrollCooldown = 100;
        this.newItemElements = null;

        this.container = null;
        this.skeletonContainer = null;
        this.scrollContainer = null;

        this.scrollTicking = false;
        this.resizeObserver = null;

        this.init();
    }

    /**
     * Initialize library
     */
    init() {
        this.log('🚀 SmartInfinityScroll starting...');

        try {
            this.validateConfig();
            this.setupDOM();
            this.bindEvents();
            this.injectStyles();
            this.preloadData();

            this.log('✅ SmartInfinityScroll hazırdır!');
        } catch (error) {
            this.log('❌ Initialization error:', error);
            throw error;
        }
    }

    /**
     * Validate required configuration
     */
    validateConfig() {
        if (!this.config.apiUrl) {
            throw new Error('❌ API URL məcburidur!');
        }

        if (!this.config.itemTemplate || typeof this.config.itemTemplate !== 'function') {
            throw new Error('❌ itemTemplate function məcburidur!');
        }
    }

    /**
     * Setup DOM elements
     */
    setupDOM() {
        this.container = document.querySelector(this.config.container);
        if (!this.container) {
            throw new Error(`❌ Container tapılmadı: ${this.config.container}`);
        }

        this.scrollContainer = this.config.scrollContainer === window
            ? window
            : document.querySelector(this.config.scrollContainer);

        this.createSkeletonContainer();

        if (this.scrollContainer !== window) {
            this.scrollContainer.classList.add('infinity-scroll-container');
        }
    }

    /**
     * Create skeleton loading container
     */
    createSkeletonContainer() {
        this.skeletonContainer = document.createElement('div');
        this.skeletonContainer.className = 'infinity-skeleton-container';
        this.skeletonContainer.style.display = 'none';
        this.container.parentNode.appendChild(this.skeletonContainer);
    }

    /**
     * Bind events
     */
    bindEvents() {
        this.bindScrollEvent();
        this.setupResizeObserver();

        document.addEventListener('visibilitychange', () => {
            if (document.visibilityState === 'visible' && this.hasMore && !this.isLoading) {
                this.checkScrollPosition();
            }
        });
    }

    /**
     * Bind scroll event with advanced throttling
     */
    bindScrollEvent() {
        const scrollHandler = () => {
            if (!this.scrollTicking) {
                requestAnimationFrame(() => {
                    this.handleScroll();
                    this.scrollTicking = false;
                });
                this.scrollTicking = true;
            }
        };

        let throttleTimer = null;
        const throttledHandler = () => {
            if (throttleTimer) return;
            throttleTimer = setTimeout(() => {
                scrollHandler();
                throttleTimer = null;
            }, this.config.throttleDelay);
        };

        if (this.scrollContainer === window) {
            window.addEventListener('scroll', throttledHandler, { passive: true });
            window.addEventListener('resize', throttledHandler, { passive: true });
        } else {
            this.scrollContainer.addEventListener('scroll', throttledHandler, { passive: true });
        }
    }

    /**
     * Setup resize observer
     */
    setupResizeObserver() {
        if ('ResizeObserver' in window) {
            this.resizeObserver = new ResizeObserver(() => {
                this.checkScrollPosition();
            });
            this.resizeObserver.observe(this.container);
        }
    }

    /**
     * Handle scroll event
     */
    handleScroll() {
        const now = Date.now();

        if (now - this.lastScrollTime < this.scrollCooldown) {
            return;
        }

        this.lastScrollTime = now;
        this.checkScrollPosition();
    }

    /**
     * Check scroll position and trigger load
     */
    checkScrollPosition() {
        if (this.isLoading || !this.hasMore || this.loadingPromise) {
            this.log('🚫 Loading blocked:', {
                isLoading: this.isLoading,
                hasMore: this.hasMore,
                loadingPromise: !!this.loadingPromise
            });
            return;
        }

        const { bottom } = this.container.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        if (bottom <= windowHeight + this.config.triggerDistance) {
            this.log('🔄 Scroll trigger activated - loading more data');
            this.loadMoreData();
        }
    }

    /**
     * Preload initial data
     */
    async preloadData() {
        if (this.config.preloadPages > 0) {
            for (let i = 0; i < this.config.preloadPages; i++) {
                await this.loadMoreData();
                if (!this.hasMore) break;
            }
        }
    }

    /**
     * Main infinity scroll function - FİXED VERSION
     */
    async loadMoreData() {
        if (this.isLoading || !this.hasMore || this.loadingPromise) {
            this.log('🚫 Load more blocked - already loading or no more data');
            return;
        }

        this.log(`📥 Loading page ${this.currentPage}...`);

        this.isLoading = true;
        this.retryCount = 0;

        this.loadingPromise = this.performLoad();

        if (this.config.onStart) {
            this.config.onStart(this.currentPage, this.loadedCount);
        }

        try {
            await this.loadingPromise;
        } finally {
            this.loadingPromise = null;
            this.isLoading = false;
        }
    }

    /**
     * Perform the actual loading with retry logic - IMPROVED
     */
    async performLoad() {
        try {
            this.showSkeleton();

            const startTime = Date.now();

            let response;
            const cacheKey = this.getCacheKey();

            if (this.config.enableCache && this.cache.has(cacheKey)) {
                this.log('📦 Loading from cache');
                response = this.cache.get(cacheKey);
                await this.delay(500);
            } else {
                response = await this.fetchData();

                if (this.config.enableCache) {
                    this.cache.set(cacheKey, response);
                }
            }

            const elapsed = Date.now() - startTime;
            if (elapsed < this.config.minLoadTime) {
                await this.delay(this.config.minLoadTime - elapsed);
            }

            await this.processResponse(response);

        } catch (error) {
            this.log('❌ Load error:', error);
            await this.handleLoadError(error);
        } finally {
            this.hideSkeleton();
        }
    }

    /**
     * Generate cache key including extra parameters
     */
    getCacheKey() {
        const extraParams = this.buildExtraParams();
        const paramsString = JSON.stringify(extraParams);
        return `page_${this.currentPage}_${btoa(paramsString)}`;
    }

    /**
     * Build extra parameters - YENİ METOD
     */
    buildExtraParams() {
        let params = { ...this.config.extraParams };

        if (this.config.dynamicParams && typeof this.config.dynamicParams === 'function') {
            const dynamicParams = this.config.dynamicParams();
            params = { ...params, ...dynamicParams };
        }

        return params;
    }

    /**
     * Handle load error with retry logic
     */
    async handleLoadError(error) {
        this.retryCount++;

        if (this.retryCount < this.config.retryAttempts) {
            this.log(`🔄 Retrying... Attempt ${this.retryCount + 1}/${this.config.retryAttempts}`);
            await this.delay(1000 * this.retryCount);
            await this.performLoad();
        } else {
            if (this.config.onError) {
                this.config.onError(error, this.retryCount);
            }
        }
    }

    /**
     * Fetch data from API - IMPROVED with extra params
     */
    async fetchData() {
        const params = new URLSearchParams({
            [this.config.pageParam]: this.currentPage,
            [this.config.limitParam]: this.config.perPage
        });

        const extraParams = this.buildExtraParams();
        Object.entries(extraParams).forEach(([key, value]) => {
            if (value !== null && value !== undefined && value !== '') {
                if (Array.isArray(value)) {
                    value.forEach(item => params.append(`${key}[]`, item));
                } else {
                    params.append(key, value);
                }
            }
        });

        const url = `${this.config.apiUrl}?${params.toString()}`;
        this.log(`🌐 Fetching: ${url}`);

        const response = await fetch(url, {
            method: this.config.method,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                ...this.config.headers
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }

        const data = await response.json();
        this.log('📨 Response received:', data);

        return data;
    }

    /**
     * Process API response
     */
    async processResponse(response) {
        const items = this.getNestedValue(response, this.config.dataPath) || [];
        const totalCount = this.getNestedValue(response, this.config.countPath) || 0;

        this.log(`📊 Found ${items.length} items, total: ${totalCount}`);

        this.totalCount = totalCount;
        this.allData.push(...items);

        this.checkHasMore(items);

        if (items.length === 0 && this.loadedCount === 0) {
            this.handleEmpty();
            return;
        }

        if (items.length > 0) {
            await this.renderItemsWithAnimation(items);
            this.loadedCount += items.length;
            this.currentPage++;

            if (this.config.onProgress) {
                items.forEach((item, index) => {
                    this.config.onProgress(item, this.loadedCount - items.length + index + 1, this.totalCount);
                });
            }

            if (this.config.onSuccess) {
                this.config.onSuccess(items, this.loadedCount, this.totalCount);
            }
        }

        if (!this.hasMore) {
            this.handleComplete();
        }

        setTimeout(() => {
            this.checkScrollPosition();
        }, 100);
    }

    /**
     * Get nested object value by path
     */
    getNestedValue(obj, path) {
        return path.split('.').reduce((current, key) => current?.[key], obj);
    }

    /**
     * Check if has more data to load
     */
    checkHasMore(items) {
        this.hasMore = items.length === this.config.perPage &&
            this.loadedCount + items.length < this.totalCount;

        this.log(`🔍 Has more data: ${this.hasMore}`);
    }

    /**
     * Render items with smooth staggered animation
     */
    async renderItemsWithAnimation(items) {
        const fragment = document.createDocumentFragment();
        const itemElements = [];

        items.forEach((item, index) => {
            const element = this.createItemElement(item, this.loadedCount + index);
            element.classList.add("col-lg-3", "col-md-3");

            if (this.config.enableAnimation) {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px) scale(0.95)';
                element.style.transition = 'all 0.6s cubic-bezier(0.4, 0.0, 0.2, 1)';
            }

            fragment.appendChild(element);
            itemElements.push(element);
        });

        this.container.appendChild(fragment);

        if (this.config.enableAnimation) {
            await this.staggerAnimation(itemElements);
        }
    }

    /**
     * Create single item element
     */
    createItemElement(item, index) {
        const wrapper = document.createElement('div');
        wrapper.className = 'infinity-item';
        wrapper.innerHTML = this.config.itemTemplate(item, index);
        return wrapper;
    }

    /**
     * Staggered animation for items
     */
    async staggerAnimation(elements) {
        return new Promise(resolve => {
            elements.forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0) scale(1)';

                    if (index === elements.length - 1) {
                        setTimeout(resolve, 600);
                    }
                }, index * this.config.itemDelay);
            });

            if (elements.length === 0) resolve();
        });
    }

    /**
     * Show skeleton loading
     */
    showSkeleton() {
        if (this.config.skeletonTemplate) {
            let html = '';
            for (let i = 0; i < this.config.skeletonCount; i++) {
                html += this.config.skeletonTemplate(i);
            }
            this.skeletonContainer.innerHTML = html;
        } else {
            this.skeletonContainer.innerHTML = this.getDefaultSkeleton();
        }

        this.skeletonContainer.style.display = 'flex';
        setTimeout(() => this.skeletonContainer.classList.add('show'), 50);
    }

    /**
     * Hide skeleton loading
     */
    hideSkeleton() {
        this.skeletonContainer.classList.remove('show');
        setTimeout(() => {
            this.skeletonContainer.style.display = 'none';
        }, 300);
    }

    /**
     * Default skeleton HTML
     */
    getDefaultSkeleton() {
        let html = '<div class="skeleton-grid">';
        for (let i = 0; i < this.config.skeletonCount; i++) {
            html += `
                <div class="skeleton-item">
                    <div class="skeleton-avatar shimmer"></div>
                    <div class="skeleton-content">
                        <div class="skeleton-line skeleton-line-lg shimmer"></div>
                        <div class="skeleton-line skeleton-line-md shimmer"></div>
                        <div class="skeleton-line skeleton-line-sm shimmer"></div>
                    </div>
                </div>
            `;
        }
        html += '</div>';
        return html;
    }

    /**
     * Handle empty data
     */
    handleEmpty() {
        this.showStatusMessage('empty', this.config.messages.empty, 'info-circle');

        if (this.config.onEmpty) {
            this.config.onEmpty();
        }
    }

    /**
     * Handle completion
     */
    handleComplete() {
        this.showStatusMessage('complete', this.config.messages.finished, 'check-circle');

        if (this.config.onComplete) {
            this.config.onComplete(this.loadedCount, this.totalCount);
        }

        this.log('🎉 Infinity scroll completed successfully');
    }

    /**
     * Show error message with retry
     */
    showErrorMessage() {
        const errorEl = this.createStatusElement('error', this.config.messages.error, 'exclamation-triangle');

        const retryBtn = document.createElement('button');
        retryBtn.className = 'infinity-retry-btn';
        retryBtn.innerHTML = `<i class="fa fa-refresh"></i> ${this.config.messages.retry}`;
        retryBtn.onclick = () => {
            errorEl.remove();
            this.loadMoreData();
        };

        errorEl.querySelector('.infinity-status-content').appendChild(retryBtn);
        this.container.parentNode.appendChild(errorEl);

        setTimeout(() => errorEl.classList.add('show'), 100);
    }

    /**
     * Show status message (complete, empty, etc.)
     */
    showStatusMessage(type, message, icon) {
        const statusEl = this.createStatusElement(type, message, icon);

        if (type === 'complete') {
            const stats = document.createElement('p');
            stats.className = 'infinity-stats';
            stats.textContent = `yüklənən məlumat sayı: ${this.loadedCount}`;
            statusEl.querySelector('.infinity-status-content').appendChild(stats);
        }

        this.container.parentNode.appendChild(statusEl);
        setTimeout(() => statusEl.classList.add('show'), 100);
    }

    /**
     * Create status element
     */
    createStatusElement(type, message, icon) {
        const element = document.createElement('div');
        element.className = `infinity-status infinity-status-${type}`;
        element.innerHTML = `
            <div class="infinity-status-content">
                <i class="fa fa-${icon} infinity-status-icon"></i>
                <h4>${message}</h4>
            </div>
        `;
        return element;
    }

    /**
     * Public API Methods
     */

    /**
     * YENİ: Set extra parameters və refresh
     */
    setExtraParams(params, refresh = true) {
        this.config.extraParams = { ...params };
        this.log('⚙️ Extra params updated:', params);

        if (refresh) {
            this.refresh();
        }
    }

    /**
     * YENİ: Add single extra parameter
     */
    setParam(key, value, refresh = true) {
        this.config.extraParams[key] = value;
        this.log(`⚙️ Param updated: ${key} = ${value}`);

        if (refresh) {
            this.refresh();
        }
    }

    /**
     * YENİ: Remove extra parameter
     */
    removeParam(key, refresh = true) {
        delete this.config.extraParams[key];
        this.log(`⚙️ Param removed: ${key}`);

        if (refresh) {
            this.refresh();
        }
    }

    /**
     * YENİ: Set dynamic params function
     */
    setDynamicParams(fn) {
        if (typeof fn === 'function') {
            this.config.dynamicParams = fn;
            this.log('⚙️ Dynamic params function set');
        }
    }

    /**
     * YENİ: Get current parameters (static + dynamic)
     */
    getCurrentParams() {
        return this.buildExtraParams();
    }

    /**
     * YENİ: Refresh - parametr dəyişiklikləri üçün
     */
    refresh() {
        this.log('🔄 Refreshing with new parameters...');

        this.isLoading = false;
        this.loadingPromise = null;

        this.container.innerHTML = '';

        this.container.parentNode.querySelectorAll('.infinity-status').forEach(el => el.remove());

        this.currentPage = this.config.page;
        this.loadedCount = 0;
        this.totalCount = 0;
        this.allData = [];
        this.hasMore = true;
        this.retryCount = 0;

        this.cache.clear();

        this.preloadData();
    }

    /**
     * Reset and start over
     */
    reset() {
        this.log('🔄 Resetting infinity scroll...');

        this.container.innerHTML = '';

        this.container.parentNode.querySelectorAll('.infinity-status').forEach(el => el.remove());

        this.currentPage = this.config.page;
        this.loadedCount = 0;
        this.totalCount = 0;
        this.allData = [];
        this.hasMore = true;
        this.isLoading = false;
        this.loadingPromise = null;
        this.retryCount = 0;

        this.cache.clear();

        this.preloadData();
    }

    /**
     * Force load more (manual trigger) - IMPROVED
     */
    forceLoad() {
        this.log('🔥 Force loading triggered');
        if (!this.hasMore) {
            this.log('🚫 Force load cancelled - no more data');
            return;
        }
        this.loadMoreData();
    }

    /**
     * Get all loaded data
     */
    getAllData() {
        return [...this.allData];
    }

    /**
     * Get current stats
     */
    getStats() {
        return {
            loaded: this.loadedCount,
            total: this.totalCount,
            currentPage: this.currentPage,
            hasMore: this.hasMore,
            isLoading: this.isLoading,
            cacheSize: this.cache.size,
            currentParams: this.getCurrentParams()
        };
    }

    /**
     * Update configuration dynamically
     */
    updateConfig(newConfig) {
        this.config = { ...this.config, ...newConfig };
        this.log('⚙️ Configuration updated:', newConfig);
    }

    /**
     * Pause infinity scroll
     */
    pause() {
        this.hasMore = false;
        this.log('⏸️ Infinity scroll paused');
    }

    /**
     * Resume infinity scroll
     */
    resume() {
        this.hasMore = true;
        this.checkScrollPosition();
        this.log('▶️ Infinity scroll resumed');
    }

    /**
     * Destroy instance and cleanup
     */
    destroy() {
        this.isLoading = false;
        this.loadingPromise = null;

        if (this.resizeObserver) {
            this.resizeObserver.disconnect();
        }

        this.cache.clear();

        if (this.skeletonContainer) {
            this.skeletonContainer.remove();
        }

        this.container.parentNode.querySelectorAll('.infinity-status').forEach(el => el.remove());

        this.log('🗑️ SmartInfinityScroll destroyed');
    }

    /**
     * Utility methods
     */
    delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    log(...args) {
        if (this.config.debug) {
            console.log('[SmartInfinityScroll]', ...args);
        }
    }

    /**
     * Inject required CSS styles
     */
    injectStyles() {
        if (document.querySelector('#smart-infinity-scroll-styles')) return;

        const styles = `
        <style id="smart-infinity-scroll-styles">
        /* Smart Infinity Scroll Styles */
        .infinity-scroll-container {
            overflow-y: auto;
            height: 100%;
        }

        .infinity-skeleton-container {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        .infinity-skeleton-container.show {
            opacity: 1;
            transform: translateY(0);
            display: flex;
            flex-wrap: wrap;
        }

        .skeleton-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin: 24px 0;
        }

        .skeleton-item {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 16px;
            border: 1px solid #f3f4f6;
        }

        .skeleton-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #e5e7eb;
            flex-shrink: 0;
        }

        .skeleton-content {
            flex: 1;
        }

        .skeleton-line {
            height: 12px;
            background: #e5e7eb;
            border-radius: 6px;
            margin-bottom: 12px;
        }

        .skeleton-line-lg { width: 100%; }
        .skeleton-line-md { width: 75%; }
        .skeleton-line-sm { width: 50%; }

        .shimmer {
            background: linear-gradient(90deg, #e5e7eb 25%, #f3f4f6 50%, #e5e7eb 75%);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .infinity-status {
            margin: 40px 0;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        .infinity-status.show {
            opacity: 1;
            transform: translateY(0);
        }

        .infinity-status-content {
            text-align: center;
            padding: 48px 24px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .infinity-status-error .infinity-status-content {
            border-left: 4px solid #ef4444;
        }

        .infinity-status-complete .infinity-status-content {
            border-left: 4px solid #10b981;
        }

        .infinity-status-empty .infinity-status-content {
            border-left: 4px solid #3b82f6;
        }

        .infinity-status-icon {
            font-size: 3rem;
            margin-bottom: 16px;
            color: #6b7280;
        }

        .infinity-status-error .infinity-status-icon { color: #ef4444; }
        .infinity-status-complete .infinity-status-icon { color: #10b981; }
        .infinity-status-empty .infinity-status-icon { color: #3b82f6; }

        .infinity-status h4 {
            margin: 0 0 12px 0;
            color: #1f2937;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .infinity-stats {
            color: #6b7280;
            margin: 12px 0 0 0;
            font-size: 0.875rem;
        }

        .infinity-retry-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            margin-top: 20px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .infinity-retry-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 15px -1px rgba(59, 130, 246, 0.4);
        }

        .infinity-retry-btn:active {
            transform: translateY(0);
        }

        .infinity-item {
            transition: all 0.6s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .skeleton-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .skeleton-item {
                padding: 16px;
            }

            .skeleton-avatar {
                width: 48px;
                height: 48px;
            }

            .infinity-status-content {
                padding: 32px 16px;
            }

            .infinity-status-icon {
                font-size: 2.5rem;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Performance optimizations */
        .infinity-item * {
            will-change: transform, opacity;
        }

        @media (prefers-reduced-motion: reduce) {
            .infinity-item {
                transition: none;
            }

            .shimmer {
                animation: none;
            }
        }
        </style>
        `;

        document.head.insertAdjacentHTML('beforeend', styles);
    }
}

window.SmartInfinityScroll = SmartInfinityScroll;

document.addEventListener('DOMContentLoaded', function() {
    const autoElements = document.querySelectorAll('[data-infinity-scroll]');

    autoElements.forEach(element => {
        const config = {
            container: element,
            apiUrl: element.dataset.apiUrl,
            perPage: parseInt(element.dataset.perPage) || 8,
            triggerDistance: parseInt(element.dataset.triggerDistance) || 200
        };

        if (config.apiUrl) {
            console.log('🔄 Auto-initializing SmartInfinityScroll for:', element);
            new SmartInfinityScroll(config);
        }
    });
});
