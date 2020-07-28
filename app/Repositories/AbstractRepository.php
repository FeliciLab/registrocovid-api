<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class AbstractRepository
{

  /**
   * @var Model
   */
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
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

  public function buildWhere($x, $operator, $y)
  {
    return $this->model = $this->model->where($x, $operator, $y);
  }

  public function getResult()
  {
    return $this->model;
  }
}