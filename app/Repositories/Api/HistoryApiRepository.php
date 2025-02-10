<?php

namespace App\Repositories\Api;

use App\Models\Absensi;

/**
 * Class HistoryApiRepository.
 */
class HistoryApiRepository
{
    protected $model;

    public function __construct(Absensi $absensi)
    {
        $this->model = $absensi;
    }

    public function getHistory($tgl){
        $history = $this->model
        ->where("tanggal", 'like',$tgl."%")
        ->with('mahasiswa')
        ->with('jadwal.matkul')
        ->get();

        return $history;
    }
}
