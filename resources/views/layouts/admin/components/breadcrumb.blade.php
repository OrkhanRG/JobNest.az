<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="mb-0 fw-semibold">{{ $title ?? "" }}</h4>
            <ol class="breadcrumb mb-0">
                @if (isset($links) && $links && is_array($links))
                    @foreach ($links as $link)
                        @if (!$loop->last)
                            <li class="breadcrumb-item">
                                <a href="{{ $link["url"] ?? "javascript:void(0)" }}">{{ $link["name"] ?? "" }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item active">{{ $link["name"] ?? "" }}</li>
                        @endif
                    @endforeach
                @endif
            </ol>
        </div>
    </div>
</div>
