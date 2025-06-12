@props(['data' => null])

@php
    // Si no se pasa $data directamente, usar $paginator que Laravel pasa automáticamente
    $paginator = $data ?? $paginator ?? null;
    
    // Verificar que tengamos un paginador válido
    if (!$paginator || !method_exists($paginator, 'onFirstPage')) {
        return;
    }
@endphp

<div class="custom-pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="disabled">السابق</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}">السابق</a>
    @endif
    
    {{-- Limited Pagination Links (3-4 pages only) --}}
    @php
        $currentPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();
        $startPage = max(1, $currentPage - 1);
        $endPage = min($lastPage, $startPage + 2);
        
        if ($endPage - $startPage < 2 && $startPage > 1) {
            $startPage = max(1, $endPage - 2);
        }
    @endphp
    
    @if ($startPage > 1)
        <a href="{{ $paginator->url(1) }}">1</a>
        @if ($startPage > 2)
            <span class="disabled">...</span>
        @endif
    @endif
    
    @for ($i = $startPage; $i <= $endPage; $i++)
        @if ($i == $currentPage)
            <span class="active">{{ $i }}</span>
        @else
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        @endif
    @endfor
    
    @if ($endPage < $lastPage)
        @if ($endPage < $lastPage - 1)
            <span class="disabled">...</span>
        @endif
        <a href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a>
    @endif
    
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">التالي</a>
    @else
        <span class="disabled">التالي</span>
    @endif
</div>
