@if ($paginator->hasPages())
    <nav class="pagination">
        <ul class="pagination__row">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disabled">
                    <span class="pagination-link">&lsaquo;</span>
                </li>
            @else
                <li class="pagination-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link" rel="prev">&lsaquo;</a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="pagination-item @if($i == $paginator->currentPage()) active @endif">
                    <a href="{{ $paginator->url($i) }}" class="pagination-link">{{ $i }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link" rel="next">&rsaquo;</a>
                </li>
            @else
                <li class="pagination-item disabled">
                    <span class="pagination-link">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>

@endif
