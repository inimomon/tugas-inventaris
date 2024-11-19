<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{

    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_peminjaman' => 'required',
            'id_pegawai' => 'required',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman created successfully.');
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }


    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_peminjaman' => 'required',
            'id_pegawai' => 'required',
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman updated successfully');
    }


    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman deleted successfully');
    }


}
