<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    //
    protected $fillable = ['no_pesanan','id_akun','kd_barang','qty','value','status'];
    use SoftDeletes;
}
