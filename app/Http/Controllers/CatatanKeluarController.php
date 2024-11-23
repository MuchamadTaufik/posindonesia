<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\LogActivity;
use App\Models\CatatanKeluar;
use App\Models\CategoryDaerah;
use App\Http\Requests\StoreCatatanKeluarRequest;
use App\Http\Requests\UpdateCatatanKeluarRequest;

class CatatanKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catatanKeluar = CatatanKeluar::latest()->get();
        return view('dashboard-pegawai.produk.keluar.index', compact('catatanKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $produk = Produk::all();
        $categoryDaerah = CategoryDaerah::all();
        return view('dashboard-pegawai.produk.keluar.create', compact('produk','categoryDaerah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatatanKeluarRequest $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'produk_id' => 'required|exists:produks,id',
            'total_keluar' => 'required|integer|min:1',
            'waktu_keluar' => 'required|date',
            'category_daerah_id' => 'required|exists:category_daerahs,id',
        ]);

        $produk = Produk::find($request->produk_id);

        if ($request->total_keluar > $produk->total_produk) {
            return back()->withErrors(['total_keluar' => 'Jumlah produk keluar tidak boleh melebihi jumlah produk yang tersedia.'])->withInput();
        }

        $produk->total_produk -= $request->total_keluar;
        $produk->save();

        CatatanKeluar::create($validateData);

        $user = auth()->user()->name;
        
        $produkNama = $produk->name;
        $produkItemCode = $produk->item_code;

        // Mendapatkan nama category daerah dari model CategoryDaerah
        $categoryDaerah = CategoryDaerah::find($request->category_daerah_id)->name;

        // Mencatat aktivitas log
        LogActivity::record(
            "Produk Keluar telah ditambahkan oleh '{$user}'",
            "Produk Keluar bernama '{$produkNama}', kode produk '{$produkItemCode}', dikirimkan ke '{$categoryDaerah}'",
            null,
            false,
            'kepala'
        );

        LogActivity::record(
            "Produk Keluar telah ditambahkan oleh '{$user}'",
            "Produk Keluar bernama '{$produkNama}', kode produk '{$produkItemCode}', dikirimkan ke '{$categoryDaerah}'",
            null,
            false,
            'staff'
        );

        toast()->success('Berhasil', 'Catatan Produk Keluar Berhasil ditambahkan');
        return redirect('/produk-keluar')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(CatatanKeluar $catatanKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatatanKeluar $catatanKeluar)
    {
        $produk = Produk::all();
        $categoryDaerah = CategoryDaerah::all();
        return view('dashboard-pegawai.produk.keluar.edit', compact('catatanKeluar','produk','categoryDaerah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatatanKeluarRequest $request, CatatanKeluar $catatanKeluar)
    {
        try {
            $rules = [
                'produk_id' => 'required|exists:produks,id',
                'total_keluar' => 'required|integer|min:1',
                'waktu_keluar' => 'required|date',
                'category_daerah_id' => 'required|exists:category_daerahs,id',
            ];

            $validateData = $request->validate($rules);

            // Get the old and new product
            $oldProduct = Produk::find($catatanKeluar->produk_id);
            $newProduct = Produk::find($request->produk_id);

            // If it's the same product
            if ($catatanKeluar->produk_id == $request->produk_id) {
                // Calculate the difference between old and new total_keluar
                $difference = $catatanKeluar->total_keluar - $request->total_keluar;
                
                // If difference is positive, add it back to product total
                // If difference is negative, subtract from product total
                $oldProduct->total_produk += $difference;
                $oldProduct->save();
            } else {
                // Different product selected
                // Restore the previous total_keluar to the old product
                $oldProduct->total_produk += $catatanKeluar->total_keluar;
                $oldProduct->save();

                // Validate and update new product's total
                if ($request->total_keluar > $newProduct->total_produk) {
                    return back()->withErrors([
                        'total_keluar' => 'Jumlah produk keluar tidak boleh melebihi jumlah produk yang tersedia.'
                    ])->withInput();
                }

                // Subtract new total_keluar from new product
                $newProduct->total_produk -= $request->total_keluar;
                $newProduct->save();
            }

            $catatanKeluar->update($validateData);

            alert()->success('Berhasil', 'Catatan Produk Keluar berhasil diubah');
            return redirect('/produk-keluar')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatatanKeluar $catatanKeluar)
    {
        try {
            // Get the product
            $produk = Produk::find($catatanKeluar->produk_id);
            
            // Add back the total_keluar to product's total
            $produk->total_produk += $catatanKeluar->total_keluar;
            $produk->save();
            
            // Delete the record
            $catatanKeluar->delete();
            
            alert()->success('Berhasil', 'Catatan Produk Keluar berhasil dihapus');
            return redirect()->back();
            
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal menghapus Catatan Produk Keluar');
            return redirect()->back();
        }
    }
}
