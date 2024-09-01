<li class="nav-item">
    <a href="{{ route($route) }}" class="nav-link {{ request()->routeIs($active) ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>{{ $title }}</p>
    </a>
</li>
