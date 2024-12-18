<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\PaymentGatewayFactory;
use App\Http\Requests\InitiatePaymentRequest;

class PaymentController extends Controller
{
  public function initiatePayment(InitiatePaymentRequest $request)
  {
    // Get the structured payment data
    $paymentData = PaymentController::preparePaymentData($request);

    // Get the payment gateway instance
    $gateway = PaymentGatewayFactory::make($request->payment_method);

    // Initiate the payment with the prepared data
    $response = $gateway->initiate($paymentData);

    // Return the response
    return response()->json($response);
  }

  public function handleCallback(Request $request, $paymentMethod)
  {

    $gateway = PaymentGatewayFactory::make($paymentMethod);

    if ($gateway->validate($request->all())) {
      return response()->json(['message' => 'Payment Successful']);
    }

    return response()->json(['message' => 'Payment Validation Failed'], 400);
  }

  public function paymentSuccess(Request $request)
  {
    $this->handleCallback($request, $request->value_a);
    // Logic for successful payment
    return response()->json(['message' => 'Payment was successful!']);
  }

  public function paymentFail(Request $request)
  {
    // Logic for failed payment
    return response()->json(['message' => 'Payment failed!']);
  }

  public function paymentCancel(Request $request)
  {
    // Logic for canceled payment
    return response()->json(['message' => 'Payment was canceled!']);
  }

  public static function preparePaymentData($request)
  {
    return [
      'amount' => $request->amount,
      'total_amount' => $request->amount,
      'currency' => 'BDT',
      'tran_id' => uniqid(),
      'product_name' => 'Computer',
      'product_category' => 'eCom',
      'product_profile' => 'general',
      'success_url' => route('payment.success'),
      'fail_url' => route('payment.fail'),
      'cancel_url' => route('payment.cancel'),
      'cus_name' => $request->name,
      'cus_email' => $request->email,
      'cus_phone' => $request->phone,
      'cus_add1' => 'Dhaka, BD',
      'cus_add2' => 'Dhaka, BD',
      'cus_postcode' => '1216',
      'cus_phone' => $request->phone,
      'cus_city' => 'Dhaka',
      'cus_country' => 'BD',
      'shipping_method' => 'COD',
      'ship_name' => 'Tazul',
      'ship_add1' => 'Mirpur',
      'ship_city' => 'Dhaka',
      'ship_postcode' => '1212',
      'ship_country' => 'BD',
      'value_a' => 'sslcommerz',
    ];
  }
}
