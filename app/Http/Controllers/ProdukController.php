<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\CategoryDaerah;
use App\Models\CategoryProduk;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::latest()->get();
        return view('dashboard-pegawai.produk.masuk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryProduk = CategoryProduk::all();
        return view('dashboard-pegawai.produk.masuk.create', compact('categoryProduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'category_produk_id' => 'required',
            'name' => 'required|max:255',
            'nomor_ido' => 'required|max:255|unique:produks',
            'serial_number_awal' => 'required|max:255|unique:produks',
            'serial_number_akhir' => 'required|max:255|unique:produks',
            'total_dikirim' => 'required|integer|min:0',
            'waktu_masuk' => 'required|date_format:Y-m-d'
        ]);

        $validateData['total_produk'] = $validateData['total_dikirim'];

        // Generate item_code otomatis
        $lastProduk = Produk::orderBy('id', 'desc')->first();
        if ($lastProduk) {
            $lastCode = (int) substr($lastProduk->item_code, 3);
            $newCode = 'PD-' . str_pad($lastCode + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $newCode = 'PD-01';
        }
        $validateData['item_code'] = $newCode;

        Produk::create($validateData);

        toast()->success('Berhasil', 'Produk Masuk Berhasil ditambahkan');
        return redirect('/produk-masuk')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $categoryProduk = CategoryProduk::all();
        return view('dashboard-pegawai.produk.masuk.edit', compact('produk','categoryProduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        try {
            $rules = [
                'category_produk_id' => 'required',
                'name' => 'required|max:255',
                'nomor_ido' => 'required|max:255|unique:produks,nomor_ido,' . $produk->id,
                'serial_number_awal' => 'required|max:255|unique:produks,serial_number_awal,' . $produk->id,
                'serial_number_akhir' => 'required|max:255|unique:produks,serial_number_akhir,' . $produk->id,
                'waktu_masuk' => 'required|date_format:Y-m-d'
            ];

            $validateData = $request->validate($rules);

            // Update produk dengan data yang telah divalidasi
            $produk->update($validateData);

            alert()->success('Berhasil', 'Produk Masuk berhasil diubah');
            return redirect('/produk-masuk')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);

        alert()->success('Success', 'Produk masuk berhasil dihapus');
        return redirect('/produk-masuk')->withInput();
    }
}
