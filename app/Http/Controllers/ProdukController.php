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
    public function indexMasuk()
    {
        $produk = Produk::latest()->get();
        return view('dashboard-pegawai.produk.masuk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createMasuk()
    {
        $categoryProduk = CategoryProduk::all();
        $categoryDaerah = CategoryDaerah::all();
        return view('dashboard-pegawai.produk.masuk.create', compact('categoryProduk', 'categoryDaerah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'category_produk_id' => 'required',
            'category_daerah_id' => 'required',
            'name' => 'required|max:255',
            'total_dikirim' => 'required|integer|min:0',
            'waktu_masuk' => 'required|date_format:Y-m-d'
        ]);

        // Set total_keluar dan total_produk
        $validateData['total_keluar'] = 0;
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
    public function editMasuk(Produk $produk)
    {
        $categoryProduk = CategoryProduk::all();
        $categoryDaerah = CategoryDaerah::all();
        return view('dashboard-pegawai.produk.masuk.edit', compact('produk','categoryProduk','categoryDaerah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMasuk(UpdateProdukRequest $request, Produk $produk)
    {
        try {
            $rules = [
                'category_produk_id' => 'required',
                'category_daerah_id' => 'required',
                'name' => 'required|max:255',
                'total_dikirim' => 'required|integer|min:0',
                'waktu_masuk' => 'required|date_format:Y-m-d'
            ];

            $validateData = $request->validate($rules);

            // Validasi tambahan untuk total_dikirim
            if ($validateData['total_dikirim'] < $produk->total_keluar) {
                return redirect()->back()->withErrors(['total_dikirim' => 'Total produk dikirim melebihi total produk keluar'])->withInput();
            }

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
