@extends('layout.base')
@push('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
@endpush
@section('title', 'Formulir Tambah Kategori')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            @include('pertemuan4.kategori.form.tambah')
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/bootstrap-select.min.js"></script>
@endpush
