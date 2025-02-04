<?php

namespace App\Repositories;

use App\Models\Jadwal;

//use Your Model

/**
 * Class JadwalRepository.
 */
class JadwalRepository
{
    protected $model;

    public function __construct(Jadwal $jadwal){
        $this->model = $jadwal;
    }

    public function getJadwal($prodi, $semester, $golongan){
        $jadwal = $this->model
        ->where(function($query) use ($prodi, $semester, $golongan) {
            $query->where("kode_prodi", $prodi)
            ->where('semester', $semester)
            ->where('golongan', $golongan);
        })
        ->with('matkul.dosen')
        ->with('ruangan.jurusan')
        ->get();
        return $jadwal;
    }

    public function store(array $data){
        return $this->model->insert($data);
    }
}
