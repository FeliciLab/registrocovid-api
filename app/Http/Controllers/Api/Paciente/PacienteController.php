<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteStoreRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Exception;
use App\Repositories\PacienteRepository;

class PacienteController extends Controller
{
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

        $pacientes = $pacienteRepository->buildWhere('coletador_id', '=', $coletador_id);

        if ($request->has('fields')) {
            $pacientes = $pacienteRepository->selectFields($request->get('fields'));
        }

        return response()->json($pacienteRepository->getResult()->get());
    }

    public function store(PacienteStoreRequest $request)
    {
        try {
            $paciente = Paciente::create(array_merge(
                $request->post(),
                [
                    'coletador_id' => auth()->user()->id,
                    'instituicao_id' => auth()->user()->instituicao_id
                ]
            ));
            $paciente->associarPacienteTipoSuporteRespiratorio($request->post());

            return response()->json(
                [
                    'message' => 'Paciente cadastrado com sucesso',
                    'paciente' => $paciente->toArray()
                ],
                201
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
