@extends('layout.template')

@section('sidebar')
    <x-menu-tree title="Pertemuan 4" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan4/*')">
        @guest
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('login')" :active="request()->is('pertemuan4/login')">Login</x-menu-item>
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan4/login')">Register</x-menu-item>
        @endguest
        <x-menu-item icon="fas fa-home" :href="route('home')" :active="request()->is('pertemuan4/home')">Home</x-menu-item>
        <x-menu-tree title="Buku" icon="fas fa-book" :active="request()->is('pertemuan4/buku*')">
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('buku.index')" :active="request()->is('pertemuan4/buku')">
                Explore Buku
            </x-menu-item>
            @role('admin')
                <x-menu-item icon="fas fa-plus" :href="route('buku.create')" :active="request()->is('pertemuan4/buku/create')">
                    Tambah Buku
                </x-menu-item>
            @endrole
            @role('petugas|admin')
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('buku.list')" :active="request()->is('pertemuan4/buku/list')">
                    Manage Buku
                </x-menu-item>
            @endrole
        </x-menu-tree>
        <x-menu-tree title="Kategori" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan4/kategori*')">
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('kategori.index')" :active="request()->is('pertemuan4/kategori')">
                See Kategori
            </x-menu-item>
            @role('admin|petugas')
                <x-menu-item icon="fas fa-plus" :href="route('kategori.create')" :active="request()->is('pertemuan4/kategori/create')">
                    Tambah Kategori
                </x-menu-item>
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('kategori.list')" :active="request()->is('pertemuan4/kategori/list')">
                    Manage Kategori
                </x-menu-item>
            @endrole
        </x-menu-tree>
        @auth
            <x-menu-tree title="Pinjaman" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan4/pinjaman*')">
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.me')" :active="request()->is('pertemuan4/pinjaman/me')">
                    Pinjaman saya
                </x-menu-item>
                @role('admin|petugas')
                    <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.persetujuan')" :active="request()->is('pertemuan4/pinjaman/persetujuan')">
                        Manage Persetujuan
                    </x-menu-item>
                    <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.pengembalian')" :active="request()->is('pertemuan4/pinjaman/pengembalian')">
                        Manage Pengembalian
                    </x-menu-item>
                @endrole
            </x-menu-tree>
            @role('admin|petugas')
            @endrole
        @endauth
        @role('admin')
            <x-menu-tree title="Users" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan4/articles*')">
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan4/login')">
                    List Users
                </x-menu-item>
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan4/login')">
                    Manage Users
                </x-menu-item>

            </x-menu-tree>
        @endrole
    </x-menu-tree>
    <x-menu-item icon="fas fa-table" :href="route('api.schema')" :active="request()->is('api/schema')">
        API Schema
    </x-menu-item>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            })
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            })
        </script>
    @endif
@endpush
