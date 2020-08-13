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

        if (!$coletador) {
            return response()->json([ 'message' => 'Coletador inválido' ], 401);
        }

        return $next($request);
    }
}
