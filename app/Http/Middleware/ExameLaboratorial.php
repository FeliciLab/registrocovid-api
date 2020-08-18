<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExameLaboratorial
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $coletador = DB::table('pacientes')->where([
                ['coletador_id', '=', auth()->user()->id],
                ['id', '=', $request->route('pacienteId')]
            ])->exists();

        if(!$coletador) {
            return response()->json([ 'message' => 'Coletador inválido' ],401);
        }

        $rules = [
            'data_coleta' => 'date',
            'sitio_tipo_id' => 'required_with:data_coleta|integer|exists:sitios_tipos,id',
            'resultado' => 'bool',
            'data_realizacao' => 'required_with:resultado|date'
        ];

        $validator = Validator::make($request->post(), $rules);

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
