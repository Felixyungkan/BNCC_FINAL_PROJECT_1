@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Faktur</h2>
    <form action="{{ route('fakturs.store') }}" method="POST">
        @csrf
        <label>Alamat Pengiriman:</label>
        <input type="text" name="alamat_pengiriman" required>
        
        <label>Kode Pos:</label>
        <input type="text" name="kode_pos" required>

        <h3>Pilih Barang</h3>
        @foreach($barangs as $barang)
            <input type="checkbox" name="barang[{{ $barang->id }}][id]" value="{{ $barang->id }}"> 
            {{ $barang->nama }} - Rp{{ number_format($barang->harga, 2, ',', '.') }}
            <input type="number" name="barang[{{ $barang->id }}][kuantitas]" min="1" placeholder="Jumlah">
            <br>
        @endforeach

        <button type="submit">Buat Faktur</button>
    </form>
</div>
@endsection
