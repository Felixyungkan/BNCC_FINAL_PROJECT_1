<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_invoice',
        'alamat_pengiriman',
        'kode_pos',
        'total_harga',
    ];
    


    public function barangs()
    {
        return $this->belongsToMany(Barang::class)
                    ->withPivot('kuantitas', 'subtotal');
    }
}
