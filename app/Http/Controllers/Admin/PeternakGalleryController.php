<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\PeternakGalleryRequest;
use App\PeternakGallery;
use App\Peternak;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PeternakGalleryController extends Controller
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
            // $items=PeternakGallery::paginate(5);
            // return view('pages.admin.peternak_gallery.index', compact('items'));

            $items=DB::table('peternak_galleries')
            ->join('peternak', 'peternak.id', '=', 'peternak_galleries.peternak_id')
            ->paginate(10);
            return view('pages.admin.peternak_gallery.index', compact('items'));

        } else {
            // $items=Peternak::where('nama','LIKE', '%'.$request->cari.'%')
            // ->paginate(10);

            $items=DB::table('peternak')
            ->where('nama','LIKE', '%'.$request->cari.'%')
            ->join('peternak_galleries', 'peternak_galleries.peternak_id', '=', 'peternak.id')
            ->paginate(10);

            $items->appends($request->all());            
            return view('pages.admin.peternak_gallery.index', compact('items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peternak = Peternak::all();
        return view('pages.admin.peternak_gallery.create',[
            'peternak' => $peternak
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeternakGalleryRequest $request)
    {        
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/peternak_gallery', 'public'
        );

        PeternakGallery::create($data);
        return redirect()->route('peternak_gallery.index')->with('sukses', 'Data berhasil diinput');
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
        $item = DB::table('peternak_galleries')->where('peternak_id', $id)->first();
        $peternak = DB::table('peternak')->get();
        
        return view('pages.admin.peternak_gallery.edit', compact('item', 'peternak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeternakGalleryRequest $request, $id)
    {
        DB::table('peternak_galleries')->where('id', $id)
            ->update([
                'image' => $request->file('image')->store(
                    'assets/peternak_gallery', 'public')
            ]);
        return redirect()->route('peternak_gallery.index')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('peternak_galleries')->where('peternak_id', $id)->delete();
        return redirect()->route('peternak_gallery.index')->with('sukses', 'Data berhasil dihapus');
    }
}
