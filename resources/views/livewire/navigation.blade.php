<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Inloggen') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registreren') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.page') }}">{{ __('Orders') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('advertisers.page') }} " class="nav-link">{{ __('Relaties') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects.page') }}">{{ __('Projecten') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('invoices.page') }}">{{ __('Facturen') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings.page') }}">{{ __('Instellingen') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
