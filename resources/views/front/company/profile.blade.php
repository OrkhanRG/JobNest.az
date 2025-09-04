@extends("layouts.front")
@section("title", "Company Profile")

@push("css")
@endpush

@section("contents")

    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                @include("layouts.front.components.sections.sidebar-company-management")

                <input type="hidden" data-role="selected-country-id" value="{{ isset($user) ? $user?->company->country_id : "" }}">
                <input type="hidden" data-role="selected-city-id" value="{{ isset($user) ? $user?->company->city_id : "" }}">

                <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                    <!--Filter Short By-->
                    <div class="twm-right-section-panel site-bg-gray">
                        <form method="PUT" action="{{ route("front.company.profile.update") }}" enctype="multipart/form-data" data-role="profile-form">
                            <!--Basic Information-->
                            <div class="panel panel-default">
                                <div class="panel-heading wt-panel-heading p-a20">
                                    <h4 class="panel-tittle m-a0">Profil</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Şirkət Adı</label> <b class="text-danger">*</b>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="name" data-role="name" type="text" placeholder="Şirkət Adı..." value="{{ isset($user) ? $user->name : "" }}">
                                                    <i class="fs-input-icon fa fa-building"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Telefon</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="phone" data-role="phone" type="text" placeholder="+{994}-(00)-000-00-00" value="{{ isset($user) ? $user?->company->phone : "" }}">
                                                    <i class="fs-input-icon fa fa-phone-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Email</label> <b class="text-danger">*</b>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="email" data-role="email" type="email" placeholder="Email..." value="{{ isset($user) ? $user->email : "" }}">
                                                    <i class="fs-input-icon fas fa-at"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>CV Göndəriləcək Email</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="contact_email" data-role="contact_email" type="email" placeholder="Email..." value="{{ isset($user) ? $user?->company->contact_email : "" }}">
                                                    <i class="fs-input-icon fas fa-at"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Vebsayt</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="website" data-role="website" type="text" placeholder="https://your-website.com/" value="{{ isset($user) ? $user?->company->website : "" }}">
                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Slogan</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="tagline" data-role="tagline" type="text" placeholder="Sizin sloganınız..." value="{{ isset($user) ? $user?->company->tagline : "" }}">
                                                    <i class="fs-input-icon fa fa-quote-left"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Ölkə</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" name="country_id" data-role="country_id" data-bv-field="size">
                                                    </select>
                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Şəhər</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" name="city_id" data-role="city_id" data-bv-field="size" disabled>
                                                    </select>
                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Tam Ünvan</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="address" data-role="address" type="text" placeholder="Ünvanınız..." value="{{ isset($user) ? $user?->company->address : "" }}">
                                                    <i class="fs-input-icon fas fa-map-marker-alt"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="twm-s-map mb-5">
                                                <h4 class="section-head-small mb-4">Məkan</h4>
                                                <div class="twm-s-map-iframe">
                                                    <div id="company-map" style="width: 100%; height: 350px; border: 0;"></div>
                                                </div>
                                                <div class="selected-location-info mt-3" id="selected-location-info" style="display: none;">
                                                    <div class="alert alert-info">
                                                        <strong>Seçilmiş Məkan:</strong>
                                                        <br>Ünvan: <span id="selected-address"></span>
                                                        <br>Koordinatlar: <span id="selected-coordinates"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="latitude" data-role="latitude" id="latitude" value="{{ isset($user) ? $user?->company->latitude : '' }}">
                                            <input type="hidden" name="longitude" data-role="longitude" id="longitude" value="{{ isset($user) ? $user?->company->longitude : '' }}">
                                            <input type="hidden" name="map_address" data-role="map_address" id="map_address" value="{{ isset($user) ? $user?->company->map_address : '' }}">
                                        </div>

                                        @if(false)
                                            <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label>Məkan Axtarış</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="search-address" placeholder="Şəhər və ya ünvan adı daxil edin...">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button" onclick="searchLocation()">
                                                                <i class="fa fa-search"></i> Axtar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Fəaliyyət Sahəsi</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" name="industry" data-role="industry" data-bv-field="size">
                                                        <option disabled selected value="">Fəaliyyət Sahəsi Seçin</option>
                                                        @if(isset($companyIndustries) && $companyIndustries)
                                                            @foreach($companyIndustries as $industry)
                                                                <option value="{{ $industry["value"] }}" {{ isset($user) && $user?->company->industry === $industry["value"] ? "selected" : "" }}>{{ $industry["label"] }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <i class="fs-input-icon fa fa-industry"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Şirkət Növü</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" name="company_type" data-role="company_type" data-bv-field="size">
                                                        <option disabled selected value="">Şirkət Növü Seçin</option>\
                                                        @if(isset($companyTypes) && $companyTypes)
                                                            @foreach($companyTypes as $type)
                                                                <option value="{{ $type["value"] }}" {{ isset($user) && $user?->company->company_type === $type["value"] ? "selected" : "" }}>{{ $type["label"] }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <i class="fs-input-icon fa fa-building"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>İşçi Sayı</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" name="company_size" data-role="company_size" data-bv-field="size">
                                                        <option disabled selected value="">İşçi Sayı Seçin</option>
                                                        @if(isset($companySizes) && !!$companySizes)
                                                            @foreach($companySizes as $size)
                                                                <option value="{{ $size["value"] }}" {{ isset($user) && $user?->company->company_size === $size["value"] ? "selected" : "" }}>{{ $size["label"] }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <i class="fs-input-icon fa fa-users"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Təsis İli</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="founded_year" data-role="founded_year" type="text" placeholder="Təsis İli..." value="{{ isset($user) ? $user?->company->founded_year : "" }}">
                                                    <i class="fs-input-icon fa fa-calendar-day"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Şirkət Haqqında</label>
                                                <textarea class="form-control" rows="3" name="description" data-role="description">{{ isset($user) ? $user?->company->description : "" }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <div class="upload-area" onclick="document.getElementById('logo').click()">
                                                    <div class="upload-icon">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                    <div class="upload-text">
                                                        <strong>Logo seçin</strong> və ya buraya sürükləyin
                                                    </div>
                                                </div>
                                                <input type="file" id="logo" name="logo" data-role="logo" style="display: none;" accept="image/*">
                                                <div id="logo-preview" class="image-preview-container">
                                                    <img id="logo-image" class="image-preview logo-preview" alt="Logo Preview">
                                                    <button type="button" data-role="remove-file" class="remove-image" onclick="removeImage('logo')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <div class="image-info">
                                                        <div id="logo-name" class="image-name"></div>
                                                        <div id="logo-size" class="image-size"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Fon Şəkli</label>
                                                <div class="upload-area" onclick="document.getElementById('background').click()">
                                                    <div class="upload-icon">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                    <div class="upload-text">
                                                        <strong>Fon şəkli seçin</strong> və ya buraya sürükləyin
                                                    </div>
                                                </div>
                                                <input type="file" id="background" name="background_image" data-role="background_image" style="display: none;" accept="image/*">
                                                <div id="background-preview" class="image-preview-container">
                                                    <img id="background-image" class="image-preview" alt="Background Preview">
                                                    <button type="button" data-role="remove-file" class="remove-image" onclick="removeImage('background')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <div class="image-info">
                                                        <div id="background-name" class="image-name"></div>
                                                        <div id="background-size" class="image-size"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="text-right">
                                                <button type="submit" data-role="btn-profile-save" class="site-button">Yadda Saxla</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="">
                            <!--Social Network-->
                            <div class="panel panel-default">
                                <div class="panel-heading wt-panel-heading p-a20">
                                    <h4 class="panel-tittle m-a0">Social Network</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20">

                                    <div class="row">

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.facebook.com/">
                                                    <i class="fs-input-icon fab fa-facebook-f"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://twitter.com/">
                                                    <i class="fs-input-icon fab fa-twitter"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>linkedin</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://in.linkedin.com/">
                                                    <i class="fs-input-icon fab fa-linkedin-in"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Whatsapp</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.whatsapp.com/">
                                                    <i class="fs-input-icon fab fa-whatsapp"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.instagram.com/">
                                                    <i class="fs-input-icon fab fa-instagram"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Pinterest</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://in.pinterest.com/">
                                                    <i class="fs-input-icon fab fa-pinterest-p"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Tumblr</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.tumblr.com/">
                                                    <i class="fs-input-icon fab fa-tumblr"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.youtube.com/">
                                                    <i class="fs-input-icon fab fa-youtube"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="text-left">
                                                <button type="submit" class="site-button">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        const get_countries_route = "{{ route("countries.getAll") }}",
              get_cities_route = "{{ route("cities.getAll") }}";

        const defaultLat = {{ isset($user) && $user?->company->latitude ? $user->company->latitude : '40.39581557910486' }},
              defaultLng = {{ isset($user) && $user?->company->longitude ? $user->company->longitude : '49.84678730861819' }};
    </script>
    <script src="{{ asset("assets/front/custom/library/imask.js") }}"></script>
    <script src="{{ asset("assets/front/custom/library/imgPreview.js") }}"></script>
    <script src="{{ asset("assets/front/custom/library/smartButton.js") }}"></script>
    <script src="{{ asset("assets/front/custom/js/company/profile.js") }}"></script>

    <script>
        const imageHelper = new ImagePreview();

        imageHelper.initMultiple([
            {
                id: 'logo',
                existingImage: '{{ $imagesData["logo"]["url"] ?? null }}',
                existingImageName: '{{ $imagesData["logo"]["name"] ?? null }}',
                existingImageSize: '{{ $imagesData["logo"]["size"] ?? "Mövcud logo" }}'
            },
            {
                id: 'background',
                existingImage: '{{ $imagesData["background"]["url"] ?? null }}',
                existingImageName: '{{ $imagesData["background"]["name"] ?? null }}',
                existingImageSize: '{{ $imagesData["background"]["size"] ?? "Mövcud fon" }}'
            }
        ]);
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('secrets.google_map_api_key') }}&callback=initMap&libraries=geometry"></script>
@endpush
