<div class="topbar__wrapper">
    <!--- Auth User info ---->
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="q" placeholder="Search products...">
        <button type="submit">Search</button>
    </form>

    @auth
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
    @endauth

     <!--- SubTitle ---->
    <h1 class="sub__title">{{ __($seoTitle) }}</h1>

     <!--- Page title ---->
    <h2 class="page__title">{{ __($seoTitle ?? 'Title')  }}</h2>

     <!--- Subpages ---->
    <div class="sub__pages">
        @if($subpages)
            @foreach ($subpages as $pageName => $route)
                <a href="{{ route( $route, request('id') ) }}">{{ $pageName }}</a>
            @endforeach
        @endif
    </div>
</div>
