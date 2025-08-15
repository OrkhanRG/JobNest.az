@extends("layouts.admin")
@section("title", isset($currency) && $currency ? $currency->name : "Yeni valyuta")

@push("css")
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($currency) && $currency ? $currency->name : "Yeni valyuta",
        "links" => [
            [
                "name" => "Valyutalar",
                "url" => route("admin.currencies.list")
            ],
            [
                "name" => isset($currency) && $currency ? $currency->name : "Yeni valyuta",
                "url" => route("admin.currencies.create")
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

                <a href="{{ route("admin.currencies.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <form class="my-3" method="{{ isset($currency) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($currency) ? route("admin.currencies.edit", $currency->id) : route("admin.currencies.create") }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($currency) ? $currency->name : "" }}"  placeholder="Ad...">
                    </div>

                    <div class="col-md-4">
                        <label for="code" class="form-label">Kod</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="code" name="code" data-role="code" value="{{ isset($currency) ? $currency->code : "" }}" placeholder="Kod...">
                    </div>

                    <div class="col-md-4">
                        <label for="symbol" class="form-label">Simvol</label> <span class="text-danger">*</span>
                        <select class="form-control" id="symbol" name="symbol" data-role="symbol">
                            <option value="">Simvol seçin</option>
                            @foreach(config("jobnest.currencies") as $curr)
                                <option value="{{ $curr }}" {{ isset($currency) && $curr === $currency->symbol ? "selected" : "" }}>{{ $curr }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="is_active" class="d-block mb-1">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="is_active" id=is_active {{ isset($currency) && $currency->is_active ? "checked" : "" }}>
                            <label class="form-check-label" for="is_active">Aktivdir?</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($currency) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($currency) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script src="{{ asset("assets/admin/custom/js/currencies/create-update.js") }}"></script>
@endpush
