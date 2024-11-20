<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;
use App\Models\User;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_pegawai',
        'id_inventaris',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status_peminjaman'
    ];
    public $timestamps = false;

    function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'id_inventaris', 'id');
    }

    function pegawai()
    {
        return $this->belongsTo(User::class, 'id_pegawai', 'id');
    }

}
