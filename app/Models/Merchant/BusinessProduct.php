<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'tin',
        'category',
        'email',
        'email',
        'email',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
