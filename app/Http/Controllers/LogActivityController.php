<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;

class LogActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notification.index');
    }
    
    public function destroy(LogActivity $logActivity)
    {
        LogActivity::destroy($logActivity->id);

        // Menampilkan notifikasi sukses dan redirect
        alert()->success('Success', 'Notifikasi berhasil dihapus');
        return redirect('/notification')->withInput();
    }
}
