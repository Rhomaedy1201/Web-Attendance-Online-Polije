<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'mst_prodi';

    protected $fillable = [
        'id', 
        'kode_prodi', 
        'kode_jurusan',
        'nama',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan','kode_jurusan');
    }
}
