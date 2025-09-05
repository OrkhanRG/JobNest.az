$('#sign_up_popup2, #sign_up_popup').on('hidden.bs.modal', function () {
    const modal = $(this);
    modal.find(".is-invalid").removeClass("is-invalid");
    modal.find(".invalid-feedback").remove();
});

class CustomTabs {
    constructor(selector) {
        this.tabContainer = document.querySelector(selector);
        if (!this.tabContainer) return;

        this.tabButtons = this.tabContainer.querySelectorAll('.custom-tab-btn');
        this.tabPanes = this.tabContainer.querySelectorAll('.custom-tab-pane');

        this.init();
    }

    init() {
        this.tabButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const targetTab = e.currentTarget.getAttribute('data-tab');
                this.switchTab(targetTab);
            });
        });
    }

    switchTab(targetTab) {
        // Remove active class from all buttons and panes
        this.tabButtons.forEach(btn => btn.classList.remove('active'));
        this.tabPanes.forEach(pane => pane.classList.remove('active'));

        // Add active class to clicked button
        const activeButton = this.tabContainer.querySelector(`[data-tab="${targetTab}"]`);
        const activePane = this.tabContainer.querySelector(`#${targetTab}`);

        if (activeButton && activePane) {
            activeButton.classList.add('active');
            activePane.classList.add('active');
        }
    }

    // Method to switch tab programmatically
    setActiveTab(tabId) {
        this.switchTab(tabId);
    }

    // Method to get current active tab
    getActiveTab() {
        const activeButton = this.tabContainer.querySelector('.custom-tab-btn.active');
        return activeButton ? activeButton.getAttribute('data-tab') : null;
    }
}

// Initialize tabs when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize the tabs
    const profileTabs = new CustomTabs('#profileTabs');
});
