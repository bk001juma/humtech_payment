<?php

namespace App\Models;

use App\Models\Merchant\Business;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TempOTP extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'user_id',
        'business_id',
        'otp',
        'phone',
        'otp_expires_at',
        'otp_session',
        ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
