<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class Paciente
{
    public function handle($request, Closure $next)
    {
        $rules = [
            'paciente_id' => 'required|exists:pacientes,id',
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

        return $next($request);
    }
}
