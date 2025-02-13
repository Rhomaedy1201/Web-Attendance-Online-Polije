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
        $user = MahasiswaDetail::where('nim', $request->user()->nim)
        ->with('mahasiswa')
        ->first();
        if ($user) {
            $user->makeHidden(['created_at', 'updated_at']);
            if($user->mahasiswa){
                $user->mahasiswa->makeHidden(['created_at','updated_at']);
            }
        }
        return $this->okApiResponse($user, 'Berhasil get profile');
    }
}
