<?php

namespace App\Jobs;

use App\Http\Controllers\Payment\VodacomController;
use App\Traits\SMSTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $phone;
    protected string $amount;
    protected string $unique_id;

    /**
     * Create a new job instance.
     */
    public function __construct($phone, $amount, $unique_id)
    {
        $this->phone = $phone;
        $this->amount = $amount;
        $this->unique_id = $unique_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        $this->smsTrait = new SMSTrait();
//        $this->smsTrait->sendBEEMSMS($this->phone, uniqid(), '123456');
//
        $vod = new VodacomController;
        $vod->sendToCustomer($this->phone, $this->amount, $this->unique_id);

    }
}
