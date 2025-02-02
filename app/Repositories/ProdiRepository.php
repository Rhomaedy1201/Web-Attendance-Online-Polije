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

    public function getProdi($search, $limit=5){
        $search = strtolower($search);
        $prodi = $this->model->where("kode_prodi","like","%".$search."%")
        ->orWhere("kode_jurusan","like","%".$search."%")
        ->orWhere( "nama","like","%".$search."%")
        ->with("jurusan")
        ->paginate($limit);
        return $prodi;
    }

    public function store(array $data)
    {
        return $this->model->create([
            "kode_prodi"=> $data["kode_prodi"],
            "kode_jurusan"=> $data["kode_jurusan"],
            "nama"=> $data["nama"],
        ]);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)->update([
            "kode_prodi"=> $data["kode_prodi"],
            "kode_jurusan"=> $data["kode_jurusan"],
            "nama"=> $data["nama"],
        ]);
    }
}
