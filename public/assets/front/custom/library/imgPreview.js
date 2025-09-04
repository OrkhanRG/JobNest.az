/**
 * ImagePreview - Şəkil preview və upload funksiyaları üçün helper
 *
 * İstifadə nümunəsi:
 * const imageHelper = new ImagePreview();
 *
 * // Tək bir input üçün
 * imageHelper.init('logo');
 *
 * // Önceden yüklenmiş resimle birlikte
 * imageHelper.init('logo', {
 *   existingImage: '/storage/logos/logo.png',
 *   existingImageName: 'logo.png',
 *   existingImageSize: '125KB'
 * });
 *
 * // Bir neçə input üçün existing images ile
 * imageHelper.initMultiple([
 *   {
 *     id: 'logo',
 *     existingImage: '/storage/logos/logo.png',
 *     existingImageName: 'logo.png'
 *   },
 *   {
 *     id: 'background',
 *     existingImage: '/storage/backgrounds/bg.jpg'
 *   }
 * ]);
 */
class ImagePreview {
    constructor(options = {}) {
        this.defaultOptions = {
            acceptTypes: 'image/*',
            maxFileSize: 5 * 1024 * 1024, // 5MB
            showFileInfo: true,
            enableDragDrop: true,
            animationDuration: 300,
            onUpload: null,
            onRemove: null,
            onError: null,
            existingImage: null,
            existingImageName: null,
            existingImageSize: null
        };

        this.options = { ...this.defaultOptions, ...options };
        this.initialized = [];
    }

    init(inputId, customOptions = {}) {
        const options = { ...this.options, ...customOptions };

        if (this.initialized.includes(inputId)) {
            console.warn(`ImagePreview: ${inputId} artıq initialize edilib`);
            return;
        }

        const input = document.getElementById(inputId);
        if (!input) {
            console.error(`ImagePreview: ${inputId} tapılmadı`);
            return;
        }

        this._setupInput(inputId, options);

        if (options.existingImage) {
            this._showExistingImage(inputId, options);
        }

        this.initialized.push(inputId);
    }

    initMultiple(inputConfigs, globalOptions = {}) {
        inputConfigs.forEach(config => {
            if (typeof config === 'string') {
                this.init(config, globalOptions);
            } else {
                const { id, ...specificOptions } = config;
                const mergedOptions = { ...globalOptions, ...specificOptions };
                this.init(id, mergedOptions);
            }
        });
    }

    _showExistingImage(inputId, options) {
        const preview = document.getElementById(`${inputId}-preview`);
        const image = document.getElementById(`${inputId}-image`);

        if (!preview || !image) {
            console.error(`Preview elementləri tapılmadı: ${inputId}-preview, ${inputId}-image`);
            return;
        }

        const img = new Image();
        img.onload = () => {
            image.src = options.existingImage;

            if (options.showFileInfo) {
                const nameDiv = document.getElementById(`${inputId}-name`);
                const sizeDiv = document.getElementById(`${inputId}-size`);

                if (nameDiv && options.existingImageName) {
                    nameDiv.textContent = options.existingImageName;
                }
                if (sizeDiv && options.existingImageSize) {
                    sizeDiv.textContent = options.existingImageSize;
                } else if (sizeDiv) {
                    sizeDiv.textContent = 'Mövcud şəkil';
                }
            }

            preview.classList.add('show');
            preview.style.display = 'block';
        };

        img.onerror = () => {
            console.warn(`Existing image yükləmə xətası: ${options.existingImage}`);
        };

        img.src = options.existingImage;
    }

    _setupInput(inputId, options) {
        const input = document.getElementById(inputId);

        // File input change event
        input.addEventListener('change', (e) => {
            this._handleImagePreview(e, inputId, options);
        });

        // Drag and drop funksiyası
        if (options.enableDragDrop) {
            this._setupDragDrop(inputId, options);
        }

        // Global remove function yaradır
        if (!window.removeImage) {
            window.removeImage = (type) => this._removeImage(type, options);
        }
    }

