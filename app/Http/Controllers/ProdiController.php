<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use App\Repositories\ProdiRepository;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdiController extends Controller
{
    public $param;
    public function __construct(ProdiRepository $prodi)
    {
        $this->param = $prodi;
    }

    public function index(Request $request)
    {
        $limit = $request->has('page_length') ? $request->get('page_length') : 5;
        $search = $request->has('search') ? $request->get('search') : null;
        $prodi = $this->param->getProdi($search, $limit);
        return view("pages.prodi.index", ["prodi" => $prodi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::get();
        return view("pages.prodi.create",  compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'kode_prodi' => 'required|string',
                'kode_jurusan' => 'required|string',
                'nama' => 'required|string',
            ]);

            $this->param->store($data);
            Alert::success("Berhasil", "Data Berhasil di simpan.");
            return redirect()->route("master-data.prodi");
        } catch (Exception $e) {
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
        $jurusan = Jurusan::orderBy('nama', 'asc')->get();
        $prodi = Prodi::findOrFail($id);
        return view("pages.prodi.edit", [
            "jurusan"=> $jurusan,
            "prodi"=> $prodi
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
                'kode_jurusan' => 'required|string',
                'nama' => 'required|string',
            ]);

            $this->param->update($data, $id);
            Alert::success("Berhasil", "Data Berhasil di Edit.");
            return redirect()->route("master-data.prodi");
        } catch (Exception $e) {
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
        //
    }
}
