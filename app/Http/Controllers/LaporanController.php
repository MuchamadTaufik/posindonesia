<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeluar;
use App\Models\Produk;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $catatanKeluar = CatatanKeluar::latest()->get();

        return view('laporan.index', compact('catatanKeluar'));
    }

    public function download()
    {
        
    }
}
