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

                        <div style="display: none;">
                            <span class="woocommerce-result-count-left" data-role="total-show-count">
                                <small>x nəticədən y-i göstərilir</small>
                            </span>
                        </div>

                        <div class="woocommerce-ordering twm-filter-select">
                            <span class="woocommerce-result-count">Sıralama</span>
                            <select class="wt-select-bar-2 selectpicker" data-role="order"  data-live-search="true" data-bv-field="size">
                                <option value="name_asc" {{ request()->get("order") === "name_asc" ? "selected" : "" }}>A-dan Z-yə</option>
                                <option value="name_desc" {{ request()->get("order") === "name_desc" ? "selected" : "" }}>Z-dən A-ya</option>
                                <option value="created_at_desc" {{ request()->get("order") === "created_at_desc" ? "selected" : "" }}>Son əlavə olunmuşlar</option>
                                <option value="created_at_asc" {{ request()->get("order") === "created_at_asc" ? "selected" : "" }}>İlk əlavə olunmuşlar</option>
                            </select>
                        </div>

                    </div>

                    <div class="twm-employer-list-wrap">
                        <div class="row" id="companies-container">
                        </div>

                        <div id="no-results-message" class="text-center p-5" style="display: none;">
                            <img src="{{ asset('assets/front/custom/images/undraw/no-result.svg') }}" alt="Nəticə tapılmadı" class="no-result-image">
                            <h4 class="mt-4">Axtarışa uyğun şirkət tapılmadı.</h4>
                            <p class="text-muted">Fərqli açar sözlərlə axtarış etməyi yoxlayın.</p>
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
    <script src="{{ asset("assets/front/custom/js/company/list.js") }}"></script>
@endpush
