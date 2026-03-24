<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function pay(Request $request)
    {
        $payload = [
            'invoice' => [
                'total_amount' => 100,
                'description' => 'Abonnement mensuel de 100 FCFA'
            ],
            'store' => [
                'name' => 'Mon Application Laravel'
            ],
            'actions' => [
                'cancel_url' => route('subscription.cancel'),
                'return_url' => route('subscription.success'),
                'callback_url' => route('subscription.callback')
            ]
        ];

        $response = Http::withHeaders([
            'PAYDUNYA-MASTER-KEY' => env('PAYDUNYA_MASTER_KEY'),
            'PAYDUNYA-PRIVATE-KEY' => env('PAYDUNYA_PRIVATE_KEY'),
            'PAYDUNYA-TOKEN' => env('PAYDUNYA_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.paydunya.com/api/v1/checkout-invoice/create', $payload);

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['response_code']) && $data['response_code'] === '00') {
                return redirect($data['url']);
            }
        }

        return back()->with('error', 'Erreur de connexion avec l\'API PayDunya: ' . $response->body());
    }

    public function success(Request $request)
    {
        return view('subscription.success');
    }

    public function cancel()
    {
        return view('subscription.cancel');
    }

    public function callback(Request $request)
    {
        // IPN from PayDunya validation
        $hash = $request->header('PAYDUNYA-WEBHOOK-HASH');

        // Custom logic to verify payment success
        // DB update logic here...

        return response()->json(['status' => 'ok']);
    }
}
