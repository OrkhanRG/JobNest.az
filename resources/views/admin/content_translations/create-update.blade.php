@extends("layouts.admin")
@section("title", isset($content_translation) && $content_translation ? $content_translation->key : "Yeni tərcümə")

@push("css")
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($content_translation) && $content_translation ? $content_translation->name : "Yeni tərcümə",
        "links" => [
            [
                "name" => "Tərcümələr",
                "url" => route("admin.content-translations.list")
            ],
            [
                "name" => isset($content_translation) && $content_translation ? $content_translation->name : "Yeni tərcümə",
                "url" => route("admin.content-translations.create")
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

                <a href="{{ route("admin.content-translations.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <input type="hidden" data-role="selected-group" value="{{ isset($content_translation) && $content_translation ? switchKeyToBlob("content_translations.group.$content_translation->group", true) : "" }}">
            <input type="hidden" data-role="selected-lang-id" value="{{ $content_translation->lang_id ?? "" }}">

            <form class="my-3" method="{{ isset($content_translation) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($content_translation) ? route("admin.content-translations.edit", $content_translation->id) : route("admin.content-translations.create") }}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="key" class="form-label">Açar söz</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="key" name="key" data-role="key" value="{{ isset($content_translation) ? $content_translation->key : "" }}"  placeholder="Açar söz...">
                    </div>

                    <div class="col-md-6">
                        <label for="group" class="form-label">Qrup</label> <span class="text-danger">*</span>
                        <select class="form-control" id="group" name="group" data-type data-role="group">
                            <option value="">Qrup Seçin</option>
                            @if(isset($groups) && $groups)
                                @foreach($groups as $group)
                                    <option value="{{ $group["key"] }}">{{ $group["label"] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="value" class="form-label">Dəyər</label> <span class="text-danger">*</span>
                        <textarea class="form-control" id="value" name="value" data-role="value" placeholder="Dəyər...">{{ isset($content_translation) ? $content_translation->value : "" }}</textarea>
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

                    <div class="col-md-6">
                        <label for="is_active" class="d-block mb-1">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" data-role="is_active" id=is_active {{ isset($content_translation) && $content_translation->is_active ? "checked" : "" }}>
                            <label class="form-check-label" for="is_active">Aktivdir?</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($content_translation) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($content_translation) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script src="{{ asset("assets/admin/custom/js/content_translations/create-update.js") }}"></script>
@endpush
