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
                <h5 class="mb-1 anchor" id="dividers">
                    <span>nəticə: <b data-role="table-total-count">0</b></span> | <span>saniyə: <b data-role="table-total-time">12</b></span>
                </h5>
                <div>
                    <a href="{{ route("admin.job-categories.create") }}" title="Yeni Kateqoriya">
                        <iconify-icon class="fs-24 align-middle" icon="iconamoon:sign-plus-circle-duotone"></iconify-icon>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">İkon</th>
                        <th scope="col">Ad</th>
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
            <div data-role="loader" class="loader d-none"></div>

        </div>

    </div>
@endsection

@push("js")
    <script>
        let job_categories_route =  "{{ route("admin.job-categories.list") }}",
            job_categories_edit_route = "{{ route("admin.job-categories.edit", "category_id") }}",
            job_categories_delete_route = "{{ route("admin.job-categories.delete", "category_id") }}";
    </script>
    <script src="{{ asset("assets/admin/custom/js/job_category/list.js") }}"></script>
@endpush
