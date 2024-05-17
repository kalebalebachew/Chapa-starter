<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class ChapaController extends Controller
{

  public function initializeTransaction(Request $request)
  {

    $refNo = "kaleb" . Str::random(10);
    $secretKey = env('CHAPA_SECRET_KEY'); 

    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . $secretKey,
      'Content-Type' => 'application/json',
    ])->post('https://api.chapa.co/v1/transaction/initialize', [
      "amount" => '1000',
      "currency" => "ETB",
      "first_name" => "Kaleb",
      "last_name" => "Alebachew", 
      "phone_number" => "0947827805",
      "tx_ref" => $refNo,
      "return_url" => "http://localhost:8000",
      "customization" => [
        "title" => "Chapa-starter",
        "description" => "something", 
      ]
    ]);

    if ($response->successful()) {
      $checkoutUrl = $response->json('data.checkout_url');
      return response()->json([
        'success' => true,
        'message' => 'Transaction initialized successfully.',
        'checkout_url' => $checkoutUrl
      ]);
    } else {
      return response()->json([
        'success' => false,
        'message' => 'Failed to initialize transaction: ' . $response->body()
      ], 500);
    }
  }

  public function handleWebhook(Request $request)
  {
    
    $txRef = $request->input('tx_ref');

    if (!$txRef) {
      Log::error('Webhook received without tx_ref');
      return response()->json(['error' => 'Missing transaction reference'], 400);
    }
   
    $data = $request->all();
    // do sth with the request object  for eg: updating a payment status in your db

    return response()->json(['status' => 'success'], 200);
  }
}
