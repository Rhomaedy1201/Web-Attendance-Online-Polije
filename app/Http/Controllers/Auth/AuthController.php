<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function index()
    {
        return view("pages.auth.index");
    }
    
    public function login(Request $request)
    {
        try {
            $request->validate([
                "nip" => "required|string",
                "password" => "required|string",
            ]);

            $data = [
                "nip" => $request->nip,
                "password"=> $request->password,
            ];

            if (Auth::attempt($data)) {
                $request->session()->regenerate();
                return redirect()->route('/');
            }

            return redirect()->route('login')->with('error', "Nip atau Password anda salah!");
        } catch (Exception $e) {
            Log::error("Error saat login: ".$e->getMessage());

            return redirect()->route("login")->with("error", "Terjadi kesalahan sistem. Silahkan coba lagi.");
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            // DB::table('sessions')->where('user_id', Auth::user()->nip)->delete();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        } catch (Exception $e) {
            Log::error("Error saat login: ".$e->getMessage());
        }
    }
}
