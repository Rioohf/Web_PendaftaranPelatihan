<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gelombang::whereNull('deleted_at')->get();
        return view('gelombang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gelombang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gelombang::create([
            'nama_gelombang' => $request->nama_gelombang,
            'aktif' => $request->aktif, // Add this line
        ]);
        return redirect()->to('gelombang')->with('message', 'Data berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gelombang $gelombang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit = Gelombang::find($id);
        return view('gelombang.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gelombang = Gelombang::find($id);
        Gelombang::where('id', $id)->update([
            'nama_gelombang' => $request->nama_gelombang,
            'aktif' => $request->aktif, // Add this line
        ]);
        return redirect()->to('gelombang')->with('message', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gelombangs = Gelombang::findOrFail($id);
        $gelombangs->deleted_at = now(); // Set the deleted_at timestamp to the current time
        $gelombangs->save(); // Save the changes
        return redirect()->to('gelombang')->with('message', 'Data berhasil di hapus!');
    }

    // app/Http/Controllers/GelombangController.php

    public function updateStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|boolean',
        ]);

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Set the status of all records to 0
            Gelombang::query()->update(['aktif' => 0]);

            // Update the status of the selected record
            $gelombang = Gelombang::findOrFail($id);
            $gelombang->aktig = $request->input('status');
            $gelombang->save();

            // Commit the transaction
            DB::commit();

            // Return a successful response
            return response()->json(['message' => 'Status telah diperbarui!'], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Log the error (optional)
            Log::error('Error updating status: ' . $e->getMessage());

            // Return an error response
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui status.'], 500);
        }
    }
}
