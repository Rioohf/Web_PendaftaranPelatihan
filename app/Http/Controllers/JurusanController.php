<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::whereNull('deleted_at')->orderBy('id', 'desc')->get();
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
        ]);
        return redirect()->to('jurusan')->with('message', 'Data berhasil di simpan!');
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
        $edit = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurusan = Jurusan::find($id);
        Jurusan::where('id', $id)->update([
            'nama_jurusan' => $request->nama_jurusan,
        ]);
        return redirect()->to('jurusan')->with('message', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->deleted_at = now(); // Set the deleted_at timestamp to the current time
        $jurusan->save(); // Save the changes
        return redirect()->to('jurusan')->with('message', 'Data berhasil di hapus!');
    }
}
