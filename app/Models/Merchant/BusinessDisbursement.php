<?php

namespace App\Models\Merchant;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessDisbursement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'business_product_id',
        'business_id',
        'operator_id',
        'business_transaction_id',
        'approve_id',

        'channel',
        'company',
        'account_number',
        'amount',
        'status',
        'request_date',
        'approved_date',
        'rejected_date',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function approver()
    {
        return $this->hasOne(User::class,'id','approve_id');
    }
}
