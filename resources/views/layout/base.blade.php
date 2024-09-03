@extends('layout.template')

@section('sidebar')
    <x-menu-tree title="Pertemuan 3" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan3/*')">
        @guest
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('login.show')" :active="request()->is('pertemuan3/login')">Login</x-menu-item>
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">Register</x-menu-item>
        @endguest
        <x-menu-tree title="Article" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan3/articles*')">
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('login.show')" :active="request()->is('pertemuan3/login')">
                Read Articles
            </x-menu-item>
            @can('view article')
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    View Articles
                </x-menu-item>
            @endcan
            @can('manage article')
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    Manage Articles
                </x-menu-item>
            @endcan
        </x-menu-tree>
        <x-menu-tree title="Kategori" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan3/articles*')">
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('login.show')" :active="request()->is('pertemuan3/login')">
                See Kategori
            </x-menu-item>
            @can('manage kategori')
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    Add Kategori
                </x-menu-item>
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    Manage Kategori
                </x-menu-item>
            @endcan
        </x-menu-tree>
        @can('manage users')
            <x-menu-tree title="Users" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan3/articles*')">
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    View Users
                </x-menu-item>
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    Add Users
                </x-menu-item>
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    Manage Users
                </x-menu-item>

            </x-menu-tree>
        @endcan
    </x-menu-tree>
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @can('manage users')
    @endcan
    @auth
        <form class="w-100 nav-item" id="logout-form" action="{{ route('login.destroy') }}" method="POST">
            @csrf
            <button type="submit" id="logout" class="btn btn-primary w-100">Logout</button>
        </form>
    @endauth
@endsection
