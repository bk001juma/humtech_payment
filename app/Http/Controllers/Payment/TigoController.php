<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TigoController extends Controller
{
    public function getToken()
    {
        $operator = Operator::where('id', 3)->first();

        $response = Http::asForm()->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Cache-Control' => 'no-cache',
        ])->post('https://accessgwtest.tigo.co.tz:8443/Humtech2DM-GetToken', [
            'username' => 'HUMTECH',
            'password' => 'LVDt6hG',
            'grant_type' => 'password',
        ]);

        $data = $response->json();

        $operator->active_session_key = $data['access_token'];
        $operator->save();

        return $data;
    }

    public function makePayment(Request $request)
    {
        $token = Operator::where('id', 3)->first();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token->active_session_key,
            'Cache-Control' => 'no-cache',
        ])->post('https://accessgwtest.tigo.co.tz:8443/Humtech2DM-PushBillPay', [
            'CustomerMSISDN' => $request->customer_msisdn,
            'BillerMSISDN' => 25565151151,
            'Amount' => $request->amount,
            'Remarks' => $request->remarks ?? "Payments",
            'ReferenceID' => $request->reference_id,
        ]);

        if ($response->status() == 401) {
            // Token expired, get a new token and retry
            $this->getToken();
            $token = Operator::where('id', 3)->first();

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->active_session_key,
                'Cache-Control' => 'no-cache',
            ])->post('https://accessgwtest.tigo.co.tz:8443/Humtech2DM-PushBillPay', [
                'CustomerMSISDN' => $request->customer_msisdn,
                'BillerMSISDN' => 25565151151,
                'Amount' => $request->amount,
                'Remarks' => $request->remarks,
                'ReferenceID' => $request->reference_id,
            ]);
        }

        $data = $response->json();

        TigoPayment::create([
            'customer_msisdn' => $request->customer_msisdn,
            'biller_msisdn' => $request->biller_msisdn,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
            'reference_id' => $request->reference_id,
            'response_code' => $data['ResponseCode'],
            'response_status' => $data['ResponseStatus'],
            'response_description' => $data['ResponseDescription'],
            'response_data' => json_encode($data),
        ]);

        return $data;
    }

    public function callback(Request $request)
    {
        $payment = TigoPayment::where('reference_id', $request->ReferenceID)->first();

        if ($payment) {
            $payment->update([
                'response_code' => $request->ResponseCode,
                'response_status' => $request->ResponseStatus,
                'response_description' => $request->ResponseDescription,
                'callback_response_data' => json_encode($request->all()),
            ]);

            return response()->json([
                'ResponseCode' => 'BILLER-18-0000-S',
                'ResponseStatus' => true,
                'ResponseDescription' => 'Callback successful',
                'ReferenceID' => $request->ReferenceID,
            ]);
        }

        return response()->json([
            'ResponseCode' => 'BILLER-18-3020-E',
            'ResponseStatus' => false,
            'ResponseDescription' => 'Callback failed',
            'ReferenceID' => $request->ReferenceID,
        ]);
    }
}
