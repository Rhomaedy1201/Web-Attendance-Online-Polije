<?php

namespace App\Http\Controllers;

use App\Repositories\TeknisiRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeknisiController extends Controller
{
    protected $param;

    public function __construct(TeknisiRepository $teknisi){
        $this->param = $teknisi;
    }

    public function index(Request $request)
    {
        $limit = $request->has('page_length') ? $request->get('page_length') : 5;
        $search = $request->has('search') ? $request->get('search') : null;
        $teknisi = $this->param->getAll($search, $limit);
        return view("pages.teknisi.index", compact("teknisi"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.teknisi.create");
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
        return view("pages.teknisi.edit", compact("id"));
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
