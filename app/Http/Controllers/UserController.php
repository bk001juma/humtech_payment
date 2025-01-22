<?php

namespace App\Http\Controllers;

use App\Models\Car\Car;
//use Auth;
use App\Models\Car\CarCategory;
use App\Models\Car\Slide;
use App\Models\Merchant\Business;
use App\Models\Merchant\BusinessDisbursement;
use App\Models\Merchant\BusinessTransaction;
use Carbon\Carbon;
use DB;
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

        // Create an array of all months in the year
        $months = collect(range(1, 12))->map(function($month) {
            return Carbon::create()->month($month)->startOfMonth();
        });

// Get the monthly sums
        $monthlySums = DB::table('business_transactions')
            ->select(DB::raw("YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount)  as total_amount"))->where('type','credit')->where('status','paid')
            ->groupBy('year', 'month')
            ->get();

        $monthlyFailedSums = DB::table('business_transactions')
            ->select(DB::raw("YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount)  as total_amount"))->where('type','credit')->where('status','not like','%paid%')
            ->groupBy('year', 'month')
            ->get();

// Merge the results with all months to ensure all months are included
        $results = $months->map(function($month) use ($monthlyFailedSums, $monthlySums) {
            $sum = $monthlySums->firstWhere('month', $month->month);
            $failed_sum = $monthlyFailedSums->firstWhere('month', $month->month);
            return [
                'month' => $month->format('F'),
                'total_amount' => $sum ? $sum->total_amount : 0,
                'total_failed_amount' => $sum ? $failed_sum->total_amount : 0,
            ];
        });


        $success = [];
        $failed = [];

        if($user->hasRole('admin')){
            $businesses = Business::all();
            foreach($businesses as $business){
                $business->balance = $business->transactions()->where('status','paid')->sum('amount');
                $business->save();
            }
            foreach ($results as $result) {
                $success[] = $result['total_amount']/1000;
                $failed[] = $result['total_failed_amount']/1000;
            }

            $merchants = Business::limit(5)->get();

            $transactions = BusinessTransaction::orderBy('transaction_date','desc')->get();
            $recent_transactions = BusinessTransaction::orderBy('transaction_date','desc')->limit(5)->get();
            $disbursements = BusinessDisbursement::get();

            return view('papi.dashboard',compact('user','transactions','disbursements','recent_transactions','failed','success','merchants'));
        }elseif ($user->hasRole('merchant')) {
            $business = Auth::user()->businesses()->first();

            return view('papi.merchant.merchant_dash',compact('user','business'));
        }else{
            Auth::logout();
            return redirect('/login');
        }

    }
}
