<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TigoCallback extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'id',
        'operator_id',
        'raw_response',
        'request_id',
        'message',
        'status_code',
        'airtel_money_id',
    ];
}
