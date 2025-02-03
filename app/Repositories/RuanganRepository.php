<?php

namespace App\Repositories;

use App\Models\Ruangan;
//use Your Model

/**
 * Class RuanganRepository.
 */
class RuanganRepository
{
    protected $model;

    public function __construct(Ruangan $ruangan)
    {
        $this->model = $ruangan;
    }

    public function getAll($search, $limit=5){
        $search = strtolower($search);
        $ruangan = $this->model
        ->where(function($query) use ($search) {
            $query->where("nama_kelas", "like", "%".$search."%");
        })
        ->orWhereHas('jurusan', function($query) use ($search) {
            $query->where("nama", "like", "%".$search."%");
        })
        ->paginate($limit);
        return $ruangan;
    }

    public function store(array $data){
        return $this->model->create([
            "kode_jurusan"=> $data["kode_jurusan"],
            "nama_kelas"=> $data["nama_kelas"],
        ]);
    }

    public function update(array $data, $id){
        return $this->model->where('id', $id)->update([
            "kode_jurusan"=> $data["kode_jurusan"],
            "nama_kelas"=> $data["nama_kelas"],
        ]);
    }

    public function destroy($id){
        return $this->model->where("id", $id)->delete();
    }
}
