<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaDetail extends Model
{
    protected $table = 'mahasiswa_detail';

    protected $fillable = [
        'nim', 
        'kode_prodi', 
        'jk',
        'alamat',
        'telp',
        'golongan',
        'angkatan',
        'semester_sekarang',
        'semester_tempuh',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim','nim');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'kode_prodi','kode_prodi');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golongan','golongan');
    }
}
