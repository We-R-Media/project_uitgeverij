<div class="topbar__wrapper">
    <!--- Auth User info ---->
    @auth
    <div class="toolbar">
        <div class="icon__group">
            <div class="icon icon__notifications">
                <div class="icon__svg">
                    <span class="badge__counter">4</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.074" height="28.446" viewBox="0 0 22.074 28.446"><defs><clipPath id="a"><path fill="#f7a637" d="M0 0h22.074v28.446H0z" data-name="Rectangle 92"/></clipPath></defs><g fill="#f7a637" clip-path="url(#a)" data-name="Group 230"><path d="M10.162 28.445a4.05 4.05 0 0 1-1.566-.794 3.518 3.518 0 0 1-1.2-2.727 1.177 1.177 0 0 1 1.165-1.117 1.2 1.2 0 0 1 1.2 1.111c.057.748.415 1.157 1.049 1.2a1.309 1.309 0 0 0 1.519-1.056c.161-.75.589-1.152 1.212-1.139a1.194 1.194 0 0 1 1.154 1.37 3.522 3.522 0 0 1-2.56 3.034c-.123.036-.245.078-.367.117Z" data-name="Path 19"/><path d="M11.035 22.529H4.704a4.671 4.671 0 0 1-3.641-1.537 3.762 3.762 0 0 1-.9-3.735C1.368 13.077 2.568 8.9 3.801 4.729a6.039 6.039 0 0 1 2.081-2.921 8.232 8.232 0 0 1 11.043.676 7.694 7.694 0 0 1 1.741 3.268c1.048 3.733 2.074 7.473 3.2 11.182a4.2 4.2 0 0 1-2.965 5.383 5.969 5.969 0 0 1-1.532.2c-2.11.022-4.22.009-6.33.009m.011-2.371c2.1 0 4.2.006 6.3-.006a3.418 3.418 0 0 0 .981-.143 1.771 1.771 0 0 0 1.267-2.352q-1.653-5.79-3.308-11.578a4.577 4.577 0 0 0-1.307-2.184 5.668 5.668 0 0 0-5.634-1.263 4.766 4.766 0 0 0-3.5 3.331c-1.175 3.954-2.269 7.932-3.4 11.9a1.565 1.565 0 0 0 .466 1.64 2.489 2.489 0 0 0 1.83.656h6.3" data-name="Path 20"/></g></svg>
                </div>
                <div class="controls__wrapper">
                    <div class="controls notifications">
                        <div class="notifications__header">
                            Notifications
                        </div>
                        <div class="notifications__list">
                            <div class="notification__item">
                                <h4>Lorem ipsum staat hier</h4>
                                <span class="date">00-00-XXXX</span>
                            </div>
                            <div class="notification__item">
                                <h4>Lorem ipsum staat hier</h4>
                                <span class="date">00-00-XXXX</span>
                            </div>
                            <div class="notification__item">
                                <h4>Lorem ipsum staat hier</h4>
                                <span class="date">00-00-XXXX</span>
                            </div>
                            <div class="notification__item">
                                <h4>Lorem ipsum staat hier</h4>
                                <span class="date">00-00-XXXX</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="icon icon__search">
                <div class="icon__svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.935" height="25.731" viewBox="0 0 25.935 25.731"><defs><clipPath id="a"><path fill="#f7a637" d="M0 0h25.935v25.731H0z" data-name="Rectangle 94"/></clipPath></defs><g data-name="Group 240"><g data-name="Group 235"><g clip-path="url(#a)" data-name="Group 234"><path fill="#f7a637" d="M17.568 19.273c-.5.331-.957.662-1.441.946a10.023 10.023 0 0 1-3.8 1.307A10.54 10.54 0 0 1 4 19.199a10.521 10.521 0 0 1-3.8-6.3 10.869 10.869 0 0 1 21.234-4.648 10.733 10.733 0 0 1-1.837 9c-.03.041-.061.081-.089.123a.31.31 0 0 0-.022.055l1.755 1.752 4.242 4.241a1.323 1.323 0 0 1 .421 1.27 1.352 1.352 0 0 1-1.85.922 2.01 2.01 0 0 1-.56-.393q-2.924-2.906-5.834-5.822a.876.876 0 0 1-.092-.122M10.82 2.71a8.108 8.108 0 0 0-.049 16.216 8.173 8.173 0 0 0 8.158-8.107 8.184 8.184 0 0 0-8.11-8.109" data-name="Path 22"/></g></g></g></svg>
                </div>
                <div class="controls__wrapper">
                    <div class="controls search__bar">
                        <input type="text" value="" name="s" placeholder="Zoeken naar gebruiker, order, factuur etc.">
                    </div>
                </div>
            </div>
            <div class="icon icon__user">
                <div class="thumbnail"></div>
                <div class="controls__wrapper">
                    <div class="controls">
                        <div class="UserInfo">
                            <div class="userLoggedIn">
                                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                {{--<span class="rol">({{Auth::user()->role}})</span>--}}
                            </div>
                            <div class="button-group">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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
    @endauth

     <!--- SubTitle ---->
    <h1 class="sub__title">{{ __($pageTitle) }}</h1>

     <!--- Page title ---->
     
    <h2 class="page__title">{{ __('Onderdeeltitel') }}</h2>

     <!--- Subpages ---->
    <div class="sub__pages">
        @if($subpages)
            @foreach ($subpages as $pageName => $route)
                <a href="{{ route( $route, request('id') ) }}">{{ $pageName }}</a>
            @endforeach
        @endif
    </div>
</div>
