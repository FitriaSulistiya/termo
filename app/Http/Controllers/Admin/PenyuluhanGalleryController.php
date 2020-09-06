<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\PenyuluhanGalleryRequest;
use App\PenyuluhanGallery;
use App\Penyuluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenyuluhanGalleryController extends Controller
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
            // $items=PenyuluhanGallery::paginate(5);
            // return view('pages.admin.penyuluhan_gallery.index', compact('items'));

            $items=DB::table('penyuluhan_galleries')
            ->join('penyuluhan', 'penyuluhan.id', '=', 'penyuluhan_galleries.penyuluhan_id')
            ->paginate(10);
            return view('pages.admin.penyuluhan_gallery.index', compact('items'));

        } else {
            // $items=Penyuluhan::where('judul','LIKE', '%'.$request->cari.'%')
            // ->paginate(10);

            $items=DB::table('penyuluhan')
            ->where('judul','LIKE', '%'.$request->cari.'%')
            ->join('penyuluhan_galleries', 'penyuluhan_galleries.penyuluhan_id', '=', 'penyuluhan.id')
            ->paginate(10);

            $items->appends($request->all());            
            return view('pages.admin.penyuluhan_gallery.index', compact('items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyuluhan = Penyuluhan::all();
        return view('pages.admin.penyuluhan_gallery.create',[
            'penyuluhan' => $penyuluhan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenyuluhanGalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/penyuluhan_gallery', 'public'
        );

        PenyuluhanGallery::create($data);
        return redirect()->route('penyuluhan_gallery.index')->with('sukses', 'Data berhasil diinput');
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
        $item = DB::table('penyuluhan_galleries')->where('penyuluhan_id', $id)->first();
        $penyuluhan = DB::table('penyuluhan')->get();

        return view('pages.admin.penyuluhan_gallery.edit', compact('item', 'penyuluhan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenyuluhanGalleryRequest $request, $id)
    {
        DB::table('penyuluhan_galleries')->where('id', $id)
            ->update([
                'image' => $request->file('image')->store(
                    'assets/penyuluhan_gallery', 'public')
            ]);
        return redirect()->route('penyuluhan_gallery.index')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('penyuluhan_galleries')->where('penyuluhan_id', $id)->delete();
        return redirect()->route('penyuluhan_gallery.index')->with('sukses', 'Data berhasil dihapus');
    }
}
