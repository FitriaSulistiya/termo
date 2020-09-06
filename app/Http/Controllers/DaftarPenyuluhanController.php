<?php

namespace App\Http\Controllers;

use App\Penyuluhan;
use Illuminate\Http\Request;

class DaftarPenyuluhanController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $items = Penyuluhan::where('judul', 'like', '%'.$request->cari.'%')->with(['penyuluhan_galleries'])->get();
            //$items = Penyuluhan::paginate(8);
        } else {
            $items = Penyuluhan::all();
            //$items = Penyuluhan::paginate(8);
        }
        return view('pages.daftar_penyuluhan',['items' => $items]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $judul = Penyuluhan::where('judul', 'like', '%'.$search.'%')->paginate(8);
        return view ('pages.daftar_penyuluhan', ['judul' => $judul]);
    }
}