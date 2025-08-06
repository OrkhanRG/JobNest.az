@extends("layouts.admin")
@section("title", isset($city) && $city ? $city->name : "Yeni şəhər")

@push("css")
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($city) && $city ? $city->name : "Yeni şəhər",
        "links" => [
            [
                "name" => "Tərcümələr",
                "url" => route("admin.cities.list")
            ],
            [
                "name" => isset($city) && $city ? $city->name : "Yeni şəhər",
                "url" => route("admin.cities.create")
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

                <a href="{{ route("admin.cities.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <input type="hidden" data-role="selected-lang-id" value="{{ $city->lang_id ?? "" }}">
            <input type="hidden" data-role="selected-country-id" value="{{ $city->country_id ?? "" }}">

            <form class="my-3" method="{{ isset($city) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($city) ? route("admin.cities.edit", $city->id) : route("admin.cities.create") }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($city) ? $city->name : "" }}"  placeholder="Ad...">
                    </div>

                    <div class="col-md-4">
                        <label for="short_name" class="form-label">Qısa ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="short_name" name="short_name" data-role="short_name" value="{{ isset($city) ? $city->short_name : "" }}"  placeholder="Qısa ad...">
                    </div>

                    <div class="col-md-4">
                        <label for="region_code" class="form-label">Region kod</label>
                        <input type="text" class="form-control" id="region_code" name="region_code" data-toggle="input-mask" data-mask-format="00" data-role="region_code" value="{{ isset($city) ? $city->region_code : "" }}"  placeholder="Region kod...">
                    </div>


                    <div class="col-md-6">
                        <label for="lang_id" class="form-label">Dil</label> <span class="text-danger">*</span>
                        <select class="form-control" id="lang_id" name="lang_id" data-role="lang_id">
                            <option value="">Dil Seçin</option>
                            @if(isset($langs["list"]) && $langs["list"])
                                @foreach($langs["list"] as $lang)
                                    <option value="{{ $lang->id }}">{{ strtoupper($lang->code) }} - {{ $lang->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="country_id" class="form-label">Ölkə</label> <span class="text-danger">*</span>
                        <select class="form-control" id="country_id" name="country_id" data-role="country_id" disabled>
                            <option value="">Ölkə seçin</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="is_active" class="d-block mb-1">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="is_active" id=is_active {{ isset($city) && $city->is_active ? "checked" : "" }}>
                            <label class="form-check-label" for="is_active">Aktivdir?</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($city) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($city) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script>
        const country_get_all_route = "{{ route("admin.countries.getAll") }}";
    </script>
    <script src="{{ asset("assets/admin/custom/js/cities/create-update.js") }}"></script>
@endpush
