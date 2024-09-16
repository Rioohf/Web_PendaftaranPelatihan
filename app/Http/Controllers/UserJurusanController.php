<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\User;
use App\Models\Level;
use App\Models\UserJurusan;
use Illuminate\Http\Request;

class UserJurusanController extends Controller
{
    public function index()
    {
        $users = UserJurusan::with('user','level','jurusan')->whereNull('deleted_at')->get();
        // dump($users);

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";

        // dd($users);
        return view('userjurusan.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::with('jurusan')->whereIn('id_level', [3, 4])->whereNull('deleted_at')->get();
        $jurusans = Jurusan::whereNull('deleted_at')->get();
        return view('userjurusan.create', compact('user','jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            UserJurusan::create([
                'id_user' => $request->id_user, // Pastikan id_user ada di tabel user_jurusan
                'id_level' => $request->id_level,
                'id_jurusan' => $request->id_jurusan,
            ]);
        return redirect()->route('userjurusan.index')->with('success', 'User created successfully');

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
        $users = UserJurusan::findOrFail($id);
        $jurusan = Jurusan::whereNull('deleted_at')->get();
        return view('userjurusan.edit',compact('users','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $user = UserJurusan::findOrFail($id);
        // Validate the request data
    $request->validate([
        'id_jurusan' => 'required',
    ]);

    // Update the user's jurusan
    $user->id_jurusan = $request->input('id_jurusan');
    $user->save();

    // Redirect back to the index page with a success message
    return redirect()->route('userjurusan.index')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pic = UserJurusan::findOrFail($id);
        $pic->delete();
        return redirect()->route('userjurusan.index')->with('success', 'Data Berhasil Dihapus');
    }


}
