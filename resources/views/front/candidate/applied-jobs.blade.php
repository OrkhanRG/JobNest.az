@extends("layouts.front")
@section("title", "Dashboard")

@push("css")

@endpush

@section("contents")

    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                @include("layouts.front.components.sections.sidebar-candidate-management")

                <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                    <div class="twm-right-section-panel candidate-save-job site-bg-gray">
                        <!--Filter Short By-->
                        <div class="product-filter-wrap d-flex justify-content-between align-items-center">
                            <span class="woocommerce-result-count-left">Applied 250 jobs</span>

                            <form class="woocommerce-ordering twm-filter-select" method="get">
                                <span class="woocommerce-result-count">Short By</span>
                                <select class="wt-select-bar-2 selectpicker"  data-live-search="true" data-bv-field="size">
                                    <option>Most Recent</option>
                                    <option>Freelance</option>
                                    <option>Full Time</option>
                                    <option>Internship</option>
                                    <option>Part Time</option>
                                    <option>Temporary</option>
                                </select>
                                <select class="wt-select-bar-2 selectpicker"  data-live-search="true" data-bv-field="size">
                                    <option>Show 10</option>
                                    <option>Show 20</option>
                                    <option>Show 30</option>
                                    <option>Show 40</option>
                                    <option>Show 50</option>
                                    <option>Show 60</option>
                                </select>
                            </form>

                        </div>

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
                                            <div class="twm-jobs-amount">$2500 <span>/ Month</span></div>
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
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
                                                <h4>Sr. Rolling Stock Technician<span class="twm-job-post-duration">/ 15 days ago</span></h4>
                                            </a>
                                            <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                        </div>
                                        <div class="twm-right-content">
                                            <div class="twm-jobs-category green"><span class="twm-bg-brown">Intership</span></div>
                                            <div class="twm-jobs-amount">$2500 <span>/ Month</span></div>
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
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
                                                <h4 class="twm-job-title">IT Department Manager<span class="twm-job-post-duration"> / 6 Month ago</span></h4>
                                            </a>
                                            <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                        </div>
                                        <div class="twm-right-content">
                                            <div class="twm-jobs-category green"><span class="twm-bg-purple">Fulltime</span></div>
                                            <div class="twm-jobs-amount">$2500 <span>/ Month</span></div>
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="twm-jobs-list-style1 mb-5">
                                        <div class="twm-media">
                                            <img src="{{ asset("assets/front/images/jobs-company/pic4.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-mid-content">
                                            <a href="job-detail.html" class="twm-job-title">
                                                <h4 class="twm-job-title">Art Production Specialist   <span class="twm-job-post-duration">/ 2 days ago</span></h4>
                                            </a>
                                            <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                        </div>
                                        <div class="twm-right-content">
                                            <div class="twm-jobs-category green"><span class="twm-bg-sky">Freelancer</span></div>
                                            <div class="twm-jobs-amount">$1500 <span>/ Month</span></div>
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="twm-jobs-list-style1 mb-5">
                                        <div class="twm-media">
                                            <img src="{{ asset("assets/front/images/jobs-company/pic5.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-mid-content">
                                            <a href="job-detail.html" class="twm-job-title">
                                                <h4 class="twm-job-title">Recreation &amp; Fitness Worker   <span class="twm-job-post-duration">/ 1 days ago</span></h4>
                                            </a>
                                            <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                        </div>
                                        <div class="twm-right-content">
                                            <div class="twm-jobs-category green"><span class="twm-bg-golden">Temporary</span></div>
                                            <div class="twm-jobs-amount">$800 <span>/ Month</span></div>
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
                                        </div>
                                    </div>
                                </li>

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
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
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
                                                <h4>Sr. Rolling Stock Technician<span class="twm-job-post-duration">/ 15 days ago</span></h4>
                                            </a>
                                            <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                        </div>
                                        <div class="twm-right-content">
                                            <div class="twm-jobs-category green"><span class="twm-bg-brown">Intership</span></div>
                                            <div class="twm-jobs-amount">$1500 <span>/ Month</span></div>
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
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
                                                <h4 class="twm-job-title">IT Department Manager<span class="twm-job-post-duration"> / 6 Month ago</span></h4>
                                            </a>
                                            <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                        </div>
                                        <div class="twm-right-content">
                                            <div class="twm-jobs-category green"><span class="twm-bg-purple">Fulltime</span></div>
                                            <div class="twm-jobs-amount">$2500 <span>/ Month</span></div>
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="twm-jobs-list-style1 mb-5">
                                        <div class="twm-media">
                                            <img src="{{ asset("assets/front/images/jobs-company/pic4.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-mid-content">
                                            <a href="job-detail.html" class="twm-job-title">
                                                <h4 class="twm-job-title">Art Production Specialist   <span class="twm-job-post-duration">/ 2 days ago</span></h4>
                                            </a>
                                            <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                        </div>
                                        <div class="twm-right-content">
                                            <div class="twm-jobs-category green"><span class="twm-bg-sky">Freelancer</span></div>
                                            <div class="twm-jobs-amount">$3000 <span>/ Month</span></div>
                                            <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Apply Job</a>
                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>

                        <div class="pagination-outer">
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
    </div>

@endsection

@push("js")

@endpush
