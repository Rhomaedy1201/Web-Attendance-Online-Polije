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


    public function index()
    {
        return view("pages.jadwal.index");
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
                'jam_masuk.*' => 'required|date_format:H:i',
                'jam_toleransi_masuk' => 'required|array',
                'jam_toleransi_masuk.*' => 'required|integer',
                'jam_selesai' => 'required|array',
                'jam_selesai.*' => 'required|date_format:H:i',
                'durasi' => 'required|array',
                'durasi.*' => 'required|string',
                'id_mk' => 'required|array',
                'id_mk.*' => 'required|integer',
                'id_ruang' => 'required|array',
                'id_ruang.*' => 'required|integer',
            ]);
            
            $jadwalData = [];
            foreach ($request->jam_masuk as $index => $jamMasuk) {
                $jadwalData[] = [
                    'kode_prodi' => $request->kode_prodi,
                    'hari' => $request->hari,
                    'semester' => $request->semester,
                    'golongan' => $request->golongan,
                    'jam_masuk' => $jamMasuk[$index],
                    'jam_toleransi_masuk' => $request->jam_toleransi_masuk[$index],
                    'jam_selesai' => $request->jam_selesai[$index],
                    'durasi' => $request->durasi[$index],
                    'id_mk' => $request->id_mk[$index],
                    'id_ruang' => $request->id_ruang[$index],
                    'created_at' => now(),
                    'updated_at'=> now(),
                ];
            }

            dd($jadwalData);

            $this->param->store($jadwalData);
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
