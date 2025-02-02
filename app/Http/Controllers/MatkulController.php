<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Prodi;
use App\Repositories\MataKuliahRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MatkulController extends Controller
{
    protected $param;

    public function __construct(MataKuliahRepository $matkul)
    {
        $this->param = $matkul;
    }

    public function index(Request $request)
    {
        $limit = $request->has('page_length') ? $request->get('page_length') : 5;
        $search = $request->has('search') ? $request->get('search') : null;
        $matkul = $this->param->getAllMataKuliah($search, $limit);
        return view("pages.mata_kuliah.index", ["matkul"=> $matkul]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::get();
        $dosen = Dosen::get();
        return view("pages.mata_kuliah.create", [
            "prodi"=> $prodi,
            "dosen"=> $dosen,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'kode_prodi' => 'required|string',
                'nama' => 'required|string',
                'sks' => 'required|string',
                'id_dosen' => 'required|string',
            ]);

            $this->param->store($data);
            Alert::success("Berhasil", "Data Berhasil di simpan.");
            return redirect()->route("master-data.matkul");
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
        $prodi = Prodi::get();
        $dosen = Dosen::get();
        $matkul = MataKuliah::findOrFail($id);
        return view("pages.mata_kuliah.edit", [
            "prodi"=> $prodi,
            "dosen"=> $dosen,
            "matkul"=> $matkul
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'kode_prodi' => 'required|string',
                'nama' => 'required|string',
                'sks' => 'required|string',
                'id_dosen' => 'required|string',
            ]);

            $this->param->update($data, $id);
            Alert::success("Berhasil", "Data Berhasil di Edit.");
            return redirect()->route("master-data.matkul");
        } catch (\Exception $e) {
            Alert::error("Terjadi Kesalahan", $e->getMessage());
            return back();
        } catch (QueryException $e) {
            Alert::error("Terjadi Kesalahan", $e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->param->destroy($id);
            Alert::success("Berhasil", "Data Berhasil di Hapus.");
            return redirect()->route("master-data.matkul");
        } catch (\Exception $e) {
            Alert::error("Terjadi Kesalahan", $e->getMessage());
            return back();
        }
    }
}
