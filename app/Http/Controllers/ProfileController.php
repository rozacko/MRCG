<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cek_akun = Auth::user();
        if($cek_akun){
            $id_akun = Auth::user()->id;
        }else{
            $output = 'Barang telah ditambahkan 
                    <br>Do you want login ?
                    <a href="/login" class="btn btn-danger btn-sm">Login</a>';
            return $output;
        }

        //data Profiles
        $data_profile = DB::table('users')
                    ->leftJoin('profiles', 'users.id', '=', 'profiles.id_akun')
                    ->whereNull('profiles.deleted_at')
                    ->where('profiles.id_akun','=',$id_akun)
                    ->select('users.id','profiles.*')
                    ->get();
        // echo $id_akun;
        // dd($data_profile);exit;
        return view('profile.profile',compact('data_profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profile.create');
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
            'nama' => 'required',
            'ttl' => 'required',
            'jenis_kel' => 'required',
            'pekerjaan' => 'required'
        ]);
        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar','public');
        } else {
            $gambar = null;
        }
        $id_akun = Auth::user()->id;        
        Profile::create([
            'gambar' => $gambar,
            'id_akun' => $id_akun,
            'nama' => strtoupper($request->nama),
            'ttl' => strtoupper($request->ttl),
            'jenis_kel' => strtoupper($request->jenis_kel),
            'pekerjaan' => strtoupper($request->pekerjaan)            
        ]);
        return redirect('/set_profile/create')->with('status','Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
        // return view('profile.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
        return view('profile.edit', compact('profile'));
    }

    public function edit_address(Profile $address)
    {
        //
        return view('profile.address', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
        $request->validate([
            'gambar' => ['mimes:jpg,png,jpeg,gif'],
            'nama' => 'required',
            'ttl' => 'required',
            'jenis_kel' => 'required',
            'pekerjaan' => 'required'
        ]);

        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar','public');
            $data = Profile::findOrFail($profile->id);
            if($data->gambar){
                Storage::delete('public/'.$data->gambar);
                $data->gambar = $gambar;
            }else{
                $data->gambar = $gambar; 
            }
            $data->save();
        } 

        $id_akun = Auth::user()->id;        

        Profile::where('id',$profile->id)
                ->update([
                    'id_akun' => $id_akun,
                    'nama' => strtoupper($request->nama),
                    'ttl' => strtoupper($request->ttl),
                    'jenis_kel' => strtoupper($request->jenis_kel),
                    'pekerjaan' => strtoupper($request->pekerjaan)
                ]);                        
        return redirect('/set_profile')->with('status','Data Berhasil Diubah!');
    }

    public function update_address(Request $request, Profile $address)
    {
        //
        $request->validate([
            'no_hp' => 'required',
            'nama_pengirim' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required'
        ]);

        $id_akun = Auth::user()->id;        

        Profile::where('id_akun',$profile->id_akun)
                ->update([
                    'no_hp' => $request->no_hp,
                    'nama_pengirim' => strtoupper($request->nama_pengirim),
                    'alamat' => strtoupper($request->alamat),
                    'kelurahan' => strtoupper($request->kelurahan),
                    'kecamatan' => strtoupper($request->kecamatan),
                    'catatan' => strtoupper($request->catatan)
                ]);                        
        return redirect('/set_profile')->with('status','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
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
        return view('profile.view_cart', ['data' => $Data]);
    }

    public function view_verivy()
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
                    ->where('processes.status','=','verivy')
                    ->select('m_barangs.*','processes.qty','m_hargas.harga')
                    ->get();
        // dd($Data);exit;
        return view('profile.view_verivy', ['data' => $Data]);
    }
    public function view_deliv()
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
                    ->where('processes.status','=','delived')
                    ->select('m_barangs.*','processes.qty','m_hargas.harga')
                    ->get();
        // dd($Data);exit;
        return view('profile.view_delived', ['data' => $Data]);
    }
    public function view_done()
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
                    ->where('processes.status','=','done')
                    ->select('m_barangs.*','processes.qty','m_hargas.harga')
                    ->get();
        // dd($Data);exit;
        return view('profile.view_done', ['data' => $Data]);
    }

}
