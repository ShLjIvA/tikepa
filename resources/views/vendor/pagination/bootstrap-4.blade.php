@if ($paginator->hasPages())
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="prev-arrow disabled"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>

            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="dot-dot disabled" aria-disabled="true"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active" aria-current="page">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            @else
                <a class="next-arrow disabled"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            @endif
@endif
