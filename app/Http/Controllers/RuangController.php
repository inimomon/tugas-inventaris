<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruang = Ruang::all();
        return view('home', compact('ruang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ruang' => 'required',
            'keterangan' => 'required',
        ]);

        Ruang::create($request->all());

        return redirect()->route('home')
            ->with('success', 'Ruang created successfully.');
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
        $ruang = Ruang::where('id_ruang', $id);
        return view('ruang.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_ruang)
    {
        $request->validate([
            'nama_ruang' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Update only the specified fields
        Ruang::where('id_ruang', $id_ruang)->update([
            'nama_ruang' => $request->input('nama_ruang'),
            'keterangan' => $request->input('keterangan'),
        ]);
    
        return redirect()->route('home')
            ->with('success', 'Ruang updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ruang::where('id_ruang', $id)->delete();

        return redirect()->route('home')
            ->with('success', 'Ruang deleted successfully');
    }
}
