<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\BusinessProduct;
use Illuminate\Http\Request;

class BusinessProductController extends Controller
{
    public function store(Request $request)
    {
        BusinessProduct::create($request->all());

        return redirect()->back();
    }
}
