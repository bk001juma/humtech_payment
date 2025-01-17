<?php

namespace App\Http\Controllers;

use App\Models\Car\Car;
//use Auth;
use App\Models\Car\CarCategory;
use App\Models\Car\Slide;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = Auth::user();

        if($user->hasRole('admin')){
            return view('papi.dashboard',compact('user'));
        }elseif ($user->hasRole('merchant')) {
            return view('papi.business.manage_business',compact('user'));
        }else{
            Auth::logout();
            return redirect('/login');
        }

    }
}
