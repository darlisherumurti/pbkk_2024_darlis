@extends('layout.template')
@section('sidebar')
    <x-menu-tree title="Pertemuan 2" icon="fas fa-tachometer-alt" active="pertemuan2/*">
        <x-menu-item title="List Buku" icon="fas fa-list" route="crud-buku.index" active="crud-buku.index" />
        <x-menu-item title="Tambah Buku" icon="fas fa-plus-circle" route="crud-buku.create" active="crud-buku.create" />
        <x-menu-item title="List Kategori" icon="fas fa-list" route="crud-kategori.index" active="crud-kategori.index" />
        <x-menu-item title="Tambah Kategori" icon="fas fa-plus-circle" route="crud-kategori.create"
            active="crud-kategori.create" />
    </x-menu-tree>
@endsection
