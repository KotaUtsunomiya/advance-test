@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <div class="paginate-container">
            <div class="paginate-showing">
                <p>
                    全
                    <span>{{ $paginator->total() }}</span>
                    件中&emsp;
                    <span>{{ $paginator->firstItem() }}</span>
                    ~
                    <span>{{ $paginator->lastItem() }}</span>
                    件
                </p>
            </div>

            <div>
                <ul class="paginate-link" role="navigation">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li  aria-disabled="true" aria-label="{{ __('pagination.previous') }}" class="page-numbers prev">&laquo;</li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}" class="page-numbers prev">&laquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li aria-disabled="true" clas="page-numbers dot">{{ $element }}</li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li aria-current="page">
                                        <a class="page-numbers current" href="#">{{ $page }}</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}" class="page-numbers next">&raquo;</a>
                        </li>
                    @else
                        <li aria-disabled="true" aria-label="{{ __('pagination.next') }}"  class="page-numbers next">&raquo;</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
