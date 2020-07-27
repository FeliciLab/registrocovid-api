<?php

namespace App\Http\Controllers\Api;

use App\Models\Historico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    private $historico;

    public function __construct(Historico $historico)
    {
        $this->historico = $historico;
    }

    public function show()
    {
        return response()->json(["msg" => "teste"]);
    }

    public function store(Request $request)
    {
        return response()->json($request->all());
    }
}
