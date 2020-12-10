<?php

namespace App\Http\Controllers;

use App\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $Portofolio = Portofolio::all();
        $Portofolio = DB::table('portofolios')
                    ->whereNull('deleted_at')
                    ->paginate(5);
        return view('portofolio.portofolio', ['portofolio' => $Portofolio]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('portofolio.create');
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
            'tahun' => 'required',
            'nama' => 'required',
            'ket' => 'required'
        ]);

        Portofolio::create([
            'tahun' => strtoupper($request->tahun),
            'nama' => strtoupper($request->nama),
            'ket' => strtoupper($request->ket)            
        ]);
        // // atau
        // Portofolio::create($request->all());
        return redirect('/portofolio/create')->with('status','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        //
        return view('portofolio.show', ['portofolio' => $portofolio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        //
        return view('portofolio.edit', compact('portofolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        //
        $request->validate([
            'tahun' => 'required',
            'nama' => 'required',
            'ket' => 'required'
        ]);

        Portofolio::where('id',$portofolio->id)
                ->update([
                    'tahun' => strtoupper($request->tahun),
                    'nama' => strtoupper($request->nama),
                    'ket' => strtoupper($request->ket)
                ]);
        return redirect('/portofolio')->with('status','Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        //
        Portofolio::destroy($portofolio->id);
        return redirect('/portofolio')->with('status','Data Berhasil Dihapus!');
    }

    public function search(){
        $search = $_GET['search'];
        // $data = Portofolio::where('nama','LIKE','%'.$search.'%')->get();
        $data = DB::table('portofolios')
                    ->where('nama','LIKE','%'.$search.'%')
                    ->whereNull('deleted_at')
                    ->paginate(5);

        $data->nama = 'data is null';
        // dd($data);exit;
        return view('portofolio.portofolio', ['portofolio' => $data]);
    }
}
