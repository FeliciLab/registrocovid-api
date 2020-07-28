<?php

namespace App\Api;

class ErrorMessage
{
  private $message = [];
  private $statusCode;

  public function __construct(string $message, int $statusCode = 400) 
  {
    $this->message['message'] = $message;
    $this->statusCode = $statusCode;
  }

  public function getMessage()
  {
    return $this->message;
  }

  public function getCode()
  {
    return $this->statusCode;
  }
}