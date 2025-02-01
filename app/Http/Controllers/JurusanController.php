<?php

namespace App\Http\Controllers;

use App\Repositories\JurusanRepository;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{

    public $param;
    public function __construct(JurusanRepository $jurusan)
    {
        $this->param = $jurusan;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->has('page_length') ? $request->get('page_length') : 5;
        $search = $request->has('search') ? $request->get('search') : null;
        $jurusan = $this->param->getJurusan($search, $limit);
        return view("pages.jurusan.index", ["jurusan" => $jurusan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.jurusan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'kode_jurusan' => 'required|string',
                'nama' => 'required|string',
            ]);
            
            $this->param->store($data);
            Alert::success("Berhasil", "Data Berhasil di simpan.");
            return redirect()->route("master-data.jurusan");
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
        $jurusan = $this->param->edit($id);
        return view("pages.jurusan.edit", compact("jurusan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'kode_jurusan' => 'required|string',
                'nama' => 'required|string',
            ]);
            
            $this->param->update($data, $id);
            Alert::success("Berhasil", "Data Berhasil di Edit.");
            return redirect()->route("master-data.jurusan");
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
