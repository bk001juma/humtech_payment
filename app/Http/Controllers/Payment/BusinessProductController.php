<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\BusinessProduct;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class BusinessProductController extends Controller
{
    public function store(Request $request)
    {
        if (isset($request['image'])){
            $imageTrait = new ImageTrait();
            $request['logo'] = $imageTrait->uploadIMage($request['image'],'300,300',$request['name']);
        }

        BusinessProduct::create($request->all());
        return redirect()->back();
    }
}
