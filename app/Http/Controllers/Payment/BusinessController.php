<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Business;
use App\Models\Profile;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BusinessController extends Controller
{
    public function index(){
        $businesses = Business::get();
        return view('papi.business.businesses',compact('businesses'));
    }


    public function store(Request $request)
    {
        $request->validate([
                [
                    'email'                 => 'required|email|max:255|unique:users',
                ],
                [
                    'email.required'      => trans('auth.emailRequired'),
                    'email.email'         => trans('auth.emailInvalid'),
                ]
            ]
        );


        $request['first_name'] = $request['name'];
        $request['last_name'] = $request['name'];
        $request['password'] = Hash::make('password');
        $request['token'] = str_random(64);
        $request['activated'] = 1;
        $request['role'] = 5;
        $request['name'] = uniqid();

        $profile = new Profile();

        $user = User::create($request->all());

        $request['name'] = $request['first_name'];

        $user->profile()->save($profile);
        $user->attachRole($request->input('role'));
        $user->save();


        if (isset($request['image'])){
            $imageTrait = new ImageTrait();
            $request['logo'] = $imageTrait->uploadIMage($request['image'],'300,300',$request['name'],'business/logo');
        }

        $user->businesses()->create($request->except('first_name','last_name','password'));


        return redirect()->back();
    }

    public function manage($id){
        $business = Business::find($id);

        return view('papi.business.manage_business',compact('business'));
    }

}
