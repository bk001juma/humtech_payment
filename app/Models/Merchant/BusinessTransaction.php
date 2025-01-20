<?php

namespace App\Models\Merchant;

use App\Models\Payment\Operator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessTransaction extends Model
{
    use SoftDeletes;


    protected $fillable = [
        ''
    ];

    protected $hidden = ['id','created_at','updated_at','deleted_at'];

    public function business_product()
    {
        return $this->belongsTo(BusinessProduct::class,'product_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

}
