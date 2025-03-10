<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\BusinessTransaction;
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

        $operator_reference_id = 'HUM' . now()->format('YmdHis') . rand(100, 999);

        $bussinessTransact = BusinessTransaction::where('unique_id', $trans_id)->first();
        if ($bussinessTransact) {
            $bussinessTransact->operator_reference_id = $operator_reference_id;
            $bussinessTransact->save();
        };

        $data = [
            "CustomerMSISDN" => formatPhoneNumber($phone),
            "Amount" => $amount,
            "ReferenceID" => $operator_reference_id,
        ];

        $response = Http::withHeaders($headers)->post('https://44.234.229.98:9080/api/tigo/push', $data);

        if (isset($response['error'])) {
            goto a;
        }

        return $response;
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
