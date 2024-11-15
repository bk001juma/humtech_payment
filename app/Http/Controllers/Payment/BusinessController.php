<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Business;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $businesses = Business::get();
        return view('papi.business.index',compact('businesses'));
    }


    public function store(Request $request)
    {
        if (isset($request['image'])){
            $imageTrait = new ImageTrait();
            $request['logo'] = $imageTrait->uploadIMage($request['image'],'300,300',$request['name'],'business/logo');
        }

        Business::create($request->all());

        return redirect()->back();
    }

    public function manage($id){
        $business = Business::find($id);

        return view('papi.business.manage_business',compact('business'));
    }

}
