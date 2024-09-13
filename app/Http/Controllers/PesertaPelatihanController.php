<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Peserta_Pelatihan;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use App\Models\Jurusan;

class PesertaPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        $gelombang = Gelombang::all();
        $pesertas = Peserta_Pelatihan::orderBy('id', 'desc')->get();
        return view('peserta.index', compact('pesertas', 'jurusan', 'gelombang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $gelombang = Gelombang::all();
        $pesertas = Peserta_Pelatihan::orderBy('id', 'desc')->get();
        return view('web.index', compact('pesertas', 'jurusan', 'gelombang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan data ke database
        Peserta_Pelatihan::create([
            'kartu_keluarga' => $request->kartu_keluarga,
            'id_jurusan' => $request->id_jurusan,
            'id_gelombang' => $request->id_gelombang,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_hp' => $request->nomor_hp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'nama_sekolah' => $request->nama_sekolah,
            'kejuruan' => $request->kejuruan,
            'aktivitas_saat_ini' => $request->aktivitas_saat_ini,
        ]);

        return redirect()->route('finish')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peserta_Pelatihan $peserta_Pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pesertas = Peserta_Pelatihan::findOrFail($id);
        return view('peserta.edit', compact('pesertas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesertas =  Peserta_Pelatihan::findOrFail($id);
        $request->validate([
            'status' => 'integer|required'
        ]);
        $pesertas->status = $request->status;
        $pesertas->save();
        // Alert::success('Success', 'Status Peserta Berhasil Diupdate');
        return redirect()->route('peserta.index')->with('success', 'Status Berhasil Diubah');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta_Pelatihan $peserta_Pelatihan)
    {
        //
    }

    public function finish()
    {
        return view('web.finish');
    }


}
