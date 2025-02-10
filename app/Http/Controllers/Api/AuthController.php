<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiResponse;
use App\Models\Mahasiswa;
use App\Models\MahasiswaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required|size:9',
            'password' => 'required',
        ]);

        $user = Mahasiswa::where('nim', $request->nim)->first();
        $userDetail = MahasiswaDetail::where('nim', $request->nim)->with('mahasiswa')->first();

        $token = DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->first();

        if (!is_null($token)) {
            return $this->errorApiResponse("User sudah login, Silahkan logout dahulu.");
        }
        
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'NIM atau password salah'], 401);
        }else{
            $token = $user->createToken('Mobile')->plainTextToken;
            return $this->okApiResponse([
                    'user'=> $userDetail,
                    'token'=> $token,
                ],
            );
        }
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return $this->okApiResponse([], 'Berhsasil Logout.');
    }
}
