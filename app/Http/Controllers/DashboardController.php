<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Gelombang;
use App\Models\Peserta_Pelatihan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jurusan = Jurusan::all();
        $gelombang = Gelombang::all();
        $peserta = Peserta_Pelatihan::orderBy('id', 'desc')->get();
        $previousCount = Peserta_Pelatihan::where('created_at', '<', now()->subDay())->count(); // retrieve previous count
        return view('dashboard.index', compact('peserta', 'jurusan', 'gelombang', 'previousCount'));
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

}
