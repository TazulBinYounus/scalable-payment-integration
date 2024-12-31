<?php

namespace App\Factories;

use App\Interfaces\PaymentGatewayInterface;
use App\Services\PaymentGateways\SSLCommerzPaymentGateway;
use App\Services\PaymentGateways\BkashPaymentGateway;

class PaymentGatewayFactory
{
  public static function make(string $gateway): PaymentGatewayInterface
  {
    return match ($gateway) {
      'sslcommerz' => new SSLCommerzPaymentGateway(),
      'bkash' => new BkashPaymentGateway(), // It's a dummy implementation of bKash, You can add more payment method here!
      default => throw new \InvalidArgumentException("Unsupported payment gateway: $gateway"),
    };
  }
}
