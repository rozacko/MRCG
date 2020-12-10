<?php

namespace App\Http\Controllers;

use App\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        //
    }

    public function cart($id,$value)
    {               
        $cek_akun = Auth::user();
        if($cek_akun){
            $id_akun = Auth::user()->id;
        }else{
            $output = 'Barang telah ditambahkan 
                    <br>Do you want login ?
                    <a href="/login" class="btn btn-danger btn-sm">Login</a>';
            return $output;
        }        
        $no_pesanan = "MRCG-".$id_akun;
        Process::create([
            'no_pesanan' => $no_pesanan,
            'id_akun' => $id_akun,
            'kd_barang' => $id,
            'qty' => 1,
            'value' => 1,
            'status' => 'waiting'
        ]);
        $output = 'Barang telah ditambahkan';
        return $output;
    }

    public function pick_up($value)
    {       
        $cek_akun = Auth::user();
        if($cek_akun){
            $id_akun = Auth::user()->id;
        }else{
            $output = 'Anda belum login, 
                    <br>Apakah anda ingin Login ?
                    <a href="/login" class="btn btn-danger btn-sm">Login</a>';
            return $output;
        }
        $no_pesanan = "MRCG-".$id_akun;
        // Process::create([
        //     'no_pesanan' => $no_pesanan,
        //     'id_akun' => $id_akun,
        //     'kd_barang' => $value,
        //     'qty' => 1,
        //     'value' => 1,
        //     'status' => 'waiting'
        // ]);

        $Data = DB::table('processes')
                    ->leftJoin('m_barangs', 'm_barangs.kd_barang', '=', 'processes.kd_barang')
                    ->leftJoin('m_hargas', 'm_barangs.kd_barang', '=', 'm_hargas.kd_barang')
                    ->whereNull('m_barangs.deleted_at')
                    ->whereNull('processes.deleted_at')
                    ->whereNull('m_hargas.deleted_at')
                    ->where('processes.id_akun','=',$id_akun)
                    ->where('processes.status','=','waiting')
                    ->select('m_barangs.*','processes.qty','m_hargas.harga')
                    ->get();
        // dd($Data);exit;
        return view('process.cart', ['data' => $Data]);
    }

    public function view_cart()
    {       
        $cek_akun = Auth::user();
        if($cek_akun){
            $id_akun = Auth::user()->id;
        }else{
            $output = 'Anda belum login, 
                    <br>Apakah anda ingin Login ?
                    <a href="/login" class="btn btn-danger btn-sm">Login</a>';
            return $output;
        }
        $Data = DB::table('processes')
                    ->leftJoin('m_barangs', 'm_barangs.kd_barang', '=', 'processes.kd_barang')
                    ->leftJoin('m_hargas', 'm_barangs.kd_barang', '=', 'm_hargas.kd_barang')
                    ->whereNull('m_barangs.deleted_at')
                    ->whereNull('processes.deleted_at')
                    ->whereNull('m_hargas.deleted_at')
                    ->where('processes.id_akun','=',$id_akun)
                    ->where('processes.status','=','waiting')
                    ->select('m_barangs.*','processes.qty','m_hargas.harga')
                    ->get();
        // dd($Data);exit;
        return view('process.cart', ['data' => $Data]);
    }

    public function check_out()
    {       
        $cek_akun = Auth::user();
        if($cek_akun){
            $id_akun = Auth::user()->id;
        }else{
            $output = 'Anda belum login, 
                    <br>Do you want login ?
                    <a href="/login" class="btn btn-danger btn-sm">Login</a>';
            return $output;
        }

        // pending
        // update qty dan value pada table process
        // 
        $Data = DB::table('processes')
                    ->leftJoin('m_barangs', 'm_barangs.kd_barang', '=', 'processes.kd_barang')
                    ->leftJoin('m_hargas', 'm_barangs.kd_barang', '=', 'm_hargas.kd_barang')
                    ->whereNull('m_barangs.deleted_at')
                    ->whereNull('processes.deleted_at')
                    ->whereNull('m_hargas.deleted_at')
                    ->where('processes.id_akun','=',$id_akun)
                    ->where('processes.status','=','waiting')
                    ->select('m_barangs.*','processes.qty','m_hargas.harga','processes.value')
                    ->get();
        // dd($Data);exit;
        return view('process.check_out', ['data' => $Data]);
    }
}
