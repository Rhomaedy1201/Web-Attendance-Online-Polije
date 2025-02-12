<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'id', 
        'hari', 
        'jam_masuk',
        'jam_toleransi_masuk',
        'jam_selesai',
        'jam_toleransi_selesai',
        'durasi',
        'id_mk',
        'semester',
        'id_ruang',
        'golongan',
        'kode_prodi',
    ];

    public function matkul()
    {
        return $this->belongsTo(MataKuliah::class, 'id_mk','id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang','id');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golongan','golongan');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'kode_prodi','kode_prodi');
    }

    public function absensi()
    {
        return $this->hasOne(Absensi::class, 'id_jadwal', 'id')->latest();
    }
}
