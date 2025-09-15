@extends("layouts.front")
@section("title", "Şirkətlər")

@push("css")

@endpush

@section("contents")
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


    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="product-filter-wrap d-flex justify-content-between align-items-center m-b30">

                        <div class="ls-inputicon-box">
                            <input class="form-control" name="keyword" data-role="keyword" type="text" placeholder="Açar söz..." value="{{ request()->get("keyword", "") }}">
                            <i class="fs-input-icon fa fa-search"></i>
                        </div>

                        @if(false)
                            <div>
                                <span class="woocommerce-result-count-left" data-role="total-show-count"><small>x nəticədən y-i göstərilir</small></span>
                            </div>
                        @endif

                        <div class="woocommerce-ordering twm-filter-select">
                            <span class="woocommerce-result-count">Sort By</span>
                            <select class="wt-select-bar-2 selectpicker" data-role=""  data-live-search="true" data-bv-field="size">
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
                        <div class="row" id="companies-container">

                             @if(false)
                                <div class="col-lg-3 col-md-3">
                                    <div class="twm-employer-grid-style1 mb-5">
                                        <div class="twm-media">
                                            <img src="{{ asset("assets/front/images/jobs-company/pic1.jpg") }}" alt="#">
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
                             @endif

                        </div>
                    </div>

                    @if(false)
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
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

@push("js")
    <script src="{{ asset("assets/front/custom/library/smartInfinityScroll.js") }}"></script>
    <script src="{{ asset("assets/front/custom/js/company/list.js") }}"></script>
@endpush
