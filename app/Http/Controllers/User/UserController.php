<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Peternak;
use App\PeternakGallery;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;

        $peternak = DB::table('users')
                    ->join('peternak', 'users.id', '=', 'peternak.user_id')
                    ->join('peternak_galleries', 'peternak.id', '=', 'peternak_galleries.peternak_id')
                    ->select('users.*', 'peternak.*', 'peternak_galleries.*')
                    ->where(['peternak.user_id' => $user_id])
                    ->first();
        return view('pages.user.profile');
    }
}
