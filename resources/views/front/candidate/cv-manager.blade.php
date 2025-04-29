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
                            <span class="woocommerce-result-count-left">CV Manager</span>

                            <form class="woocommerce-ordering twm-filter-select" method="get">
                                <span class="woocommerce-result-count">Short By</span>
                                <select class="wt-select-bar-2 selectpicker"  data-live-search="true" data-bv-field="size">
                                    <option>Last 2 Months</option>
                                    <option>Last 1 Months</option>
                                    <option>15 days ago</option>
                                    <option>Weekly</option>
                                    <option>Yesterday</option>
                                    <option>Today</option>
                                </select>
                            </form>

                        </div>

                        <div class="twm-cv-manager-list-wrap">
                            <ul>
                                <li>
                                    <div class="twm-cv-manager-list-style1">
                                        <div class="twm-media">
                                            <div class="twm-media-pic">
                                                <img src="{{ asset("assets/images/candidates/pic1.jpg") }}" alt="#">
                                            </div>
                                        </div>
                                        <div class="twm-mid-content">
                                            <a href="candidate-detail.html" class="twm-job-title">
                                                <h4>Wanda Montgomery </h4>
                                            </a>
                                            <p>Charted Accountant</p>

                                            <div class="twm-fot-content">
                                                <div class="twm-left-info">
                                                    <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                                    <div class="twm-job-post-duration">1 days ago</div>
                                                    <div class="twm-candidates-tag"><span>Full Time</span></div>
                                                </div>
                                                <div class="twm-view-button">
                                                    <a href="files/pdf-sample.pdf" title="Download" target="blank" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-download"></i></a>
                                                    <a href="javascript:;" title="Delete" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li>
                                    <div class="twm-cv-manager-list-style1">
                                        <div class="twm-media">
                                            <div class="twm-media-pic">
                                                <img src="{{ asset("assets/images/candidates/pic2.jpg") }}" alt="#">
                                            </div>
                                        </div>
                                        <div class="twm-mid-content">
                                            <a href="candidate-detail.html" class="twm-job-title">
                                                <h4>Peter Hawkins</h4>
                                            </a>
                                            <p>Medical Professed</p>

                                            <div class="twm-fot-content">
                                                <div class="twm-left-info">
                                                    <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                                    <div class="twm-job-post-duration">1 days ago</div>
                                                    <div class="twm-candidates-tag"><span>Full Time</span></div>
                                                </div>
                                                <div class="twm-view-button">
                                                    <a href="files/pdf-sample.pdf" title="Download" target="blank" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-download"></i></a>
                                                    <a href="javascript:;" title="Delete" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li>
                                    <div class="twm-cv-manager-list-style1">
                                        <div class="twm-media">
                                            <div class="twm-media-pic">
                                                <img src="{{ asset("assets/images/candidates/pic3.jpg") }}" alt="#">
                                            </div>
                                        </div>
                                        <div class="twm-mid-content">
                                            <a href="candidate-detail.html" class="twm-job-title">
                                                <h4>Ralph Johnson  </h4>
                                            </a>
                                            <p>Bank Manger</p>

                                            <div class="twm-fot-content">
                                                <div class="twm-left-info">
                                                    <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                                    <div class="twm-job-post-duration">1 days ago</div>
                                                    <div class="twm-candidates-tag"><span>Full Time</span></div>
                                                </div>
                                                <div class="twm-view-button">
                                                    <a href="files/pdf-sample.pdf" title="Download" target="blank" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-download"></i></a>
                                                    <a href="javascript:;" title="Delete" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li>
                                    <div class="twm-cv-manager-list-style1">
                                        <div class="twm-media">
                                            <div class="twm-media-pic">
                                                <img src="{{ asset("assets/images/candidates/pic4.jpg") }}" alt="#">
                                            </div>
                                        </div>
                                        <div class="twm-mid-content">
                                            <a href="candidate-detail.html" class="twm-job-title">
                                                <h4>Randall Henderson </h4>
                                            </a>
                                            <p>IT Contractor</p>

                                            <div class="twm-fot-content">
                                                <div class="twm-left-info">
                                                    <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                                    <div class="twm-job-post-duration">1 days ago</div>
                                                    <div class="twm-candidates-tag"><span>Full Time</span></div>
                                                </div>
                                                <div class="twm-view-button">
                                                    <a href="files/pdf-sample.pdf" title="Download" target="blank" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-download"></i></a>
                                                    <a href="javascript:;" title="Delete" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li>
                                    <div class="twm-cv-manager-list-style1">
                                        <div class="twm-media">
                                            <div class="twm-media-pic">
                                                <img src="{{ asset("assets/images/candidates/pic5.jpg") }}" alt="#">
                                            </div>
                                        </div>
                                        <div class="twm-mid-content">
                                            <a href="candidate-detail.html" class="twm-job-title">
                                                <h4>Randall Warren</h4>
                                            </a>
                                            <p>Digital & Creative</p>

                                            <div class="twm-fot-content">
                                                <div class="twm-left-info">
                                                    <p class="twm-candidate-address"><i class="feather-map-pin"></i>New York</p>
                                                    <div class="twm-job-post-duration">1 days ago</div>
                                                    <div class="twm-candidates-tag"><span>Full Time</span></div>
                                                </div>
                                                <div class="twm-view-button">
                                                    <a href="files/pdf-sample.pdf" title="Download" target="blank" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-download"></i></a>
                                                    <a href="javascript:;" title="Delete" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></a>
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
    </div>

@endsection

@push("js")

@endpush
