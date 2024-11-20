<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;
use App\Models\User;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = [
        'id_user',
        'id_inventaris',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status_peminjaman'
    ];
    public $timestamps = false;

    function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    function inventaris()
    {
        return $this->belongsTo(User::class, 'id_inventaris', 'id_inventaris');
    }

}
