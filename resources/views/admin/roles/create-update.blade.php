@extends("layouts.admin")
@section("title", isset($role) && $role ? $role->label : "Yeni rol")

@push("css")
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($role) && $role ? $role->label : "Yeni rol",
        "links" => [
            [
                "name" => "Rollar",
                "url" => route("admin.roles.list")
            ],
            [
                "name" => isset($role) && $role ? $role->label : "Yeni rol",
                "url" => route("admin.roles.create")
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

                <a href="{{ route("admin.roles.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <form class="my-3" method="{{ isset($role) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($role) ? route("admin.roles.edit", $role->id) : route("admin.roles.create") }}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($role) ? $role->name : "" }}"  placeholder="Ad...">
                    </div>

                    <div class="col-md-6">
                        <label for="label" class="form-label">Label</label>
                        <input type="text" class="form-control" id="label" name="label" data-role="label" value="{{ isset($role) ? $role->label : "" }}" placeholder="Label...">
                    </div>

                    <div class="col-md-12">
                        <label for="is_active" class="d-block mb-1">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="is_active" id=is_active {{ isset($role) && $role->is_active ? "checked" : "" }}>
                            <label class="form-check-label" for="is_active">Aktivdir?</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($role) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($role) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script src="{{ asset("assets/admin/custom/js/roles/create-update.js") }}"></script>
@endpush
