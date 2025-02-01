<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'mst_jurusan';

    protected $fillable = [
        'id', 'kode_jurusan', 'nama',
    ];
}
