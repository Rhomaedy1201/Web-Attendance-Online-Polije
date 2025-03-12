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
        ->with(["mahasiswa","jadwal.matkul"])
        ->get()
        ->makeHidden(['created_at', 'updated_at'])
        ->each(function ($item) {
            $item->mahasiswa->makeHidden(['created_at', 'updated_at']);
            $item->jadwal->makeHidden(['created_at', 'updated_at']);
            $item->jadwal->matkul->makeHidden(['created_at', 'updated_at']);
        });

        return $history;
    }
}
