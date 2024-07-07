<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\Surat;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan bulan yang dipilih dari request, default ke bulan saat ini
        $selectedMonth = $request->input('month', date('n'));

        // Array untuk memetakan bulan numerik ke nama bulan dalam bahasa Indonesia
        $months = $this->getMonths();

        // Mendapatkan data chart berdasarkan bulan yang dipilih
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
            $bulan = $bulanLabels[$month - 0]; // Menggunakan indeks array yang benar
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
            $bulan = $bulanLabels[$month - 0]; // Menggunakan indeks array yang benar
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
            $target = $data->target_tamu;
            $chartData[$target] = $data->count;
        }

        return $chartData;
    }
}
