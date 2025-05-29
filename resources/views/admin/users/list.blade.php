@extends("layouts.admin")
@section("title", "İstifadəçilər")

@push("css")

@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => "Siyahı",
        "links" => [
            [
                "name" => "İstifadəçilər",
                "url" => route("admin.users.list")
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
                    @if(hasPermission("user.create"))
                        <a href="{{ route("admin.users.create") }}" title="Yeni İstifadəçi">
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
                            <input type="text" class="form-control" id="keyword" name="keyword" data-role="keyword" value="{{ request()->keyword ?: "" }}" placeholder="Ad, Email...">
                        </div>

                        <div class="col-md-4">
                            <label for="slug" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" data-role="status">
                                <option value="">Hamsı</option>
                                @foreach(config("statuses.users") as $key => $status)
                                    <option value="{{ $key }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="slug" class="form-label d-block">Rol</label>
                            <select class="form-control" id="role" name="role" data-role="role">
                                <option value="">Hamsı</option>
                                @isset($roles)
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->label }}</option>
                                    @endforeach
                                @endisset
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
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Status</th>
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
        let users_route =  "{{ route("admin.users.list") }}",
            users_edit_route = "{{ route("admin.users.edit", "category_id") }}",
            users_delete_route = "{{ route("admin.users.delete", "category_id") }}",
            users_change_status_route = "{{ route("admin.users.change-status", "category_id") }}";
    </script>
    <script src="{{ asset("assets/admin/custom/js/users/list.js") }}"></script>
@endpush
