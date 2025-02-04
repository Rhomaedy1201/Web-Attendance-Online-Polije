<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\MataKuliah;
use App\Models\Prodi;
use App\Models\Ruangan;
use App\Repositories\JadwalRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalController extends Controller
{
    protected $param;

    public function __construct(JadwalRepository $jadwal)
    {
        $this->param = $jadwal;
    }


    public function index(Request $request)
    {
        $prodi = Prodi::get();
        $golongan = Golongan::get();
        $jadwal = $this->param->getJadwal(
            $request->kode_prodi,
            $request->semester,
            $request->golongan,
        );
        return view("pages.jadwal.index", [
            "prodi"=> $prodi,
            "golongan"=> $golongan,
            "jadwal"=> $jadwal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::get();
        $golongan = Golongan::get();
        $matkul = MataKuliah::get();
        $ruang = Ruangan::with('jurusan')->get();
        return view("pages.jadwal.create", [
            "prodi"=> $prodi,
            "golongan"=> $golongan,
            "matkul"=> $matkul,
            "ruang"=> $ruang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_prodi' => 'required|string',
                'hari' => 'required|string',
                'semester' => 'required|integer',
                'golongan' => 'required|string',
                'jam_masuk' => 'required|array',
                'jam_masuk.*' => 'required|string',
                'jam_toleransi_masuk' => 'required|array',
                'jam_toleransi_masuk.*' => 'required|integer',
                'jam_selesai' => 'required|array',
                'jam_selesai.*' => 'required|string',
                'durasi' => 'required|array',
                'durasi.*' => 'required|string',
                'id_mk' => 'required|array',
                'id_mk.*' => 'required|integer',
                'id_ruang' => 'required|array',
                'id_ruang.*' => 'required|integer',
            ]);

            $kodeProdi = $request->kode_prodi;
            $hari = $request->hari;
            $semester = $request->semester;
            $golongan = $request->golongan;

            for ($i=0; $i < count($request->jam_masuk); $i++) { 
                $data = [
                    'kode_prodi' => $kodeProdi,
                    'hari' => $hari,
                    'semester' => $semester,
                    'golongan' => $golongan,
                    'jam_masuk' => $request->jam_masuk[$i],
                    'jam_toleransi_masuk' => $request->jam_toleransi_masuk[$i],
                    'jam_selesai' => $request->jam_selesai[$i],
                    'durasi' => $request->durasi[$i],
                    'id_mk' => $request->id_mk[$i],
                    'id_ruang' => $request->id_ruang[$i],
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                $this->param->store($data);
            }

            Alert::success("Berhasil", "Data Berhasil di Simpan.");
            return redirect()->route("master-data.jadwal");
        } catch (\Exception $e) {
            Alert::error("Terjadi Kesalahan", $e->getMessage());
            return back();
        } catch (QueryException $e) {
            Alert::error("Terjadi Kesalahan", $e->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("pages.jadwal.edit", compact("id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
