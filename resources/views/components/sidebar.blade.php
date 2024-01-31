<div class="sidebar">
    <nav class="sidebar__menu">
        <x-navigation-link isActivePage="{{ App\AppHelpers\RouteHelper::isActivePage('home') }}" linkText="Home" routeName="home" iconName="home" />
        <x-navigation-link isActivePage="{{ App\AppHelpers\RouteHelper::isActivePage('projects.index', 'projects.*') }}" linkText="Projecten" routeName="projects.index" iconName="projects" />
        <x-navigation-link isActivePage="{{ App\AppHelpers\RouteHelper::isActivePage('orders.index', 'orders.*') }}" linkText="Orders" routeName="orders.index" iconName="orders" />
        <x-navigation-link isActivePage="{{ App\AppHelpers\RouteHelper::isActivePage('advertisers.index', 'advertisers.*') }}" linkText="Relaties" routeName="advertisers.index" iconName="relations" />
        @cannot('isSeller')
            <x-navigation-link isActivePage="{{ App\AppHelpers\RouteHelper::isActivePage('invoices.index', 'invoices.*') }}" linkText="Facturen" routeName="invoices.index" iconName="invoice" />
            <x-navigation-link isActivePage="{{ App\AppHelpers\RouteHelper::isActivePage('settings.index', 'settings.*') }}" linkText="Instellingen" routeName="settings.index" iconName="settings" />
        @endcannot
    </nav>
    <div class="sidebar__profile">
        <div class="profile__thumbnail">
            <div class="icon">
                <img class="image--cover" src="{{asset('images/no-image.png')}}">
            </div>
            <div class="profile__details">
                <div class="user__details">
                    <strong class="text--primary">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</strong>
                    <small>{{Auth::user()->role}}</small>
                </div>
                <div class="profile__logout">
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
