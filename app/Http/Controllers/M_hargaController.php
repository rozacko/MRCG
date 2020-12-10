<?php

namespace App\Http\Controllers;

use App\M_harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class M_hargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Harga = DB::table('m_barangs')
                    ->leftJoin('m_hargas', 'm_barangs.kd_barang', '=', 'm_hargas.kd_barang')
                    ->whereNull('m_barangs.deleted_at')
                    ->whereNull('m_hargas.deleted_at')
                    ->select('m_barangs.*','m_hargas.harga')
                    ->paginate(20);
        return view('m_harga.harga', ['harga' => $Harga]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('m_harga.create');
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
            'kd_barang' => 'required',
            'harga' => 'required'
        ]);

        M_harga::create([
            'kd_barang' => strtoupper($request->kd_barang),
            'harga' => strtoupper($request->harga)
        ]);
        return redirect('/m_harga/create')->with('status','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\M_harga  $m_harga
     * @return \Illuminate\Http\Response
     */
    public function show(M_harga $m_harga)
    {
        //
        return view('m_harga.show', ['harga' => $m_harga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\M_harga  $m_harga
     * @return \Illuminate\Http\Response
     */
    public function edit(M_harga $m_harga)
    {
        //
        return view('m_harga.edit', compact('m_harga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\M_harga  $m_harga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_harga $m_harga)
    {
        //
        $request->validate([
            'kd_barang' => 'required',
            'harga' => 'required'
        ]);

        M_harga::where('id',$m_harga->id)
                ->update([
                    'kd_barang' => strtoupper($request->kd_barang),
                    'harga' => strtoupper($request->harga)
                ]);
        return redirect('/m_harga')->with('status','Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\M_harga  $m_harga
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_harga $m_harga)
    {
        //
        return redirect('/m_harga')->with('status','Data Berhasil Dihapus!');
    }

    public function search(){
        $search = $_GET['search'];
        $data = DB::table('m_barangs')
                    ->leftJoin('m_hargas', 'm_barangs.kd_barang', '=', 'm_hargas.user_id')
                    ->whereNull('m_barangs.deleted_at')
                    ->whereNull('m_hargas.deleted_at')
                    ->select('m_barangs.*','m_hargas.harga')
                    ->where('m_barangs.nama','LIKE','%'.$search.'%')
                    ->paginate(20);
        $data->nama = 'data is null';
        // dd($data);exit;
        return view('m_harga.harga', ['harga' => $data]);
    }
}
