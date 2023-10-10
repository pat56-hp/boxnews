@if ($paginator->hasPages())
    <div class="pagination style-1 color-main justify-content-center mt-60">

        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}">
                <span class="text text-uppercase"><i class="la la-angle-left"></i> Préc</span>
            </a>
        @endif
        @if($paginator->currentPage() > 3)
            <a href="{{ $paginator->url(1) }}">
                <span>1</span>
            </a>
        @endif
        @if($paginator->currentPage() > 4)
            <a href="javascript:void()">
                <span>...</span>
            </a>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <a href="javascript:void()" class="disabled active">
                        <span>{{ $i }}</span>
                    </a>
                @else
                    <a href="{{ $paginator->url($i) }}">
                        <span>{{ $i }}</span>
                    </a>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <a href="javascript:void()">
                <span>...</span>
            </a>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <a href="{{ $paginator->url($paginator->lastPage()) }}">
                <span>{{ $paginator->lastPage() }}</span>
            </a>
        @endif
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <span class="text text-uppercase">Suiv <i class="la la-angle-right"></i> </span>
            </a>
        @endif
    </div>
@endif
