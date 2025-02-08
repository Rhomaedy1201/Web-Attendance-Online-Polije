<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\Requests\AbsenRequest;
use App\Repositories\Api\AbsensiRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    use ApiResponse;

    protected $param;

    public function __construct(AbsensiRepository $absen)
    {
        $this->param = $absen;
    }

    public function masuk(Request $request)
    {
        try {
            $date = now();
    
            $params = [
                "dateNow" => $date,
                "user" => $request->user(),
            ];
    
            $absenMasuk = $this->param->absenMasuk($params);
            return $absenMasuk; 
        } catch (\Throwable $th) {
            return $this->errorApiResponse($th->getMessage(), 500);
        }
    }
}
