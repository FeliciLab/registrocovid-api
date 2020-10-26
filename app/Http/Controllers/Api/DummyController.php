<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DummyRequest;
use App\Api\ErrorMessage;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Models\Paciente;

class DummyController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DummyRequest $request)
    {
        try {
            $coletadorId = env('DUMMY_ID');
            if (env('DB_CONNECTION') == "pgsql_test") {
                $coletadorId = $request->id;
            }

            $dummy = Paciente::where('coletador_id', $coletadorId)->get();
            foreach ($dummy as &$value) {
                $value->delete();
            }

            return response()->json("Todos os dados foram apagados", 200);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
