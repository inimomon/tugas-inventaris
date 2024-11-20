<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index(){
        $peminjam = Peminjaman::all();
        return view('peminjaman.index',compact('peminjam'));
    }

    public function create(){
        return view('peminjaman.create');
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'jumlah' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        $validateData['id_user'] = Auth::user()->id;

        Peminjaman::create($validateData);

        return redirect()->route('peminjaman.index');
    }

    public function update(Request $request, $id_peminjaman){
        $validateData = $request->validate([
            'jumlah' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        $peminjaman = Peminjaman::find($id_peminjaman);
        $peminjaman->update($validateData);

        return redirect()->route('peminjaman.index');
    }


    public function destroy($id_peminjaman){
        $peminjaman = Peminjaman::find($id_peminjaman);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index');
    }
}