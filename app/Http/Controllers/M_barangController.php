<?php

namespace App\Http\Controllers;

use App\M_barang;
use App\M_harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class M_barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Barang = DB::table('m_barangs')
                    ->whereNull('m_barangs.deleted_at')
                    ->paginate(20);                    
        return view('m_barang.barang', ['barang' => $Barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('m_barang.create');
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
        $request->validate([
            'gambar' => ['mimes:jpg,png,jpeg,gif'],
            'kd_barang' => 'required',
            'nama' => 'required',
            'satuan' => 'required'
        ]);
        
        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar','public');
        } else {
            $gambar = null;
        }
        M_barang::create([
            'gambar' => $gambar,
            'nama' => strtoupper($request->nama),
            'kd_barang' => strtoupper($request->kd_barang),
            'satuan' => strtoupper($request->satuan)            
        ]);

        M_harga::create([
            'kd_barang' => strtoupper($request->kd_barang),
            'harga' => '0' 
        ]);
        return redirect('/m_barang/create')->with('status','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\M_barang  $m_barang
     * @return \Illuminate\Http\Response
     */
    public function show(M_barang $m_barang)
    {
        //
        return view('m_barang.show', ['m_barang' => $m_barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\M_barang  $m_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(M_barang $m_barang)
    {
        //
        return view('m_barang.edit', compact('m_barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\M_barang  $m_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_barang $m_barang)
    {
        //
        $request->validate([
            'gambar' => ['mimes:jpg,png,jpeg,gif'],
            'kd_barang' => 'required',
            'nama' => 'required',
            'satuan' => 'required'
        ]);

        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar','public');
            $data = M_barang::findOrFail($m_barang->id);
            if($data->gambar){
                Storage::delete('public/'.$data->gambar);
                $data->gambar = $gambar;
            }else{
                $data->gambar = $gambar; 
            }
            $data->save();
        } 
        M_barang::where('id',$m_barang->id)
                ->update([
                    'nama' => strtoupper($request->nama),
                    'kd_barang' => strtoupper($request->kd_barang),
                    'satuan' => strtoupper($request->satuan)
                ]);
        return redirect('/m_barang')->with('status','Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\M_barang  $m_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_barang $m_barang)
    {
        //
        M_barang::destroy($m_barang->id);
        return redirect('/m_barang')->with('status','Data Berhasil Dihapus!');
    }

    public function search(){
        // $search = $_GET['search'];
        $data = DB::table('m_barangs')
                    ->leftJoin('m_hargas', 'm_barangs.kd_barang', '=', 'm_hargas.kd_barang')
                    ->whereNull('m_barangs.deleted_at')
                    ->whereNull('m_hargas.deleted_at')
                    ->select('m_barangs.*','m_hargas.harga')
                    ->where('m_barangs.nama','LIKE','%'.$search.'%')
                    ->paginate(20);
        $data->nama = 'data is null';
        // dd($data);exit;
        return view('m_barang.barang', ['barang' => $data]);
    }
}
