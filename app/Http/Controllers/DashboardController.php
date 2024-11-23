<?php

namespace App\Http\Controllers;

use App\Charts\StatistikChart;
use App\Models\CatatanKeluar;
use App\Models\CategoryDaerah;
use App\Models\CategoryProduk;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(StatistikChart $statistikChart)
    {   
        $categoryProduk = CategoryProduk::count();
        $categoryDaerah = CategoryDaerah::count();
        $produk = Produk::count();
        $catatanKeluar = CatatanKeluar::count();
        $user = User::latest()->get();
        return view('index',[
            'categoryProduk' => $categoryProduk,
            'categoryDaerah' => $categoryDaerah,
            'produk' => $produk,
            'catatanKeluar' => $catatanKeluar,
            'statistikChart' => $statistikChart->build(),
            'user' => $user
        ]);
    }
}
