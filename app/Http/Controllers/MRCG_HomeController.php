<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class MRCG_HomeController extends Controller
{
    //
    public function index()
    {
        $barang = DB::table('m_barangs')
                    ->leftJoin('m_hargas', 'm_barangs.kd_barang', '=', 'm_hargas.kd_barang')
                    ->whereNull('m_barangs.deleted_at')
                    ->whereNull('m_hargas.deleted_at')
                    ->where('m_hargas.harga','!=','0')
                    ->select('m_barangs.*','m_hargas.harga')
                    ->paginate(20);
        return view('welcome',compact('barang'));
    }
}
