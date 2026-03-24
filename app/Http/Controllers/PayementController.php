<?php

namespace App\Http\Controllers;

use App\Services\DexpayService;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function pay(DexpayService $dexpayService){

        $reference = "ORDER_" . uniqid();

        $data = [
            "reference" => $reference,
            "item_name" => "Commande Tailleur Premium",
            "amount" => 100,
            "currency" => "XOF",
            "countryISO" => "SN",

            "success_url" => url('/payment/success?ref=' . $reference),
            "failure_url" => url('/payment/failed?ref=' . $reference),
            "webhook_url" => url('/api/webhook/dexpay'),

            "customer" => [
                "phone" => "773757077",
                "email" => "abdallahdiouf.dev@gmail.com",
                "name" => "Abdallah Diouf"
            ]
        ];

        $response = $dexpayService->createCheckoutSession($data);

        // 🔍 DEBUG
        if (!isset($response['data'])) {
            return response()->json($response, 500);
        }

        // ✅ choisir URL
        $paymentUrl = $response['data']['payment_url']
            ?? $response['data']['payment_url'];

        return redirect($paymentUrl);
    }


    public function success(Request $request)
    {
        $reference = $request->query('ref');

        return "✅ Paiement réussi pour : " . $reference;
    }

    public function failed(Request $request)
    {
        $reference = $request->query('ref');

        return "❌ Paiement échoué pour : " . $reference;
    }

    public function webhook(Request $request)
    {
        $data = $request->all();

        $reference = $data['reference'] ?? null;
        $status = $data['status'] ?? null;

        if ($status === 'SUCCESS') {
            // ✅ marquer payé
        }

        if ($status === 'FAILED') {
            // ❌ marquer échoué
        }

        return response()->json(['ok']);
    }
}
