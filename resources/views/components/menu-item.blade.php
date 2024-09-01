@php
    $routeExists = Route::has($route);
    $href = $routeExists ? route($route) : '#';
@endphp

<li class="nav-item">
    <a href="{{ $href }}" class="nav-link {{ request()->routeIs($active) ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>{{ $title }}</p>
    </a>
</li>
