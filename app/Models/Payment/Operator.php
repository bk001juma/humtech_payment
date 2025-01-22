<?php

namespace App\Models\Payment;

use App\Models\Merchant\BusinessTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operator extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function transactions()
    {
        return $this->hasMany(BusinessTransaction::class);
    }
}
