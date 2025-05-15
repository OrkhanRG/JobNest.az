@extends("layouts.front")
@section("title", "CV-lər")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "CV-lər",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "CV-lər",
                "url" => route("front.candidates")
            ]
        ]
    ])
    <!-- INNER PAGE BANNER END -->

    <div class="section-full p-t120  p-b90 site-bg-white">

        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-12 rightSidebar">

                    <div class="side-bar">

                        <div class="sidebar-elements search-bx">

                            <form>

                                <div class="form-group mb-4">
                                    <h4 class="section-head-small mb-4">Category</h4>
                                    <select class="wt-select-bar-large selectpicker"  data-live-search="true" data-bv-field="size">
                                        <option selected>All Category</option>
                                        <option>Web Designer</option>
                                        <option>Developer</option>
                                        <option>Acountant</option>
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <h4 class="section-head-small mb-4">Keyword</h4>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Job Title or Keyword">
                                        <button class="btn" type="button"><i class="feather-search"></i></button>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <h4 class="section-head-small mb-4">Location</h4>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search location">
                                        <button class="btn" type="button"><i class="feather-map-pin"></i></button>
                                    </div>
                                </div>

                                <div class="twm-sidebar-ele-filter">
                                    <h4 class="section-head-small mb-4">Job Type</h4>
                                    <ul>
                                        <li>
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Freelance</label>
                                            </div>
                                            <span class="twm-job-type-count">09</span>
                                        </li>

                                        <li>
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                <label class="form-check-label" for="exampleCheck2">Full Time</label>
                                            </div>
                                            <span class="twm-job-type-count">07</span>
                                        </li>

                                        <li>
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                                <label class="form-check-label" for="exampleCheck3">Internship</label>
                                            </div>
                                            <span class="twm-job-type-count">15</span>
                                        </li>

                                        <li>
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                                <label class="form-check-label" for="exampleCheck4">Part Time</label>
                                            </div>
                                            <span class="twm-job-type-count">20</span>
                                        </li>

                                        <li>
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                                <label class="form-check-label" for="exampleCheck5">Temporary</label>
                                            </div>
                                            <span class="twm-job-type-count">22</span>
                                        </li>

                                        <li>
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                                <label class="form-check-label" for="exampleCheck6">Volunteer</label>
                                            </div>
                                            <span class="twm-job-type-count">25</span>
                                        </li>

                                    </ul>
                                </div>

                                <div class="twm-sidebar-ele-filter">
                                    <h4 class="section-head-small mb-4">Date Posts</h4>
                                    <ul>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio1">
                                                <label class="form-check-label" for="exampleradio1">Last hour</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio2">
                                                <label class="form-check-label" for="exampleradio2">Last 24 hours</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio3">
                                                <label class="form-check-label" for="exampleradio3">Last 7 days</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio4">
                                                <label class="form-check-label" for="exampleradio4">Last 14 days</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio5">
                                                <label class="form-check-label" for="exampleradio5">Last 30 days</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio6">
                                                <label class="form-check-label" for="exampleradio6">All</label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <div class="twm-sidebar-ele-filter">
                                    <h4 class="section-head-small mb-4">Type of employment</h4>
                                    <ul>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="Freelance1">
                                                <label class="form-check-label" for="Freelance1">Freelance</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="FullTime1">
                                                <label class="form-check-label" for="FullTime1">Full Time</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="Intership1">
                                                <label class="form-check-label" for="Intership1">Intership</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="Part-Time1">
                                                <label class="form-check-label" for="Part-Time1">Part Time</label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                            </form>

                        </div>

                        <div class="widget tw-sidebar-tags-wrap">
                            <h4 class="section-head-small mb-4">Tags</h4>

                            <div class="tagcloud">
                                <a href="job-list.html">General</a>
                                <a href="job-list.html">Jobs </a>
                                <a href="job-list.html">Payment</a>
                                <a href="job-list.html">Application </a>
                                <a href="job-list.html">Work</a>
                                <a href="job-list.html">Recruiting</a>
                                <a href="job-list.html">Employer</a>
                                <a href="job-list.html">Income</a>
                                <a href="job-list.html">Tips</a>
                            </div>
                        </div>


                    </div>

                    <div class="twm-advertisment" style="background-image:url({{ asset("assets/front/images/add-bg.jpg") }});">
                       <div class="overlay"></div>
                       <h4 class="twm-title">Recruiting?</h4>
                       <p>Get Best Matched Jobs On your <br>
                        Email. Add Resume NOW!</p>
                        <a href="about-1.html" class="site-button white">Read More</a>
                    </div>

                </div>

                <div class="col-lg-8 col-md-12">
                    <!--Filter Short By-->
                    <div class="product-filter-wrap d-flex justify-content-between align-items-center m-b30">
                        <span class="woocommerce-result-count-left">Showing 2,150 Candidates</span>

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

                    <div class="twm-candidates-list-wrap">
                        <ul>
                             <li>
                                 <div class="twm-candidates-list-style1 mb-5">
                                     <div class="twm-media">
                                         <div class="twm-media-pic">
                                            <img src="{{ asset("assets/front/images/candidates/pic1.jpg") }}" alt="#">
                                         </div>
                                         <div class="twm-candidates-tag"><span>Featured</span></div>
                                     </div>
                                     <div class="twm-mid-content">
                                         <a href="{{ route("front.candidate", "test") }}" class="twm-job-title">
                                             <h4>Wanda Montgomery </h4>
                                         </a>
                                         <p>Charted Accountant</p>

                                         <div class="twm-fot-content">
                                             <div class="twm-left-info">
                                                <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                                <div class="twm-jobs-vacancies">$20<span>/ Day</span></div>
                                             </div>
                                             <div class="twm-right-btn">
                                                 <a href="{{ route("front.candidate", "test") }}" class="twm-view-prifile site-text-primary">View Profile</a>
                                             </div>
                                        </div>
                                     </div>

                                 </div>
                             </li>

                             <li>
                                <div class="twm-candidates-list-style1 mb-5">
                                    <div class="twm-media">
                                        <div class="twm-media-pic">
                                           <img src="{{ asset("assets/front/images/candidates/pic2.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-candidates-tag"><span>Featured</span></div>
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="candidate-detail.html" class="twm-job-title">
                                            <h4>Peter Hawkins</h4>
                                        </a>
                                        <p>Medical Professed</p>

                                        <div class="twm-fot-content">
                                            <div class="twm-left-info">
                                               <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                               <div class="twm-jobs-vacancies">$7<span>/ Hour</span></div>
                                            </div>
                                            <div class="twm-right-btn">
                                                <a href="candidate-detail.html" class="twm-view-prifile site-text-primary">View Profile</a>
                                            </div>
                                       </div>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="twm-candidates-list-style1 mb-5">
                                    <div class="twm-media">
                                        <div class="twm-media-pic">
                                           <img src="{{ asset("assets/front/images/candidates/pic3.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-candidates-tag"><span>Featured</span></div>
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="candidate-detail.html" class="twm-job-title">
                                            <h4>Ralph Johnson  </h4>
                                        </a>
                                        <p>Bank Manger</p>

                                        <div class="twm-fot-content">
                                            <div class="twm-left-info">
                                               <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                               <div class="twm-jobs-vacancies">$180<span>/ Day</span></div>
                                            </div>
                                            <div class="twm-right-btn">
                                                <a href="candidate-detail-2.html" class="twm-view-prifile site-text-primary">View Profile</a>
                                            </div>
                                       </div>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="twm-candidates-list-style1 mb-5">
                                    <div class="twm-media">
                                        <div class="twm-media-pic">
                                           <img src="{{ asset("assets/front/images/candidates/pic4.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-candidates-tag"><span>Featured</span></div>
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="candidate-detail.html" class="twm-job-title">
                                            <h4>Randall Henderson </h4>
                                        </a>
                                        <p>IT Contractor</p>

                                        <div class="twm-fot-content">
                                            <div class="twm-left-info">
                                               <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                               <div class="twm-jobs-vacancies">$90<span>/ Week</span></div>
                                            </div>
                                            <div class="twm-right-btn">
                                                <a href="candidate-detail.html" class="twm-view-prifile site-text-primary">View Profile</a>
                                            </div>
                                       </div>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="twm-candidates-list-style1 mb-5">
                                    <div class="twm-media">
                                        <div class="twm-media-pic">
                                           <img src="{{ asset("assets/front/images/candidates/pic5.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-candidates-tag"><span>Featured</span></div>
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="candidate-detail.html" class="twm-job-title">
                                            <h4>Randall Warren</h4>
                                        </a>
                                        <p>Digital & Creative</p>

                                        <div class="twm-fot-content">
                                            <div class="twm-left-info">
                                               <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                               <div class="twm-jobs-vacancies">$95<span>/ Day</span></div>
                                            </div>
                                            <div class="twm-right-btn">
                                                <a href="candidate-detail.html" class="twm-view-prifile site-text-primary">View Profile</a>
                                            </div>
                                       </div>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="twm-candidates-list-style1 mb-5">
                                    <div class="twm-media">
                                        <div class="twm-media-pic">
                                           <img src="{{ asset("assets/front/images/candidates/pic6.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-candidates-tag"><span>Featured</span></div>
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="candidate-detail.html" class="twm-job-title">
                                            <h4>Christina Fischer </h4>
                                        </a>
                                        <p>Charity & Voluntary</p>

                                        <div class="twm-fot-content">
                                            <div class="twm-left-info">
                                               <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                               <div class="twm-jobs-vacancies">$19<span>/ Hour</span></div>
                                            </div>
                                            <div class="twm-right-btn">
                                                <a href="candidate-detail.html" class="twm-view-prifile site-text-primary">View Profile</a>
                                            </div>
                                       </div>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="twm-candidates-list-style1 mb-5">
                                    <div class="twm-media">
                                        <div class="twm-media-pic">
                                           <img src="{{ asset("assets/front/images/candidates/pic7.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-candidates-tag"><span>Featured</span></div>
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="candidate-detail.html" class="twm-job-title">
                                            <h4>Wanda Willis </h4>
                                        </a>
                                        <p>Marketing & PR</p>

                                        <div class="twm-fot-content">
                                            <div class="twm-left-info">
                                               <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                               <div class="twm-jobs-vacancies">$12<span>/ Day</span></div>
                                            </div>
                                            <div class="twm-right-btn">
                                                <a href="candidate-detail.html" class="twm-view-prifile site-text-primary">View Profile</a>
                                            </div>
                                       </div>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="twm-candidates-list-style1 mb-5">
                                    <div class="twm-media">
                                        <div class="twm-media-pic">
                                           <img src="{{ asset("assets/front/images/candidates/pic8.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-candidates-tag"><span>Featured</span></div>
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="candidate-detail.html" class="twm-job-title">
                                            <h4>Peter Hawkins</h4>
                                        </a>
                                        <p>Public Sector</p>

                                        <div class="twm-fot-content">
                                            <div class="twm-left-info">
                                               <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                               <div class="twm-jobs-vacancies">$7<span>/ Hour</span></div>
                                            </div>
                                            <div class="twm-right-btn">
                                                <a href="candidate-detail.html" class="twm-view-prifile site-text-primary">View Profile</a>
                                            </div>
                                       </div>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="twm-candidates-list-style1 mb-5">
                                    <div class="twm-media">
                                        <div class="twm-media-pic">
                                           <img src="{{ asset("assets/front/images/candidates/pic9.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-candidates-tag"><span>Featured</span></div>
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="candidate-detail.html" class="twm-job-title">
                                            <h4>Kathleen Moreno </h4>
                                        </a>
                                        <p>Sales & Marketing</p>

                                        <div class="twm-fot-content">
                                            <div class="twm-left-info">
                                               <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                               <div class="twm-jobs-vacancies">$125<span>/ Week</span></div>
                                            </div>
                                            <div class="twm-right-btn">
                                                <a href="candidate-detail.html" class="twm-view-prifile site-text-primary">View Profile</a>
                                            </div>
                                       </div>
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

@endsection

@push("js")

@endpush
