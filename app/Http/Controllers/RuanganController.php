<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Ruangan;
use App\Repositories\RuanganRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RuanganController extends Controller
{
    protected $param;

    public function __construct(RuanganRepository $Ruangan)
    {
        $this->param = $Ruangan;
    }
    public function index(Request $request)
    {
        $limit = $request->has('page_length') ? $request->get('page_length') : 5;
        $search = $request->has('search') ? $request->get('search') : null;
        $ruangan = $this->param->getAll($search, $limit);
        return view("pages.ruangan.index", ["ruangan"=> $ruangan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::get();
        return view("pages.ruangan.create", compact("jurusan"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'kode_jurusan' => 'required|string',
                'nama_kelas' => 'required|string',
            ]);

            $this->param->store($data);
            Alert::success("Berhasil", "Data Berhasil di Simpan.");
            return redirect()->route("master-data.ruangan");
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
        $jurusan = Jurusan::get();
        $ruangan = Ruangan::findOrFail( $id );
        return view("pages.ruangan.edit", compact(["jurusan","ruangan"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'kode_jurusan' => 'required|string',
                'nama_kelas' => 'required|string',
            ]);

            $this->param->update($data, $id);
            Alert::success("Berhasil", "Data Berhasil di Edit.");
            return redirect()->route("master-data.ruangan");
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
    public function destroy(Request $request)
    {
        try {
            $this->param->destroy( $request->formId);
            Alert::success("Berhasil", "Data Berhasil di Hapus.");
            return redirect()->route("master-data.ruangan");
        } catch (\Exception $e) {
            Alert::error("Terjadi Kesalahan", $e->getMessage());
            return back();
        }
    }
}
