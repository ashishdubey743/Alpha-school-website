<ul class="pagination">
  @if ($paginator->onFirstPage())
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
  @else
    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
  @endif

  @foreach ($elements as $element)
    @if (isset($element['active']) && $element['active'])
      <li class="page-item active"><a class="page-link" href="#">{{ $element['label'] }}</a></li>
    @else
      <li class="page-item"><a class="page-link" href="{{ $element['url'] }}">{{ $element['label'] }}</a></li>
    @endif
  @endforeach

  @if ($paginator->hasMorePages())
    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
  @else
    <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
  @endif
</ul>
