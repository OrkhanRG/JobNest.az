@extends("layouts.admin")
@section("title", isset($language) && $language ? $language->name : "Yeni dil")

@push("css")
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($language) && $language ? $language->name : "Yeni dil",
        "links" => [
            [
                "name" => "Dillər",
                "url" => route("admin.languages.list")
            ],
            [
                "name" => isset($language) && $language ? $language->name : "Yeni dil",
                "url" => route("admin.languages.create")
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

                <a href="{{ route("admin.languages.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <form class="my-3" method="{{ isset($language) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($language) ? route("admin.languages.edit", $language->id) : route("admin.languages.create") }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($language) ? $language->name : "" }}"  placeholder="Ad...">
                    </div>

                    <div class="col-md-4">
                        <label for="native_name" class="form-label">Orginal Ad</label>
                        <input type="text" class="form-control" id="native_name" name="native_name" data-role="native_name" value="{{ isset($language) ? $language->native_name : "" }}" placeholder="Orginal Ad...">
                    </div>

                    <div class="col-md-4">
                        <label for="code" class="form-label">Kod</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="code" name="code" data-role="code" value="{{ isset($language) ? $language->code : "" }}" placeholder="Kod...">
                    </div>

                    <div class="col-md-12">
                        <label for="is_active" class="d-block mb-1">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="is_active" id=is_active {{ isset($language) && $language->is_active ? "checked" : "" }}>
                            <label class="form-check-label" for="is_active">Aktivdir?</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($language) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($language) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script src="{{ asset("assets/admin/custom/js/languages/create-update.js") }}"></script>
@endpush
