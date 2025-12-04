<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\BusinessTransaction;
use App\Models\Payment\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TigoController extends Controller
{
    public function collect($phone, $amount, $trans_id)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Username' => 'HUMTECHICT',
            'Password' => 'lseelAj',
        ];

        $operator_reference_id = 'HUM' . now()->format('ymdHis') . rand(1000, 9999);

        $bussinessTransact = BusinessTransaction::where('unique_id', $trans_id)->first();
        if ($bussinessTransact) {
            $bussinessTransact->operator_reference_id = $operator_reference_id;
            $bussinessTransact->save();
        };

        $data = [
            "CustomerMSISDN" => formatPhoneNumber($phone),
            "Amount" => intval($amount),
            "ReferenceID" => $operator_reference_id,
        ];

        Log::info('Calling Tigo API with data: ', $data);


        $attempts = 0;
        $maxAttempts = 3;

        while ($attempts < $maxAttempts) {

            try {
                $response = Http::withHeaders($headers)
                    ->withoutVerifying()
                    ->post('https://mixx.papi.co.tz/api/tigo/push', $data);

                Log::info('Tigo API status: ' . $response->status());
                Log::info('Tigo API body: ' . $response->body());
                Log::info('Tigo API json: ', $response->json() ?? ['no_json' => true]);

                if ($response->successful()) {
                    return $response;
                }

                if (isset($response['error'])) {
                    Log::warning('Tigo API error: ' . json_encode($response['error']));
                }
            } catch (\Exception $e) {
                Log::error('Tigo API call failed: ' . $e->getMessage());
            }

            $attempts++;
            sleep(2);
        }

        Log::error('Tigo API failed after ' . $maxAttempts . ' attempts');
        return response()->json(['error' => 'Tigo API request failed'], 500);
    }
}


function formatPhoneNumber($phone)
{
    $phone = preg_replace('/\D/', '', $phone);

    if (strpos($phone, '0') === 0) {
        return '255' . substr($phone, 1);
    }

    if (strpos($phone, '255') === 0) {
        return $phone;
    }

    return '255' . $phone;
}
