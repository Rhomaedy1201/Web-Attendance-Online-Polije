<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'mst_golongan';

    protected $fillable = [
        'golongan',
    ];
}
