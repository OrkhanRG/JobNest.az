@extends("layouts.front")
@section("title", "Şirkət Detallı")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "Kontakt Home",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "Kontakt Home",
                "url" => route("front.company", "test")
            ]
        ]
    ])
    <!-- INNER PAGE BANNER END -->

    {{-- compnay detail --}}

@endsection

@push("js")

@endpush