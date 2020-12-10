<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $Gallery = Gallery::all();
        $Gallery = DB::table('galleries')
                    ->whereNull('deleted_at')
                    ->paginate(5);
        return view('gallery.gallery', ['gallery' => $Gallery]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //create by model
        $request->validate([
            'gambar' => ['mimes:jpg,png,jpeg,gif'],
            'nama' => 'required',
            'ket' => 'required'
        ]);
        
        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar','public');
        } else {
            $gambar = null;
        }
        Gallery::create([
            'gambar' => $gambar,
            'nama' => strtoupper($request->nama),
            'ket' => strtoupper($request->ket)            
        ]);
        // // atau
        // Portofolio::create($request->all());
        return redirect('/gallery/create')->with('status','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
        return view('gallery.show', ['gallery' => $gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
        
        $request->validate([
            'gambar' => ['mimes:jpg,png,jpeg,gif'],
            'nama' => 'required',
            'ket' => 'required'
        ]);

        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar','public');
            $data = Gallery::findOrFail($gallery->id);
            if($data->gambar){
                Storage::delete('public/'.$data->gambar);
                $data->gambar = $gambar;
            }else{
                $data->gambar = $gambar; 
            }
            $data->save();
        } 
        Gallery::where('id',$gallery->id)
                ->update([
                    'nama' => strtoupper($request->nama),
                    'ket' => strtoupper($request->ket)
                ]);
        return redirect('/gallery')->with('status','Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
        Gallery::destroy($gallery->id);
        return redirect('/gallery')->with('status','Data Berhasil Dihapus!');
    }
}
