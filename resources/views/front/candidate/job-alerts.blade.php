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
                            <span class="woocommerce-result-count-left">Job Alerts</span>

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

                        <div class="table-responsive">
                            <table class="table twm-table table-striped table-borderless">
                            <thead>
                                <tr>
                                <th>Title</th>
                                <th>Jobs Description</th>
                                <th>Date</th>
                                <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!--1-->
                                <tr>
                                    <td>Web Developer</td>
                                    <td>A strategic approach to website design..</td>
                                    <td>28/06/2023</td>
                                    <td>
                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                            <span class="fa fa-eye"></span>
                                            <span class="custom-toltip-block">Veiw</span>
                                        </a>
                                        <button title="Delete"  data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <!--2-->
                                <tr>
                                    <td>SEO Experts</td>
                                    <td>Providing the best SEO practices.</td>
                                    <td>28/06/2023</td>
                                    <td>
                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                            <span class="fa fa-eye"></span>
                                            <span class="custom-toltip-block">Veiw</span>
                                        </a>
                                        <button title="Delete"  data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <!--3-->
                                <tr>
                                    <td>Web Developer</td>
                                    <td>As promised, we’re the most professional..</td>
                                    <td>Weekly</td>
                                    <td>
                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                            <span class="fa fa-eye"></span>
                                            <span class="custom-toltip-block">Veiw</span>
                                        </a>
                                        <button title="Delete"  data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <!--4-->
                                <tr>
                                    <td>Web Designer</td>
                                    <td>Custom web design solutions websites..</td>
                                    <td>28/06/2023</td>
                                    <td>
                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                            <span class="fa fa-eye"></span>
                                            <span class="custom-toltip-block">Veiw</span>
                                        </a>
                                        <button title="Delete"  data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <!--5-->
                                <tr>
                                    <td>Web Developer</td>
                                    <td>A strategic approach to website design..</td>
                                    <td>28/06/2023</td>
                                    <td>
                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                            <span class="fa fa-eye"></span>
                                            <span class="custom-toltip-block">Veiw</span>
                                        </a>
                                        <button title="Delete"  data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash-alt"></i></button>
                                    </td>
                                </tr>

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push("js")

@endpush
