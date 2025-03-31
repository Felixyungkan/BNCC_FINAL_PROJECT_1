@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div class="container">
    <h2>Login</h2>
    <form method="post" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('register') }}">Belum punya akun? Register</a>
</div>
@endsection
