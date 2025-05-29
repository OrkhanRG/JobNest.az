@extends("layouts.admin")
@section("title", "Yeni İstifadəçi")

@push("css")
    <link rel="stylesheet" href="{{ asset("assets/admin/custom/css/users/create-update.css") }}" type="text/css">
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => "Yeni İstifadəçi",
        "links" => [
            [
                "name" => "İstifadəçilər",
                "url" => route("admin.users.list")
            ],
            [
                "name" => "Yeni İstifadəçi",
                "url" => route("admin.users.create")
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

                <a href="{{ route("admin.users.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <form class="my-3" method="{{ isset($user) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($user) ? route("admin.users.edit", $user->id) : route("admin.users.create") }}" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($user) ? $user->name : "" }}"  placeholder="Ad...">
                    </div>

                    <div class="col-md-6">
                        <label for="surname" class="form-label">Soyad</label>
                        <input type="text" class="form-control" id="surname" name="surname" data-role="surname" value="{{ isset($user) ? $user->surname : "" }}" placeholder="Soyad...">
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="email" name="email" data-role="email" value="{{ isset($user) ? $user->email : "" }}" placeholder="Email...">
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Şifrə</label> <span class="text-danger">*</span>
                        <input type="password" class="form-control" id="password" name="password" data-role="password" value=""  placeholder="Şifrə...">
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Şifrə Təkrar</label> <span class="text-danger">*</span>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" data-role="password_confirmation" value="" placeholder="Şifrə Təkrar...">
                    </div>

                    <div class="col-md-6">
                        <label for="role" class="form-label">Rol</label> <span class="text-danger">*</span>
                        <select class="form-control" id="role" name="role" data-type data-role="role">
                            <option value="">Rol Seçin</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label> <span class="text-danger">*</span>
                        <select class="form-control" id="status" name="status" data-type data-role="status">
                            <option value="">Status Seçin</option>
                            @foreach(config("statuses.users") as $key => $status)
                                <option value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="avatar" class="d-block mb-1">Avatar</label>
                        <input type="file" id="avatar" name="avatar" data-role="avatar">
                    </div>
                    <div class="col-md-6">
                        <div class="flex-shrink-0 me-3 {{ isset($user) && $user->icon ? "" : "d-none" }}" data-role="preview-icon">
                            <div class="avatar bg-light rounded icon-container">
                                <img class="img-fluid rounded d-block" src="{{ isset($user) ? asset($user->icon) : "" }}" alt="Image" />
                                <iconify-icon data-role="icon-close" class="fs-24 align-middle text-danger icon-remove" icon="material-symbols:close-small"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($user) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($user) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script>
        let users_create_route = "{{ route("admin.users.create") }}",
            users_get_roles_route = "{{ route("admin.roles.getAll") }}";
    </script>
    <script src="{{ asset("assets/admin/custom/js/users/create-update.js") }}"></script>
@endpush
