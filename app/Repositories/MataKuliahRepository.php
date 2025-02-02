<?php

namespace App\Repositories;

use App\Models\MataKuliah;

/**
 * Class MataKuliahRepository.
 */
class MataKuliahRepository
{
    protected $model;
        
    public function __construct(MataKuliah $model)
    {
        $this->model = $model;
    }

    public function getAllMataKuliah($search, $limit=5){
        $search = strtolower($search);
        $dosen = $this->model
        ->where(function($query) use ($search) {
            $query->where("nama", "like", "%".$search."%")
                ->orWhere("sks", "like", "%".$search."%");
        })
        ->orWhereHas('prodi', function($query) use ($search) {
            $query->where("nama", "like", "%".$search."%");
        })
        ->orWhereHas('dosen', function($query) use ($search) {
            $query->where("nama", "like", "%".$search."%");
        })
        ->with('dosen') // Memuat relasi dosen
        ->paginate($limit);
        return $dosen;
    }

    public function store(array $data){
        return $this->model->create([
            'kode_prodi'=> $data['kode_prodi'],
            'nama'=> $data['nama'],
            'sks'=> $data['sks'],
            'id_dosen'=> $data['id_dosen'],
        ]);
    }

    public function update(array $data, $id){
        return $this->model->where('id', $id)->update([
            'kode_prodi'=> $data['kode_prodi'],
            'nama'=> $data['nama'],
            'sks'=> $data['sks'],
            'id_dosen'=> $data['id_dosen'],
        ]);
    }

    public function destroy($id){
        return $this->model->where('id', $id)->delete();
    }
}
