<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Droga;
use App\Http\Requests\DrogaRequest;

class DrogaController extends Controller
{

    private $droga;

    public function __construct(Droga $droga)
    {
        $this->droga = $droga;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drogas = $this->droga->all();
        
        return response()->json($drogas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrogaRequest $request)
    {
        $data = $request->all();

        $droga = $this->droga->create($data);

        return response()->json($droga);
    }
}
