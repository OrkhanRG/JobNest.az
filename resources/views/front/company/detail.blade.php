@extends("layouts.front")
@section("title", $company->name ?? "Şirkət Detallı")

@push("css")
    <link rel="stylesheet" href="{{ asset("assets/front/custom/css/company/detail.css") }}">
@endpush

@section("contents")

    <div class="section-full p-t0 p-b90 bg-white">

        <div class="twm-top-wide-banner" style="background-image:url({{ asset($company["background_image"] ?? "assets/front/images/detail-pic/company-bnr1.jpg") }});">
            <div class="ani-circle-1 rotate-center"></div>
            <div class="ani-circle-2 rotate-center"></div>
        </div>

        <div class="container">
            <div class="twm-employer-card">
                <img src="{{ asset($company["logo"] ?? "assets/front/custom/images/companies/default.png") }}" alt="Logo">

                <div>
                    <h3>{{ $company["name"] ?? "" }}</h3>

                    @if(isset($company) && ($company["address"] || $company["map_address"]))
                        <p><i class="feather-map-pin"></i>
                            {{ $company["address"] ?? $company["map_address"] ?? "" }}
                            {{ $company?->city ? ", " . $company->city->short_name : "" }}
                            {{ $company?->country ? ", " . $company->country->name : "" }}
                        </p>
                    @endif

                    @if(isset($company) && $company["website"])
                        <a href="{{ $company["website"] }}" target="_blank">
                            <i class="fas fa-link"></i> {{ $company["website"] }}
                        </a>
                    @endif

                    <div class="twm-social-btns">
                        @if(isset($social_links) && !!$social_links)
                            @foreach($social_links as $platform => $link)
                                <a class="btn {{ $platform }}" href="{{ $link }}" target="_blank">
                                    <i class="fab fa-{{ $platform }}{{ in_array($platform, ["facebook"]) ? "-$platform[0]" : ""}}"></i>
                                </a>
                            @endforeach
                        @endif
                    </div>

                    @if(false)
                        <div class="twm-employer-btn-controls mt-3">
                            <a href="javascript:;" class="site-button dark">Add Review</a>
                            <a href="javascript:;" class="site-button secondry">Follow Us</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- İçerik -->
        <div class="container">
            <div class="section-content">
                <div class="row d-flex justify-content-center">

                    <!-- Sol taraf -->
                    <div class="col-lg-8 col-md-12">
                        <div class="cabdidate-de-info">

                            <h4 class="twm-s-title m-t0">Şirkət Haqqında</h4>
                            @if(isset($company) && $company["description"])
                                <p>{{ $company["description"] }}</p>
                            @endif

                            @if(false)
                                <!-- Video & Fotoğraflar kısmı -->
                            @endif

                            <h4 class="twm-s-title">Aktiv vakansiyalar</h4>
                            <div class="twm-jobs-list-wrap">
                                <ul>
                                    <li>
                                        <div class="twm-jobs-list-style1 mb-5">
                                            <div class="twm-media">
                                                <img src="{{ asset("assets/front/images/jobs-company/pic1.jpg") }}" alt="#">
                                            </div>
                                            <div class="twm-mid-content">
                                                <a href="job-detail.html" class="twm-job-title">
                                                    <h4>Senior Web Designer<span class="twm-job-post-duration">/ 1 days ago</span></h4>
                                                </a>
                                                <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                                <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                            </div>
                                            <div class="twm-right-content">
                                                <div class="twm-jobs-category green"><span class="twm-bg-green">New</span></div>
                                                <div class="twm-jobs-amount">$1000 <span>/ Month</span></div>
                                                <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Browse Job</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="twm-jobs-list-style1 mb-5">
                                            <div class="twm-media">
                                                <img src="{{ asset("assets/front/images/jobs-company/pic2.jpg") }}" alt="#">
                                            </div>
                                            <div class="twm-mid-content">
                                                <a href="job-detail.html" class="twm-job-title">
                                                    <h4>Senior Stock Technician<span class="twm-job-post-duration">/ 15 days ago</span></h4>
                                                </a>
                                                <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                                <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                            </div>
                                            <div class="twm-right-content">
                                                <div class="twm-jobs-category green"><span class="twm-bg-brown">Intership</span></div>
                                                <div class="twm-jobs-amount">$1000 <span>/ Month</span></div>
                                                <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Browse Job</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="twm-jobs-list-style1 mb-5">
                                            <div class="twm-media">
                                                <img src="{{ asset("assets/front/images/jobs-company/pic3.jpg") }}" alt="#">
                                            </div>
                                            <div class="twm-mid-content">
                                                <a href="job-detail.html" class="twm-job-title">
                                                    <h4 class="twm-job-title">IT Department Manager<span class="twm-job-post-duration">/ 6 Month ago</span></h4>
                                                </a>
                                                <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                                <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                            </div>
                                            <div class="twm-right-content">
                                                <div class="twm-jobs-category green"><span class="twm-bg-purple">Fulltime</span></div>
                                                <div class="twm-jobs-amount">$1000 <span>/ Month</span></div>
                                                <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Browse Job</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="side-bar-2">

                            <div class="twm-s-info-wrap mb-5">
                                <h4 class="section-head-small mb-4">Məlumat</h4>
                                <div class="twm-s-info-3">
                                    <ul>
                                        @if(isset($company) && $company->phone)
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-mobile-alt"></i>
                                                    <span class="twm-title">Telefon</span>
                                                    <div class="twm-s-info-discription">{{ $company->phone }}</div>
                                                </div>
                                            </li>
                                        @endif
                                        @if(isset($company) && $company?->user->email)
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-at"></i>
                                                    <span class="twm-title">E-mail</span>
                                                    <div class="twm-s-info-discription">{{ $company->user->email }}</div>
                                                </div>
                                            </li>
                                        @endif
                                        @if(isset($company) && ($company["address"] || $company["map_address"]))
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <span class="twm-title">Ünvan</span>
                                                    <div class="twm-s-info-discription">
                                                        {{ $company["address"] ?? $company["map_address"] ?? "" }}
                                                        {{ $company?->city ? ", " . $company->city->short_name : "" }}
                                                        {{ $company?->country ? ", " . $company->country->name : "" }}
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if(isset($company) && $company->company_type)
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-building"></i>
                                                    <span class="twm-title">Şirkət Növü</span>
                                                    <div class="twm-s-info-discription">{{ $company->company_type_label["label"] }}</div>
                                                </div>
                                            </li>
                                        @endif
                                        @if(isset($company) && $company->industry)
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-industry"></i>
                                                    <span class="twm-title">Fəaliyyət Sahəsi</span>
                                                    <div class="twm-s-info-discription">{{ $company->industry_label['label']}}</div>
                                                </div>
                                            </li>
                                        @endif
                                        @if(isset($company) && $company->company_size)
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-users"></i>
                                                    <span class="twm-title">İşçi Sayı</span>
                                                    <div class="twm-s-info-discription">{{ $company->company_size_label["label"] }}</div>
                                                </div>
                                            </li>
                                        @endif
                                        @if(isset($company) && $company->founded_year)
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-calendar-day"></i>
                                                    <span class="twm-title">Təsis ili</span>
                                                    <div class="twm-s-info-discription">{{ $company->founded_year }}</div>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            @if(isset($company) && $company->latitude && $company->longitude)
                                <div class="twm-s-map mb-5">
                                    <h4 class="section-head-small mb-4">Ünvan</h4>
                                    <div class="twm-s-map-iframe twm-s-map-iframe-2">
                                        <iframe
                                            height="270"
                                            style="border:0; width: 100%;"
                                            loading="lazy"
                                            allowfullscreen
                                            src="https://maps.google.com/maps?q={{ $company->latitude }},{{ $company->longitude }}&z=15&output=embed">
                                        </iframe>
                                    </div>
                                </div>
                            @endif

                            <div class="twm-s-contact-wrap mb-5">
                                <h4 class="section-head-small mb-4">{{ lang("contact", "app") }}</h4>
                                <div class="twm-s-contact twm-s-contact-2">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input name="name" type="text" required class="form-control" placeholder="Ad">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input name="email" type="text" class="form-control" required placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input name="phone" type="text" class="form-control" required placeholder="Telefon">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <textarea name="message" class="form-control" rows="3" placeholder="Mesaj"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="site-button">Göndər</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@push("js")
@endpush
