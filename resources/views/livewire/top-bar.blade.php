<div class="topbar__wrapper">
    <div class="toolbar">
        <div class="icon__group">
            <div class="icon icon__search">
                <div class="icon__svg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.935 25.731"><defs><clipPath id="a"><path fill="#f7a637" d="M0 0h25.935v25.731H0z" data-name="Rectangle 94"/></clipPath></defs><g data-name="Group 240"><g data-name="Group 235"><g clip-path="url(#a)" data-name="Group 234"><path fill="#f7a637" d="M17.568 19.273c-.5.331-.957.662-1.441.946a10.023 10.023 0 0 1-3.8 1.307A10.54 10.54 0 0 1 4 19.199a10.521 10.521 0 0 1-3.8-6.3 10.869 10.869 0 0 1 21.234-4.648 10.733 10.733 0 0 1-1.837 9c-.03.041-.061.081-.089.123a.31.31 0 0 0-.022.055l1.755 1.752 4.242 4.241a1.323 1.323 0 0 1 .421 1.27 1.352 1.352 0 0 1-1.85.922 2.01 2.01 0 0 1-.56-.393q-2.924-2.906-5.834-5.822a.876.876 0 0 1-.092-.122M10.82 2.71a8.108 8.108 0 0 0-.049 16.216 8.173 8.173 0 0 0 8.158-8.107 8.184 8.184 0 0 0-8.11-8.109" data-name="Path 22"/></g></g></g></svg>                    </div>
                <div class="controls__wrapper">
                    <div class="controls search__bar">
                            <form class="field field__row" action="{{ route('search') }}" method="GET">
                                <input type="text" name="q" placeholder="Gebruiker, order, factuur, project etc.">
                                <button class="button--submit" type="submit">
                                    <div class="button__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25.935" height="25.731" viewBox="0 0 25.935 25.731"><defs><clipPath id="a"><path fill="#f7a637" d="M0 0h25.935v25.731H0z" data-name="Rectangle 94"></path></clipPath></defs><g data-name="Group 240"><g data-name="Group 235"><g clip-path="url(#a)" data-name="Group 234"><path fill="#f7a637" d="M17.568 19.273c-.5.331-.957.662-1.441.946a10.023 10.023 0 0 1-3.8 1.307A10.54 10.54 0 0 1 4 19.199a10.521 10.521 0 0 1-3.8-6.3 10.869 10.869 0 0 1 21.234-4.648 10.733 10.733 0 0 1-1.837 9c-.03.041-.061.081-.089.123a.31.31 0 0 0-.022.055l1.755 1.752 4.242 4.241a1.323 1.323 0 0 1 .421 1.27 1.352 1.352 0 0 1-1.85.922 2.01 2.01 0 0 1-.56-.393q-2.924-2.906-5.834-5.822a.876.876 0 0 1-.092-.122M10.82 2.71a8.108 8.108 0 0 0-.049 16.216 8.173 8.173 0 0 0 8.158-8.107 8.184 8.184 0 0 0-8.11-8.109" data-name="Path 22"></path></g></g></g></svg>
                                    </div>
                                </button>
                            </form>
                    </div>
                </div>
            </div>
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
            <h2 class="page__title">{{ __($pageTitle)  }}</h2>
        @endif
    </div>

    <div class="sub__pages">
        {{-- @if (isset($route['parameters'])
            <a href="{{ route($route['name'], $route['parameters']) }}">{{ $pageName }}</a>
        @else
            @if( ! is_null($id) )
                @foreach ($subpages as $pageName => $route)
                    <a href="{{ route( $route, $id ) }}">{{ $pageName }}</a>
                @endforeach
            @else
                @foreach ($subpages as $pageName => $route)
                    <a href="{{ route( $route ) }}">{{ $pageName }}</a>
                @endforeach
            @endif
        @endif --}}


        @foreach ($subpages as $pageName => $route)
            @if (isset($route['parameters']))
                <a href="{{ route($route['name'], $route['parameters']) }}">{{ $pageName }}</a>
            @elseif (!is_null($id))
                <a href="{{ route( $route, $id ) }}">{{ $pageName }}</a>
            @else
                <a href="{{ route($route) }}">{{ $pageName }}</a>
            @endif
        @endforeach
    </div>
</div>
