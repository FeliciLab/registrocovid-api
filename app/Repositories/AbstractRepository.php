<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class AbstractRepository
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

  public function selectFields($fields)
  {
    return $this->model->selectRaw($fields);
  }

  public function selectConditions($conditions)
  {
    $expressions = explode(';', $conditions);

    foreach($expressions as $e) {
      $exp = explode(':', $e);
      $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
    }
  }
}