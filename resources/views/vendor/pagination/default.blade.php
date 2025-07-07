@if ($paginator->hasPages())
    <nav class="pagination is-centered is-small mt-4" role="navigation" aria-label="pagination">
        {{-- Botón Anterior --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled>Anterior</a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">Anterior</a>
        @endif

        {{-- Botón Siguiente --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">Siguiente</a>
        @else
            <a class="pagination-next" disabled>Siguiente</a>
        @endif

        {{-- Números de página --}}
        <ul class="pagination-list">
            @foreach ($elements as $element)
                {{-- Separador "..." --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                @endif

                {{-- Páginas --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current">{{ $page }}</a></li>
                        @else
                            <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
