<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;

class TamuController extends Controller
{
    //
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Validasi input keyword
        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        // Melakukan pencarian tamu berdasarkan semua atribut
        $tamus = Tamu::where('nama', 'LIKE', '%' . $keyword . '%')
            ->orWhere('asal_instansi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tanggal_bertamu', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jam_bertamu', 'LIKE', '%' . $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->orWhere('no_wa', 'LIKE', '%' . $keyword . '%')
            ->orWhere('target_tamu', 'LIKE', '%' . $keyword . '%')
            ->orWhere('keperluan', 'LIKE', '%' . $keyword . '%')
            ->orWhere('id', 'LIKE', '%' . $keyword . '%')
            ->get();

        // Mengembalikan hasil pencarian ke tampilan
        return view('tamu.data', compact('tamus'));
    }

    public function index()
    {
        return view('tamu.index');
    }
    public function create()
    {
        return view('tamu.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'tanggal_bertamu' => 'required',
            'jam_bertamu' => 'required',
            'email' => 'required|string|email|max:255',
            'no_wa' => 'required|string|max:15',
            'target_tamu' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
        ]);

        // Membuat instance Tamu dan menyimpan data ke database
        $tamu = Tamu::create($validatedData);

        // Mengembalikan response berhasil
        return view('components.succes');
    }
    public function show($id)
    {
        $tamu = Tamu::findOrFail($id);

        return view('tamu.detail', compact('tamu'));
    }

    public function edit($id)
    {
        $tamu = Tamu::findOrFail($id);

        return view('tamu.edit', compact('tamu'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'tanggal_bertamu' => 'required',
            'jam_bertamu' => 'required',
            'email' => 'required|string|email|max:255',
            'no_wa' => 'required|string|max:15',
            'target_tamu' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
        ]);

        $tamu = Tamu::findOrFail($id);

        $tamu->update($validatedData);

        return redirect()->route('tamu.data');
    }


    public function data()
    {
        $tamus = Tamu::get();
        return view('tamu.data', compact('tamus'));
    }
    public function reject(Request $request, $id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->status = "rejected";
        $tamu->catatan = $request->catatan;

        $tamu->save();

        $no_wa = $tamu->no_wa;
        $nama = $tamu->nama;
        $email = $tamu->email;
        $asal_instansi = $tamu->asal_instansi;
        $target_tamu = $tamu->target_tamu;
        $tanggal_bertamu = $tamu->tanggal_bertamu;
        $jam_bertamu = $tamu->jam_bertamu;
        $keperluan = $tamu->keperluan;
        $catatan = $tamu->catatan;
        $status = $tamu->status;

        $message = urlencode("Pengajuan tamu anda ditolak oleh admin:\n
        Nama: $nama\n
        Asal instansi: $asal_instansi\n
        Email: $email\n
        No WA: $no_wa\n
        Tanggal Bertamu: $tanggal_bertamu\n
        Jam Bertamu: $jam_bertamu\n
        Keperluan: $keperluan\n
        Tamu yang ingin ditemui: $target_tamu\n
        Status: $status\n
        Catatan: $catatan\n");

        $whatsappUrl = "https://api.whatsapp.com/send?phone=$no_wa&text=$message";
        return redirect($whatsappUrl);
    }
    public function approve(Request $request, $id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->status = "approved";
        $tamu->save();

        $no_wa = $tamu->no_wa;
        $nama = $tamu->nama;
        $email = $tamu->email;
        $asal_instansi = $tamu->asal_instansi;
        $target_tamu = $tamu->target_tamu;
        $tanggal_bertamu = $tamu->tanggal_bertamu;
        $jam_bertamu = $tamu->jam_bertamu;
        $keperluan = $tamu->keperluan;
        $catatan = $tamu->catatan;
        $status = $tamu->status;

        $message = urlencode("Pengajuan tamu anda disetujui oleh admin:\n
        Nama: $nama\n
        Asal Instansi: $asal_instansi\n
        Email: $email\n
        No WA: $no_wa\n
        Tanggal Bertamu: $tanggal_bertamu\n
        Jam Bertamu: $jam_bertamu\n
        Keperluan: $keperluan\n
        Tamu yang ingin ditemui: $target_tamu\n
        Status: $status\n
        Catatan: $catatan\n");

        $whatsappUrl = "https://api.whatsapp.com/send?phone=$no_wa&text=$message";

        return redirect($whatsappUrl);
    }
    public function delete($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();
        return redirect()->route('tamu.data');
    }
}
