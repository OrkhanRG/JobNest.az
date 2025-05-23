class AjaxTimer {
    constructor(displaySelector) {
        this.displayElement = document.querySelector(displaySelector);
        this.startTime = null;
        this.intervalId = null;
    }

    start() {
        this.startTime = performance.now();
        this.intervalId = setInterval(() => {
            const elapsed = (performance.now() - this.startTime) / 1000;
            this.displayElement.textContent = elapsed.toFixed(3);
        }, 50);
    }

    stop() {
        if (this.intervalId) {
            clearInterval(this.intervalId);
            this.intervalId = null;
        }
    }
}
