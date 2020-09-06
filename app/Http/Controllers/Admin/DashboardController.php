<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Peternak;
use App\Penyuluhan;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard',[
            'peternak' => Peternak::count(),
            'penyuluhan' => Penyuluhan::count(),
            'status_terverifikasi' => Peternak::where('status_verifikasi', 'Terverifikasi')->count(),
            'status_belum_terverifikasi' => Peternak::where('status_verifikasi', 'Belum Terverifikasi')->count(),
        ]);
    }
}
