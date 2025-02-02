<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    protected $fillable = [
        'id', 
        'kode_prodi', 
        'nama',
        'sks',
        'id_dosen',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen','id');
    }
}
