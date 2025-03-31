<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:5|max:80',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $path = $request->file('gambar')->store('barang','public');

        Barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'gambar' => $path
        ]);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.edit', compact('barang'));
    }


    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|min:5|max:80',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('barang', 'public');
            $barang->gambar = $path; // langsung simpan path yang dikembalikan
        }
        

        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->jumlah = $request->jumlah;
        $barang->save();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diperbarui!');
    }



    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        
        
        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function __construct()
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->send();
        }
    }
    

}


