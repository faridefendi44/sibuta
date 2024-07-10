<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $pegawais = Pegawai::where('nama', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jabatan', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);

        return view('pegawai.index', compact('pegawais'));
    }
    public function index()
    {
        $pegawais = Pegawai::paginate(10);
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $pegawai = Pegawai::create($validatedData);

        return redirect()->route('pegawai.index');
    }
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.show', compact('pegawai'));
    }
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $pegawai = Pegawai::findOrFail($id);

        $pegawai->update($validatedData);

        return redirect()->route('pegawai.index');
    }
    public function delete($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}
