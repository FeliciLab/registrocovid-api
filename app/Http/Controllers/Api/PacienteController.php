<?php

namespace App\Http\Controllers\Api;

use App\Models\Paciente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PacienteRequest;

class PacienteController extends Controller
{
    /**
     * @var Paciente
     */
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }
    
    public function index()
    {
        $coletador_id = auth()->user()->id;
        $pacientes = $this->paciente->where('coletador_id', $coletador_id)->orderBy('created_at', 'DESC')->get();
        return response()->json($pacientes);
    }

    public function store(PacienteRequest $request)
    {
        $data = $request->all();

        $data["coletador_id"] = auth()->user()->id;

        $paciente = $this->paciente->create($data);
        return response()->json($paciente);
    }

    public function show(Request $request)
    {
        $id = $request->id;

        $paciente = $this->paciente->find($id);

        return response()->json($paciente);
    }

    public function update(PacienteRequest $request)
    {
        $id = $request->id;

        $body = $request->all();

        $paciente = $this->paciente->find($id);
        $paciente->update($body);

        return response()->json($paciente);
    }

    // public function destroy(Request $request)
    // {
    //     $id = $request->id;

    //     $paciente = $this->paciente->find($id);
    //     $paciente->delete();

    //     return response()->json(['data' => [ 'msg' => 'Paciente removido com sucesso ' ]]);
    // }
}
