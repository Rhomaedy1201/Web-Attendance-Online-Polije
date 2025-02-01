<?php

namespace App\Repositories;

use App\Models\Jurusan;
//use Your Model

/**
 * Class JurusanRepository.
 */
class JurusanRepository 
{
    protected $model;

    public function __construct(Jurusan $jurusan)
    {
        $this->model = $jurusan;
    }

    public function getJurusan($search, $limit=5){
        $search = strtolower($search);
        $jurusan = $this->model->where("kode_jurusan","like","%".$search."%")
        ->orWhere( "nama","like","%".$search."%")
        ->paginate($limit);
        return $jurusan;
    }

    public function edit($id)
    {
        $jurusan = $this->model->find($id);
        return $jurusan;
    }

    public function store(array $data)
    {
        return $this->model->create([
            "kode_jurusan"=> $data["kode_jurusan"],
            "nama"=> $data["nama"],
        ]);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)->update([
            "kode_jurusan"=> $data["kode_jurusan"],
            "nama"=> $data["nama"],
        ]);
    }
}
