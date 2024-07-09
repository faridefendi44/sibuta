<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    //
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $surats = Surat::where('pengirim', 'LIKE', '%' . $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->orWhere('no_wa', 'LIKE', '%' . $keyword . '%')
            ->orWhere('perihal', 'LIKE', '%' . $keyword . '%')
            ->orWhere('id', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);

        return view('surat.data', compact('surats'));
    }
    public function index()
    {
        return view('surat.index');
    }
    public function create()
    {
        return view('surat.create');
    }
    public function show($id)
    {
        $surat = Surat::findOrFail($id);

        return view('surat.detail', compact('surat'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pengirim' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_wa' => 'required|string|max:15',
            'perihal' => 'required|string|max:255',
            'asal_surat' => 'required|string|max:255',
            'lampiran.*' => 'required|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        $lampiranUrls = [];

        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $lampiran) {
                $nama_lampiran = $lampiran->getClientOriginalName();
                $lampiran->move(storage_path('app/public/lampiran/'), $nama_lampiran);
                $save_url = env('APP_URL') . '/storage/lampiran/' . $nama_lampiran;
                $lampiranUrls[] = $save_url;
            }
        }

        $lampiran = count($lampiranUrls) > 0 ? implode(', ', $lampiranUrls) : null;
        $surat = new Surat();
        $surat->pengirim = $validatedData['pengirim'];
        $surat->email = $validatedData['email'];
        $surat->asal_surat = $validatedData['asal_surat'];
        $surat->no_wa = $validatedData['no_wa'];
        $surat->perihal = $validatedData['perihal'];
        $surat->lampiran = $lampiran;
        $surat->save();

        if (auth()->check()) {
            return redirect()->route('surat.data');
        }

        return view('components.succes');
    }
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);

        return view('surat.edit', compact('surat'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pengirim' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_wa' => 'required|string|max:15',
            'perihal' => 'required|string|max:255',
            'asal_surat' => 'required|string|max:255',
            'lampiran.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        $surat = Surat::findOrFail($id);
        $lampiranUrls = [];

        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $lampiran) {
                $nama_lampiran = $lampiran->getClientOriginalName();
                $lampiran->move(storage_path('app/public/lampiran/'), $nama_lampiran);
                $save_url = env('APP_URL') . '/storage/lampiran/' . $nama_lampiran;
                $lampiranUrls[] = $save_url;
            }
        }

        $lampiran = count($lampiranUrls) > 0 ? implode(', ', $lampiranUrls) : $surat->lampiran;

        $surat->pengirim = $validatedData['pengirim'];
        $surat->email = $validatedData['email'];
        $surat->asal_surat = $validatedData['asal_surat'];
        $surat->no_wa = $validatedData['no_wa'];
        $surat->perihal = $validatedData['perihal'];
        $surat->lampiran = $lampiran;
        $surat->save();
        return redirect()->route('surat.data');
    }

    public function data()
    {
        $surats = Surat::paginate(10);;
        return view('surat.data', compact('surats'));
    }
    public function reject(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);
        $surat->status = "rejected";
        $surat->catatan = $request->catatan;

        $surat->save();

        $no_wa = $surat->no_wa;
        $pengirim = $surat->pengirim;
        $email = $surat->email;
        $asal_surat = $surat->asal_surat;
        $perihal = $surat->perihal;
        $lampiran = $surat->lampiran;
        $catatan = $surat->catatan;
        $status = $surat->status;

        $message = urlencode("Surat anda ditolak oleh admin:\n
        Pengirim: $pengirim\n
        Email: $email\n
        No WA: $no_wa\n
        Asal Surat: $asal_surat\n
        Perihal: $perihal\n
        Lampiran: $lampiran\n
        Status: $status\n
        Catatan: $catatan\n");

        $whatsappUrl = "https://api.whatsapp.com/send?phone=$no_wa&text=$message";
        return redirect($whatsappUrl);
    }
    public function approve(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);
        $surat->status = "approved";
        $surat->save();

        $no_wa = $surat->no_wa;
        $pengirim = $surat->pengirim;
        $email = $surat->email;
        $asal_surat = $surat->asal_surat;
        $perihal = $surat->perihal;
        $lampiran = $surat->lampiran;
        $status = $surat->status;

        $message = urlencode("Surat anda telah disetujui oleh admin:\n
        Pengirim: $pengirim\n
        Email: $email\n
        No WA: $no_wa\n
        Asal Surat: $asal_surat\n
        Perihal: $perihal\n
        Status: $status\n
        Lampiran: $lampiran\n
        ");

        $whatsappUrl = "https://api.whatsapp.com/send?phone=$no_wa&text=$message";

        return redirect($whatsappUrl);
    }
    public function delete($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();
        return redirect()->route('surat.data');
    }
}
