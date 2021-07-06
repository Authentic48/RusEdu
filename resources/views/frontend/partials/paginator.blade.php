 <!-- Pagination ==== -->
 <div class="pagination-bx rounded-sm gray clearfix">
    <ul class="pagination">
        @if($paginator->onFirstPage())
            <li class="d-none"><i class="ti-arrow-left"></i></li>
        @else
            <li class="previous"><a href="{{ $paginator->previousPageUrl() }}"><i
                        class="ti-arrow-left"></i>Prev</a></li>
        @endif

        <!-- Pagination Elements -->
        @foreach($elements as $element)
            <!-- "Three Dots" Separator -->
            @if(is_string($element))
                <li class="d-none"><span>{{ $element }}</span></li>
            @endif
            <!-- Array Of Links -->
            @if(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if($paginator->hasMorePages())
            <li class="next"><a href="{{ $paginator->nextPageUrl() }}">Next<i class="ti-arrow-right"></i></a></li>
        @else
            <li class="d-none"><i class="ti-arrow-right"></i></li>
        @endif
    </ul>
</div>
<!-- Pagination END ==== -->
