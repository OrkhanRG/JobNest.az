@extends("layouts.admin")
@section("title", "Şəhərlər")

@push("css")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css">
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => "Siyahı",
        "links" => [
            [
                "name" => "Şəhərlər",
                "url" => route("admin.cities.list")
            ],
        ]
    ])
@endsection

@section("contents")
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="mb-1 anchor" id="dividers">
                    <span>nəticə: <b data-role="table-total-count">0</b></span> | <span>saniyə: <b data-role="table-total-time">0.00</b></span>
                </h5>
                <div>
                    @if(hasPermission("city.create"))
                        <a href="{{ route("admin.cities.create") }}" title="Yeni Şəhər">
                            <iconify-icon class="fs-24 align-middle" icon="iconamoon:sign-plus-circle-duotone"></iconify-icon>
                        </a>
                    @endif
                    <iconify-icon class="fs-24 align-middle form-filter" data-bs-toggle="collapse" data-bs-target="#formFilter" icon="material-symbols:filter-alt"></iconify-icon>
                </div>
            </div>

            <div class="collapse mt-2" id="formFilter">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="slug" class="form-label">Açar Söz</label>
                            <input type="text" class="form-control" id="keyword" name="keyword" data-role="keyword" value="{{ request()->keyword ?: "" }}" placeholder="Ad, Qısa ad, Telefon kod...">
                        </div>

                        @if(isset($langs["list"]) && $langs["list"])
                            <div class="col-md-4">
                                <label for="lang_id" class="form-label">Dil</label>
                                <select class="form-control" id="lang_id" name="lang_id" data-role="lang_id">
                                    <option value="">Hamısı</option>
                                    @foreach($langs["list"] as $key => $lang)
                                        <option value="{{ $lang["id"] }}">
                                            {{ strtoupper($lang["code"]) }} - {{ $lang['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        @if(isset($langs["list"]) && $langs["list"])
                            <div class="col-md-4">
                                <label for="country_id" class="form-label">Ölkə</label>
                                <select class="form-control" id="country_id" name="country_id" data-role="country_id" disabled>
                                    <option value="">Ölkə seçin</option>
                                </select>
                            </div>
                        @endif

                        <div class="col-md-4">
                            <label for="is_actove" class="form-label">Status</label>
                            <select class="form-control" id="is_active" name="is_active" data-role="is_active">
                                <option value="">Hamısı</option>
                                <option value="0">Passiv</option>
                                <option value="1">Aktiv</option>
                            </select>
                        </div>

                    </div>

                    <div class="row mt-2">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-danger me-1" data-role="filter-reset">
                                <iconify-icon class="fs-21 align-middle" icon="iconamoon:restart-duotone"></iconify-icon> Sıfırla
                            </button>
                            <button class="btn btn-success" data-role="filter-apply">
                                <iconify-icon class="fs-21 align-middle" icon="iconamoon:search-duotone"></iconify-icon> Tətbiq Et
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" data-role="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ad</th>
                        <th scope="col">Qısa ad</th>
                        <th scope="col">Bölgə Kodu</th>
                        <th scope="col">Ölkə</th>
                        <th scope="col">Dil</th>
                        <th scope="col">Aktivdir?</th>
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
        let cities_route =  "{{ route("admin.cities.list") }}",
            cities_edit_route = "{{ route("admin.cities.edit", "city_id") }}",
            cities_delete_route = "{{ route("admin.cities.delete", "city_id") }}",
            cities_change_status_route = "{{ route("admin.cities.change-status", "city_id") }}",
            country_get_all_route = "{{ route("admin.countries.getAll") }}";
    </script>
    <script src="{{ asset("assets/admin/custom/js/cities/list.js") }}"></script>
@endpush
