<div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url({{ asset("assets/images/banner/1.jpg") }});">
    <div class="overlay-main site-bg-white opacity-01"></div>
    <div class="container">
        <div class="wt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="wt-title">{{ $title ?? "" }}</h2>
                </div>
            </div>
            <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        @if (isset($links) && $links && is_array($links))
                            @foreach ($links as $link)
                                @if (!$loop->last)
                                    <li><a href="{{ $link["url"] ?? "javascript:void(0)" }}">{{ $link["name"] ?? "" }}</a></li>
                                @else
                                    <li>{{ $link["name"] ?? "" }}</li>
                                @endif
                            @endforeach
                        @endif

                    </ul>
                </div>

            <!-- BREADCRUMB ROW END -->
        </div>
    </div>
</div>