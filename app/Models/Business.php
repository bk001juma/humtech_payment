<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'tariff_percentage',
        'name',
        'phone',
        'email',
        'tin',
        'category',
        'logo',
        'token',
        'balance',
        'actual_balance',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function otp()
    {
        return $this->hasOne(TempOTP::class);
    }
}