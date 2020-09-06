<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request->all()))
        {
            $items=User::paginate(10);
            return view('pages.admin.users.index', compact('items'));
        } else {
            $items=User::where('name','LIKE', '%'.$request->cari.'%')
            ->paginate(10);

            $items->appends($request->all());
            return view('pages.admin.users.index', compact('items'));
        }
        // if(empty($request->all()))
        // {
        //     $items=DB::table('users')
        //     //->join('users', 'peternak.user_id', '=', 'users.id')
        //     ->paginate(10);
        //     return view('pages.admin.users.index', compact('items'));
        // } else {
        //     $items=DB::table('users')
        //     ->where('nama','LIKE', '%'.$request->cari.'%')
        //     //->join('users', 'peternak.user_id', '=', 'users.id')
        //     ->paginate(10);

        //     $items->appends($request->all());
        //     return view('pages.admin.users.index', compact('items'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        User::create($data);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('pages.admin.users.edit',[
            'users' => $users
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = User::findOrFail($id);
        $item->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect()->route('users.index');
    }
}
