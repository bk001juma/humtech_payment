<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessTransaction extends Model
{
    use SoftDeletes;


    protected $fillable = [
        ''
    ];

    protected $hidden = ['id','created_at','updated_at','deleted_at'];
}
