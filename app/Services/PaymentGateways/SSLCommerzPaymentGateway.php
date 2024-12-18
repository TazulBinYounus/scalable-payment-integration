<?php

namespace App\Services\PaymentGateways;

// use App\Contracts\PaymentGatewayInterface;

use App\Interfaces\PaymentGatewayInterface;
use App\Library\SslCommerz\SslCommerzNotification;

class SSLCommerzPaymentGateway implements PaymentGatewayInterface
{
  public function initiate(array $data): array
  {
    $sslcommerz = new SslCommerzNotification();
    $response = $sslcommerz->makePayment($data, 'hosted');
    return [
      'status' => 'initiated',
      'data' => $response
    ];
  }

  public function validate(array $data): bool
  {
    $sslcommerz = new SslcommerzNotification();
    return $sslcommerz->orderValidate($data, $data['tran_id'], $data['amount'], $data['currency']);
  }

  public function callback(array $data): array
  {
    return $data; // Process callback data
  }
}
