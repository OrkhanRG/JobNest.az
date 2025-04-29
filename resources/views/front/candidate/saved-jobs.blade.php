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
                    <!--Filter Short By-->
                    <div class="twm-right-section-panel candidate-save-job site-bg-gray">
                        <div class="twm-D_table table-responsive">
                            <table id="jobs_bookmark_table" class="table table-bordered twm-candidate-save-job-list-wrap">
                                <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--1-->
                                    <tr>
                                        <td>
                                            <div class="twm-candidate-save-job-list">
                                                <div class="twm-media">
                                                    <div class="twm-media-pic">
                                                       <img src="{{ asset( "assets/images/jobs-company/pic1.jpg") }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="twm-mid-content">
                                                    <a href="#" class="twm-job-title">
                                                        <h4>Senior Web Designer</h4>
                                                    </a>

                                                </div>

                                            </div>
                                        </td>
                                        <td><a href="javascript:;">Herbal Ltd</a></td>
                                        <td>
                                            <div>28/06/2023</div>
                                        </td>

                                        <td>
                                            <div class="twm-table-controls">
                                                <ul class="twm-DT-controls-icon list-unstyled">
                                                    <li>
                                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block">Veiw</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <span class="far fa-trash-alt"></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--2-->
                                    <tr>
                                        <td>
                                            <div class="twm-candidate-save-job-list">
                                                <div class="twm-media">
                                                    <div class="twm-media-pic">
                                                       <img src="{{ asset( "assets/images/jobs-company/pic2.jpg") }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="twm-mid-content">
                                                    <a href="#" class="twm-job-title">
                                                        <h4>Sr. Rolling Stock Technician</h4>
                                                    </a>

                                                </div>

                                            </div>
                                        </td>
                                        <td><a href="javascript:;">Dot Circle PVT Ltd</a></td>
                                        <td>
                                            <div>28/06/2023</div>
                                        </td>

                                        <td>
                                            <div class="twm-table-controls">
                                                <ul class="twm-DT-controls-icon list-unstyled">
                                                    <li>
                                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block">Veiw</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <span class="far fa-trash-alt"></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--3-->
                                    <tr>
                                        <td>
                                            <div class="twm-candidate-save-job-list">
                                                <div class="twm-media">
                                                    <div class="twm-media-pic">
                                                       <img src="{{ asset( "assets/images/jobs-company/pic3.jpg") }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="twm-mid-content">
                                                    <a href="#" class="twm-job-title">
                                                        <h4>IT Department Manager</h4>
                                                    </a>

                                                </div>

                                            </div>
                                        </td>
                                        <td><a href="javascript:;">Microsoft solution</a></td>
                                        <td>
                                            <div>28/06/2023</div>
                                        </td>

                                        <td>
                                            <div class="twm-table-controls">
                                                <ul class="twm-DT-controls-icon list-unstyled">
                                                    <li>
                                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block">Veiw</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <span class="far fa-trash-alt"></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--4-->
                                    <tr>
                                        <td>
                                            <div class="twm-candidate-save-job-list">
                                                <div class="twm-media">
                                                    <div class="twm-media-pic">
                                                       <img src="{{ asset( "assets/images/jobs-company/pic4.jpg") }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="twm-mid-content">
                                                    <a href="#" class="twm-job-title">
                                                        <h4>Art Production Specialist</h4>
                                                    </a>

                                                </div>

                                            </div>
                                        </td>
                                        <td><a href="javascript:;">Coderbotics solutions</a></td>
                                        <td>
                                            <div>28/06/2023</div>
                                        </td>

                                        <td>
                                            <div class="twm-table-controls">
                                                <ul class="twm-DT-controls-icon list-unstyled">
                                                    <li>
                                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block">Veiw</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <span class="far fa-trash-alt"></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--5-->
                                    <tr>
                                        <td>
                                            <div class="twm-candidate-save-job-list">
                                                <div class="twm-media">
                                                    <div class="twm-media-pic">
                                                       <img src="{{ asset( "assets/images/jobs-company/pic5.jpg") }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="twm-mid-content">
                                                    <a href="#" class="twm-job-title">
                                                        <h4>Recreation & Fitness Worker</h4>
                                                    </a>

                                                </div>

                                            </div>
                                        </td>
                                        <td><a href="javascript:;">Galaxy IT Solution</a></td>
                                        <td>
                                            <div>28/06/2023</div>
                                        </td>

                                        <td>
                                            <div class="twm-table-controls">
                                                <ul class="twm-DT-controls-icon list-unstyled">
                                                    <li>
                                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block">Veiw</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <span class="far fa-trash-alt"></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--6-->
                                    <tr>
                                        <td>
                                            <div class="twm-candidate-save-job-list">
                                                <div class="twm-media">
                                                    <div class="twm-media-pic">
                                                       <img src="{{ asset( "assets/images/jobs-company/pic1.jpg") }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="twm-mid-content">
                                                    <a href="#" class="twm-job-title">
                                                        <h4>Senior Web Designer</h4>
                                                    </a>

                                                </div>

                                            </div>
                                        </td>
                                        <td><a href="javascript:;">Robo Tech</a></td>
                                        <td>
                                            <div>28/06/2023</div>
                                        </td>

                                        <td>
                                            <div class="twm-table-controls">
                                                <ul class="twm-DT-controls-icon list-unstyled">
                                                    <li>
                                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block">Veiw</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <span class="far fa-trash-alt"></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--7-->
                                    <tr>
                                        <td>
                                            <div class="twm-candidate-save-job-list">
                                                <div class="twm-media">
                                                    <div class="twm-media-pic">
                                                       <img src="{{ asset( "assets/images/jobs-company/pic2.jpg") }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="twm-mid-content">
                                                    <a href="#" class="twm-job-title">
                                                        <h4>Sr. Rolling Stock Technician</h4>
                                                    </a>

                                                </div>

                                            </div>
                                        </td>
                                        <td><a href="javascript:;">Wins Developers</a></td>
                                        <td>
                                            <div>28/06/2023</div>
                                        </td>

                                        <td>
                                            <div class="twm-table-controls">
                                                <ul class="twm-DT-controls-icon list-unstyled">
                                                    <li>
                                                        <a data-bs-toggle="modal" href="#saved-jobs-view" role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block">Veiw</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <span class="far fa-trash-alt"></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
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
