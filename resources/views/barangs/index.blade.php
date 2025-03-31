@extends('layouts.app')

@section('content')

<head><link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
<div class="container">
    <h1>Selamat Datang</h1>

    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>


    <h1>Aplikasi Pendataan Barang</h1>
    <a href="{{ route('barangs.create') }}" class="btn btn-primary">Tambah Barang</a>

    <table class="table">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Foto Barang</th>
            <th>Update | Delete</th>
        </tr>
        @foreach ($barangs as $barang)
            <tr>
                <td>{{ $barang->nama }}</td>
                <td>Rp.{{ number_format($barang->harga, 2) }}</td>
                <td>{{ $barang->jumlah }}</td>
                <td><img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->nama }}" width="100"></td>


                <td>
                    <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning">Update</a>

                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete" onclick="return confirm('Yakin ingin menghapus barang ini?')">
                            Delete
                        </button>
                    </form>
                </td>
                
            </tr>
            <a href="{{ route('fakturs.create') }}" class="btn btn-primary">Buat Faktur</a>
        @endforeach
    </table>
</div>
@endsection
