<?php

namespace App\Http\Controllers\Payment;



use App\Http\Controllers\Controller;
use App\Models\Payment\Operator;
use Illuminate\Support\Facades\Http;

class VodacomController extends Controller
{
    public function sendToCustomer()
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $data = [
            "input_Amount" => "500.00",
            "input_Country" => "TZN",
            "input_Currency" => "TZS",
            "input_CustomerMSISDN" => "255765204506",
            "input_ServiceProviderCode" => "311936",
            "input_ThirdPartyConversationID" => "asv02e5958774f7ba228d83dd0d6897B",
            "input_TransactionReference" => "T1234B",
            "input_PurchasedItemsDesc" => "Shoes"
        ];

        return $this->execute('c2b',$data);

    }

    public function getSession()
    {
        return $this->execute('session');
    }


    public function execute($action,$data = null)
    {
        a:
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $operator = Operator::where('id',1)->first();

        //        Change pub key
        $public_key = $operator->public_key;
        $api_key    = $action == 'session' ? $operator->api_key : $operator->active_session_key;

        $token = $this->generateAccessToken($api_key,$public_key);

        switch ($action) {
            case 'session': $target = 'getSession/' ; break;
            case 'c2b': $target = 'c2bPayment/singleStage/' ; break;
            default: $target = 'getSession/'; break;
        }

        if ($action == 'session'){
            $response = Http::withHeaders([
                'Origin' => '*',
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ])->get('https://openapi.m-pesa.com/openapi/ipg/v2/vodacomTZN/'.$target);
            $operator->active_session_key = $response['output_SessionID'];
            $operator->save();
        }else{
            $response = Http::withHeaders([
                'Origin' => '*',
                'Authorization' => 'Bearer ' .$token,
                'Accept' => 'application/json',
            ])->post('https://openapi.m-pesa.com/openapi/ipg/v2/vodacomTZN/'.$target,$data);

            if ($response->status() != 201) {
                $this->getSession();
                goto a;
            }

            return response()->json([$response->json(),$response->status(),$response->headers()]);
        }

        return true;
    }


    public function generateAccessToken($api_key, $public_key)
    {
        $context = array( "public_key" => "-----BEGIN PUBLIC KEY-----\n" . $public_key . "\n-----END PUBLIC KEY-----", "api_key" => $api_key);

        // Load the public key
        $public_key_pem = $context['public_key'];
        $public_key = openssl_pkey_get_public($public_key_pem);

        if (!$public_key) {
            die('Loading Public Key Failed');
        }

        openssl_public_encrypt($context['api_key'], $encrypted_key, $public_key,OPENSSL_PKCS1_PADDING);

        return base64_encode($encrypted_key);
    }

}
