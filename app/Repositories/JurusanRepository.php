<?php

namespace App\Repositories;

use App\Models\Jurusan;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class JurusanRepository.
 */
class JurusanRepository extends BaseRepository
{
    // protected $model;

    // public function __construct(Jurusan $jurusan)
    // {
    //     $this->model = $jurusan;
    // }

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Jurusan::class;
    }

    public function getJurusan($search, $limit=5){
        $search = strtolower($search);
        $jurusan = $this->model->where("kode_jurusan","like","%".$search."%")
        ->orWhere( "nama","like","%".$search."%")
        ->paginate($limit);
        return $jurusan;
    }

    public function store(array $data)
    {
        return $this->model()::create([
            "kode_jurusan"=> $data["kode_jurusan"],
            "nama"=> $data["nama"],
        ]);
    }
}
