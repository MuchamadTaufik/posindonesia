<?php

namespace App\Charts;

use App\Models\Produk;
use App\Models\CatatanKeluar;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class StatistikChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Get data for the current year
        $currentYear = Carbon::now()->year;
        
        $barangMasuk = Produk::selectRaw('MONTH(waktu_masuk) as month, COUNT(*) as total')
            ->whereYear('waktu_masuk', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Get monthly counts for outgoing items (count records instead of sum)
        $barangKeluar = CatatanKeluar::selectRaw('MONTH(waktu_keluar) as month, COUNT(*) as total')
            ->whereYear('waktu_keluar', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Prepare data arrays
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 
                    'July', 'August', 'September', 'October', 'November', 'December'];
        
        $masukData = [];
        $keluarData = [];

        // Fill in the data arrays with proper values or 0 if no data exists
        for ($i = 1; $i <= 12; $i++) {
            $masukData[] = $barangMasuk[$i] ?? 0;
            $keluarData[] = $barangKeluar[$i] ?? 0;
        }

        return $this->chart->lineChart()
            ->addData('Barang Masuk', $masukData)
            ->addData('Barang Keluar', $keluarData)
            ->setXAxis($months);
    }
}
