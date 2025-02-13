<?php

namespace App\Repositories;

use App\Models\Teknisi;
use Illuminate\Support\Facades\Hash;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class TeknisiRepository.
 */
class TeknisiRepository
{
    protected $model;

    public function __construct(Teknisi $teknisi){
        $this->model = $teknisi;
    }

    public function getAll($search, $limit=5){
        $search = strtolower($search);
        $teknisi = $this->model
        ->where(function($query) use ($search) {
            $query->where("nip", "like", "%".$search."%")
            ->orWhere("nama", "like", "%".$search."%");
        })
        ->paginate($limit);
        return $teknisi;
    }

    public function store(array $data){
        return $this->model->insert([
            "nip"=> $data["nip"],
            "nama"=> $data["nama"],
            "password"=> Hash::make($data["nip"]),
            "created_at" => now(),
            "updated_at"=> now(),
        ]);
    }

    public function update(array $data, $id){
        return $this->model->where('id', $id)->update([
            "nip"=> $data["nip"],
            "nama"=> $data["nama"],
            "updated_at"=> now(),
        ]);
    }

    public function destroy($id){
        return $this->model->where("id", $id)->delete();
    }

    public function reset(string $nip, $id){
        return $this->model->where('id', $id)->update([
            "password"=> Hash::make($nip),
            "updated_at"=> now(),
        ]);
    }
}
