<div class="sidebar">
    <nav class="navigation--column">
        <a class="navigation__link" href="{{ route('projects.page') }}">{{ __('Projecten') }}</a>
        <a class="navigation__link" href="{{ route('orders.page') }}">{{ __('Orders') }}</a>
        <a class="navigation__link" href="{{ route('advertisers.page') }}">{{ __('Relaties') }}</a>
        <a class="navigation__link" href="{{ route('invoices.page') }}">{{ __('Facturen') }}</a>
    </nav>
{{--
    <nav class="navigation--column">
        <a class="navigation__link" href="{{ route('settings.page') }}">Instellingen</a>
    </nav> --}}



    @auth
        <div>
            <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
            </a>

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @endauth
</div>
