<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Model
{
    //
    protected $fillable = ['id_akun','gambar','nama','ttl','jenis_kel','pekerjaan'];
    use SoftDeletes;
}

