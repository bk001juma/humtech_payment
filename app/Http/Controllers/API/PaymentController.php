<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\AirtelController;
use App\Http\Controllers\Payment\TigoController;
use App\Http\Controllers\Payment\VodacomController;
use App\Jobs\ProcessPaymentJob;
use App\Models\Merchant\BusinessProduct;
use App\Models\Merchant\BusinessTransaction;
use App\Models\Payment\Operator;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Async\Pool;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {

        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $req = $request->headers->all();

        $key = base64_decode(str_replace('Basic ', '', $req['authorization'][0]));

        $product = BusinessProduct::where('api_key', $key)->first();

        if (!isset($product->id)) {
            return response()->json(['message' => 'invalid key'], status: 401);
        }

        if (isset($product->id)) {
            $phone = $request['phone'];
            $trans_id = $request['transaction_id'];
            $amount = $request['amount'];
            $note = $request['reg'];
            $operator_id = 0;

            if (!str_starts_with($phone, '255')) {
                return response()->json(['message' => 'invalid phone number'], 400);
            } else {
                $new_no = preg_replace('/^255/', '', $phone);
                switch (substr($new_no, 0, 2)) {
                    case '76':
                    case '75':
                    case '74':
                        $operator_id = 1;
                        break;
                    case '68':
                    case '79':
                    case '78':
                        $operator_id = 2;
                        break;
                    case '67':
                    case '77':
                    case '71':
                    case '65':
                        $operator_id = 3;
                        break;
                }
            }

            $old_transaction = BusinessTransaction::where('customer_id', $trans_id)->first();
            // if (isset($old_transaction->id)) {
            //     return response()->json(['message' => 'Transaction id already exists'], 400);
            // } ooo

            if ($operator_id == 0) {
                return response()->json(['message' => 'Invalid operator'], 400);
            }

            //            return $operator = Operator::find($operator_id);

            $transaction = new BusinessTransaction;
            $transaction->phone_number = $phone;
            $transaction->business_id = $product->business->id;
            $transaction->operator_id = $operator_id;
            $transaction->amount = $amount;
            $transaction->unique_id = uniqid($operator_id == 1 ? 'vod_' : ($operator_id == 2 ? 'air' : 'mixx_'));
            $transaction->customer_id = $trans_id;
            $transaction->note = $note;
            $transaction->type = 'credit';
            $transaction->charges = $amount * $product->business->tariff_percentage / 100;
            $transaction->transaction_date = Carbon::now();
            $transaction->message = 'Transaction received';

            $product->transactions()->save($transaction);

            $pool = Pool::create()->timeout(30);

            if ($operator_id == 1) {

                $pool->add(function () use ($transaction, $amount, $phone, $product) {

                    $vod = new VodacomController;
                    return $vod->sendToCustomer($phone, $amount, $transaction->unique_id, $transaction->customer_id);
                })->then(function ($output) use ($transaction, $pool) {

                    $transaction->message = $output['output_ResponseDesc'];
                    $transaction->operator_transaction_id = $output['output_TransactionID'];
                    $transaction->operator_conversation_id = $output['output_ConversationID'];
                    $transaction->status = "paid";
                    $transaction->save();

                    $pool->stop();
                })->catch(function ($exception) use ($transaction) {
                    // When an exception is thrown from within a process, it's caught and passed here.
                    $transaction->message = $exception->getMessage();
                    $transaction->status = "voda_failed";
                    $transaction->save();
                })->timeout(function () use ($transaction) {
                    // A process took too long to finish.
                    $transaction->message = "Timed Out";
                    $transaction->status = "failed";
                    $transaction->save();
                });


                $pool->wait();
                //
                //                ProcessPaymentJob::dispatch($phone,$amount, $transaction->unique_id, $transaction, $product);

            } elseif ($operator_id == 2) {
                Log::debug('Starting Operator 2 for transaction: ' . $transaction->unique_id);


                $pool->add(function () use ($transaction, $amount, $phone) {
                    $air = new AirtelController();
                    return $air->collect($phone, $amount, $transaction->unique_id);
                })->then(function ($output) use ($transaction, $pool) {
                    Log::info('Operator 2 output: ' . $output);

                    if ($output->status() != 200) {
                        $transaction->message = "Failed";
                        $transaction->status = "failed";
                    } else {
                        $transaction->message = $output->json()['data']['transaction']['status'];
                        $transaction->status = "pending";
                    }
                    $transaction->save();

                    $pool->stop();
                })->catch(function ($exception) use ($transaction) {
                    Log::error('Operator 2 failed: ' . $exception->getMessage());

                    // When an exception is thrown from within a process, it's caught and passed here.
                    $transaction->message = $exception->getMessage();
                    $transaction->save();
                })->timeout(function () use ($transaction) {
                    Log::warning('Operator 2 timed out');

                    // A process took too long to finish.
                    $transaction->message = "Timed Out";
                    $transaction->save();
                });
            } elseif ($operator_id == 3) {
                Log::debug('Starting Operator 3 for transaction: ' . $transaction->unique_id);

                $pool->add(function () use ($transaction, $amount, $phone) {
                    $mixx = new TigoController();
                    return $mixx->collect($phone, $amount, $transaction->unique_id);
                })->then(function ($output) use ($transaction, $pool) {
                    Log::info('Operator 3 output: ' . $output);

                    if ($output->status() != 200) {
                        $transaction->message = "Failed";
                        $transaction->status = "failed";
                    } else {
                        $transaction->message = $output->json()['ResponseDescription'];
                        $transaction->status = "pending";
                    }
                    $transaction->save();

                    $pool->stop();
                })->catch(function ($exception) use ($transaction) {
                    Log::error('Operator 3 failed: ' . $exception->getMessage());

                    // When an exception is thrown from within a process, it's caught and passed here.
                    $transaction->message = $exception->getMessage();
                    $transaction->save();
                })->timeout(function () use ($transaction) {
                    Log::warning('Operator 3 timed out');
                    // A process took too long to finish.
                    $transaction->message = "Timed Out";
                    $transaction->save();
                });
            }


            $pool->wait();
            Log::debug('Pool finished for transaction: ' . $transaction->unique_id);

            $product->balance = $product->transactions()->where('status', 'paid')->sum('amount');

            $product->save();

            return response()->json(['message' => 'Transaction processed', 'transaction_id' => $transaction->unique_id], 202);
        } else {
            return response(['message' => 'invalid key'], status: 401);
        }
    }

    public function checkStatus(Request $request, $id)
    {
        try {

            $req = $request->headers->all();

            $key = base64_decode(str_replace('Basic ', '', $req['authorization'][0]));

            Log::info('Authorization Key Extracted', ['key' => $key]);

            $product = BusinessProduct::where('api_key', $key)->first();

            if (!isset($product->id)) {
                Log::warning('Invalid API Key', ['key' => $key]);
                return response()->json(['message' => 'invalid key'], 401);
            }

            $transaction = BusinessTransaction::where('unique_id', $id)->first();

            if (!isset($transaction->id)) {
                Log::warning('Invalid Transaction ID', ['transaction_id' => $id]);
                return response()->json(['message' => 'invalid transaction id'], 400);
            }

            Log::info('Transaction Found', ['transaction_id' => $transaction->unique_id, 'status' => $transaction->status]);

            if ($transaction->status == "paid") {
                Log::info('Transaction Paid', ['operator_transaction_id' => $transaction->operator_transaction_id]);
                return response()->json(['message' => 'paid', 'operator_transaction_id' => $transaction->operator_transaction_id],  202);
            } else {
                Log::info('Transaction Pending', ['transaction_id' => $transaction->unique_id]);
                return response()->json(['message' => 'pending'],  205);
            }
        } catch (Exception $e) {

            Log::error('Error in checkStatus method', [
                'error_message' => $e->getMessage(),
                'transaction_id' => $id
            ]);
            return response()->json(['message' => 'An error occurred while checking the status'], 500);
        }
    }
}
