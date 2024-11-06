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
        $slides = Slide::get();
        $categories = CarCategory::get();

        $cars = $user->hasRole('admin') ? Car::where('status','active')->get() : $user->cars;
        return view('office.dash',compact('slides','cars','categories'));

        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }

        return view('pages.user.home');
    }
}
