@if ($paginator->hasPages())
    <div class="c-pagination">

    <ul class="c-pagination--wrap" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled c-pagination__item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="c-pagination__item">
                <a href="{{ $paginator->previousPageUrl() }}" class="c-pagination__link" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled c-pagination__item" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active c-pagination__item c-pagination__item--active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li class="c-pagination__item"><a href="{{ $url }}" class="c-pagination__link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="c-pagination__item">
                <a href="{{ $paginator->nextPageUrl() }}" class="c-pagination__link" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="disabled c-pagination__item" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
</div>

@endif
