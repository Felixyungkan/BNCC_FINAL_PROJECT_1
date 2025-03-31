<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Faktur;
use Illuminate\Support\Str;

class FakturController extends Controller
{
    public function create()
    {
        $barangs = Barang::all();
        return view('fakturs.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat_pengiriman' => 'required|string|min:10|max:100',
            'kode_pos' => 'required|string|size:5',
        ]);

        $nomor_invoice = 'INV-' . time(); 

        $invoice_number = 'INV-' . time(); 

        $faktur = Faktur::create([
            'invoice_number' => $invoice_number, 
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'kode_pos' => $request->kode_pos,
            'total_harga' => 0,
        ]);
        
        
        

        return redirect()->route('fakturs.index')->with('success', 'Faktur berhasil dibuat!');
    }
}
