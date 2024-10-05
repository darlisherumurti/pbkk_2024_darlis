@extends('layout.template')
@if (@isset($page['props']['title']))
    @section('title', $page['props']['title'] ?? 'Pertemuan 5')
@endif
@section('sidebar')
    <x-menu-tree title="Pertemuan 6" icon="fa-brands fa-vuejs" :active="request()->is('pertemuan6*')">
        <x-menu-item icon="fas fa-home" :href="route('vue.home')" :active="request()->is('pertemuan6')">Home</x-menu-item>
        <x-menu-item icon="fas fa-book" :href="route('vue.buku')" :active="request()->is('pertemuan6/buku')">Buku</x-menu-item>
        <x-menu-tree icon="fas fa-book" title="Tutorial" :active="request()->is('pertemuan6/tutorial*')">
        <x-menu-item icon="fas fa-home" :href="route('vue.tutorial.directive')" :active="request()->is('pertemuan6/tutorial/directive')">Directive</x-menu-item>
        <x-menu-item icon="fas fa-home" :href="route('vue.tutorial.component')" :active="request()->is('pertemuan6/tutorial/component')">Component</x-menu-item>
        <x-menu-item icon="fas fa-home" :href="route('vue.tutorial.reactive')" :active="request()->is('pertemuan6/tutorial/reactive')">Reactivity</x-menu-item>
        </x-menu-tree>
    </x-menu-tree>
    <x-menu-tree title="Pertemuan 5" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan5/vue/media*')">
        <x-menu-item icon="fas fa-home" :href="route('media.index')" :active="request()->is('pertemuan5/vue/media')">Index</x-menu-item>
        <x-menu-item icon="fas fa-upload" :href="route('media.create')" :active="request()->is('pertemuan5/vue/media/create')">Create</x-menu-item>
    </x-menu-tree>
    <x-menu-tree title="Pertemuan 4" icon="fas fa-tachometer-alt" :active="request()->is('api/schema')">
        <x-menu-item icon="fas fa-table" :href="route('api.schema')" :active="request()->is('api/schema')">
            API Schema
        </x-menu-item>
    </x-menu-tree>
    <x-menu-tree title="Pertemuan 3" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan5/perpustakaan*')">
        @guest
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('login')" :active="request()->is('pertemuan5/perpustakaan/login')">Login</x-menu-item>
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan5/perpustakaan/login')">Register</x-menu-item>
        @endguest
        <x-menu-item icon="fas fa-home" :href="route('home')" :active="request()->is('pertemuan5/perpustakaan/home')">Home</x-menu-item>
        <x-menu-tree title="Buku" icon="fas fa-book" :active="request()->is('pertemuan5/perpustakaan/buku*')">
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('buku.index')" :active="request()->is('pertemuan5/perpustakaan/buku')">
                Explore Buku
            </x-menu-item>
            @role('admin')
                <x-menu-item icon="fas fa-plus" :href="route('buku.create')" :active="request()->is('pertemuan5/perpustakaan/buku/create')">
                    Tambah Buku
                </x-menu-item>
            @endrole
            @role('petugas|admin')
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('buku.list')" :active="request()->is('pertemuan5/perpustakaan/buku/list')">
                    Manage Buku
                </x-menu-item>
            @endrole
        </x-menu-tree>
        <x-menu-tree title="Kategori" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan5/perpustakaan/kategori*')">
            <x-menu-item icon="fas fa-sign-in-alt" :href="route('kategori.index')" :active="request()->is('pertemuan5/perpustakaan/kategori')">
                See Kategori
            </x-menu-item>
            @role('admin|petugas')
                <x-menu-item icon="fas fa-plus" :href="route('kategori.create')" :active="request()->is('pertemuan5/perpustakaan/kategori/create')">
                    Tambah Kategori
                </x-menu-item>
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('kategori.list')" :active="request()->is('pertemuan5/perpustakaan/kategori/list')">
                    Manage Kategori
                </x-menu-item>
            @endrole
        </x-menu-tree>
        @auth
            <x-menu-tree title="Pinjaman" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan5/perpustakaan/pinjaman*')">
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.me')" :active="request()->is('pertemuan5/perpustakaan/pinjaman/me')">
                    Pinjaman saya
                </x-menu-item>
                @role('admin|petugas')
                    <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.persetujuan')" :active="request()->is('pertemuan5/perpustakaan/pinjaman/persetujuan')">
                        Manage Persetujuan
                    </x-menu-item>
                    <x-menu-item icon="fas fa-sign-in-alt" :href="route('pinjaman.pengembalian')" :active="request()->is('pertemuan5/perpustakaan/pinjaman/pengembalian')">
                        Manage Pengembalian
                    </x-menu-item>
                @endrole
            </x-menu-tree>
            @role('admin|petugas')
            @endrole
        @endauth
        @role('admin')
            <x-menu-tree title="Users" icon="fas fa-tachometer-alt" :active="request()->is('pertemuan5/perpustakaan/articles*')">
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan5/perpustakaan/login')">
                    List Users
                </x-menu-item>
                <x-menu-item icon="fas fa-sign-in-alt" :href="route('register.show')" :active="request()->is('pertemuan5/perpustakaan/login')">
                    Manage Users
                </x-menu-item>

            </x-menu-tree>
        @endrole
    </x-menu-tree>

    {{-- <x-menu-item icon="fas fa-tachometer-alt" href="/adminlte/index.html" :active="false">
        Adminlte
    </x-menu-item> --}}
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
