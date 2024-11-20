<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index(){
        return view('peminjaman.index');
    }

    public function create(){
        return view('peminjaman.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'id_pegawai' => 'required',
            'id_inventaris' => 'required',
            'jumlah' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_peminjaman' => 'required'
        ]);

        Peminjaman::create($validateData);

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
