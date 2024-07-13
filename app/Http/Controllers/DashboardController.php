<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $selectedMonth = $request->input('month', date('n'));

        $months = $this->getMonths();

        $chartData = $this->getTamuChartData($selectedMonth);
        $suratData = $this->getSuratData();
        $tamuData = $this->getTamuData();

        return view('dashboard.index', compact('chartData', 'suratData', 'tamuData', 'selectedMonth', 'months'));
    }

    private function getSuratData()
    {
        $bulanLabels = $this->getMonths();
        $suratChartData = array_fill_keys(array_values($bulanLabels), 0);

        $suratData = Surat::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        foreach ($suratData as $data) {
            $month = $data->month;
            $bulan = $bulanLabels[$month - 0];
            $suratChartData[$bulan] = $data->count;
        }

        return $suratChartData;
    }

    private function getTamuData()
    {
        $bulanLabels = $this->getMonths();
        $tamuChartData = array_fill_keys(array_values($bulanLabels), 0);

        $tamuData = Tamu::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        foreach ($tamuData as $data) {
            $month = $data->month;
            $bulan = $bulanLabels[$month - 0];
            $tamuChartData[$bulan] = $data->count;
        }

        return $tamuChartData;
    }

    private function getMonths()
    {
        return [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
    }

    private function getTamuChartData($selectedMonth)
    {
        $tamuData = Tamu::selectRaw('target_tamu, COUNT(*) as count')
            ->whereRaw('MONTH(STR_TO_DATE(tanggal_bertamu, "%d/%m/%Y")) = ?', [$selectedMonth])
            ->groupBy('target_tamu')
            ->get();

        $chartData = [];
        foreach ($tamuData as $data) {
            $target = $data->pegawai->nama;
            $chartData[$target] = $data->count;
        }

        return $chartData;
    }

    public function saveChartImage(Request $request)
    {
        $image = $request->input('image');
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'chartSurat.png';
        Storage::disk('public')->put($imageName, base64_decode($image));

        return response()->json(['status' => 'success']);
    }

    public function downloadPdfWithChart()
    {
        $imagePath = storage_path('app/public/chartSurat.png');
        $pdf = PDF::loadView('dashboard.printChartSurat', compact('imagePath'));
        $pdf->setPaper('A4', 'Landscape');
        return $pdf->stream('Grafik Surat.pdf');
    }
    public function saveTamuChartImage(Request $request)
    {
        $image = $request->input('image');
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'chartTamu.png';
        Storage::disk('public')->put($imageName, base64_decode($image));

        return response()->json(['status' => 'success']);
    }
    public function downloadTamuPdfWithChart()
    {
        $imagePath = storage_path('app/public/chartTamu.png');
        $pdf = PDF::loadView('dashboard.printChartTamu', compact('imagePath'));
        $pdf->setPaper('A4', 'Landscape');
        return $pdf->stream('Grafik Surat.pdf');
    }

    public function saveTargetChartImage(Request $request)
    {
        $image = $request->input('image');
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'chartTarget.png';
        Storage::disk('public')->put($imageName, base64_decode($image));

        return response()->json(['status' => 'success']);
    }
    public function downloadTargetPdfWithChart()
    {
        $imagePath = storage_path('app/public/chartTarget.png');
        $pdf = PDF::loadView('dashboard.printChartTarget', compact('imagePath'));
        $pdf->setPaper('A4', 'Landscape');
        return $pdf->stream('Grafik Surat.pdf');
    }
}
