$(function() {
    let currentStep = 1,
        skillIndex = 0;

    const totalSteps = 4,
        $prevBtn = $('#prevBtn'),
        $nextBtn = $('#nextBtn'),
        $finalButtonsContainer = $('#final-buttons-container'),
        $progressBar = $('.wizard-progress-bar'),
        $wizardSteps = $('.wizard-step'),
        $wizardPanes = $('.wizard-pane'),
        $appMethodSelect = $('#application_method'),
        $companyFormContainer = $('#company_form_container'),
        $emailContainer = $('#contact_email_container'),
        $urlContainer = $('#external_url_container'),
        $addSkillBtn = $('#add-skill-btn'),
        $skillsContainer = $('#skills-container'),
        $salaryNegotiableCheckbox = $('#salary_negotiable'),
        $salaryFieldsContainer = $('#salary-fields-container');

    const requiredFieldsConfig = {
        // 1: ['title', 'job_category_id', 'description'],
        // 2: ['experience_level', 'education_level'],
        // 3: ['country_id', 'city_id', 'application_method'],
    };

    const updateProgressBar = () => {
        const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
        $progressBar.css('width', `${progressPercentage}%`);
    };

    const validateStep = (stepNumber) => {
        let isValid = true;
        const $currentPane = $(`#step${stepNumber}`),
            $errorMessage = $currentPane.find('.validation-error-message');

        $currentPane.find('.form-group.is-invalid').removeClass('is-invalid');

        const fieldsToValidate = [...(requiredFieldsConfig[stepNumber] || [])];

        if (stepNumber === 3) {
            const appMethod = $appMethodSelect.val();
            if (appMethod === 'internal') /* fieldsToValidate.push('company_form_id') */;
            else if (appMethod === 'email') fieldsToValidate.push('contact_email');
            else if (appMethod === 'external') fieldsToValidate.push('external_url');
        }

        fieldsToValidate.forEach(fieldId => {
            const $input = $(`#${fieldId}`);
            if (!$input.length) return;

            const $parentGroup = $input.closest('.form-group');
            let isFieldValid = $input.val() && $input.val().trim() !== '';

            if (!isFieldValid) {
                isValid = false;
                $parentGroup.addClass('is-invalid');
            }
        });

        isValid ? $errorMessage.hide() : $errorMessage.show();
        return isValid;
    };

    const showStep = (stepNumber) => {
        $wizardPanes.removeClass('active');
        $(`#step${stepNumber}`).addClass('active');

        $wizardSteps.each(function() {
            const stepNumData = parseInt($(this).data('step'));
            $(this).removeClass('active completed');
            if (stepNumData < stepNumber) {
                $(this).addClass('completed');
            } else if (stepNumData === stepNumber) {
                $(this).addClass('active');
            }
        });

        stepNumber === 1 ? $prevBtn.hide() : $prevBtn.show();
        stepNumber === totalSteps ? $nextBtn.hide() : $nextBtn.show();

        $finalButtonsContainer.empty();
        if (stepNumber === totalSteps) {
            const buttonsHTML = `
                <button type="submit" name="status" value="published" class="site-button m-r5">Vakansiyanı Dərc Et</button>
                <button type="submit" name="status" value="draft" class="site-button outline-primary">Qaralama kimi Saxla</button>
            `;
            $finalButtonsContainer.html(buttonsHTML);
        }

        updateProgressBar();
    };

    const handleApplicationMethodChange = () => {
        const selectedMethod = $appMethodSelect.val();
        $companyFormContainer.toggle(selectedMethod === 'internal');
        $emailContainer.toggle(selectedMethod === 'email');
        $urlContainer.toggle(selectedMethod === 'external');
    };

    const toggleSalaryFields = () => {
        $salaryFieldsContainer.toggle(!$salaryNegotiableCheckbox.is(':checked'));
    };

    $nextBtn.on('click', () => {
        if (validateStep(currentStep) && currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        }
    });

    $prevBtn.on('click', () => {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    $appMethodSelect.on('change', handleApplicationMethodChange);

    $addSkillBtn.on('click', () => {
        skillIndex++;
        const skillHTML = `
            <div class="skill-input-group" id="skill-row-${skillIndex}">
                <div class="ls-inputicon-box">
                    <input class="form-control" name="skills[${skillIndex}][name]" type="text" placeholder="Bacarıq adı (məs: PHP)">
                     <i class="fs-input-icon fa fa-code"></i>
                </div>
                <div class="ls-inputicon-box">
                    <select class="form-control" name="skills[${skillIndex}][requirement_level]">
                        <option value="required">Mütləq Tələb</option>
                        <option value="preferred">Arzuolunan</option>
                    </select>
                </div>
                <button type="button" class="remove-skill-btn" data-row="skill-row-${skillIndex}">X</button>
            </div>
        `;
        $skillsContainer.append(skillHTML);
    });

    $skillsContainer.on('click', '.remove-skill-btn', function() {
        $(this).closest('.skill-input-group').remove();
    });

    $salaryNegotiableCheckbox.on('change', toggleSalaryFields);

    $finalButtonsContainer.on('click', 'button[type="submit"]', function(e) {
        e.preventDefault();

        const $btn = $(this),
              status = $btn.val();
        let formData = $('#vacancyWizardForm').serialize();
        formData += `&status=${status}`;

        btnLoader = new SmartButton();
        btnLoader.setLoading($btn)

        $.ajax({
            url: route(`front.company.post-job.store`),
            type: 'POST',
            data: formData,
            success: (response) => {
                btnLoader.setSuccess($btn, "Vakansiya yaradıldı!")

                setTimeout(() => {
                    $('#vacancyWizardForm')[0].reset();
                    $('.selectpicker').selectpicker('refresh');
                    $skillsContainer.find('.skill-input-group').remove();

                    currentStep = 1;
                    showStep(currentStep);

                    toggleSalaryFields();
                    handleApplicationMethodChange();
                }, 1500);
            },
            error: (xhr) => {
                let errorMessage = 'Xəta baş verdi. Zəhmət olmasa, məlumatları yoxlayıb yenidən cəhd edin.';
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    console.error('Doğrulama Hataları:', errors);
                    errorMessage = 'Formda xətalar var. Zəhmət olmasa, bütün sahələri yoxlayın.';
                } else {
                    console.error('Sunucu Hatası:', xhr.responseText);
                }

                alert(errorMessage);
                btnLoader.setError($btn, "Xəta!")
            },
            complete: () => {
                if ($finalButtonsContainer.find('button').length > 0) {
                    $finalButtonsContainer.find('button').prop('disabled', false);
                }
            }
        });
    });

    showStep(currentStep);
    toggleSalaryFields();
    handleApplicationMethodChange();

    const getCities = (country_id = null) => {
        let h = `<option disabled selected value="">Şəhər Seçin</option>`,
            $select = $(`[data-role="city_id"]`),
            data = {country_id};

        $select.prop("disabled", true).addClass("loader loader-sm");

        $.get({
            url: route("cities.getAll"),
            data,
            success: function(d) {
                let data = d.data?.list ?? [];
                h += data.map((v) => `<option value="${v.id}">${v.short_name}</option>`).join('');

                $select.html(h);
            },
            error: function(e) {
            },
            complete: function() {
                $select.prop("disabled", false).removeClass("loader loader-sm");
                $select.selectpicker('refresh');
            }
        });
    }

    $(document).on('change', `[data-role="country_id"]`, function() {
        let country_id = $(this).val();
        $(`[data-role="country_id"]`).prop("disabled", true);

        if(country_id) {
            getCities(country_id);
        }
    });
});
