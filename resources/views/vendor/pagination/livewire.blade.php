@if ($paginator->hasPages())
<nav x-data="pagination()">
    <ul class="flex space-x-3 text-xl my-6 items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="text-gray-300" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li>
            <button wire:click="previousPage" @click="handleClick" rel="prev"
                aria-label="@lang('pagination.previous')">&lsaquo;</button>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active bg-red-500 text-white inline-block w-8 h-8 rounded-full flex justify-center items-center"
            aria-current="page"><span>{{ $page }}</span>
        </li>
        @else
        <li class="text-gray-700 hover:text-red-600"><a href="#" @click="handleClick"
                wire:click="gotoPage({{ $page }})">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <button wire:click="nextPage" @click="handleClick" class="text-gray-700" rel="next"
                aria-label="@lang('pagination.next')">&rsaquo;</button>
        </li>
        @else
        <li class="text-gray-300" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif
<script>
    function pagination() {
        return {
            handleClick() {
                window.scroll({ top: 0});

            }
        }
    }
</script>