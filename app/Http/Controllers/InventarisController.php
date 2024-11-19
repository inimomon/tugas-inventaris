<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
            'tanggal_register' => 'required',
            'id_jenis' => 'required',
            'id_ruang' => 'required',
            'id_petugas' => 'required',
            'kode_inventaris' => 'required',
        ]);

        Inventaris::create($request->all());

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris created successfully.');
    }
    
    public function edit(Inventaris $inventaris)
    {
        return view('inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, Inventaris $inventaris)
    {
        $request->validate([
            'nama' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
            'tanggal_register' => 'required',
            'id_jenis' => 'required',
            'id_ruang' => 'required',
            'id_petugas' => 'required',
            'kode_inventaris' => 'required',
        ]);

        $inventaris->update($request->all());

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris updated successfully');
    }

    public function destroy(Inventaris $inventaris)
    {
        $inventaris->delete();

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris deleted successfully');
    }
    
}
