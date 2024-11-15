<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\BusinessTransaction;
use App\Models\Payment\AirtelCallback;
use App\Models\Payment\Operator;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AirtelController extends Controller
{
    public function getToken()
    {
        $operator = Operator::where('id',2)->first();

        $data = [
            "client_id"=> env('AIRTEL_CLIENT_ID'),
            "client_secret"=> env('AIRTEL_CLIENT_SECRET'),
            "grant_type"=> "client_credentials"
        ];

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://openapi.airtel.africa/auth/oauth2/token/',$data);

        $operator->active_session_key = $response['access_token'];
        $operator->save();

        return response()->json([$response->json(),$response->status(),$response->headers()]);
    }

    public function keys()
    {
        $operator = Operator::where('id',2)->first();

        $headers = [
//            'Accept' => '*/* ',
            'Authorization' => 'Bearer '.$operator->active_session_key,
            'Content-Type' => 'application/json',
            'X-Country' => 'TZ',
            'X-Currency' => 'TZS',
        ];


        $response = Http::withHeaders($headers)
            ->get('https://openapi.airtel.africa/v1/rsa/encryption-keys');

        $operator->public_key = $response['data']['key'];
        $operator->save();

        return response()->json([$response->json(),$response->status(),$response->headers()]);
    }

    public function collect($phone,$amount,$trans_id)
    {
        a:
        $operator = Operator::where('id',2)->first();

        $headers = [
            'Accept' => '*/* ',
            'Content-Type' => 'application/json',
            'X-Country' => 'TZ',
            'X-Currency' => 'TZS',
            'Authorization' => 'Bearer '.$operator->active_session_key,
        ];


        $data = [
            "reference" => $trans_id,
            "subscriber" => [
                "country" => "TZ",
                "currency" => "TZS",
                "msisdn" => preg_replace('/^255/', '', $phone)
            ],
            "transaction" => [
                "amount" => $amount,
                "country" => "TZ",
                "currency" => "TZS",
                "id" => $trans_id
            ]
        ];


        $response = Http::withHeaders($headers)->post('https://openapi.airtel.africa/merchant/v1/payments/',$data);


        if (isset($response['error_description']) || isset($response['error'])) {
            $this->getToken();
            goto a;
        }

        return $response;
    }

    public function disbursement()
    {
        b:
        $operator = Operator::where('id',2)->first();

        $headers = [
            'Accept' => '*/* ',
            'Content-Type' => 'application/json',
            'X-Country' => 'TZ',
            'X-Currency' => 'TZS',
            'Authorization' => 'Bearer '.$operator->active_session_key,
        ];

        $context = array( "public_key" => "-----BEGIN PUBLIC KEY-----\n" . $operator->public_key . "\n-----END PUBLIC KEY-----", "api_key" => env('AIRTEL_KEY'));

        // Load the public key
        $public_key_pem = $context['public_key'];
        $public_key = openssl_pkey_get_public($public_key_pem);

        openssl_public_encrypt($context['api_key'], $encrypted_key,$public_key,OPENSSL_PKCS1_PADDING);

        $key = base64_encode($encrypted_key);

        $data = [
            "payee" => [
                "msisdn" => "785008133"
            ],
            "reference" => "VOCHA-PAY",
            "pin" => $key,
            "transaction" => [
                "amount" => 1000,
                "id" => "vocha-pay-A"
            ]
        ];

        $response = Http::withHeaders($headers)->post('https://openapi.airtel.africa/standard/v1/disbursements/',$data);

        if (isset($response['error']) || isset($response['error'])){
            $this->getToken();
            goto b;
        }

        return response()->json([$response->json(),$response->status(),$response->headers()]);
    }

    public function callBack(Request $request)
    {
        $trans = $request['transaction'];
        $trans['raw_response'] = $request;
        $trans['operator_id'] = 2;
        $trans['request_id'] = $request['transaction']['id'];

        unset($trans['id']);

        $callback = AirtelCallback::create($trans);

        $transaction = BusinessTransaction::where('unique_id',$trans['request_id'])->first();

        $transaction->status = $callback->status_code == "TS" ? 'paid' : 'failed';
        $transaction->message = $callback->message;
        $transaction->operator_transaction_id = $callback->airtel_money_id;

        $transaction->save();

        return response()->json('success');
    }


//    public function response()
//    {
//        $res = [
//    {
//        "data": {
//            "transaction": {
//                "id": "payment6737596f95a46",
//                "status": "Success."
//            }
//        },
//        "status": {
//            "response_code": "DP00800001006",
//            "code": "200",
//            "success": true,
//            "result_code": "ESB000010",
//            "message": "Success."
//        }
//    },
//    200,
//    {
//        "content-type": [
//            "application/json"
//        ],
//        "transfer-encoding": [
//            "chunked"
//        ],
//        "x-kong-upstream": [
//            "dev-portal-ha-tz"
//        ],
//        "x-response-trace-id": [
//            "0b1abda469b94a44bafb0dba5ad40b64",
//            "7691f8ccab2f4324a95b6eb246acbc62"
//        ],
//        "x-client-id": [
//            "mfs-router",
//            "mfs-caterpiller"
//        ],
//        "x-content-type-options": [
//            "nosniff"
//        ],
//        "x-xss-protection": [
//            "1; mode=block"
//        ],
//        "cache-control": [
//            "no-cache, no-store, max-age=0, must-revalidate"
//        ],
//        "pragma": [
//            "no-cache"
//        ],
//        "expires": [
//            "0"
//        ],
//        "x-frame-options": [
//            "SAMEORIGIN"
//        ],
//        "content-security-policy": [
//            "object-src 'none'; script-src 'self'; script-src-elem 'self'; base-uri 'self'"
//        ],
//        "date": [
//            "Fri, 15 Nov 2024 14:24:02 GMT"
//        ],
//        "strict-transport-security": [
//            "max-age=31536000; includeSubDomains; preload;"
//        ]
//    }
//]
//    }
}
