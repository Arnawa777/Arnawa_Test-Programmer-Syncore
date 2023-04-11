<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

        public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        $user = User::findOrFail($id);
        $user->nama = $request->nama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil di ubah.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
