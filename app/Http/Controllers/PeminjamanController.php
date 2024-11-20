<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Inventaris;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index(){
        $peminjam = DB::table('peminjaman')
            ->join('users', 'peminjaman.id_user', '=', 'users.id')
            ->join('inventaris', 'peminjaman.id_inventaris', '=', 'inventaris.id_inventaris')
            ->select('peminjaman.*', 'users.name', 'inventaris.nama')
            ->get();
        return view('peminjaman.home',compact('peminjam'));
    }

    public function create(){
        $user = User::all();
        $inventaris = Inventaris::all();
        return view('peminjaman.create', compact('user', 'inventaris'));
    }

    public function edit(string $id_peminjaman){
        $user = User::all();
        $inventaris = Inventaris::all();
        $peminjaman = Peminjaman::where('id_peminjaman', $id_peminjaman)->first();
        return view('peminjaman.edit', compact('peminjaman', 'user', 'inventaris'));
    }

    public function store(Request $request){

        $validateData['id_user'] = Auth::user()->id;

        Peminjaman::create([
            'id_user' => $validateData['id_user'],
            'id_inventaris' => $request->id_inventaris,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status_peminjaman' => 'Dipinjam',
        ]);

        return redirect()->route('peminjaman.index');
    }

    public function update(Request $request, $id_peminjaman){

        $peminjaman = Peminjaman::find($id_peminjaman);
        $peminjaman->update([
            'id_user' => Auth::user()->id,
            'id_inventaris' => $request->id_inventaris,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status_peminjaman' => $request->status_peminjaman,
        ]);

        return redirect()->route('peminjaman.index');
    }


    public function destroy($id_peminjaman){
        $peminjaman = Peminjaman::find($id_peminjaman);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index');
    }
}