@extends('layout.template')

@section('sidebar')
    <x-menu-tree title="Pertemuan 2" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan2/*')">

        <x-menu-item title="List Buku" icon="fas fa-list" :href="route('crud-buku.index')" :active="request()->routeIs('crud-buku.index')">
        </x-menu-item>

        <x-menu-item title="Tambah Buku" icon="fas fa-plus-circle" :href="route('crud-buku.create')" :active="request()->routeIs('crud-buku.create')">
        </x-menu-item>

        <x-menu-item title="List Kategori" icon="fas fa-list" :href="route('crud-kategori.index')" :active="request()->routeIs('crud-kategori.index')">
        </x-menu-item>

        <x-menu-item title="Tambah Kategori" icon="fas fa-plus-circle" :href="route('crud-kategori.create')" :active="request()->routeIs('crud-kategori.create')">
        </x-menu-item>
    </x-menu-tree>
    {{-- <x-menu-item title="Adminlte" icon="fas fa-plus-circle" href="/adminlte/index.html" active=''>
    </x-menu-item> --}}
@endsection
