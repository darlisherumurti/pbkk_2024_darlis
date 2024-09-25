@extends('layout.base')
@push('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
@endpush
@section('title', 'Formulir Edit Kategori')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            @include('pertemuan5.kategori.form.edit', [
                'kategori' => $data['kategori'],
            ])
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
