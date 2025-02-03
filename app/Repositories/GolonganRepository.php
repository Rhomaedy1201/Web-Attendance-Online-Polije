<?php

namespace App\Repositories;

use App\Models\Golongan;

//use Your Model

/**
 * Class GolonganRepository.
 */
class GolonganRepository
{
    protected $model;

    public function __construct(Golongan $model)
    {
        $this->model = $model;
    }

    public function getAllGolongan($search, $limit=5){
        $search = strtolower($search);
        $golongan = $this->model
        ->where(function($query) use ($search) {
            $query->where("golongan", "like", "%".$search."%");
        })
        ->paginate($limit);
        return $golongan;
    }

    public function store(array $data){
        return $this->model->create([
            "golongan"=> $data["golongan"],
        ]);
    }

    public function update($golongan){
        // return $this->model->where('golongan', $golongan)->create([
        //     "golongan"=> $golongan,
        // ]);
    }

    public function destroy($golongan){
        return $this->model->where("golongan", $golongan)->delete();
    }
}
