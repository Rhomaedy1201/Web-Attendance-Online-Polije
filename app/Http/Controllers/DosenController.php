<?php

namespace App\Http\Controllers;

use App\Repositories\DosenRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    protected $param;

    public function __construct(DosenRepository $dosen)
    {
        $this->param = $dosen;
    }

    public function index(Request $request)
    {
        $limit = $request->has('page_length') ? $request->get('page_length') : 5;
        $search = $request->has('search') ? $request->get('search') : null;
        $dosen = $this->param->getAllDosens($search, $limit);
        return view("pages.dosen.index", compact("dosen"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.dosen.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nip' => 'required|string|size:18',
                'nama' => 'required|string',
            ]);
            
            $this->param->store($data);
            Alert::success("Berhasil", "Data Berhasil di simpan.");
            return redirect()->route("master-data.dosen");
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
        return view("pages.dosen.edit", compact("id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // try {
        //     $data = $request->validate([
        //         'kode_jurusan' => 'required|string',
        //         'nama' => 'required|string',
        //     ]);
            
        //     $this->param->store($data);
        //     Alert::success("Berhasil", "Data Berhasil di simpan.");
        //     return redirect()->route("master-data.jurusan");
        // } catch (Exception $e) {
        //     Alert::error("Terjadi Kesalahan", $e->getMessage());
        //     return back();
        // } catch (QueryException $e) {
        //     Alert::error("Terjadi Kesalahan", $e->getMessage());
        //     return back();
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // try {
        //     $data = $request->validate([
        //         'kode_jurusan' => 'required|string',
        //         'nama' => 'required|string',
        //     ]);
            
        //     $this->param->store($data);
        //     Alert::success("Berhasil", "Data Berhasil di simpan.");
        //     return redirect()->route("master-data.jurusan");
        // } catch (Exception $e) {
        //     Alert::error("Terjadi Kesalahan", $e->getMessage());
        //     return back();
        // } catch (QueryException $e) {
        //     Alert::error("Terjadi Kesalahan", $e->getMessage());
        //     return back();
        // }
    }
}
