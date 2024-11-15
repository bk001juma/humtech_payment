<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $businesses = Business::get();
        return view('papi.business.index',compact('businesses'));
    }


    public function store(Request $request)
    {
        Business::create($request->all());

        return redirect()->back();
    }

    public function manage($id){
        $business = Business::find($id);

        return view('papi.business.manage_business',compact('business'));
    }

}
