<div>
    @foreach ( $subpages as $pageName => $route )
        <a href="{{ $route }}">{{ $pageName }}</a>
    @endforeach
</div>
