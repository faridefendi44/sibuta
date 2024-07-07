<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\Surat;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $selectedMonth = $request->input('month', date('n'));
        $months = $this->getMonths();
        $chartData = $this->getTamuChartData($selectedMonth);
        $suratData = $this->getSuratData();
        $tamuData = $this->getTamuData();

        return view('dashboard.index', compact('chartData', 'suratData', 'tamuData' , 'selectedMonth', 'months'));
    }


    private function getSuratData()
    {
        $bulanLabels = $this->getMonths();
        $suratChartData = array_fill_keys(array_values($bulanLabels), 0);

        $suratData = Surat::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        $bulanMap = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        foreach ($suratData as $data) {
            $month = $data->month;
            $bulan = $bulanMap[$month];
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

        $bulanMap = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        foreach ($tamuData as $data) {
            $month = $data->month;
            $bulan = $bulanMap[$month];
            $tamuChartData[$bulan] = $data->count;
        }

        return $tamuChartData;
    }

    private function getMonths()
    {
        return [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    }

    private function getTamuChartData($selectedMonth)
    {
        $tamuData = Tamu::selectRaw('target_tamu, COUNT(*) as count')
            ->whereMonth('created_at', $selectedMonth)
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
