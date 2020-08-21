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

    public function __construct(Model $model, Request $request)
    {
        $this->model = $model;

        if ($request->has('conditions')) {
            $this->selectConditions($request->get('conditions'));
        }

        if ($request->has('fields')) {
            $this->selectFields($request->get('fields'));
        }

        $this->order(
            $request->get('order_by', 'created_at'),
            $request->get('order', 'DESC')
        );
    }

    public function selectFields($fields)
    {
        $this->model = $this->model->selectRaw($fields);
    }

    public function selectConditions($conditions)
    {
        $expressions = explode(';', $conditions);

        foreach ($expressions as $e) {
            $exp = explode(':', $e);
            $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
        }
    }

    public function buildWhere($x, $operator, $y)
    {
        $this->model = $this->model->where($x, $operator, $y);
    }

    public function order($orderBy, $order)
    {
        $this->model = $this->model->orderBy($orderBy, $order);
    }

    public function getResult()
    {
        return $this->model->get();
    }

    public function getModel()
    {
        return $this->model;
    }
}
