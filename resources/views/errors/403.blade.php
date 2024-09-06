@extends('layout.base')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">403</h1>
            <h3 class="text-center">Forbidden</h3>
            <p class="text-center">You don't have permission to access this page.</p>

            <a href="{{ route('home') }}" class="btn btn-primary btn-block">Back to Home</a>
        </div>
    </div>
@endSection