    _setupDragDrop(inputId, options) {
        const input = document.getElementById(inputId);
        const uploadArea = input.previousElementSibling;

        if (!uploadArea || !uploadArea.classList.contains('upload-area')) {
            return;
        }

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, this._preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => {
                uploadArea.classList.add('dragover');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => {
                uploadArea.classList.remove('dragover');
            }, false);
        });

        uploadArea.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                input.files = files;
                this._handleImagePreview({target: {files: files}}, inputId, options);
            }
        }, false);
    }

    _preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    _handleImagePreview(event, inputId, options) {
        const file = event.target.files[0];

        if (!file) return;

        if (!file.type.startsWith('image/')) {
            this._handleError('Yalnız şəkil faylları qəbul edilir', options);
            return;
        }

        if (file.size > options.maxFileSize) {
            this._handleError(`Fayl ölçüsü ${this._formatFileSize(options.maxFileSize)}-dan çox ola bilməz`, options);
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            this._showPreview(inputId, file, e.target.result, options);

            if (options.onUpload && typeof options.onUpload === 'function') {
                options.onUpload(file, inputId);
            }
        };
        reader.readAsDataURL(file);
    }

    _showPreview(inputId, file, imageSrc, options) {
        const preview = document.getElementById(`${inputId}-preview`);
        const image = document.getElementById(`${inputId}-image`);

        if (!preview || !image) {
            console.error(`Preview elementləri tapılmadı: ${inputId}-preview, ${inputId}-image`);
            return;
        }

        image.src = imageSrc;

        if (options.showFileInfo) {
            const nameDiv = document.getElementById(`${inputId}-name`);
            const sizeDiv = document.getElementById(`${inputId}-size`);

            if (nameDiv) nameDiv.textContent = file.name;
            if (sizeDiv) sizeDiv.textContent = this._formatFileSize(file.size);
        }

        preview.style.display = 'block';
        preview.classList.add('show');
    }

    _removeImage(inputId, options) {
        const preview = document.getElementById(`${inputId}-preview`);
        const input = document.getElementById(inputId);
        const image = document.getElementById(`${inputId}-image`);

        if (!preview || !input || !image) return;

        preview.classList.remove('show');
        input.value = '';
        image.src = '';

        preview.style.animation = `fadeOutDown ${options.animationDuration}ms ease`;
        setTimeout(() => {
            preview.style.display = 'none';
            preview.style.animation = '';
        }, options.animationDuration);

        if (options.onRemove && typeof options.onRemove === 'function') {
            options.onRemove(inputId);
        }
    }

    _handleError(message, options) {
        if (options.onError && typeof options.onError === 'function') {
            options.onError(message);
        } else {
            alert(message);
        }
    }

    _formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    setExistingImage(inputId, imagePath, imageName = null, imageSize = null) {
        const options = {
            existingImage: imagePath,
            existingImageName: imageName,
            existingImageSize: imageSize,
            showFileInfo: this.options.showFileInfo
        };

        this._showExistingImage(inputId, options);
    }

    reset() {
        this.initialized = [];

        // Global removeImage function-u sil
        if (window.removeImage) {
            delete window.removeImage;
        }
    }

    getFileInfo(inputId) {
        const input = document.getElementById(inputId);
        if (!input || !input.files || !input.files[0]) {
            return null;
        }

        const file = input.files[0];
        return {
            name: file.name,
            size: file.size,
            sizeFormatted: this._formatFileSize(file.size),
            type: file.type,
            lastModified: file.lastModified
        };
    }

    getAllFilesInfo() {
        const filesInfo = {};
        this.initialized.forEach(inputId => {
            filesInfo[inputId] = this.getFileInfo(inputId);
        });
        return filesInfo;
    }

    hasPreview(inputId) {
        const preview = document.getElementById(`${inputId}-preview`);
        return preview && preview.classList.contains('show');
    }

    hideAllPreviews() {
        this.initialized.forEach(inputId => {
            this._removeImage(inputId, this.options);
        });
    }
}

// Global olaraq istifadə üçün
window.ImagePreview = ImagePreview;
