<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Merchant\BusinessProduct;
use App\Models\Merchant\BusinessTransaction;
use App\Models\Payment\Operator;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {

        $req = $request->headers->all();

        $key = base64_decode(str_replace('Basic ','',$req['authorization'][0]));

        $product = BusinessProduct::where('api_key',$key)->first();

        if (isset($product->id)) {
            $phone = $request['phone'];
            $trans_id = $request['transaction_id'];
            $amount = $request['amount'];
            $operator_id = 0;

            if (!str_starts_with($phone, '255')){
                return response()->json(['message'=>'invalid phone number']);
            }else{
                $new_no = preg_replace('/^255/', '', $phone);
                switch (substr($new_no, 0, 2)) {
                    case '76':
                    case '75':
                    case '74': $operator_id = 1; break;
                    case '79':
                    case '78': $operator_id = 2; break;
                    case '67':
                    case '77':
                    case '71':
                    case '65': $operator_id = 3; break;
                }
            }

            $old_transaction = BusinessTransaction::where('initiator_id',$trans_id)->first();
            if (isset($old_transaction->id)) {
                return response()->json(['message'=>'Transaction id already exists']);
            }

            if ($operator_id == 0){
                return response()->json(['message'=>'Invalid operator']);
            }else{
                $operator = Operator::find($operator_id);
                return $operator;
            }

            $transaction = new BusinessTransaction;
            $transaction->phone = $phone;
            $transaction->operator_id = $trans_id;
            $transaction->initiator_id = $trans_id;

            $product->transaction;
        }else{
            return response(['message'=>'invalid key'],status: 401);
        }


    }
}
