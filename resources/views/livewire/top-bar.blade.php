        <div class="topbar__wrapper">
            @auth
            <div class="topbar">
                <div class="UserInfo">
                    <div class="userLoggedIn">
                        {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                        {{--<span class="rol">({{Auth::user()->role}})</span>--}}
                    </div>
                    <div class="button-group">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endauth
            <div class="title__wrapper">
                <span>{{ __('SubTitle') }}</span>
                <h1>{{ __('PageTitle') }}</h1>
            </div>
        </div>
    