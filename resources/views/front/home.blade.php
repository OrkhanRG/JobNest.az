@extends("layouts.front")
@section("title", "Əsas")

@push("css")

@endpush

@section("contents")
    <!--Banner Start-->
    @include("layouts.front.components.sections.banner")
    <!--Banner End-->

    <!-- HOW IT WORK SECTION START -->
    @include("layouts.front.components.sections.how-it-work")
    <!-- HOW IT WORK SECTION END -->

    <!-- JOBS CATEGORIES SECTION START -->
    @include("layouts.front.components.sections.jobs-categories")
    <!-- JOBS CATEGORIES SECTION END -->

    <!-- EXPLORE NEW LIFE START -->
    @include("layouts.front.components.sections.explore-new-life")
    <!-- EXPLORE NEW LIFE END -->

    <!-- TOP COMPANIES START -->
    @include("layouts.front.components.sections.top-companies")
    <!-- TOP COMPANIES END -->

    <!-- JOB POST START -->
    @include("layouts.front.components.sections.job-post")
    <!-- JOB POST END -->

    @if(false)
        <!-- TESTIMONIAL SECTION START -->
        @include("layouts.front.components.sections.testimonials")
        <!-- TESTIMONIAL SECTION END -->
    @endif

    @if(false)
        <!-- OUR BLOG START -->
        @include("layouts.front.components.sections.our-blog")
        <!-- OUR BLOG END -->
    @endif
@endsection

@push("js")

@endpush
