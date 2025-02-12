<?php

namespace App\Repositories\Api;

use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Class JadwalApiRepository.
 */
class JadwalApiRepository
{
    protected $model;

    public function __construct(Jadwal $jadwal)
    {
        $this->model = $jadwal;
    }

    public function getAll($gol, $smst, $kdProdi)
    {
        $jadwal = $this->model
        ->where(function($query) use ($gol, $smst, $kdProdi) {
            $query->where("kode_prodi", $kdProdi)
            ->where('semester', $smst)
            ->where('golongan', $gol);
        })
        ->with('matkul.dosen')
        ->with('ruangan.jurusan')
        ->get()
        ->makeHidden(['created_at', 'updated_at'])
        ->each(function ($item) {
            $item->matkul->makeHidden(['created_at', 'updated_at']);
            $item->matkul->dosen->makeHidden(['created_at', 'updated_at']);
            $item->ruangan->makeHidden(['created_at', 'updated_at']);
            $item->ruangan->jurusan->makeHidden(['created_at', 'updated_at']);
        });

        return $jadwal;
    }

    public function getAllDay($gol, $smst, $kdProdi)
    {
        Carbon::setLocale('id');
        $hariIni = Str::lower(Carbon::now()->translatedFormat('l'));
        $jadwal = $this->model
        ->where(function($query) use ($gol, $smst, $kdProdi, $hariIni) {
            $query->where("kode_prodi", $kdProdi)
            ->where('semester', $smst)
            ->where('golongan', $gol)
            ->where('hari', $hariIni);
        })
        ->with([
            'matkul.dosen',
            'ruangan.jurusan',
            'absensi' => function ($query) {
                $query->select(['id', 'tanggal', 'nim', 'id_jadwal', 'masuk', 'selesai', 'status']);
                // ->where('masuk' != null);
            }
        ])
        ->get()
        ->makeHidden(['created_at', 'updated_at'])
        ->each(function ($item) {
            $item->matkul->makeHidden(['created_at', 'updated_at']);
            $item->matkul->dosen->makeHidden(['created_at', 'updated_at']);
            $item->ruangan->makeHidden(['created_at', 'updated_at']);
            $item->ruangan->jurusan->makeHidden(['created_at', 'updated_at']);
        });

        return $jadwal;
    }

    public function getNow($gol, $smst, $kdProdi){
        Carbon::setLocale('id');
        $hariIni = Str::lower(Carbon::now()->translatedFormat('l'));
        $waktuSekarang = Carbon::now()->format('H:i');
        $jadwal = $this->model
        ->where(function($query) use ($gol, $smst, $kdProdi, $hariIni, $waktuSekarang) {
            $query->where("kode_prodi", $kdProdi)
            ->where('semester', $smst)
            ->where('golongan', $gol)
            ->where('hari', $hariIni)
            ->whereTime('jam_masuk', '<=', $waktuSekarang)
            ->whereTime('jam_selesai', '>=', $waktuSekarang);
        })
        ->with('matkul.dosen')
        ->with('ruangan.jurusan')
        ->first();

        if ($jadwal) {
            $jadwal->makeHidden(['created_at', 'updated_at']);
            if ($jadwal->matkul) {
                $jadwal->matkul->makeHidden(['created_at', 'updated_at']);
    
                if ($jadwal->matkul->dosen) {
                    $jadwal->matkul->dosen->makeHidden(['created_at', 'updated_at']);
                }
            }
            if ($jadwal->ruangan) {
                $jadwal->ruangan->makeHidden(['created_at', 'updated_at']);
    
                if ($jadwal->ruangan->jurusan) {
                    $jadwal->ruangan->jurusan->makeHidden(['created_at', 'updated_at']);
                }
            }
        }

        return $jadwal;
    }
}
