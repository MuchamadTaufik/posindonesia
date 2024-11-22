<?php

namespace App\Http\Controllers;

use App\Models\CategoryDaerah;
use App\Http\Requests\StoreCategoryDaerahRequest;
use App\Http\Requests\UpdateCategoryDaerahRequest;

class CategoryDaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryDaerah = CategoryDaerah::latest()->get();
        return view('dashboard-pegawai.category-daerah.index', compact('categoryDaerah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard-pegawai.category-daerah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryDaerahRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255|unique:category_daerahs'
        ]);

        CategoryDaerah::create($validateData);

        toast()->success('Berhasil', 'Kategori Daerah berhasil ditambahkan');
        return redirect('/kategori-daerah')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryDaerah $categoryDaerah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryDaerah $categoryDaerah)
    {
        return view('dashboard-pegawai.category-daerah.edit', compact('categoryDaerah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryDaerahRequest $request, CategoryDaerah $categoryDaerah)
    {
        try {
            $rules = [
                'name' => 'required|max:255',
                'code' => 'required|max:255|unique:category_daerahs,code,' . $categoryDaerah->id
            ];

            $validateData = $request->validate($rules);
            $categoryDaerah->update($validateData);

            alert()->success('Berhasil', 'Kategori Daerah berhasil diubah');
            return redirect('/kategori-daerah')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryDaerah $categoryDaerah)
    {
        CategoryDaerah::destroy($categoryDaerah->id);

        alert()->success('Success', 'Kategori Daerah berhasil dihapus');
        return redirect('/kategori-daerah')->withInput();
    }
}
