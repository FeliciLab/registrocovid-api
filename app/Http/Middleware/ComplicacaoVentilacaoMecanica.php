<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class ComplicacaoVentilacaoMecanica
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
        $rules = [
            'tipo_complicacao_id' => 'integer',
            'data_ventilacao_mec' => 'required_with:tipo_complicacao_id|date',
            'descricao' => 'nullable|string',
            'tipo_transfusao_id' => 'integer|exists:tipos_transfusao,id',
            'data_transfusao' => 'required_with:tipo_transfusao_id|date',
            'volume_transfusao' => 'nullable|regex:/^\d+(\.\d{1,2})?$/'
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
