<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\PeternakRequest;
use App\Peternak;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PeternakController extends Controller
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
            $items=Peternak::paginate(10);
            return view('pages.admin.peternak.index', compact('items'));
        } else {
            $items=Peternak::where('nama','LIKE', '%'.$request->cari.'%')
            ->paginate(10);

            $items->appends($request->all());
            return view('pages.admin.peternak.index', compact('items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.peternak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeternakRequest $request)
    {       
        $random = Str::random(40);
        
        //insert ke table users
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = $random;
        $user->roles = 'USER';
        $user->save();

        //insert ke table peternak
        $peternak = Peternak::create([
            'user_id' => $user['id'],
            'deskripsi' => $request['deskripsi'],
            'slug' => $request['deskripsi'],
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'no_telp' => $request['no_telp'],
            'jumlah_ternak' => $request['jumlah_ternak'],
            'jenis_ternak' => $request['jenis_ternak'],
            'status_verifikasi' => $request['status_verifikasi'],
            ]);
        return redirect()->route('peternak.index')->with('sukses', 'Data berhasil diinput');
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
        $item = Peternak::findOrFail($id);
        $user = User::all();

        //dd($item);

        return view('pages.admin.peternak.edit',[
            'item' => $item,
            'user' => $user
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeternakRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = str::slug($request->deskripsi);

        $item = Peternak::findOrFail($id);
        $item->update($data);
        return redirect()->route('peternak.index')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Peternak::findOrFail($id);
        $item->delete();
        return redirect()->route('peternak.index')->with('sukses', 'Data berhasil dihapus');
    }
}
