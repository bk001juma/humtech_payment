<?php

namespace App\Models\Merchant;

use App\Models\TempOTP;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'tariff',
        'name',
        'phone',
        'email',
        'tin',
        'category',
        'logo',
        'token',
        'balance',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(BusinessProduct::class);
    }

    public function disbursements()
    {
        return $this->hasMany(BusinessDisbursement::class)->orderBy('created_at','desc');
    }

    public function transactions()
    {
        return $this->hasMany(BusinessTransaction::class);
    }

    public function otp()
    {
        return $this->hasOne(TempOTP::class)->orderBy('created_at','desc');
    }


}
