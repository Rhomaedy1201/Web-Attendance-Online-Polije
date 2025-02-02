<?php

namespace App\Repositories;

use App\Models\Dosen;

//use Your Model

/**
 * Class DosenRepository.
 */
class DosenRepository
{
    protected $model;

    public function __construct(Dosen $dosen){
        $this->model = $dosen;
    }

    public function getAllDosens($search, $limit=5){
        $search = strtolower($search);
        $jurusan = $this->model->where("nip","like","%".$search."%")
        ->orWhere( "nama","like","%".$search."%")
        ->paginate($limit);
        return $jurusan;
    }
    public function store(array $data){
        return $this->model->create([
            "nip"=> $data["nip"],
            "nama"=> $data["nama"],
        ]);
    }

    public function update(array $data, $id){
        return $this->model->where('id', $id)->update([
            "nip"=> $data["nip"],
            "nama"=> $data["nama"],
        ]);
    }

    public function destroy($id){
        return $this->model->where("id", $id)->delete();
    }
}
