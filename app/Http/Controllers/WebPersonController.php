<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebPersonController extends Controller
{
    //
    public function index()
    {
        $portofolio = DB::table('portofolios')
                    ->whereNull('deleted_at')
                    ->paginate(5);
        return view('welcome',compact('portofolio'));
    }
}
