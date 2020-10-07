<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;
use App\Models\Paciente as PacienteModel;

class Paciente
{
    public function handle($request, Closure $next)
    {
        $rules = [
            'paciente_id' => 'required|int|exists:pacientes,id',
        ];

        $validator = Validator::make(['paciente_id' => $request->route('pacienteId')], $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                  'message' => 'Campos inválidos.',
                  'errors' => $validator->errors()
              ],
                422
            );
        }

        $paciente = PacienteModel::find($request->route('pacienteId'));

        if (!$paciente) {
            return response()->json([
                'message' => 'Permissões insuficientes.',
                'errors' => ['paciente_id' => 'Esse paciente não pertence a você.'],
            ], 401);
        };

        return $next($request);
    }
}
