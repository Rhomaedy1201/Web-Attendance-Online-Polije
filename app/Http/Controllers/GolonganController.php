<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Repositories\GolonganRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GolonganController extends Controller
{
    protected $param;

    public function __construct(GolonganRepository $golongan){
        $this->param = $golongan;
    }

    public function index(Request $request)
    {
        $limit = $request->has('page_length') ? $request->get('page_length') : 5;
        $search = $request->has('search') ? $request->get('search') : null;
        $golongan = $this->param->getAllGolongan($search, $limit);
        return view("pages.golongan.index", compact("golongan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.golongan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'golongan' => 'required|string',
            ]);

            $this->param->store($data);
            Alert::success("Berhasil", "Data Berhasil di Simpan.");
            return redirect()->route("master-data.golongan");
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
        $golongan = Golongan::findOrFail($id);
        return view("pages.golongan.edit", compact("golongan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'golongan' => 'required|string',
            ]);

            $this->param->update($data);
            Alert::success("Berhasil", "Data Berhasil di Edit.");
            return redirect()->route("master-data.golongan");
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
            $this->param->destroy($request->golongan);
            Alert::success("Berhasil", "Data Berhasil di Hapus.");
            return redirect()->route("master-data.golongan");
        } catch (\Exception $e) {
            Alert::error("Terjadi Kesalahan", $e->getMessage());
            return back();
        } 
    }
}
