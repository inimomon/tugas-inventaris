<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Ruang;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = DB::table('inventaris')
            ->join('ruang', 'inventaris.id_ruang', '=', 'ruang.id_ruang')
            ->select('inventaris.*', 'ruang.nama_ruang')
            ->get();
        return view('inventaris.home', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruang = Ruang::all();
        return view('inventaris.create', compact('ruang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
            'id_ruang' => 'required',
            'tanggal_register' => 'required',
        ]);

        Inventaris::create($request->all());

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ruang = Ruang::all();
        $inventaris = Inventaris::where('id_inventaris', $id)->first(); // Fetch the first matching record
        return view('inventaris.edit', compact('inventaris', 'ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
            'id_ruang' => 'required',
            'tanggal_register' => 'required',
        ]);

        $inventaris = Inventaris::where('id_inventaris', $id);
        $inventaris->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'id_ruang' => $request->id_ruang,
            'tanggal_register' => $request->tanggal_register,
        ]);

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventaris = Inventaris::where('id_inventaris', $id);
        $inventaris->delete();

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris deleted successfully');
    }
}
