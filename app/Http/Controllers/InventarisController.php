<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('inventaris.index', compact('inventaris'));
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
        $inventaris = Inventaris::where('id_inventaris', $id);
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
        $inventaris->update($request->all());

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
