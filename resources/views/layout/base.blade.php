@extends('layout.template')

@section('sidebar')
    <li data-pertemuan="1" class="nav-item has-treeview {{ request()->is('pertemuan1/*') ? 'menu-open' : '' }} ">
        <a href="#" class="nav-link {{ request()->is('pertemuan1/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Pertemuan 1
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('genap-ganjil') }}"
                    class="nav-link {{ request()->routeIs('genap-ganjil') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Genap Ganjil</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('fibonacci') }}" class="nav-link {{ request()->routeIs('fibonacci') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fibonacci</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('bilangan-prima') }}"
                    class="nav-link {{ request()->routeIs('bilangan-prima') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bilangan Prima</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('param') }}" class="nav-link {{ request()->is('pertemuan1/param*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Routing Parameter</p>
                </a>
            </li>
        </ul>
    </li>
@endsection
