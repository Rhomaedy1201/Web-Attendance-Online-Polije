<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiResponse;
use App\Repositories\Api\HistoryApiRepository;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class HistoryApiController extends Controller
{
    use ApiResponse;
    protected $param;

    public function __construct(HistoryApiRepository $history)
    {
        $this->param = $history;
    }

    public function index(Request $request)
    {
        $tgl = is_null($request->tanggal) ? now()->format("Y-m") : $request->tanggal;
        $history = $this->param->getHistory($tgl);
        return $this->okApiResponse($history,  "Berhasil get History");
    }
}

