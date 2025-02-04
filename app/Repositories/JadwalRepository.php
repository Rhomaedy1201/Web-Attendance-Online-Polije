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

    public function store(array $data){
        return $this->model->insert($data);
    }
}
