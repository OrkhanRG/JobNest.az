@extends("layouts.admin")
@section("title", isset($permission) && $permission ? $permission->label : "Yeni icazə")

@push("css")
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($permission) && $permission ? $permission->label : "Yeni icazə",
        "links" => [
            [
                "name" => "İcazələr",
                "url" => route("admin.permissions.list")
            ],
            [
                "name" => isset($permission) && $permission ? $permission->label : "Yeni icazə",
                "url" => route("admin.permissions.create")
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

                <a href="{{ route("admin.permissions.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <form class="my-3" method="{{ isset($permission) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($permission) ? route("admin.permissions.edit", $permission->id) : route("admin.permissions.create") }}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($permission) ? $permission->name : "" }}"  placeholder="Ad...">
                    </div>

                    <div class="col-md-6">
                        <label for="label" class="form-label">Label</label>
                        <input type="text" class="form-control" id="label" name="label" data-role="label" value="{{ isset($permission) ? $permission->label : "" }}" placeholder="Label...">
                    </div>

                    <div class="col-md-12">
                        <label for="is_active" class="d-block mb-1">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="is_active" id=is_active {{ isset($permission) && $permission->is_active ? "checked" : "" }}>
                            <label class="form-check-label" for="is_active">Aktivdir?</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($permission) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($permission) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script src="{{ asset("assets/admin/custom/js/permissions/create-update.js") }}"></script>
@endpush
