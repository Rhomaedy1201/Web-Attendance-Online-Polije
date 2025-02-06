<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Prodi;
use App\Repositories\MahasiswaRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    protected $param;

    public function __construct(MahasiswaRepository $Mahasiswa)
    {
        $this->param = $Mahasiswa;
    }

    public function index(Request $request)
    {
        $limit = $request->has('page_length') ? $request->get('page_length') : 5;
        $search = $request->has('search') ? $request->get('search') : null;
        $mahasiswa = $this->param->getAll($search, $limit);
        return view("pages.mahasiswa.index", compact("mahasiswa"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::get();
        $golongan = Golongan::get();
        return view("pages.mahasiswa.create", compact("prodi","golongan"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nim' => 'required|string|size:9',
                'nama' => 'required|string',
            ]);

            $dataDetail = $request->validate([
                'nim' => 'required|string|size:9',
                'kode_prodi' => 'required|string',
                'jk' => 'required|string',
                'alamat' => 'required|string',
                'telp' => 'required|string',
                'golongan' => 'required|string',
                'angkatan' => 'required|string',
                'semester_sekarang' => 'required|string',
            ]);

            $this->param->store($data);
            $this->param->storeDetail($dataDetail);
            Alert::success("Berhasil", "Data Berhasil di Simpan.");
            return redirect()->route("master-data.mahasiswa");
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
        return view("pages.mahasiswa.edit", compact("id"));
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
    public function destroy(Request $request)
    {
        try {
            $this->param->destroyDetail($request->formId);
            $this->param->destroy($request->formId);
            Alert::success("Berhasil", "Data Berhasil di Hapus.");
            return redirect()->route("master-data.mahasiswa");
        } catch (\Exception $e) {
            Alert::error("Terjadi Kesalahan", $e->getMessage());
            return back();
        }
    }
}
