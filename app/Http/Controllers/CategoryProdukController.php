<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduk;
use App\Http\Requests\StoreCategoryProdukRequest;
use App\Http\Requests\UpdateCategoryProdukRequest;

class CategoryProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categoryProduk = CategoryProduk::latest()->get();
        return view('dashboard-pegawai.category-product.index', compact('categoryProduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard-pegawai.category-product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryProdukRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255'
        ]);

        CategoryProduk::create($validateData);

        toast()->success('Berhasil', 'Kategori produk berhasil ditambahkan');
        return redirect('/kategori-produk')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProduk $categoryProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduk $categoryProduk)
    {
        return view('dashboard-pegawai.category-product.edit', compact('categoryProduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryProdukRequest $request, CategoryProduk $categoryProduk)
    {
        try {
            $rules = [
                'name' => 'required|max:255',
            ];

            $validateData = $request->validate($rules);

            $categoryProduk->update($validateData);

            alert()->success('Berhasil', 'Kategori Produk berhasil diubah');
            return redirect('/kategori-produk')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProduk $categoryProduk)
    {
        CategoryProduk::destroy($categoryProduk->id);

        alert()->success('Success', 'Kategori Produk berhasil dihapus');
        return redirect('/kategori-produk')->withInput();
    }
}
