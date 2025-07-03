@extends("layouts.admin")
@section("title", isset($category) && $category ? $category->name : "Yeni Kateqoriya")

@push("css")
    <link rel="stylesheet" href="{{ asset("assets/admin/custom/css/job_category/create-update.css") }}" type="text/css">
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($category) && $category ? $category->name : "Yeni Kateqoriya",
        "links" => [
            [
                "name" => "Kateqoriyalar",
                "url" => route("admin.job-categories.list")
            ],
            [
                "name" => isset($category) && $category ? $category->name : "Yeni Kateqoriya",
                "url" => route("admin.job-categories.create")
            ],

        ]
    ])
@endsection

@section("contents")
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title mb-1 anchor" id="dividers">
                    Form
                </h5>

                <a href="{{ route("admin.job-categories.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <input type="hidden" data-role="edit-id" value="{{ isset($category) ? $category->id : "" }}">

            <form class="my-3" method="{{ isset($category) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($category) ? route("admin.job-categories.edit", $category->id) : route("admin.job-categories.create") }}" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($category) ? $category->name : "" }}"  placeholder="Kateqoriya Adı...">
                    </div>

                    <div class="col-md-6">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" data-role="slug" value="{{ isset($category) ? $category->slug : "" }}" placeholder="Slug...">
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Təsvir</label>
                        <textarea class="form-control" id="description" name="description" data-role="description" rows="4" placeholder="Kateqoriya haqda məlumat...">{{ isset($category) ? $category->description : "" }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="parent_id" class="form-label">Üst Kateqoriya</label>
                        <select class="form-control" data-selected-id="{{ isset($category) ? $category->id : "" }}" id="parent_id" name="parent_id" data-type data-role="parent_id" data-parent-id="{{ isset($category) ? $category->parent_id : "" }}">
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="icon" class="d-block mb-1">İkon</label>
                        <input type="file" id="icon" name="icon" data-role="icon">
                    </div>
                    <div class="col-md-6">
                        <div class="flex-shrink-0 me-3 {{ isset($category) && $category->icon ? "" : "d-none" }}" data-role="preview-icon">
                            <div class="avatar bg-light rounded icon-container">
                                <img class="img-fluid rounded d-block" src="{{ isset($category) ? asset($category->icon) : "" }}" alt="Image" />
                                <iconify-icon data-role="icon-close" class="fs-24 align-middle text-danger icon-remove" icon="material-symbols:close-small"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="is_active" class="d-block mb-1">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="is_active" id=is_active {{ isset($category) && $category->is_active ? "checked" : "" }}>
                            <label class="form-check-label" for="is_active">Aktivdir?</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($category) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($category) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script>
        let job_categories_create_route = "{{ route("admin.job-categories.create") }}",
            job_categories_get_parents_route = "{{ route("admin.job-categories.getParents") }}";
    </script>
    <script src="{{ asset("assets/admin/custom/js/job_category/create-update.js") }}"></script>
@endpush
