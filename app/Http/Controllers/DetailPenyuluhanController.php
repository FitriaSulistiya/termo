<?php

namespace App\Http\Controllers;

use App\Penyuluhan;
use Illuminate\Http\Request;

class DetailPenyuluhanController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = Penyuluhan::with(['penyuluhan_galleries'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('pages.detail_penyuluhan',[
            'item' => $item
        ]);
    }
}