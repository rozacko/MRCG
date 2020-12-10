<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class M_barang extends Model
{
    //
    protected $fillable = ['kd_barang','gambar','nama','satuan'];
    use SoftDeletes;
}
