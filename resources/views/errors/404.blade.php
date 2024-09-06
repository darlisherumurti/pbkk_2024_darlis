@extends('layout.base')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">404</h1>
            <h3 class="text-center">Page Not Found</h3>
            <p class="text-center">The page you requested could not be found.</p>
            <a href="{{ route('home') }}" class="btn btn-primary btn-block">Back to Home</a>
        </div>
    </div>
@endSection
