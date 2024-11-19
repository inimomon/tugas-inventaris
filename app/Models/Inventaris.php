<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';
    protected $primaryKey = 'id_inventaris';
    protected $fillable = [
        'nama', 
        'kondisi', 
        'keterangan', 
        'jumlah', 
        'tanggal_register', 
        'id_jenis', 
        'id_ruang', 
        'id_petugas', 
        'kode_inventaris'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id_jenis');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang', 'id_ruang');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id_petugas');
    }

    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'id_inventaris', 'id_inventaris');
    }
}