@extends('layouts.app')

@section('content')
<head><link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>

<div class="container">
    <h1>Edit Barang</h1>

    <form method="POST" action="{{ route('barangs.update', $barang->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama', $barang->nama) }}" required><br>

        <label>Harga:</label>
        <input type="number" name="harga" value="{{ old('harga', $barang->harga) }}" required><br>

        <label>Jumlah:</label>
        <input type="number" name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}" required><br>

        <label>Gambar Saat Ini:</label><br>
        <img src="{{ asset('storage/' . $barang->gambar) }}" width="150" alt="Gambar Barang"><br><br>

        <label>Ganti Gambar:</label>
        <input type="file" name="gambar" accept="image/*"><br>

        <button type="submit">Simpan</button>
        
    </form>
    
</div>

@endsection
