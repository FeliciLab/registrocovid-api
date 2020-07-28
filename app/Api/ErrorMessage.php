<?php

namespace App\Api;

class ErrorMessage
{
  private $message = [];
  private $statusCode;

  public function __construct(string $message, int $statusCode) 
  {
    $this->message['message'] = $message;

    if ($statusCode) {
      $this->statusCode = $statusCode;
    } else {
      $this->statusCode = 500;
    }
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