<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoCuidadoPaliativo;
use Illuminate\Http\Request;

class TipoCuidadoPaliativoController extends Controller
{
    public function index()
    {
        return TipoCuidadoPaliativo::all()->toArray();
    }
}
