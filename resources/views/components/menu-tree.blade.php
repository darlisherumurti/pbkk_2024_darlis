<li class="nav-item has-treeview  {{ request()->is($active) ? 'menu-open' : '' }} ">
    <a href="#" class="nav-link {{ request()->is($active) ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>

</li>
