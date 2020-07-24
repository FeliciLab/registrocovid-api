<?php

namespace App\Repositories;

class PacienteRepository extends AbstractRepository
{
  public function getPacientes($coletador_id, $orderBy, $order)
  {
    return $this->model->where('coletador_id', $coletador_id)->orderBy($orderBy, $order);
  }
}