<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar',
        'nama_barang',
        'id_jenis',
        'harga_beli',
        'harga_jual',
        'stok'
    ];

    public function Barang()
    {
        return $this->hasMany(Barang::class,'id_barang','id');
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class,'id_jenis','id');
    }



}

