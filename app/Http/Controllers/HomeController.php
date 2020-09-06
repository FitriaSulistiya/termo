<?php

namespace App\Http\Controllers;

use App\Penyuluhan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.home')->with([
            'items' => Penyuluhan::paginate(4), 
        ]);
    }
}
