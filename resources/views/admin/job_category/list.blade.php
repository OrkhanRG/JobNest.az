@extends("layouts.admin")
@section("title", "İş Kateqoriyaları")

@push("css")

@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => "Siyahı",
        "links" => [
            [
                "name" => "İş Kateqoriyaları",
                "url" => route("admin.job-categories.list")
            ],
        ]
    ])
@endsection

@section("contents")
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title mb-1 anchor" id="dividers">
                    Kateqoriyalar
                </h5>
                <p class="text-muted font-14">
                    <span>nəticə: <b>3</b></span> | <span>saniyə: <b>12</b></span>
                </p>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">İkon</th>
                        <th scope="col">Ad</th>
                        <th scope="col">Üst Kateqoriya</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Açığlama</th>
                        <th scope="col" class="text-center">
                            <iconify-icon class="fs-21 align-middle" icon="iconamoon:settings-duotone"></iconify-icon>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider" data-role="table-body">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@push("js")
    <script>
        let job_categories_route =  "{{ route("admin.job-categories.list") }}";
    </script>
    <script src="{{ asset("assets/admin/custom/js/job_category/list.js") }}"></script>
@endpush
