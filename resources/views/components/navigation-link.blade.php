<a class="navigation__link {{ $isActivePage }}" href="{{ route($routeName) }}">
    <div class="navigation__icon">
        <div class="nav__icon">
            <img src="{{$iconName}}" alt="" />
        </div>
    </div>
    <span>{{ $linkText }}</span>
</a>
