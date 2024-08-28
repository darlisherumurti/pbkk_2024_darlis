@extends('layout.base')
@section('title', 'Autentikasi tanpa menggunakan framework')

@section('alert')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Form login user
                    </div>
                </div>
                <div class="card-body">
                    @if (!isset($data['user']))
                        <form method="POST" action="{{ route('pertemuan3.login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="l-email" class="form-label">Email</label>
                                <input type="email" id="l-email" name="l-email"
                                    class="form-control @error('l-email') is-invalid @enderror" value="{{ old('l-email') }}"
                                    required>
                                @error('l-email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="l-password" class="form-label">Password</label>
                                <input type="password" id="l-password" name="l-password"
                                    class="form-control @error('l-password') is-invalid @enderror" required>
                                @error('l-password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    @else
                        <p>Kamu sudah masuk</p>
                        <form action="{{ route('pertemuan3.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Form registrasi user
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pertemuan3.register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="r-name" class="form-label">Name</label>
                            <input type="text" id="r-name" name="r-name"
                                class="form-control @error('r-name') is-invalid @enderror" value="{{ old('r-name') }}"
                                required>
                            @error('r-name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="r-email" class="form-label">Email</label>
                            <input type="email" id="r-email" name="r-email"
                                class="form-control @error('r-email') is-invalid @enderror" value="{{ old('r-email') }}"
                                required>
                            @error('r-email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="r-password" class="form-label">Password</label>
                            <input type="password" id="r-password" name="r-password"
                                class="form-control @error('r-password') is-invalid @enderror" required>
                            @error('r-password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="r-password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="r-password_confirmation" name="r-password_confirmation"
                                class="form-control @error('r-password_confirmation') is-invalid @enderror" required>
                            @error('r-password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Data user
                    </div>
                </div>
                <div class="card-body overflow-auto">
                    @if (isset($data['user']))
                        <p>user saat ini</p>
                        <table class="table table-bordered mb-5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data['user']->id }}</td>
                                    <td>{{ $data['user']->name }}</td>
                                    <td>{{ $data['user']->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                    @if (count($data['users']) > 0)
                        <p>semua user</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['users'] as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No users found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
