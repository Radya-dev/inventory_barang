<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_supplier',
        'alamat',
        'no_telp',
    ];

    public function supplier()
    {
        return $this->hasMany(Supplier::class,'id_supplier');
    }
}
