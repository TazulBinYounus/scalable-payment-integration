<?php

namespace App\Interfaces;

interface PaymentGatewayInterface
{
  public function initiate(array $data): array;

  public function validate(array $data): bool;

  public function callback(array $data): array;
}
