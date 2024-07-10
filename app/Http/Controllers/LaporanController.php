<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Tamu;
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

        $surats = $query->paginate(10);

        return view('laporan.surat', compact('surats'));
    }

    public function Tamu(Request $request)
    {
        $query = Tamu::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        $tamus = $query->paginate(10);

        return view('laporan.tamu', compact('tamus'));
    }

    public function downloadSuratPdf(Request $request)
    {
        $query = Surat::query();
        $start_date = null;
        $end_date = null;

        if ($request->input('isPrint') != 1) {
            if ($request->has('start_date') && $request->has('end_date')) {
                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');
                $query->whereBetween('created_at', [$start_date, $end_date]);
            }
        }
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $surats = $query->get();

        $pdf = PDF::loadView('laporan.downloadSurat', compact('surats', 'start_date', 'end_date'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Data Surat.pdf');
    }

    public function downloadTamuPdf(Request $request)
    {

        $query = Tamu::query();
        $start_date = null;
        $end_date = null;

        if ($request->input('isPrint') != 1) {
            if ($request->has('start_date') && $request->has('end_date')) {
                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');
                $query->whereBetween('created_at', [$start_date, $end_date]);
            }
        }
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $tamus = $query->get();

        $pdf = PDF::loadView('laporan.downloadTamu', compact('tamus', 'start_date', 'end_date'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Data Tamu.pdf');
    }
}
