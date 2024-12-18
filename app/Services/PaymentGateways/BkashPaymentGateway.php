<?php

namespace App\Services\PaymentGateways;

use App\Interfaces\PaymentGatewayInterface;


class BkashPaymentGateway implements PaymentGatewayInterface
{
  public function initiate(array $data): array
  {
    //its a dummy data,  You can implemet same as sslCommerz
    return [
      'status' => 'initiated',
      'data' => 'its a dummy data,  You can implemet same as sslCommerz'
    ];
  }

  public function validate(array $data): bool
  {
    //its a dummy data,  You can implemet same as sslCommerz
    return true;
  }

  public function callback(array $data): array
  {
    return $data; // Process callback data
  }
}
