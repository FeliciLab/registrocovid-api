<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PacienteRepository
{

  /**
   * @var Model
   */
  private $model;

  /**
   * @var Request
   */
  private $request;

  public function __construct(Model $model, Request $request)
  {
    $this->model = $model;
    $this->request = $request;
  }

  public function selectFilter()
  {
    $data = '';

    if($this->request->has('fields')) {
      $fields = $this->request->get('fields');
      $data = $this->model->selectRaw($fields);
    }

    return $data;
  }
}