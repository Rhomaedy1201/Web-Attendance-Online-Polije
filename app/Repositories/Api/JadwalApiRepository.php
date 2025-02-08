<?php

namespace App\Repositories\Api;

use App\Models\Jadwal;

/**
 * Class JadwalApiRepository.
 */
class JadwalApiRepository
{
    protected $model;

    public function __construct(Jadwal $jadwal)
    {
        $this->model = $jadwal;
    }

    public function getAll($gol, $smst, $kdProdi)
    {
        $jadwal = $this->model
        ->where(function($query) use ($gol, $smst, $kdProdi) {
            $query->where("kode_prodi", $kdProdi)
            ->where('semester', $smst)
            ->where('golongan', $gol);
        })
        ->with('matkul.dosen')
        ->with('ruangan.jurusan')
        ->get();

        return $jadwal;
    }
}
