@extends("layouts.front")
@section("title", "Dashboard")

@push("css")

@endpush

@section("contents")

    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                @include("layouts.front.components.sections.sidebar-company-management")

                <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                    <div class="twm-right-section-panel candidate-save-job site-bg-gray">
                        <!--Filter Short By-->
                        <div class="product-filter-wrap d-flex justify-content-between align-items-center">
                            <span class="woocommerce-result-count-left">Transaction History</span>

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
                                    <th>Order ID</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td class="order-id text-primary">#123</td>
                                    <td class="job-name"><a href="javascript:void(0);">Social Media Expert</a></td>
                                    <td class="amount text-primary">$99</td>
                                    <td class="date">18/08/2023</td>
                                    <td class="transfer">Paypal</td>
                                    <td class="expired">
                                        <span class="text-clr-green2">Successful </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id text-primary">#456</td>
                                    <td class="job-name"><a href="javascript:void(0);">Web Designer</a></td>
                                    <td class="amount text-primary">$199</td>
                                    <td class="date">12/07/2023</td>
                                    <td class="transfer">Bank Transfer</td>
                                    <td class="expired">
                                        <span class="text-clr-yellow">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id text-primary">#789</td>
                                    <td class="job-name"><a href="javascript:void(0);">Finance Accountant</a></td>
                                    <td class="amount text-primary">$299</td>
                                    <td class="date">10/07/2023</td>
                                    <td class="transfer">Paypal</td>
                                    <td class="expired">
                                        <span class="text-clr-red">Rejects</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id text-primary">#101</td>
                                    <td class="job-name"><a href="javascript:void(0);">Social Media Expert</a></td>
                                    <td class="amount text-primary">$399</td>
                                    <td class="date">28/06/2023</td>
                                    <td class="transfer">Bank Transfer</td>
                                    <td class="expired">
                                        <span class="text-clr-green2">Successful </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id text-primary">#112</td>
                                    <td class="job-name"><a href="javascript:void(0);">Web Designer</a></td>
                                    <td class="amount text-primary">$499</td>
                                    <td class="date">18/06/2023</td>
                                    <td class="transfer">Paypal</td>
                                    <td class="expired">
                                        <span class="text-clr-yellow">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id text-primary">#987</td>
                                    <td class="job-name"><a href="javascript:void(0);">Finance Accountant</a></td>
                                    <td class="amount text-primary">$599</td>
                                    <td class="date">12/06/2023</td>
                                    <td class="transfer">Bank Transfer</td>
                                    <td class="expired">
                                        <span class="text-clr-green2">Successful </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id text-primary">#654</td>
                                    <td class="job-name"><a href="javascript:void(0);">Social Media Expert</a></td>
                                    <td class="amount text-primary">$699</td>
                                    <td class="date">10/06/2023</td>
                                    <td class="transfer">Paypal</td>
                                    <td class="expired">
                                        <span class="text-clr-green2">Successful </span>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-outer text-right">
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
