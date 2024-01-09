<div class="sidebar">
    <nav class="sidebar__menu">
        <a class="navigation__link {{ App\AppHelpers\RouteHelper::isActivePage('home') }}" href="{{ route('home') }}">
            <div class="navigation__icon">
                <div class="nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39.514" height="39.891" data-name="Group 134" viewBox="0 0 39.514 39.891"><defs><clipPath id="a"><path fill="none" d="M0 0h39.514v39.891H0z" data-name="Rectangle 70"/></clipPath></defs><g fill="#151518" clip-path="url(#a)" data-name="Group 133"><path d="M39.459 39.891H.041C.027 39.752 0 39.612 0 39.473c0-7.747-.009-15.494.02-23.241a1.516 1.516 0 0 1 .526-1.022C6.731 10.228 12.939 5.278 19.122.3a.819.819 0 0 1 1.263 0q9.143 7.36 18.337 14.662a1.9 1.9 0 0 1 .792 1.69c-.024 6.6-.012 13.193-.016 19.789 0 1.15-.026 2.3-.039 3.449M3.565 36.242h32.311a2.337 2.337 0 0 0 .052-.315c0-6.01.012-12.019-.016-18.028a1.335 1.335 0 0 0-.5-.867c-2.964-2.406-5.947-4.787-8.927-7.172q-3.345-2.678-6.713-5.366c-.177.128-.314.219-.443.322Q11.768 10.865 4.2 16.906a1.508 1.508 0 0 0-.649 1.332c.025 5.139.014 10.278.014 15.417v2.587" data-name="Path 3"/><path d="M9.029 29.188h21.442v3.454H9.029z" data-name="Rectangle 69"/></g></svg>
                </div>
            </div>
            <span>{{ __('Home') }}</span>
        </a>
        <a class="navigation__link {{ App\AppHelpers\RouteHelper::isActivePage('projects.index', 'projects.*') }}" href="{{ route('projects.index') }}">
            <div class="navigation__icon">
                <div class="nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38.818" height="41.558" data-name="Group 138" viewBox="0 0 38.818 41.558"><defs><clipPath id="a"><path fill="none" d="M0 0h38.818v41.558H0z" data-name="Rectangle 72"/></clipPath></defs><g fill="#151518" clip-path="url(#a)" data-name="Group 137"><path d="M3.496 41.557a5.046 5.046 0 0 1-2.1-1.053 4.055 4.055 0 0 1-1.386-3.08q-.006-4.666 0-9.331v-.382h2.766v9.379c0 1.182.519 1.7 1.711 1.7q14.912 0 29.824-.013a2.494 2.494 0 0 0 1.177-.317 1.333 1.333 0 0 0 .533-1.284V27.71h2.767c.006.134.018.276.018.417 0 3.016-.034 6.032.011 9.047a4.218 4.218 0 0 1-3.407 4.315c-.033 0-.061.045-.092.069Z" data-name="Path 7"/><path d="M24.945 24.937c0 .577.026 1.091-.012 1.6a1.073 1.073 0 0 1-.264.624 6.367 6.367 0 0 1-3.526 1.768 8.545 8.545 0 0 1-5.668-.766c-.132-.069-.256-.151-.386-.223a2 2 0 0 1-1.249-2.274 4.11 4.11 0 0 0 .006-.73h-.525c-3.165-.006-6.331.015-9.5-.029a4.057 4.057 0 0 1-3.805-3.8C-.017 16.94.008 12.774.008 8.608a.833.833 0 0 1 .027-.125c4.1-.6 8.227-1.019 12.419-1.314V2.277c0-.212.012-.375.247-.491A14.66 14.66 0 0 1 19.852.01a15 15 0 0 1 6.288 1.81.561.561 0 0 1 .186.428c.014 1.474.008 2.949.008 4.423v.419L38.781 8.4c.012.227.024.358.024.488v11.808a4.144 4.144 0 0 1-3.421 4.172 5.514 5.514 0 0 1-1.05.065q-4.444.007-8.888 0h-.5m0-2.778h9.508a1.4 1.4 0 0 0 1.568-1.545c.007-3.11 0-6.221.008-9.331 0-.294-.089-.39-.385-.419-2.459-.237-4.914-.532-7.376-.73-2.289-.184-4.585-.361-6.88-.376-2.891-.018-5.784.106-8.673.221-1.578.063-3.154.213-4.727.362-1.6.152-3.192.364-4.791.521-.335.033-.426.133-.425.461.011 3.083.005 6.166.008 9.25a1.423 1.423 0 0 0 1.574 1.586h9.089c.128 0 .256-.012.418-.02v-4.102h11.079ZM23.549 6.951c0-1.033.006-2.058-.01-3.082a.392.392 0 0 0-.219-.27 10.091 10.091 0 0 0-7.8-.021.339.339 0 0 0-.266.375c.019.472.006.945.006 1.418v1.58ZM16.643 20.8c0 1.581-.005 3.132.012 4.682 0 .1.157.239.272.29a5.876 5.876 0 0 0 4.973 0 .423.423 0 0 0 .272-.468c-.011-.9 0-1.81 0-2.715v-1.786Z" data-name="Path 8"/></g></svg>
                </div>
            </div>
            <span>{{ __('Projecten') }}</span>
        </a>
        <a class="navigation__link {{ App\AppHelpers\RouteHelper::isActivePage('orders.index', 'orders.*') }}" href="{{ route('orders.index') }}">
            <div class="navigation__icon">
                <div class="nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39.322" height="40.876" data-name="Group 136" viewBox="0 0 39.322 40.876"><defs><clipPath id="a"><path fill="none" d="M0 0h39.322v40.876H0z" data-name="Rectangle 71"/></clipPath></defs><g fill="#151518" clip-path="url(#a)" data-name="Group 135"><path d="M.01 21.63c0-5.592.016-11.184-.01-16.776-.008-1.7.4-3.2 1.925-4.09A5.033 5.033 0 0 1 4.313.035C14.532-.012 24.751-.001 34.97.008a4.218 4.218 0 0 1 4.288 3.891 11.854 11.854 0 0 1 .061 1.189v33.723c0 .2.007.4-.005.6-.08 1.321-1.056 1.854-2.18 1.162-1.545-.951-3.088-1.907-4.594-2.917a1.047 1.047 0 0 0-1.35.018c-1.469.965-2.973 1.875-4.445 2.836a1.608 1.608 0 0 1-1.963.013c-1.515-1-3.075-1.928-4.587-2.93a.878.878 0 0 0-1.129.019c-1.5.975-3.025 1.9-4.518 2.879a1.654 1.654 0 0 1-2.036.01c-1.486-.99-3.027-1.902-4.512-2.888a.927.927 0 0 0-1.2.017c-1.471.969-2.97 1.883-4.45 2.831a1.474 1.474 0 0 1-1.65.248 1.535 1.535 0 0 1-.688-1.536Q.014 30.399.01 21.63M36.7 37.221V4.799c0-1.681-.551-2.225-2.255-2.225H4.907c-1.748 0-2.3.55-2.3 2.283v32.36c1.335-.839 2.554-1.549 3.71-2.351a1.759 1.759 0 0 1 2.25.018c1.432.966 2.924 1.843 4.369 2.79a.931.931 0 0 0 1.206.006c1.413-.945 2.9-1.783 4.294-2.752a1.928 1.928 0 0 1 2.477.017c1.4.957 2.873 1.817 4.293 2.752a.877.877 0 0 0 1.133.005c1.441-.954 2.943-1.818 4.366-2.8a1.871 1.871 0 0 1 2.4.022c1.114.771 2.283 1.462 3.594 2.292" data-name="Path 4"/><path d="M19.656 13.683H9.019a6.853 6.853 0 0 1-.849-.034 1.2 1.2 0 0 1-1.1-1.111 1.143 1.143 0 0 1 .818-1.325 2.734 2.734 0 0 1 .913-.124q10.85-.01 21.7 0a2.7 2.7 0 0 1 .759.052 1.243 1.243 0 0 1 .988 1.313 1.161 1.161 0 0 1-1.1 1.19 12.709 12.709 0 0 1-1.613.065q-4.935.008-9.871 0v-.024" data-name="Path 5"/><path d="M19.658 24.395H9.106c-.284 0-.569.005-.85-.023a1.259 1.259 0 0 1-1.2-1.285 1.241 1.241 0 0 1 1.148-1.264 3.987 3.987 0 0 1 .764-.021h21.529a4.657 4.657 0 0 1 .595.011 1.28 1.28 0 0 1 1.157 1.341 1.19 1.19 0 0 1-1.185 1.2c-.506.048-1.02.028-1.53.029h-9.871" data-name="Path 6"/></g></svg>
                </div>
            </div>
            <span>{{ __('Orders') }}</span>
        </a>
        <a class="navigation__link {{ App\AppHelpers\RouteHelper::isActivePage('advertisers.index', 'advertisers.*') }}" href="{{ route('advertisers.index') }}">
            <div class="navigation__icon">
                <div class="nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="37.006" data-name="Group 140" viewBox="0 0 39 37.006"><defs><clipPath id="a"><path fill="none" d="M0 0h39v37.006H0z" data-name="Rectangle 73"/></clipPath></defs><g fill="#151518" clip-path="url(#a)" data-name="Group 139"><path d="M39 29.2a7.807 7.807 0 1 1-7.718-7.779A7.822 7.822 0 0 1 39 29.2m-7.786-5.816a5.817 5.817 0 1 0 5.825 5.874 5.845 5.845 0 0 0-5.825-5.874" data-name="Path 9"/><path d="M15.612 29.215a7.806 7.806 0 1 1-7.567-7.809 7.822 7.822 0 0 1 7.567 7.809m-7.821-5.833a5.817 5.817 0 1 0 5.861 5.794 5.844 5.844 0 0 0-5.861-5.794" data-name="Path 10"/><path d="M27.307 7.793A7.807 7.807 0 1 1 19.491.001a7.785 7.785 0 0 1 7.815 7.793m-7.819 5.828a5.817 5.817 0 1 0-5.835-5.82 5.846 5.846 0 0 0 5.835 5.82" data-name="Path 11"/><path d="M20.495 18.793c0 .5-.023 1 .013 1.5a.746.746 0 0 0 .27.5c1 .693 2.019 1.355 3.028 2.033a1 1 0 1 1-1.1 1.632c-.938-.62-1.884-1.23-2.8-1.88a.608.608 0 0 0-.829.016c-.91.634-1.84 1.24-2.766 1.85a1 1 0 1 1-1.1-1.629c.986-.658 1.97-1.32 2.965-1.964a.64.64 0 0 0 .334-.626c-.021-.927-.008-1.854-.007-2.781 0-.8.366-1.269.983-1.279s1.006.476 1.007 1.3v1.322" data-name="Path 12"/></g></svg>
                </div>
            </div>
            <span>{{ __('Relaties') }}</span>
        </a>

        @cannot('isSeller')
            <a class="navigation__link {{ App\AppHelpers\RouteHelper::isActivePage('invoices.index', 'invoices.*') }}" href="{{ route('invoices.index') }}">
                <div class="navigation__icon">
                    <div class="nav__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="38.813" data-name="Group 142" viewBox="0 0 39 38.813"><defs><clipPath id="a"><path fill="none" d="M0 0h39v38.813H0z" data-name="Rectangle 75"/></clipPath></defs><g fill="#151518" clip-path="url(#a)" data-name="Group 141"><path d="M39 18.329v8.115c0 2.127-.935 3.051-3.081 3.054-3.517 0-7.035.011-10.552-.007-.531 0-.8.106-.988.676A12.458 12.458 0 1 1 8.53 14.622a1.017 1.017 0 0 0 .86-1.175c-.041-3.5-.022-7.007-.017-10.511 0-1.984.946-2.928 2.951-2.931q8.3-.011 16.6.016A1.691 1.691 0 0 1 30 .459q4.285 4.2 8.5 8.472a1.8 1.8 0 0 1 .472 1.128c.04 2.756.021 5.513.021 8.27m-22.05-3.668c.386.2.577.316.778.408a13.491 13.491 0 0 1 3.948 2.814 1.768 1.768 0 0 0 1.114.481c3.052.039 6.1.022 9.157.022h.86v1.7h-9.345c.421 1.187.794 2.3 1.223 3.389a.788.788 0 0 0 .6.323c.743.039 1.489.015 2.259.015v1.736h-2.561v2.221c.272.012.524.033.777.033h10.088c1.282 0 1.428-.145 1.429-1.418V11.466c0-.274-.025-.547-.042-.888-2.077 0-4.089.01-6.1 0a2.6 2.6 0 0 1-2.765-2.764c-.009-1.752 0-3.5 0-5.256 0-.27-.024-.54-.037-.8-.2-.022-.3-.044-.4-.044H12.173c-.884 0-1.089.227-1.091 1.121q-.009 5.256 0 10.513c0 .2.027.4.037.533l4.333.26.067-1.132h17.26v1.657Zm-4.4 22.455A10.758 10.758 0 1 0 1.721 26.399a10.782 10.782 0 0 0 10.825 10.716M35.823 8.893l-5.77-5.723c0 1.541-.014 3.156.007 4.771a.9.9 0 0 0 1 .948c1.6.012 3.2 0 4.767 0" data-name="Path 13"/><path d="M15.524 7.595h8.427v1.592h-8.427z" data-name="Rectangle 74"/><path d="M8.584 23.925h6.058v1.671H8.163v1.51h6.472v1.68h-6.02a4.993 4.993 0 0 0 3.662 3.752c3.16.514 4.726-1.418 5.853-3.993l1.428.612a6.876 6.876 0 0 1-5.968 5.172c-2.864.292-5.255-1.595-6.946-5.526H4.49v-1.655h1.872v-1.507H4.49v-1.706h2.168c1.147-3.208 3.067-5.484 6.682-5.538 2.787-.041 5.089 1.934 6.273 5.123-.241.116-.485.243-.736.354-.232.1-.471.189-.756.3-1.107-2.547-2.651-4.5-5.822-3.988a5.1 5.1 0 0 0-3.719 3.735" data-name="Path 14"/></g></svg>
                    </div>
                </div>
                <span>{{ __('Facturen') }}</span>
            </a>
            <a class="navigation__link {{ App\AppHelpers\RouteHelper::isActivePage('settings.index', 'settings.*') }}" href="{{ route('settings.index') }}">
                <div class="navigation__icon">
                    <div class="nav__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38.06" height="39.055" data-name="Group 150" viewBox="0 0 38.06 39.055"><defs><clipPath id="a"><path fill="none" d="M0 0h38.06v39.055H0z" data-name="Rectangle 76"/></clipPath></defs><g fill="#151518" clip-path="url(#a)" data-name="Group 150"><path d="M34.577 17.883c.665-.52 1.356-1.01 1.987-1.568.534-.473 1-1.024 1.495-1.54v-1.528c-1.2-2.033-2.4-4.062-3.592-6.1-1.031-1.763-1.873-2.056-3.781-1.285a13.685 13.685 0 0 0-1.643.671 2.269 2.269 0 0 1-2.837-.163c-.417-.335-.747-.568-.8-1.151-.091-1.01-.286-2.011-.422-3.017a2.3 2.3 0 0 0-2.435-2.2q-3.521-.012-7.043 0a2.307 2.307 0 0 0-2.4 2.147c-.153 1.09-.281 2.185-.5 3.262a1.91 1.91 0 0 1-.606.881 2.386 2.386 0 0 1-3.125.2 12.917 12.917 0 0 0-2.114-.857 2.212 2.212 0 0 0-2.789.965Q2.107 9.73.33 12.91a2.24 2.24 0 0 0 .655 3.02c.835.676 1.673 1.35 2.543 1.98a1.5 1.5 0 0 1 .59 1.191 2.537 2.537 0 0 1-1.441 2.744A16.568 16.568 0 0 0 1 23.139a2.255 2.255 0 0 0-.641 3.088q1.743 3.1 3.558 6.162a2.231 2.231 0 0 0 2.986 1c1.054-.4 2.081-.873 3.144-1.247a1.8 1.8 0 0 1 .988.082c1.734.478 1.74 1.954 1.9 3.34.057.5.114 1.01.194 1.511a2.664 2.664 0 0 0 1.671 1.98h8.489a2.809 2.809 0 0 0 1.748-2.571 19.018 19.018 0 0 1 .44-2.842 1.953 1.953 0 0 1 .608-.877 2.374 2.374 0 0 1 3.124-.2 12.568 12.568 0 0 0 1.8.727 2.331 2.331 0 0 0 3.291-1.124c1.263-2.17 2.508-4.35 3.76-6.526v-1.359c-1.156-1.041-2.293-2.1-3.475-3.116a2.431 2.431 0 0 1-.007-3.284m-3.324.931c.054.726-.158 1.477-.063 2.191a2.627 2.627 0 0 0 .706 1.505c1.018.928 2.151 1.73 3.28 2.615-.824 1.432-1.621 2.821-2.422 4.207-.252.436-.514.866-.806 1.358-1.049-.418-2.068-.81-3.076-1.23a3.261 3.261 0 0 0-3.14.282c-2.939 1.772-2.691 1.311-3.266 5.089-.072.474-.13.95-.2 1.465h-6.436l-.518-3.4a4.221 4.221 0 0 0-.083-.5c-.528-1.884-3.984-3.67-5.812-2.986-1.078.4-2.138.858-3.282 1.32L2.9 25.154c.821-.643 1.624-1.306 2.463-1.92a3.811 3.811 0 0 0 1.5-3.036 4.936 4.936 0 0 0-2.611-5.219 12.373 12.373 0 0 1-1.343-1.055c1.016-1.757 2.016-3.51 3.057-5.239.081-.135.49-.187.689-.116.875.314 1.729.684 2.589 1.039a3.13 3.13 0 0 0 2.991-.227c3.005-1.82 2.826-1.273 3.394-5.275.063-.442.132-.884.2-1.353h6.423c.176 1.166.333 2.307.528 3.443a3.577 3.577 0 0 0 .351 1.116 5.735 5.735 0 0 0 6.042 2.136C30.09 9.086 31 8.72 31.92 8.35a3.565 3.565 0 0 1 .226.3c1 1.73 2 3.461 3.036 5.249-.844.663-1.649 1.325-2.486 1.944a3.175 3.175 0 0 0-1.443 2.967" data-name="Path 15"/><path d="M19.134 12.738a6.79 6.79 0 1 0 6.7 6.862 6.749 6.749 0 0 0-6.7-6.862m-.048 10.864a4.074 4.074 0 1 1 4.029-4.1 4.15 4.15 0 0 1-4.029 4.1" data-name="Path 16"/></g></svg>
                    </div>
                </div>
                <span>{{__('Instellingen')}}</span>
            </a>
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
