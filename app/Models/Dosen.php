<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'mst_dosen';

    protected $fillable = [
        'id', 
        'nip', 
        'nama',
    ];
}
