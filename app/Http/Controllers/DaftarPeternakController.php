<?php

namespace App\Http\Controllers;

use App\Peternak;
use Illuminate\Http\Request;

class DaftarPeternakController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $items = Peternak::where('deskripsi', 'like', '%'.$request->cari.'%')->with(['peternak_galleries'])->get();
            //$items = Peternak::paginate(8);
        } else {
            $items = Peternak::all();
            //$items = Peternak::paginate(8);
        }
        return view('pages.daftar_peternak',['items' => $items]);
    }
}