<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenyuluhanRequest;
use App\Penyuluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenyuluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $items = Penyuluhan::paginate(10);

        // return view('pages.admin.penyuluhan.index',[
        //     'items' => $items
        // ]);

        if(empty($request->all()))
        {
            $items=Penyuluhan::paginate(10);
            return view('pages.admin.penyuluhan.index', compact('items'));
        } else {
            $items=Penyuluhan::where('judul','LIKE', '%'.$request->cari.'%')
            ->paginate(10);

            $items->appends($request->all());
            return view('pages.admin.penyuluhan.index', compact('items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.penyuluhan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenyuluhanRequest $request)
    {
        $data = $request->all();
        $data['slug'] = str::slug($request->judul);

        Penyuluhan::create($data);
        return redirect()->route('penyuluhan.index')->with('sukses', 'Data berhasil diinput');
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
        $item = Penyuluhan::findOrFail($id);

        return view('pages.admin.penyuluhan.edit',[
            'item' => $item
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenyuluhanRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = str::slug($request->judul);

        $item = Penyuluhan::findOrFail($id);
        $item->update($data);
        return redirect()->route('penyuluhan.index')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Penyuluhan::findOrFail($id);
        $item->delete();
        return redirect()->route('penyuluhan.index')->with('sukses', 'Data berhasil dihapus');
    }
}
