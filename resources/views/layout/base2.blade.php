@extends('layout.template')
@section('sidebar')
    <li data-pertemuan="2" class="nav-item has-treeview  {{ request()->is('pertemuan2/*') ? 'menu-open' : '' }} ">
        <a href="#" class="nav-link {{ request()->is('pertemuan2/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Pertemuan 2
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('crud-buku.index') }}"
                    class="nav-link {{ request()->routeIs('crud-buku.index') ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>List Buku</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-buku.create') }}"
                    class="nav-link {{ request()->routeIs('crud-buku.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Tambah Buku</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-kategori.index') }}"
                    class="nav-link {{ request()->routeIs('crud-kategori.index') ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>List Kategori</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-kategori.create') }}"
                    class="nav-link {{ request()->routeIs('crud-kategori.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Tambah Kategori</p>
                </a>
            </li>
        </ul>

    </li>
@endsection
