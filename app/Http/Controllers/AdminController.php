<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createKenis(Request $request){
        $validateData = $request->validate([
            'nama_jenis' => 'required',
            'kode_jenis' => 'required',
            'keterangan' => 'required'
        ]);

        $jenis = Jenis::create($validateData);
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil ditambahkan');
    }

    public function updateJenis(Request $request, string $id){
        $validateData = $request->validate([
            'nama_jenis' => 'required',
            'kode_jenis' => 'required',
            'keterangan' => 'required'
        ]);

        Jenis::where('id_jenis', $id)->update($validateData);
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil diubah');
    }

    public function deleteJenis(string $id){
        Jenis::destroy($id);
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus');
    }
}
