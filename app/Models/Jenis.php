<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jenis extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'nama_jenis',
    ] ;

    public function jenis()
    {
        return $this->hasMany(Jenis::class, 'id_jenis','id');
    }
}
