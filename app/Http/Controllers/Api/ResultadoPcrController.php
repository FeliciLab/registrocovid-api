<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RtPcrResultado;
use Illuminate\Http\Request;

class ResultadoPcrController extends Controller
{
    public function index()
    {
        return RtPcrResultado::all()->toArray();
    }
}
