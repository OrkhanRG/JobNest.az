@extends("layouts.front")
@section("title", "Haqqımızda")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "Haqqımızda",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "Haqqımızda",
                "url" => route("front.about-us")
            ]
        ]
    ])
    <!-- INNER PAGE BANNER END -->

    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            About Us Text Here...
        </div>
    </div>

@endsection

@push("js")

@endpush