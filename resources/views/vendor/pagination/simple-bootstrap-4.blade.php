@if ($paginator->hasPages())
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
{{--                <li class="page-item disabled" aria-disabled="true">--}}
{{--                    <span class="page-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>--}}
{{--                </li>--}}

                <a class="prev-arrow disabled"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>

            @else
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>--}}
{{--                </li>--}}

            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>--}}
{{--                </li>--}}
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>

            @else
{{--                <li class="page-item disabled" aria-disabled="true">--}}
{{--                    <span class="page-link">@lang('pagination.next')</span>--}}
{{--                </li>--}}
                <a class="next-arrow disabled"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>

            @endif
@endif
