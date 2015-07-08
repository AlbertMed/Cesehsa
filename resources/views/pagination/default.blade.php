@if ($paginator->getLastPage() > 1)
    <div class="btn-group pull-right">
        <a href="{{ $paginator->getUrl(1) }}" class="btn btn-white{{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}" type="button"><i class="fa fa-chevron-left"></i></a>
        @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
            <a href="{{ $paginator->getUrl($i) }}" class="btn btn-white{{ ($paginator->getCurrentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>
        @endfor
        <a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" class="btn btn-white{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}" type="button"><i class="fa fa-chevron-right"></i> </a>
    </div>
@endif
