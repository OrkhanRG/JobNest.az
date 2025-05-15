@extends("layouts.admin")
@section("title", "Dashboard")

@push("css")

@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => "Dashboard",
        "links" => [
            [
                "name" => "Dashboard",
                "url" => route("admin.dashboard")
            ],
        ]
    ])
@endsection

@section("contents")
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-primary rounded">
                            <i class="bx bx-layer avatar-title fs-24 text-white"></i>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-6 text-end">
                        <p class="text-muted mb-0 text-truncate">
                            Total Jobs
                        </p>
                        <h3 class="text-dark mt-1 mb-0">
                            13, 647
                        </h3>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-success rounded">
                            <i class="bx bx-award avatar-title fs-24 text-white"></i>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-6 text-end">
                        <p class="text-muted mb-0 text-truncate">
                            Total Employee
                        </p>
                        <h3 class="text-dark mt-1 mb-0">
                            9, 526
                        </h3>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-danger rounded">
                            <i class="bx bxs-backpack avatar-title fs-24 text-white"></i>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-6 text-end">
                        <p class="text-muted mb-0 text-truncate">
                            Total Company
                        </p>
                        <h3 class="text-dark mt-1 mb-0">
                            976
                        </h3>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md text-bg-warning rounded">
                            <i class="bx bx-dollar-circle avatar-title fs-24"></i>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-6 text-end">
                        <p class="text-muted mb-0 text-truncate">
                            Active Vacancies
                        </p>
                        <h3 class="text-dark mt-1 mb-0">
                            $123
                        </h3>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

@endsection

@push("js")

@endpush
