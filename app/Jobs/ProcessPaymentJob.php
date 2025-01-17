<?php

namespace App\Jobs;

use App\Http\Controllers\Payment\VodacomController;
use App\Models\Merchant\BusinessProduct;
use App\Models\Merchant\BusinessTransaction;
use App\Traits\SMSTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Async\Pool;
class ProcessPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 120;

    protected string $phone;
    protected string $amount;
    protected string $unique_id;
    private BusinessTransaction $transaction;
    private BusinessProduct $product;

    /**
     * Create a new job instance.
     */
    public function __construct($phone, $amount, $unique_id, BusinessTransaction $transaction,BusinessProduct $product)
    {
        $this->phone = $phone;
        $this->amount = $amount;
        $this->unique_id = $unique_id;
        $this->transaction = $transaction;
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pool = Pool::create()->timeout(50);

        $transaction = $this->transaction;
        $product = $this->product;
        $amount = $this->amount;
        $phone = $this->phone;
        $unique_id = $this->unique_id;


        $pool->add(function () use ($transaction, $amount, $phone, $unique_id) {

            $vod = new VodacomController;
            return $vod->sendToCustomer($phone, $amount, $unique_id);

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

        $product->balance = $product->transactions()->where('status','paid')->sum('amount');

        $product->save();

    }
}
