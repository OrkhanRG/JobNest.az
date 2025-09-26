@extends("layouts.front")
@section("title", "Yeni Vakansiya Yarat")

@push("css")
    <link rel="stylesheet" href="{{ asset("assets/front/custom/css/company/post-job.css") }}">
@endpush

@section("contents")

    <div class="section-full p-t120 p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                @include("layouts.front.components.sections.sidebar-company-management")

                <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                    <div class="twm-right-section-panel site-bg-gray">
                        <form id="vacancyWizardForm" onsubmit="return false;">
                            <div class="panel panel-default">
                                <div class="panel-heading wt-panel-heading p-a20">
                                    <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i>Yeni Vakansiya Yarat</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                    <div style="position:relative">
                                        <div class="wizard-progress-bar"></div>
                                        <ul class="wizard-steps">
                                            <li class="wizard-step active" data-step="1">
                                                <div class="step-number">1</div>
                                                <div class="step-title">Əsas Məlumatlar</div>
                                            </li>
                                            <li class="wizard-step" data-step="2">
                                                <div class="step-number">2</div>
                                                <div class="step-title">Tələblər və Şərtlər</div>
                                            </li>
                                            <li class="wizard-step" data-step="3">
                                                <div class="step-number">3</div>
                                                <div class="step-title">Məkan və Müraciət</div>
                                            </li>
                                            <li class="wizard-step" data-step="4">
                                                <div class="step-number">4</div>
                                                <div class="step-title">Əlavə Məlumatlar</div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="wizard-content mt-4">
                                        <div class="wizard-pane active" id="step1">
                                            <h5 class="mb-4">Addım 1: Əsas Vakansiya Məlumatları</h5>
                                            <div class="row">
                                                <div class="col-xl-8 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="title">Vakansiyanın Adı</label>
                                                        <div class="ls-inputicon-box">
                                                            <input class="form-control" name="title" id="title" type="text" placeholder="Məs: Senior Backend Developer">
                                                            <i class="fs-input-icon fa fa-address-card"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($job_categories["categories"]) && $job_categories["categories"])
                                                    <div class="col-xl-4 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="job_category_id">Kateqoriya</label>
                                                            <div class="ls-inputicon-box">
                                                                <select name="job_category_id" id="job_category_id" class="wt-select-box selectpicker" data-live-search="true" title="Kateqoriya seçin">
                                                                    @foreach($job_categories["categories"] as $category)
                                                                        @if (!$loop->first)
                                                                            <option data-divider="true"></option>
                                                                        @endif

                                                                        <option value="{{ $category['id'] }}" style="font-weight: bold;">
                                                                            {{ $category["name"] }}
                                                                        </option>

                                                                        @foreach($category->children as $child)
                                                                            <option value="{{ $child['id'] }}">
                                                                                &nbsp;&nbsp;&nbsp; {{ $child["name"] }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endforeach
                                                                </select>
                                                                <i class="fs-input-icon fa fa-border-all"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description">Ətraflı Məlumat (Təsvir)</label>
                                                        <textarea name="description" id="description" class="form-control" rows="8" placeholder="Vakansiya haqqında ətraflı məlumat daxil edin"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="responsibilities">Vəzifə Öhdəlikləri</label>
                                                        <textarea name="responsibilities" id="responsibilities" class="form-control" rows="5" placeholder="Namizədin görəcəyi işlər"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="validation-error-message">Zəhmət olmasa, qırmızı ilə işarələnmiş sahələri doldurun.</div>
                                        </div>

                                        <div class="wizard-pane" id="step2">
                                            <h5 class="mb-4">Addım 2: Namizədə Tələblər və İş Şərtləri</h5>
                                            <div class="row">
                                                @if(isset($experience_levels) && !!$experience_levels)
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <label for="experience_level">Təcrübə</label>
                                                            <div class="ls-inputicon-box">
                                                                <select name="experience_level" id="experience_level" class="wt-select-box selectpicker" data-live-search="true" title="Təcrübə səviyyəsini seçin">
                                                                    @foreach($experience_levels as $level)
                                                                        <option {{ $level["value"] }}>{{ $level["label"] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <i class="fs-input-icon fa fa-user-edit"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(isset($education_levels) && !!$education_levels)
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <label for="education_level">Təhsil Səviyyəsi</label>
                                                            <div class="ls-inputicon-box">
                                                                <select name="education_level" id="education_level" class="wt-select-box selectpicker" title="Təhsil səviyyəsini seçin">
                                                                    @foreach($education_levels as $level)
                                                                        <option value="{{ $level["value"] }}">{{ $level["label"] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <i class="fs-input-icon fa fa-user-graduate"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="requirements">Əsas Tələblər</label>
                                                        <textarea name="requirements" id="requirements" class="form-control" rows="5" placeholder="Namizəddən gözlənilən əsas tələblər"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="benefits">Təklif etdiklərimiz (Üstünlüklər)</label>
                                                        <textarea name="benefits" id="benefits" class="form-control" rows="5" placeholder="Məs: Tibbi sığorta, nahar, bonuslar..."></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div id="skills-container">
                                                        <label>Tələb Olunan Bacarıqlar (Skills)</label>
                                                    </div>
                                                    <button type="button" id="add-skill-btn" class="site-button-link"> + Bacarıq Əlavə Et</button>
                                                </div>
                                            </div>
                                            <div class="validation-error-message">Zəhmət olmasa, qırmızı ilə işarələnmiş sahələri doldurun.</div>
                                        </div>

                                        <div class="wizard-pane" id="step3">
                                            <h5 class="mb-4">Addım 3: İş Məkanı və Müraciət Prosesi</h5>
                                            <div class="row">
                                                @if(isset($countries["list"]) && !!$countries["list"])
                                                    <div class="col-xl-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="country_id">Ölkə</label>
                                                            <div class="ls-inputicon-box">
                                                                <select name="country_id" id="country_id" data-role="country_id" class="wt-select-box selectpicker" data-live-search="true" title="Ölkə seçin">
                                                                    @foreach($countries["list"] as $country)
                                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <i class="fs-input-icon fa fa-globe-americas"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="city_id">Şəhər</label>
                                                        <div class="ls-inputicon-box">
                                                            <select name="city_id" id="city_id" data-role="city_id" class="wt-select-box selectpicker" data-live-search="true" title="Şəhər seçin" disabled>
                                                            </select>
                                                            <i class="fs-input-icon fa fa-map-marker-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">Dəqiq Ünvan</label>
                                                        <div class="ls-inputicon-box">
                                                            <input class="form-control" name="address" id="address" type="text" placeholder="Məs: Nizami küç. 5, Baku, Azerbaijan">
                                                            <i class="fs-input-icon fa fa-home"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($application_methods) && !!$application_methods)
                                                    <div class="col-xl-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="application_method">Müraciət Metodu</label>
                                                            <div class="ls-inputicon-box">
                                                                <select name="application_method" id="application_method" class="wt-select-box selectpicker">
                                                                    @foreach($application_methods as $method)
                                                                        <option value="{{ $method["value"] }}">{{ $method["label"] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <i class="fs-input-icon fa fa-paper-plane"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-xl-6 col-lg-6" id="company_form_container">
                                                    <div class="form-group">
                                                        <label for="company_form_id">Müraciət Forması</label>
                                                        <div class="ls-inputicon-box">
                                                            <select name="company_form_id" id="company_form_id" class="wt-select-box selectpicker" title="Formanı seçin">
                                                                {{-- Database-dən gələn şirkət formaları --}}
{{--                                                                <option value="1">Standart Müraciət Forması</option>--}}
{{--                                                                <option value="2">Developer Müraciət Forması</option>--}}
                                                                <option value="" disabled>Forma Tapılmadı</option>
                                                            </select>
                                                            <i class="fs-input-icon fa fa-file-text"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6" id="contact_email_container" style="display:none;">
                                                    <div class="form-group">
                                                        <label for="contact_email">Müraciət üçün Email</label>
                                                        <div class="ls-inputicon-box">
                                                            <input class="form-control" name="contact_email" id="contact_email" type="email" placeholder="hr@sirket.az">
                                                            <i class="fs-input-icon fa fa-at"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6" id="external_url_container" style="display:none;">
                                                    <div class="form-group">
                                                        <label for="external_url">Xarici Müraciət Linki</label>
                                                        <div class="ls-inputicon-box">
                                                            <input class="form-control" name="external_url" id="external_url" type="url" placeholder="https://.../">
                                                            <i class="fs-input-icon fa fa-link"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="application_deadline">Son Müraciət Tarixi</label>
                                                        <div class="ls-inputicon-box">
                                                            <input class="form-control datepicker" data-provide="datepicker" name="application_deadline" id="application_deadline" type="text" placeholder="gg/aa/iiii">
                                                            <i class="fs-input-icon far fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="validation-error-message">Zəhmət olmasa, qırmızı ilə işarələnmiş sahələri doldurun.</div>
                                        </div>

                                        <div class="wizard-pane" id="step4">
                                            <h5 class="mb-4">Addım 4: Maaş, İş Növü və Əlavə Tənzimləmələr</h5>
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="salary_negotiable" value="0" id="salary_negotiable">
                                                        <label class="form-check-label" for="salary_negotiable">Maaş razılaşma yolu ilə</label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="show_salary" value="1" id="show_salary" checked>
                                                        <label class="form-check-label" for="show_salary">Maaş elanda göstərilsin</label>
                                                    </div>
                                                </div>

                                                <div class="col-12" id="salary-fields-container">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="min_salary">Minimum Maaş</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control" name="min_salary" id="min_salary" type="number" placeholder="Məs: 1500">
                                                                    <i class="fs-input-icon fa fa-money-bill-wave"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="max_salary">Maksimum Maaş</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control" name="max_salary" id="max_salary" type="number" placeholder="Məs: 2500">
                                                                    <i class="fs-input-icon fa fa-money-bill-wave"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(isset($currencies["list"]) && $currencies["list"])
                                                            <div class="col-xl-4 col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="currency_id">Valyuta</label>
                                                                    <div class="ls-inputicon-box">
                                                                        <select name="currency_id" id="currency_id" class="wt-select-box selectpicker" data-live-search="true">
                                                                            @foreach($currencies["list"] as $currency)
                                                                                <option value="{{ $currency["id"] }}" {{ +$currency["is_default"] ? "selected" : "" }}>{{ $currency["code"] }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <i class="fs-input-icon fa fa-coins"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="col-xl-4 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="vacancy_type">İş Növü</label>
                                                        <select name="vacancy_type" id="vacancy_type" class="wt-select-box selectpicker">
                                                            <option>Tam ştat</option>
                                                            <option>Yarım ştat</option>
                                                            <option>Frilans</option>
                                                            <option>Təcrübə proqramı</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="workplace_type">İş Mühiti</label>
                                                        <select name="workplace_type" id="workplace_type" class="wt-select-box selectpicker">
                                                            <option>Ofisdaxili</option>
                                                            <option>Hibrid</option>
                                                            <option>Məsafədən (Remote)</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                @if(false)
                                                    <hr class="mt-4">
                                                    <h6 class="mb-3">Elan seçimləri</h6>
                                                    <div class="col-12">
                                                        <div class="form-check form-switch d-inline-block me-3">
                                                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured">
                                                            <label class="form-check-label" for="is_featured">Önə Çıxan Elan</label>
                                                        </div>
                                                        <div class="form-check form-switch d-inline-block me-3">
                                                            <input class="form-check-input" type="checkbox" name="is_urgent" value="1" id="is_urgent">
                                                            <label class="form-check-label" for="is_urgent">Təcili Elan</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wizard-buttons">
                                        <button type="button" class="site-button outline-primary" id="prevBtn" style="display: none;">Geri</button>
                                        <button type="button" class="site-button" id="nextBtn">Növbəti</button>
                                    </div>

                                    <div id="final-buttons-container" class="mt-4 text-left"></div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push("js")
    <script src="{{ asset("assets/front/custom/js/company/post-job.js") }}"></script>
@endpush

