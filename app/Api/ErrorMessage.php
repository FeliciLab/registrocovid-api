<?php

namespace App\Api;

class ErrorMessage
{
  private $message;
  private $errors;

  public function __construct(string $message = '', array $errors = []) 
  {
    $this->message = $message;
    $this->errors = $errors;
  }

  public function getMessage()
  {
    return $this->message;
  }

  public function toArray()
  {
    return [
      'message' => $this->message,
      'errors' => $this->errors
    ];
  }
}