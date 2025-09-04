class SmartButton {
    constructor(options = {}) {
        this.options = {
            loadingText: 'Yüklənir...',
            successDuration: 2000,
            warningDuration: 2000,
            errorDuration: 3000,
            ...options
        };
        this.originalStates = new Map();
        this.addStyles();
    }

    addStyles() {
        if (document.getElementById('smart-button-styles')) return;

        const styles = `
            .smart-button-loading {
                background-color: #6c757d !important;
                color: #fff !important;
                opacity: 0.8 !important;
                cursor: not-allowed !important;
            }
            .smart-button-success {
                background-color: #28a745 !important;
                color: #fff !important;
                opacity: 1 !important;
            }
            .smart-button-warning {
                background-color: #ffc107 !important;
                color: #212529 !important;
                opacity: 1 !important;
            }
            .smart-button-error {
                background-color: #dc3545 !important;
                color: #fff !important;
                opacity: 1 !important;
            }
            .button-loader {
                display: inline-block;
                width: 16px;
                height: 16px;
                border: 2px solid rgba(255,255,255,0.3);
                border-radius: 50%;
                border-top-color: currentColor;
                animation: button-spin 1s linear infinite;
                margin-right: 8px;
            }
            @keyframes button-spin {
                to { transform: rotate(360deg); }
            }
        `;

        const styleElement = document.createElement('style');
        styleElement.id = 'smart-button-styles';
        styleElement.textContent = styles;
        document.head.appendChild(styleElement);
    }

    getElement(element) {
        if (element && element.jquery) {
            return element[0];
        }
        return element;
    }

    saveOriginalState(element) {
        const button = this.getElement(element);

        if (!button) {
            console.error('SmartButton: Button element tapılmadı!');
            return false;
        }

        if (!this.originalStates.has(button)) {
            this.originalStates.set(button, {
                text: button.innerHTML,
                disabled: false,
                className: button.className
            });
        }
        return true;
    }

    restoreOriginalState(element) {
        const button = this.getElement(element);

        if (!button) {
            console.error('SmartButton: Button element tapılmadı!');
            return false;
        }

        const original = this.originalStates.get(button);

        if (original) {
            button.innerHTML = original.text;
            button.disabled = false;
            button.className = original.className;

            this.originalStates.delete(button);
        }
        return true;
    }

    clearSmartClasses(button) {
        button.classList.remove('smart-button-loading', 'smart-button-success', 'smart-button-warning', 'smart-button-error');
    }

    setLoading(element, text = null) {
        const button = this.getElement(element);

        if (!button) {
            console.error('SmartButton: Button element tapılmadı!');
            return false;
        }

        if (this.getStatus(button) !== 'normal') {
            this.reset(button);
        }

        if (!this.saveOriginalState(button)) return false;

        const loadingText = text || this.options.loadingText;
        button.innerHTML = `<span class="button-loader"></span>${loadingText}`;
        button.disabled = true;

        this.clearSmartClasses(button);
        button.classList.add('smart-button-loading');

        return true;
    }

    setSuccess(element, text = 'Uğurla tamamlandı!', duration = null) {
        const button = this.getElement(element);

        if (!button) {
            console.error('SmartButton: Button element tapılmadı!');
            return false;
        }

        const successDuration = duration || this.options.successDuration;

        button.innerHTML = `✅ ${text}`;
        button.disabled = true;

        this.clearSmartClasses(button);
        button.classList.add('smart-button-success');

        const timeoutId = setTimeout(() => {
            this.restoreOriginalState(button);
        }, successDuration);

        button.dataset.smartTimeout = timeoutId;

        return true;
    }

    setWarning(element, text = 'Diqqət!', duration = null) {
        const button = this.getElement(element);

        if (!button) {
            console.error('SmartButton: Button element tapılmadı!');
            return false;
        }

        const warningDuration = duration || this.options.warningDuration;

        button.innerHTML = `⚠️ ${text}`;
        button.disabled = true;

        this.clearSmartClasses(button);
        button.classList.add('smart-button-warning');

        const timeoutId = setTimeout(() => {
            this.restoreOriginalState(button);
        }, warningDuration);

        button.dataset.smartTimeout = timeoutId;

        return true;
    }

    setError(element, text = 'Xəta baş verdi!', duration = null) {
        const button = this.getElement(element);

        if (!button) {
            console.error('SmartButton: Button element tapılmadı!');
            return false;
        }

        const errorDuration = duration || this.options.errorDuration;

        button.innerHTML = `❌ ${text}`;
        button.disabled = true;

        this.clearSmartClasses(button);
        button.classList.add('smart-button-error');

        const timeoutId = setTimeout(() => {
            this.restoreOriginalState(button);
        }, errorDuration);

        button.dataset.smartTimeout = timeoutId;

        return true;
    }

    reset(element) {
        const button = this.getElement(element);

        if (!button) {
            console.error('SmartButton: Button element tapılmadı!');
            return false;
        }

        if (button.dataset.smartTimeout) {
            clearTimeout(parseInt(button.dataset.smartTimeout));
            delete button.dataset.smartTimeout;
        }

        this.clearSmartClasses(button);
        const result = this.restoreOriginalState(button);

        return result;
    }

    getStatus(element) {
        const button = this.getElement(element);

        if (!button) return null;

        if (button.classList.contains('smart-button-loading')) return 'loading';
        if (button.classList.contains('smart-button-success')) return 'success';
        if (button.classList.contains('smart-button-warning')) return 'warning';
        if (button.classList.contains('smart-button-error')) return 'error';

        return 'normal';
    }

    isLoading(element) {
        const button = this.getElement(element);
        return button && button.classList.contains('smart-button-loading');
    }

    resetAll() {
        document.querySelectorAll('.smart-button-loading, .smart-button-success, .smart-button-warning, .smart-button-error').forEach(btn => {
            this.reset(btn);
        });
    }
}
