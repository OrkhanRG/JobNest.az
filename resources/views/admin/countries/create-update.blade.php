@extends("layouts.admin")
@section("title", isset($country) && $country ? $country->name : "Yeni ölkə")

@push("css")
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($country) && $country ? $country->name : "Yeni ölkə",
        "links" => [
            [
                "name" => "Tərcümələr",
                "url" => route("admin.countries.list")
            ],
            [
                "name" => isset($country) && $country ? $country->name : "Yeni ölkə",
                "url" => route("admin.countries.create")
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

                <a href="{{ route("admin.countries.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <input type="hidden" data-role="selected-lang-id" value="{{ $country->lang_id ?? "" }}">

            <form class="my-3" method="{{ isset($country) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($country) ? route("admin.countries.edit", $country->id) : route("admin.countries.create") }}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($country) ? $country->name : "" }}"  placeholder="Ad...">
                    </div>

                    <div class="col-md-6">
                        <label for="short_name" class="form-label">Qısa ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="short_name" name="short_name" data-role="short_name" value="{{ isset($country) ? $country->short_name : "" }}"  placeholder="Qısa ad...">
                    </div>

                    <div class="col-md-6">
                        <label for="phone_prefix" class="form-label">Telefon kod</label>
                        <input type="text" class="form-control" id="phone_prefix" name="phone_prefix" data-toggle="input-mask" data-mask-format="+0000" data-role="phone_prefix" value="{{ isset($country) ? $country->phone_prefix : "" }}"  placeholder="Telefon kod...">
                    </div>

                    <div class="col-md-6">
                        <label for="lang_id" class="form-label">Dil</label> <span class="text-danger">*</span>
                        <select class="form-control" id="lang_id" name="lang_id" data-type data-role="lang_id">
                            <option value="">Dil Seçin</option>
                            @if(isset($langs["list"]) && $langs["list"])
                                @foreach($langs["list"] as $lang)
                                    <option value="{{ $lang->id }}">{{ strtoupper($lang->code) }} - {{ $lang->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="is_active" class="d-block mb-1">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="is_active" id=is_active {{ isset($country) && $country->is_active ? "checked" : "" }}>
                            <label class="form-check-label" for="is_active">Aktivdir?</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($country) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($country) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script src="{{ asset("assets/admin/custom/js/countries/create-update.js") }}"></script>
@endpush
