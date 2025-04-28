@extends("layouts.front")
@section("title", "Şirkətlər")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "Şirkətlər",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "Şirkətlər",
                "url" => route("front.companies")
            ]
        ]
    ])
    <!-- INNER PAGE BANNER END -->


    <!-- Employer Grid START -->
    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <!--Filter Short By-->
                    <div class="product-filter-wrap d-flex justify-content-between align-items-center m-b30">

                        <div class="ls-inputicon-box">
                            <input class="form-control" name="company_Email" type="text" placeholder="Type Address">
                            <i class="fs-input-icon fa fa-search"></i>
                        </div>

                        <div>
                            <span class="woocommerce-result-count-left"><small>Showing 1-8 of  10 Result</small></span>
                        </div>

                        <div class="woocommerce-ordering twm-filter-select">
                            <span class="woocommerce-result-count">Sort By</span>
                            <select class="wt-select-bar-2 selectpicker"  data-live-search="true" data-bv-field="size">
                                <option>Most Recent</option>
                                <option>Freelance</option>
                                <option>Full Time</option>
                                <option>Internship</option>
                                <option>Part Time</option>
                                <option>Temporary</option>
                            </select>
                        </div>



                    </div>

                    <div class="twm-employer-list-wrap">
                        <div class="row">
                             <div class="col-lg-3 col-md-3">
                                 <div class="twm-employer-grid-style1 mb-5">
                                     <div class="twm-media">
                                         <img src="{{ asset("assets/images/jobs-company/pic1.jpg") }}" alt="#">
                                     </div>
                                     <div class="twm-mid-content">
                                         <a href="{{ route("front.company", "test") }}" class="twm-job-title">
                                             <h4>Herbal Ltd</h4>
                                         </a>
                                         <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                         <a href="{{ route("front.company", "test") }}" class="twm-job-websites site-text-primary">Accountancy</a>
                                     </div>
                                     <div class="twm-right-content">
                                         <div class="twm-jobs-vacancies"><span>25</span>Vacancies</div>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-3 col-md-3">
                                 <div class="twm-employer-grid-style1 mb-5">
                                     <div class="twm-media">
                                         <img src="{{ asset("assets/images/jobs-company/pic2.jpg") }}" alt="#">
                                     </div>
                                     <div class="twm-mid-content">
                                         <a href="employer-detail.html" class="twm-job-title">
                                             <h4>Artistre Studio PVT Ltd</h4>
                                         </a>
                                         <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                         <a href="employer-detail.html" class="twm-job-websites site-text-primary">IT Contractor</a>
                                     </div>
                                     <div class="twm-right-content">
                                        <div class="twm-jobs-vacancies"><span>30</span>Vacancies</div>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-3 col-md-3">
                                 <div class="twm-employer-grid-style1 mb-5">
                                     <div class="twm-media">
                                         <img src="{{ asset("assets/images/jobs-company/pic3.jpg") }}" alt="#">
                                     </div>
                                     <div class="twm-mid-content">
                                         <a href="employer-detail.html" class="twm-job-title">
                                             <h4 class="twm-job-title">Wins Developers</h4>
                                         </a>
                                         <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                         <a href="employer-detail.html" class="twm-job-websites site-text-primary">Banking</a>
                                     </div>
                                     <div class="twm-right-content">
                                        <div class="twm-jobs-vacancies"><span>32</span>Vacancies</div>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-3 col-md-3">
                                 <div class="twm-employer-grid-style1 mb-5">
                                     <div class="twm-media">
                                         <img src="{{ asset("assets/images/jobs-company/pic4.jpg") }}" alt="#">
                                     </div>
                                     <div class="twm-mid-content">
                                         <a href="employer-detail.html" class="twm-job-title">
                                             <h4 class="twm-job-title">Thewebmax PVT Ltd</h4>
                                         </a>
                                         <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                         <a href="employer-detail.html" class="twm-job-websites site-text-primary">Digital & Creative</a>
                                     </div>
                                     <div class="twm-right-content">
                                        <div class="twm-jobs-vacancies"><span>38</span>Vacancies</div>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-3 col-md-3">
                                 <div class="twm-employer-grid-style1 mb-5">
                                     <div class="twm-media">
                                         <img src="{{ asset("assets/images/jobs-company/pic5.jpg") }}" alt="#">
                                     </div>
                                     <div class="twm-mid-content">
                                         <a href="employer-detail.html" class="twm-job-title">
                                             <h4 class="twm-job-title">Robo Tech</h4>
                                         </a>
                                         <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                         <a href="employer-detail.html" class="twm-job-websites site-text-primary">Sales & Marketing</a>
                                     </div>
                                     <div class="twm-right-content">
                                        <div class="twm-jobs-vacancies"><span>40</span>Vacancies</div>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-3 col-md-3">
                                <div class="twm-employer-grid-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{ asset("assets/images/jobs-company/pic1.jpg") }}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="employer-detail.html" class="twm-job-title">
                                            <h4>Galaxy IT Solution</h4>
                                        </a>
                                        <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                        <a href="employer-detail.html" class="twm-job-websites site-text-primary">Leisure & Tourismm</a>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-vacancies"><span>38</span>Vacancies</div>
                                    </div>
                                </div>
                             </div>

                             <div class="col-lg-3 col-md-3">
                                <div class="twm-employer-grid-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{ asset("assets/images/jobs-company/pic2.jpg") }}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="employer-detail.html" class="twm-job-title">
                                            <h4>Coderbotics solutions</h4>
                                        </a>
                                        <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                        <a href="employer-detail.html" class="twm-job-websites site-text-primary">Consultancy</a>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-vacancies"><span>35</span>Vacancies</div>
                                    </div>
                                </div>
                             </div>

                             <div class="col-lg-3 col-md-3">
                                <div class="twm-employer-grid-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{ asset("assets/images/jobs-company/pic3.jpg") }}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="employer-detail.html" class="twm-job-title">
                                            <h4 class="twm-job-title">Microsoft solution</h4>
                                        </a>
                                        <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                        <a href="employer-detail.html" class="twm-job-websites site-text-primary">Technologies</a>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-vacancies"><span>65</span>Vacancies</div>
                                    </div>
                                </div>
                             </div>

                             <div class="col-lg-3 col-md-3">
                                <div class="twm-employer-grid-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{ asset("assets/images/jobs-company/pic4.jpg") }}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="employer-detail.html" class="twm-job-title">
                                            <h4 class="twm-job-title">Dot Circle PVT Ltd</h4>
                                        </a>
                                        <p class="twm-job-address">1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                        <a href="employer-detail.html" class="twm-job-websites site-text-primary">Sales & Marketing</a>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-vacancies"><span>50</span>Vacancies</div>
                                    </div>
                                </div>
                             </div>


                        </div>
                    </div>

                    <div class="pagination-outer d-flex justify-content-center">
                        <div class="pagination-style1">
                            <ul class="clearfix">
                                <li class="prev"><a href="javascript:;"><span> <i class="fa fa-angle-left"></i> </span></a></li>
                                <li><a href="javascript:;">1</a></li>
                                <li class="active"><a href="javascript:;">2</a></li>
                                <li><a href="javascript:;">3</a></li>
                                <li><a class="javascript:;" href="javascript:;"><i class="fa fa-ellipsis-h"></i></a></li>
                                <li><a href="javascript:;">5</a></li>
                                <li class="next"><a href="javascript:;"><span> <i class="fa fa-angle-right"></i> </span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Employer Grid END -->
@endsection

@push("js")

@endpush