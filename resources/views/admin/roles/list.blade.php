@extends("layouts.admin")
@section("title", "Rollar")

@push("css")

@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => "Siyahı",
        "links" => [
            [
                "name" => "Rollar",
                "url" => route("admin.roles.list")
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
                    @if(hasPermission("user.create"))
                        <a href="{{ route("admin.roles.create") }}" title="Yeni Rol">
                            <iconify-icon class="fs-24 align-middle" icon="iconamoon:sign-plus-circle-duotone"></iconify-icon>
                        </a>
                    @endif
                    <iconify-icon class="fs-24 align-middle form-filter" data-bs-toggle="collapse" data-bs-target="#formFilter" icon="material-symbols:filter-alt"></iconify-icon>
                </div>
            </div>

            <div class="collapse mt-2" id="formFilter">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Açar Söz</label>
                            <input type="text" class="form-control" id="keyword" name="keyword" data-role="keyword" value="{{ request()->keyword ?: "" }}" placeholder="Ad, Label...">
                        </div>

                        <div class="col-md-6">
                            <label for="slug" class="form-label">Status</label>
                            <select class="form-control" id="is_active" name="is_active" data-role="is_active">
                                <option value="">Hamsı</option>
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
                        <th scope="col">Label</th>
                        <th scope="col">İcazə Təyin Et</th>
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

        <div class="modal fade" id="setPermissions" tabindex="-1" aria-labelledby="setPermissionsTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="setPermissionsTitle">X Rola İcazə Təyin Et</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 anchor" id="dividers">
                                <span>nəticə: <b data-role="table-total-count-set-permissions">0</b></span> | <span>saniyə: <b data-role="table-total-time-set-permissions">0.00</b></span>
                            </h5>
                            <div>
                                @if(hasPermission("role_set_permissions"))
                                    <a href="javascript:void(0)" title="İcazə Təyin Et">
                                        <iconify-icon class="fs-24 align-middle form-filter" icon="iconamoon:sign-plus-circle-duotone" id="setRolePermissionsIcon" data-bs-toggle="collapse" data-bs-target="#setRolePermissions"></iconify-icon>
                                    </a>
                                @endif
                                <iconify-icon class="fs-24 align-middle form-filter" data-bs-toggle="collapse" id="setRolePermissionsFilterIcon" data-bs-target="#setRolePermissionsFilter" icon="material-symbols:filter-alt"></iconify-icon>
                            </div>
                        </div>

                        <div class="collapse mt-2" id="setRolePermissions">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="slug" class="form-label">İcazələr</label>
                                        <select class="form-control" id="permissions" name="permissions" data-type data-role="permissions" multiple>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-success" data-role="apply-set-permissions">
                                            <iconify-icon class="fs-21 align-middle" icon="tabler:plus"></iconify-icon> Əlavə Et
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse mt-2" id="setRolePermissionsFilter">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="slug" class="form-label">Açar söz</label>
                                        <input type="text" class="form-control" id="keyword_set_permissions" name="keyword_set_permissions" data-role="keyword_set_permissions" value="" placeholder="Ad, Label...">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-danger me-1" data-role="filter-reset-set-permissions">
                                            <iconify-icon class="fs-21 align-middle" icon="iconamoon:restart-duotone"></iconify-icon> Sıfırla
                                        </button>
                                        <button class="btn btn-success" data-role="filter-apply-set-permissions">
                                            <iconify-icon class="fs-21 align-middle" icon="iconamoon:search-duotone"></iconify-icon> Tətbiq Et
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table" data-role="table-set-permissions">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ad</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">
                                        <iconify-icon class="fs-21 align-middle" icon="iconamoon:settings-duotone"></iconify-icon>
                                    </th>
                                </tr>
                                </thead>

                                <tbody class="table-group-divider" data-role="table-body-set-permissions">

                                </tbody>
                            </table>
                        </div>
                        <div data-role="loader-set-permission" class="loader d-none"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push("js")
    <script>
        let roles_route =  "{{ route("admin.roles.list") }}",
            roles_edit_route = "{{ route("admin.roles.edit", "role_id") }}",
            roles_delete_route = "{{ route("admin.roles.delete", "role_id") }}",
            roles_change_status_route = "{{ route("admin.roles.change-status", "role_id") }}",
            get_all_permissions_route = "{{ route("admin.permissions.getAll") }}",
            get_permissions_by_role_route = "{{ route("admin.permissions.getByRole", "role_id") }}",
            detach_permission_from_role_route = "{{ route("admin.roles.permission.detach", ["role" => "role_id", "permission" => "permission_id"]) }}",
            role_set_permission_route =  "{{ route("admin.roles.give-permissions", "role_id") }}";
    </script>
    <script src="{{ asset("assets/admin/custom/js/roles/list.js") }}"></script>
@endpush
