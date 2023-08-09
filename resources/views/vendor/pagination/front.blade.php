@if ($paginator->hasPages())
<div class="pagination">
    <nav class="w-full py-4">
        <ul class="flex flex-row gap-2.5 justify-center items-center font-medium text-base">
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span>&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
                </li>
            @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li><span class="text-black">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="flex items-center justify-center w-8 h-8 rounded-full bg-sky-400"><span
                            class="text-white">{{ $page }}</span></li>
                    @else
                    <li><a href="{{ $url }}"
                            class="flex items-center justify-center w-8 h-8 text-black rounded-full hover:bg-black/5">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
            @endif
        @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
                </li>
            @else
                <li class="disabled">
                    <span>&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
</div>
@endif
