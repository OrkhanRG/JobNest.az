@extends("layouts.admin")
@section("title", isset($jobCategoryTranslation) && $jobCategoryTranslation ? $jobCategoryTranslation->name : "Yeni tərcümə")

@push("css")
    <link rel="stylesheet" href="{{ asset("assets/admin/custom/library/tagsinput/bootstrap-tagsinput.css") }}">
@endpush

@section("breadcrumb")
    @include("layouts.admin.components.breadcrumb", [
        "title" => isset($jobCategoryTranslation) && $jobCategoryTranslation ? $jobCategoryTranslation->name : "Yeni tərcümə",
        "links" => [
            [
                "name" => "Tərcümələr",
                "url" => route("admin.job-categories.translations.list")
            ],
            [
                "name" => isset($jobCategoryTranslation) && $jobCategoryTranslation ? $jobCategoryTranslation->name : "Yeni tərcümə",
                "url" => route("admin.job-categories.translations.create")
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

                <a href="{{ route("admin.job-categories.translations.list") }}">
                    <iconify-icon class="fs-24 align-middle" icon="iconamoon:arrow-left-1-duotone"/>
                </a>
            </div>

            <input type="hidden" data-role="selected-lang-id" value="{{ $jobCategoryTranslation->lang_id ?? "" }}">
            <input type="hidden" data-role="selected-job-category-id" value="{{ $jobCategoryTranslation->job_category_id ?? "" }}">

            <form class="my-3" method="{{ isset($jobCategoryTranslation) ? "PUT" : "POST" }}" data-role="form" action="{{ isset($jobCategoryTranslation) ? route("admin.job-categories.translations.edit", $jobCategoryTranslation->id) : route("admin.job-categories.translations.create") }}">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Ad</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" data-role="name" value="{{ isset($jobCategoryTranslation) ? $jobCategoryTranslation->name : "" }}"  placeholder="Ad...">
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Təsvir</label>
                        <textarea class="form-control" id="description" name="description" data-role="description" placeholder="Təsvir...">{{ isset($jobCategoryTranslation) ? $jobCategoryTranslation->description : "" }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="job_category_id" class="form-label">Kateqoriya</label> <span class="text-danger">*</span>
                        <select class="form-control" id="job_category_id" name="job_category_id" data-role="job_category_id">
                            <option value="">Kateqoriya Seçin</option>
                            @if(isset($job_categories["categories"]) && $job_categories["categories"])
                                @foreach($job_categories["categories"] as $job_category)
                                    <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                @endforeach
                            @endif
                        </select>
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

                    <div class="col-md-12">
                        <label for="seo_title" class="form-label">Seo Başlıq</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="seo_title" name="seo_title" data-role="seo_title" value="{{ isset($jobCategoryTranslation) ? $jobCategoryTranslation->seo_title : "" }}"  placeholder="Seo Başlıq...">
                    </div>

                    <div class="col-md-12">
                        <label for="seo_keywords" class="form-label">Seo Açar Sözlər</label>
                        <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" data-role="seo_keywords" value="{{ isset($jobCategoryTranslation) ? $jobCategoryTranslation->seo_keywords : "" }}"  placeholder="Seo Açar Sözlər...">
                    </div>

                    <div class="col-md-12">
                        <label for="seo_description" class="form-label">Qısa ad</label>
                        <textarea class="form-control" id="seo_description" rows="5" name="seo_description" data-role="seo_description" placeholder="Təsvir...">{{ isset($jobCategoryTranslation) ? $jobCategoryTranslation->seo_description : "" }}</textarea>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <iconify-icon class="fs-21 align-middle" icon="material-symbols:{{ isset($jobCategoryTranslation) ? "save-as-outline" : "add" }}-rounded"></iconify-icon>
                            {{ isset($jobCategoryTranslation) ? "Güncəllə" : "Əlavə Et" }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push("js")
    <script src="{{ asset("assets/admin/custom/library/tagsinput/bootstrap-tagsinput.js") }}"></script>
    <script src="{{ asset("assets/admin/custom/js/job_category/translations/create-update.js") }}"></script>
@endpush
