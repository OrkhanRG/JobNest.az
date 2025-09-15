@extends("layouts.front")
@section("title", "Şirkət Detallı")

@push("css")

@endpush

@section("contents")

    <div class="section-full p-t60 p-b90 bg-white">
        <!--Top Wide banner Start-->
        <div class="twm-top-wide-banner overlay-wraper" style="background-image:url({{ asset($company["background_image"] ?? "assets/front/images/detail-pic/company-bnr1.jpg") }});">
            <div class="overlay-main site-bg-primary opacity-09"></div>

            <div class="twm-top-wide-banner-content container ">

                <div class="twm-mid-content">
                    <div class="twm-employer-self-top">
                        <div class="twm-media">
                            <img src="{{ asset($company["logo"] ?? "assets/front/custom/images/companies/default.png") }}" alt="#">
                        </div>

                        <h3 class="twm-job-title">{{ $company["name"] ?? "" }}</h3>
                        @if(isset($company) && ($company["address"] || $company["map_address"]))
                            <p class="twm-employer-address"><i class="feather-map-pin"></i>{{ $company["address"] ?? $company["map_address"] ?? "" }}{{ $company?->city ? ", " . $company->city->short_name : "" }}{{ $company?->country ? ", " . $company->country->name : "" }}</p>
                        @endif

                        @if(isset($company) && $company["website"])
                            <a href="{{ $company["website"] }}" class="twm-employer-websites" target="_blank">
                                <i class="fas fa-link me-2"></i>
                                {{ $company["website"] }}
                            </a>
                        @endif

                        @if(false)
                            <div class="twm-ep-detail-tags">
                                <button class="de-info twm-bg-green"><i class="fa fa-check"></i> Verified</button>
                                <button class="de-info twm-bg-brown"><i class="fa fa-heart"></i> Add To Favorite</button>
                                <button class="de-info twm-bg-purple"><i class="fa fa-hand-o-right"></i> Add Review</button>
                                <button class="de-info twm-bg-sky"><i class="fa fa-eye"></i> Viewed</button>
                            </div>

                        @endif

                    </div>

                    <div class="twm-employer-self-bottom">
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
                            <div class="twm-employer-btn-controls">
                                <a href="javascript:;" class="site-button outline-white">Add Review</a>
                                <a href="javascript:;" class="site-button secondry">Follow Us</a>
                            </div>
                        @endif
                    </div>

                </div>

            </div>

            <div class="ani-circle-1 rotate-center"></div>
            <div class="ani-circle-2 rotate-center"></div>

        </div>

        <!--Top Wide banner End-->
        <div class="container">
            <div class="section-content">
                <div class="row d-flex justify-content-center">



                    <div class="col-lg-8 col-md-12">
                        <!-- Candidate detail START -->
                        <div class="cabdidate-de-info">

                            <h4 class="twm-s-title m-t0">Şirkət Haqqında</h4>

                            @if(isset($company) && $company["description"])
                                {{ $company["description"] }}
                            @endif

                            @if(false)
                                <div class="twm-two-part-section">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 m-b30">
                                            <h4 class="twm-s-title">Video</h4>
                                            <div class="video-section-first" style="background-image: url({{ asset("assets/front/images/video-bg.jpg") }});">
                                                <a href="https://www.youtube.com/watch?v=c1XNqw2gSbU" class="mfp-video play-now-video">
                                                    <i class="icon feather-play"></i>
                                                    <span class="ripple"></span>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12">
                                            <h4 class="twm-s-title">Office Photos</h4>
                                            <div class="tw-sidebar-gallery-2">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="tw-service-gallery-thumb">
                                                            <a class="elem" href="{{ asset("assets/front/images/gallery/pic1.jpg") }}" title="Title 1" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}">
                                                                <img src="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}" alt="">
                                                                <i class="fa fa-file-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="tw-service-gallery-thumb">
                                                            <a class="elem" href="{{ asset("assets/front/images/gallery/pic2.jpg") }}" title="Title 2" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}">
                                                                <img src="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}" alt="">
                                                                <i class="fa fa-file-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="tw-service-gallery-thumb ">
                                                            <a class="elem" href="{{ asset("assets/front/images/gallery/pic3.jpg") }}" title="Title 3"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic3.jpg") }}">
                                                                <img src="{{ asset("assets/front/images/gallery/thumb/pic3.jpg") }}" alt="">
                                                                <i class="fa fa-file-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="tw-service-gallery-thumb">
                                                            <a class="elem" href="{{ asset("assets/front/images/gallery/pic4.jpg") }}" title="Title 4"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic4.jpg") }}">
                                                                <img src="{{ asset("assets/front/images/gallery/thumb/pic4.jpg") }}" alt="">
                                                                <i class="fa fa-file-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="tw-service-gallery-thumb">
                                                            <a class="elem" href="{{ asset("assets/front/images/gallery/pic5.jpg") }}" title="Title 5"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic5.jpg") }}">
                                                                <img src="{{ asset("assets/front/images/gallery/thumb/pic5.jpg") }}" alt="">
                                                                <i class="fa fa-file-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="tw-service-gallery-thumb">
                                                            <a class="elem" href="{{ asset("assets/front/images/gallery/pic6.jpg") }}" title="Title 6"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic6.jpg") }}">
                                                                <img src="{{ asset("assets/front/images/gallery/thumb/pic6.jpg") }}" alt="">
                                                                <i class="fa fa-file-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="tw-service-gallery-thumb">
                                                            <a class="elem" href="{{ asset("assets/front/images/gallery/pic7.jpg") }}" title="Title 7" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}">
                                                                <img src="{{ asset("assets/front/images/gallery/thumb/pic7.jpg") }}" alt="">
                                                                <i class="fa fa-file-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="tw-service-gallery-thumb">
                                                            <a class="elem" href="{{ asset("assets/front/images/gallery/pic8.jpg") }}" title="Title 8" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}">
                                                                <img src="{{ asset("assets/front/images/gallery/thumb/pic8.jpg") }}" alt="">
                                                                <i class="fa fa-file-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
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

                    <div class="col-lg-4 col-md-12 ">

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
                                                <li>
                                                    <div class="twm-s-info-inner">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <span class="twm-title">Ünvan</span>
                                                        <div class="twm-s-info-discription">{{ $company["address"] ?? $company["map_address"] ?? "" }}{{ $company?->city ? ", " . $company->city->short_name : "" }}{{ $company?->country ? ", " . $company->country->name : "" }}</div>
                                                    </div>
                                                </li>
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
