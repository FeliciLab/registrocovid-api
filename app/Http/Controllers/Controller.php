<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\LengthAwarePaginator;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Registro Covid API",
     *      description="API do projeto Registro Covid",
     *      @OA\Contact(
     *          email="email@test.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Registro Covid API"
     * )

     *
     * @OA\Tag(
     *     name="Recursos",
     *     description="API Endpoints de recursos do projeto"
     * )
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function paginationResolver($data, $step, $total, $current_page)
    {
        $starting_point = ($current_page * $step) - $step;
        $data_sliced = array_slice($data, $starting_point, $step);
        $paginate = new LengthAwarePaginator($data_sliced, $total, $step, $current_page);
        return $paginate;
    }
}
