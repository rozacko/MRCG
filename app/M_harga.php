<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class M_harga extends Model
{
    //
    protected $fillable = ['kd_barang','harga'];
    use SoftDeletes;
}
