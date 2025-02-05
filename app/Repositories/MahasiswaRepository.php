<?php

namespace App\Repositories;

use App\Models\Mahasiswa;
use App\Models\MahasiswaDetail;

/**
 * Class MahasiswaRepository.
 */
class MahasiswaRepository
{
    protected $model;
    protected $modelDetail;

    public function __construct(Mahasiswa $mahasiswa, MahasiswaDetail $mahasiswaDetail){
        $this->model = $mahasiswa;
        $this->modelDetail = $mahasiswaDetail;
    }

    public function store(array $data){
        return $this->model->create([
            "nim"=> $data["nim"],
            "nama"=> $data["nama"],
            "password"=> $data["nim"],
        ]);
    }

    public function storeDetail(array $data){
        return $this->modelDetail->create([
            "nim"=> $data["nim"],
            "kode_prodi"=> $data["kode_prodi"],
            "jk"=> $data["jk"],
            "alamat"=> $data["alamat"],
            "telp"=> $data["telp"],
            "golongan"=> $data["golongan"],
            "angkatan"=> $data["angkatan"],
            "semester_sekarang"=> $data["semester_sekarang"],
        ]);
    }
}
