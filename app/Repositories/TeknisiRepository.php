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
    protected $modal;

    public function __construct(Teknisi $teknisi){
        $this->modal = $teknisi;
    }

    public function store(array $data){
        return $this->modal->insert([
            "nip"=> $data["nip"],
            "nama"=> $data["nama"],
            "password"=> Hash::make($data["nip"]),
            "created_at" => now(),
            "updated_at"=> now(),
        ]);
    }
}
