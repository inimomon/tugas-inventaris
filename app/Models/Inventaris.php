<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';

    protected $fillable = [
        'nama',
        'keterangan',
        'jumlah',
        'id_ruang',
        'tanggal_register'
    ];

    function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang', 'id');
    }

    
}