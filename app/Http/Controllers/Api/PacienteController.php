<?php

namespace App\Http\Controllers\Api;

use App\Models\Paciente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PacienteRequest;
use App\Repositories\PacienteRepository;

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
    
    public function index(Request $request)
    {
        $orderBy = 'created_at';
        $order = 'DESC';

        if ($request->has('order_by')) {
            $orderBy = $request->get('order_by');
        }

        if ($request->has('order')) {
            $order = $request->get('order');
        }

        $pacientes = $this->paciente;

        $pacienteRepository = new PacienteRepository($pacientes, $request);

        if ($request->has('conditions')) {
            $pacientes = $pacienteRepository->selectConditions($request->get('conditions'));
        }

        $coletador_id = auth()->user()->id;

        $pacientes = $pacienteRepository->getPacientes($coletador_id, $orderBy, $order);

        if($request->has('fields')) {
            $pacientes = $pacienteRepository->selectFields($request->get('fields'));
        }

        return response()->json($pacientes->get());
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
}
