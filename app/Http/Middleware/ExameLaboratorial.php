<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

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


        if($request->has(['data_resultado', 'rt_pcr_resultado_id'])) {
            if(is_null($request->input('data_coleta')) || is_null($request->input('sitio_tipo_id'))) {
                return response()->json([ 'message' => 'Os campos data_coleta e sitio_tipo_id são obrigatórios'],401);
            }
        }

        if($request->has(['resultado', 'data_realizacao'])) {
            if(is_null($request->input('resultado')) || is_null($request->input('data_realizacao'))) {
                return response()->json([ 'message' => 'Os campos resultado e data_realizacao são obrigatórios'],401);
            }
        }

        return $next($request);
    }
}
