@extends("layouts.front")
@section("title", "404 Not Found This Page")
@push("css")

@endpush

@section("contents")
    <div class="section-full p-t120  p-b90 site-bg-white">

        <div class="container">
            <div class="twm-error-wrap">
                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <div class="twm-error-image">
                            <img src="{{ asset("assets/images/error-404.png") }}" alt="#">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="twm-error-content">
                            <h2 class="twm-error-title">404</h2>
                            <h4 class="twm-error-title2 site-text-primary">We Are Sorry, Page Not Found</h4>
                            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                            <a href="index.html" class="site-button">Go To Home</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
@endsection

@push("js")

@endpush
