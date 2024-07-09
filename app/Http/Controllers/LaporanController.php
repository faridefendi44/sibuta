<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{

    public function surat(Request $request)
    {
        $query = Surat::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        $surats = $query->get();

        return view('laporan.surat', compact('surats'));
    }
    public function downloadPdf()
    {
        $surats = Surat::get();
        $pdf = PDF::loadView('laporan.downloadSurat', compact('surats'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Data Surat.pdf');
    }
}
