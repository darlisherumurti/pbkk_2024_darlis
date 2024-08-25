@extends('layout.base')

@section('title', 'Fibonacci')

@section('content')
<h1>Masukkan Angka</h1>
<form action="#" method="GET">
    <label for="n">Enter a number (n):</label>
    <input type="text" name="n" id="n" min="1" required>
    <button type="submit">Submit</button>
</form>

@if(count($numberDetails) > 0)
    <h2>Hasil</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor Urut</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($numberDetails as $detail)
                <tr>
                    <td>{{ $detail['number'] }}</td>
                    <td>{{ $detail['result'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection


