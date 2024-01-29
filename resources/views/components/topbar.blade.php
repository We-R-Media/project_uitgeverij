<div class="topbar__wrapper">
    <div class="topbar__titles">
        <h1 class="page__section">{{ __($pageTitleSection) }}</h1>

        @if ( $pageTitle )
            <h2 class="page__title">{{ __($pageTitle)  }} </h2>
        @endif
    </div>

    <div class="topbar__pages">
        @foreach ($subpages as $pageName => $route)
            @if (isset($route['parameters']))
                <a href="{{ route($route['name'], $route['parameters']) }}" {{App\AppHelpers\RouteHelper::isActiveSubpage($route['name'], $route['parameters'], $id)}}>
                    {{ $pageName }}
                </a>
            @elseif (!is_null($id))
                <a href="{{ route($route, $id) }}" {{App\AppHelpers\RouteHelper::isActiveSubpage($route, null, $id)}}>
                    {{ $pageName }}
                </a>
            @else
                <a href="{{ route($route) }}" {{App\AppHelpers\RouteHelper::isActiveSubpage($route)}}>
                    {{ $pageName }}
                </a>
            @endif
        @endforeach
    </div>
</div>
