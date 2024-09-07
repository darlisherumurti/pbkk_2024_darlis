@extends('layout.template')

@section('sidebar')
    <x-menu-tree title="Pertemuan 3" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan3/*')">
        @guest
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('login')" :active="request()->is('pertemuan3/login')">Login</x-menu-item>
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">Register</x-menu-item>
        @endguest
        <x-menu-tree title="Buku" icon="fas fa-book" :active="request()->is('pertemuan3/buku*')">
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('buku.index')" :active="request()->is('pertemuan3/buku')">
                Explore Buku
            </x-menu-item>
            @role('admin')
                <x-menu-item icon="fas fa-plus" :href="route('buku.create')" :active="request()->is('pertemuan3/buku/create')">
                    Tambah Buku
                </x-menu-item>
            @endrole
            @role('petugas|admin')
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('buku.list')" :active="request()->is('pertemuan3/buku/list')">
                    Manage Buku
                </x-menu-item>
            @endrole
        </x-menu-tree>
        <x-menu-tree title="Kategori" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan3/kategori*')">
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('kategori.index')" :active="request()->is('pertemuan3/kategori')">
                See Kategori
            </x-menu-item>
            @role('admin|petugas')
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('kategori.list')" :active="request()->is('pertemuan3/kategori/list')">
                    Manage Kategori
                </x-menu-item>
            @endrole
        </x-menu-tree>
        @auth
            <x-menu-tree title="Pinjaman" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan3/pinjaman*')">
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.me')" :active="request()->is('pertemuan3/pinjaman/me')">
                    Pinjaman saya
                </x-menu-item>
                @role('admin|petugas')
                    <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.list')" :active="request()->is('pertemuan3/pinjaman/list')">
                        Manage Persetujuan
                    </x-menu-item>
                    <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.list')" :active="request()->is('pertemuan3/pinjaman/pengembalian/list')">
                        Manage Pengembalian
                    </x-menu-item>
                @endrole
            </x-menu-tree>
            @role('admin|petugas')
            @endrole
        @endauth
        @role('admin')
            <x-menu-tree title="Users" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan3/articles*')">
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    List Users
                </x-menu-item>
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan3/login')">
                    Manage Users
                </x-menu-item>

            </x-menu-tree>
        @endrole
    </x-menu-tree>
@endsection

@push('scripts')

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            })
        </script>
    @endif

@endpush
