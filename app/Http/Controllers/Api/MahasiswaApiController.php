<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiResponse;
use App\Models\MahasiswaDetail;
use Illuminate\Http\Request;

class MahasiswaApiController extends Controller
{
    use ApiResponse;
    public function index(Request $request)
    {
        $user = MahasiswaDetail::where('nim', $request->user()->nim)->with('mahasiswa')->first();
        return $this->okApiResponse($user, 'Berhasil get profile');
    }
}
