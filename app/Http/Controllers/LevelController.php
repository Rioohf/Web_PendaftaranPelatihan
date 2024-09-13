<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::orderBy('id', 'desc')->get();
        return view('level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Level::create([
            'nama_level' => $request->nama_level,
        ]);
        return redirect()->to('level')->with('message', 'Data berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string  $id)
    {
        $edit = level::findOrFail($id);
        return view('level.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $level = Level::find($id);
        Level::where('id', $id)->update([
            'nama_level' => $request->nama_level,
        ]);
        return redirect()->to('level')->with('message', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        Level::where('id', $level)->delete();
        return redirect()->to('level')->with('message', 'Data berhasil di hapus!');
    }
}
