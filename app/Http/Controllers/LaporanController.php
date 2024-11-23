<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeluar;
use Barryvdh\DomPDF\PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $catatanKeluar = CatatanKeluar::latest()->get();

        return view('laporan.index', compact('catatanKeluar'));
    }

    public function surat(CatatanKeluar $catatanKeluar)
    {
        $pdf = app(PDF::class);
        $pdf->loadView('laporan.surat', compact('catatanKeluar'));

        return $pdf->download('surat-dokumen'.$catatanKeluar->id.'.pdf');
    }

    public function download()
    {
        // Mengambil kegiatan dengan eager loading siswa
        $catatanKeluar = CatatanKeluar::
            latest()
            ->get();

        // Menyiapkan PDF
        $pdf = app(PDF::class);
        $pdf->loadView('laporan.download', compact('catatanKeluar'));

        // Mengunduh file PDF
        return $pdf->download('laporan.pdf');
    }
}
