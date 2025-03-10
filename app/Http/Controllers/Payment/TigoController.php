<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TigoController extends Controller
{
    public function collect($phone, $amount, $trans_id)
    {
        a:
        $operator = Operator::where('id', 3)->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Username' => 'HUMTECHICT',
            'Password' => 'lseelAj',
        ];


        $data = [
            "reference" => $trans_id,
            "CustomerMSISDN" => preg_replace('/^255/', '', $phone),
            "Amount" => $amount,
            "ReferenceID" => 'HUM20170724170908',
        ];

        $response = Http::withHeaders($headers)->post('https://44.234.229.98:9080/api/tigo/push', $data);

        if (isset($response['error'])) {
            goto a;
        }

        return $response;
    }
}
