<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'mst_ruangan';

    protected $fillable = [
        'id', 
        'kode_jurusan', 
        'nama_kelas',
    ];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }
}
