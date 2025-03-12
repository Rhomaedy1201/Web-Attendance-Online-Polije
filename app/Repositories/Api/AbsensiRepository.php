<?php

namespace App\Repositories\Api;

use App\Http\Controllers\Traits\ApiResponse;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\MahasiswaDetail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class AbsensiRepository.
 */
class AbsensiRepository
{
    use ApiResponse;
    protected $model;
    protected $repoJadwal;

    public function __construct(Absensi $absen, JadwalApiRepository $jadwal)
    {
        $this->model = $absen;
        $this->repoJadwal = $jadwal;
    }

    public function absenMasuk(array $params, $nim)
    {
        $now = $params['dateNow'];
        $user = $params['user'];
        $dateNow = $now->format("Y-m-d");

        if ($nim != $user->nim) {
            return $this->okApiResponse("Wajah Tidak Sesuai");
        }
        
        // Ambil detail mahasiswa
        $detailMhs = MahasiswaDetail::where("nim", $user->nim)->first();

        // Cari jadwal berdasarkan hari ini
        $jadwal = $this->repoJadwal->getNow(
            $detailMhs['golongan'],
            $detailMhs['semester_sekarang'],
            $detailMhs['kode_prodi'],
        );
        
        $absen = $this->model->where(['id_jadwal'=>$jadwal->id, "tanggal"=>$dateNow])->first();

        if ($absen) {
            if ($absen->masuk != null) {
                return $this->okApiResponse([], "Sudah Absen");
            }else if ($absen->selesai != null) {
                return $this->okApiResponse([]);
            }
        }

        // return $jadwal;
        if (is_null($jadwal)) {
            throw new NotFoundHttpException("Jadwal tidak ditemukan");
        }

        // Ambil jam masuk, toleransi, dan jam pulang
        $jamMasuk = Carbon::parse($jadwal->jam_masuk);
        $jamToleransi = $jamMasuk->copy()->addMinutes((int)$jadwal->jam_toleransi_masuk + 1);
        $jamPulang = Carbon::parse($jadwal->jam_selesai);

        if ($now->gt($jamPulang)) {
            return $this->okApiResponse("Sudah lewat jam pulang, tidak bisa absen masuk!", 400);
        }

        if ($now->lt($jamMasuk)) {
            return $this->okApiResponse("Belum waktunya masuk", 400);
        }

        $statusAbsen = ($now->lte($jamToleransi)) ? "tepat" : "telat";

        $absen = $this->model::create([
            'tanggal' => $now->toDateString(),
            'nim' => $user->nim,
            'id_jadwal' => $jadwal->id,
            'masuk' => $now->format('H:i'),
            'selesai' => null, // Belum absen pulang
            'status' => $statusAbsen,
        ]);

        return $this->okApiResponse($absen, "Presensi masuk berhasil");
    }

    public function absenPulang()
    {
        
    }
}
