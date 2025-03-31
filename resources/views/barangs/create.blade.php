@extends('layouts.app')

@section('content')
<head><link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
<h1>Tambah Barang</h1>
<form method="POST" action="{{ route('barangs.store') }}" enctype="multipart/form-data">
    @csrf
    <label>Nama:</label>
    <input type="text" name="nama" required><br>
    <label>Harga:</label>
    <input type="number" name="harga" required><br>
    <label>Jumlah:</label>
    <input type="number" name="jumlah" required><br>
    <label>Gambar:</label>
    
    <input type="file" name="gambar" accept="image/*" required><br>
    <button type="submit">Tambah</button>
</form>
<a href="{{ route('barangs.index') }}">Kembali</a>
@endsection
