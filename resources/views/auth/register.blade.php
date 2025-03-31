@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div class="container">
    <h2>Register</h2>
    <form method="post" action="{{ route('register') }}">
        @csrf
        <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br>
        <button type="submit">Register</button>
    </form>
    <a href="{{ route('login') }}">Sudah punya akun? Login</a>
</div>
@endsection
