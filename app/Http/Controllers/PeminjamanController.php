<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Inventaris;
use App\Models\User;

class PeminjamanController extends Controller
{
    public function index(){
        return view('peminjaman.index');
    }

    public function create(){
        $user = User::all();
        $inventaris = Inventaris::all();
        return view('peminjaman.create', compact('user', 'inventaris'));
    }

    public function store(Request $request){

        Peminjaman::create([
            'id_pegawai' => $request->id_pegawai,
            'id_inventaris' => $request->id_inventaris,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status_peminjaman' => 'dipinjam'
        ]);

        return redirect()->route('peminjaman.index');
    }


    public function show($id){
        $peminjaman = Peminjaman::find($id);
        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit($id){
        $peminjaman = Peminjaman::find($id);
        return view('peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'id_pegawai' => 'required',
            'id_inventaris' => 'required',
            'jumlah' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_peminjaman' => 'required'
        ]);

        Peminjaman::whereId($id)->update($validateData);

        return redirect()->route('peminjaman.index');
    }

    public function destroy($id){
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index');
    }
}
