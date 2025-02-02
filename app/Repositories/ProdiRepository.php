<?php

namespace App\Repositories;

use App\Models\Prodi;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ProdiRepository.
 */
class ProdiRepository
{
    protected $model;

    public function __construct(Prodi $prodi)
    {
        $this->model = $prodi;
    }

    public function store(array $data)
    {
        return $this->model->create([
            "kode_prodi"=> $data["kode_prodi"],
            "kode_jurusan"=> $data["kode_jurusan"],
            "nama"=> $data["nama"],
        ]);
    }
}
