<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;
use App\Models\User;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
        'id_user',
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

}
