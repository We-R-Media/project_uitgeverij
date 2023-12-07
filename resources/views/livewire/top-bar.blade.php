<div class="topbar__wrapper">
    <div class="toolbar">
        <div class="icon__group">
            <div class="icon icon__user">
                <div class="thumbnail">
                    <img src="{{asset('images/no-image.png')}}">
                </div>
                <div class="controls__wrapper">
                    <div class="controls">
                        <div class="UserInfo">
                            <div class="userLoggedIn">
                                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                <span class="rol">{{Auth::user()->role}}</span>
                            </div>
                            <div class="button-group">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Uitloggen') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="topbar__titles">
        <h1 class="page__section">{{ __($pageTitleSection) }}</h1>

        @if ( $pageTitle )
            <h2 class="page__title">{{ __($pageTitle)  }} </h2>
        @endif
    </div>

    <div class="sub__pages">
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
