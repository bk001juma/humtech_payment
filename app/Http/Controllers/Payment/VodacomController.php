<?php

namespace App\Http\Controllers\Payment;



use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\Vodacom\APIContext;
use App\Http\Controllers\Payment\Vodacom\APIRequest;
use App\Models\Payment\Operator;
use Illuminate\Http\Request;

class VodacomController extends Controller
{
    public function createSession()
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $operator = Operator::where('id',1)->first();

        $public_key = $operator->public_key;
        $api_key    = $operator->api_key;

        $context = new APIContext();

        // Api key
        $context->set_api_key($api_key);

        // Public key
        $context->set_public_key($public_key);

//        return get_class($context);

        // Create a request object
        $request = new APIRequest($context);

        // Generate BearerToken
        $token = $request->create_bearer_token();

        return $token ;
    }
}
