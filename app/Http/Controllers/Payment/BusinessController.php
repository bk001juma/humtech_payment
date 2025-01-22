<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Business;
use App\Models\Merchant\BusinessDisbursement;
use App\Models\Merchant\BusinessTransaction;
use App\Models\Profile;
use App\Models\User;
use App\Traits\ImageTrait;
use Auth;
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

    public function transactions($id)
    {
        $user = Auth::user();
        $business = Business::find($id);
        $transactions = $business->transactions()->orderBy('created_at','desc')->get();

        if (!$user->hasRole(['merchant','admin'])){
            return redirect()->back();
        }


        return view('papi.merchant.transactions',compact('business','transactions'));
    }

    public function disbursements($id)
    {
        $user = Auth::user();
        $business = Business::find($id);
        $transactions = $business->transactions()->orderBy('created_at','desc')->get();

        if (!$user->hasRole(['merchant','admin'])){
            return redirect()->back();
        }
        return view('papi.merchant.disbursements',compact('business','transactions'));
    }

    public function allDisbursements()
    {
        $user = Auth::user();
        if ($user->hasRole(['admin'])){
            $disbursements = BusinessDisbursement::get();
            $transactions = BusinessTransaction::orderBy('created_at','desc')->get();

            return view('papi.business.all_disbursements',compact('disbursements','transactions'));
        }
        return redirect()->back();
    }

    public function allTransactions()
    {
        $user = Auth::user();

        if ($user->hasRole(['admin'])){
            $businesses = Business::get();
            $transactions = BusinessTransaction::orderBy('transaction_date','desc')->get();
            $disbursements = BusinessDisbursement::get();

            return view('papi.business.all_transactions',compact('businesses','transactions','disbursements'));
        }

        return redirect()->back();
    }

}
