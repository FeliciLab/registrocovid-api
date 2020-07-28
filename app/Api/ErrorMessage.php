<?php

namespace App\Api;

class ErrorMessage
{
  private $message = [];

  public function __construct(string $message) 
  {
    $this->message['message'] = $message;
  }

  public function getMessage()
  {
    return $this->message;
  }
}