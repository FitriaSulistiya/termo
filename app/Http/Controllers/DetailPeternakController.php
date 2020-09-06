<?php

namespace App\Http\Controllers;

use App\Peternak;
use Illuminate\Http\Request;

class DetailPeternakController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = Peternak::with(['peternak_galleries'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('pages.detail_peternak',[
            'item' => $item,
            'status_terverifikasi' => Peternak::where('status_verifikasi', 'TERVERIFIKASI'),
            'status_belum_terverifikasi' => Peternak::where('status_verifikasi', 'BELUM TERVERIFIKASI')
        ]);
    }
}