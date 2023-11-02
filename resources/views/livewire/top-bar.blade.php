<div class="topbar__wrapper">
    <!--- Auth User info ---->
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
    <h1 class="sub__title">{{ __($pageTitle) }}</h1>

     <!--- Page title ---->
    <h2 class="page__title">{{ __( 'Onderdeeltitel' ) }}</h2>

     <!--- Subpages ---->
    <div class="sub__pages">
        @if($subpages)
            @foreach ( $subpages as $pageName => $route )
                <a href="{{ $route }}">{{ $pageName }}</a>
            @endforeach
        @endif
    </div>
</div>
