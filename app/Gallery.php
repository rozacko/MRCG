<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    //
    protected $fillable = ['gambar','nama','ket'];
    use SoftDeletes;
}
