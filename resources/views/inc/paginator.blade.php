@if ($paginator->hasPages())
    <div class="col-lg-12 text-center">
        <div class="pagination-wrap">

            <ul>
                @if($paginator->onFirstPage())
                <li><a href="{{ $paginator->previousPageUrl() }}" class="btn disabled" >Prev</a></li>
                @else
                <li><a href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
                @endif
                @foreach ($elements as $element)
                     @if (is_array($element))
                         @foreach ($element as $page => $url) 
                             @if ($page == $paginator->currentPage() )
                             <li class="active">{{ $page }}</li>
                             @else
                             <li><a href="{{ $url }}">{{ $page }}</a></li>

                             @endif

                         @endforeach

                     @endif

                @endforeach



                @if ($paginator->onLastPage())
                <li><a href="{{ $paginator->nextPageUrl() }}" class="btn disabled">Next</a></li>
                @else
                <li><a href="{{ $paginator->nextPageUrl() }}">Next</a></li>
                @endif


            </ul>
        </div>
    </div>


@endif
