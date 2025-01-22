<?php

namespace App\Http\Controllers;

use App\Models\Car\Car;
//use Auth;
use App\Models\Car\CarCategory;
use App\Models\Car\Slide;
use App\Models\Merchant\Business;
use App\Models\Merchant\BusinessDisbursement;
use App\Models\Merchant\BusinessTransaction;
use App\Models\Payment\Operator;
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


        if($user->hasRole('admin')){
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
            list($results, $success, $failed) = $this->extractedData($months, $monthlyFailedSums, $monthlySums);

            $businesses = Business::all();
            foreach($businesses as $business){
                $business->balance = $business->transactions()->where('status','paid')->sum('amount');
                $business->save();
            }
            foreach ($results as $result) {
                $success[] = $result['total_amount']/1000;
                $failed[] = 0;
            }

            $merchants = Business::limit(5)->get();

            $transactions = BusinessTransaction::orderBy('transaction_date','desc')->get();
            $recent_transactions = BusinessTransaction::where('status','paid')->orderBy('transaction_date','desc')->limit(7)->get();

            $disbursements = BusinessDisbursement::get();
            $recent_disbursements = BusinessDisbursement::limit(5)->get();

            $operators = Operator::get();

            $operator_percent = [];
            $operator_name = [];
            foreach ($operators as $operator) {
                $operator_percent[] = $operator->transactions()->where('status','paid')->sum('amount');
                $operator_name[] = $operator->name;
            }


            return view('papi.dashboard',compact('user','operator_name','operator_percent','transactions','disbursements','recent_transactions','failed','success','merchants','recent_disbursements'));
        }elseif ($user->hasRole('merchant')) {
            $business = Auth::user()->businesses()->first();

            // Get the monthly sums
        $monthlySums = DB::table('business_transactions')
            ->select(DB::raw("YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount)  as total_amount"))->where('business_id',$business->id)->where('type','credit')->where('status','paid')
            ->groupBy('year', 'month')
            ->get();

        $monthlyFailedSums = DB::table('business_transactions')
            ->select(DB::raw("YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount)  as total_amount"))->where('business_id',$business->id)->where('type','credit')->where('status','not like','%paid%')
            ->groupBy('year', 'month')
            ->get();

// Merge the results with all months to ensure all months are included
            list($results, $success, $failed) = $this->extractedData($months, $monthlyFailedSums, $monthlySums);

            $operators = Operator::get();

            foreach ($results as $result) {
                $success[] = $result['total_amount']/1000;
                $failed[] = 0;
            }

            $recent_disbursements = $business->disbursements()->limit(5)->get();
            $recent_transactions = $business->transactions()->limit(5)->get();


            $transactions = $business->transactions;
            $disbursements = $business->disbursments;

            $operator_percent = [];
            $operator_name = [];
            foreach ($operators as $operator) {
                $operator_percent[] = $transactions->where('operator_id',$operator->id)->sum('amount');
                $operator_name[] = $operator->name;
            }


            return view('papi.merchant.merchant_dash',compact('recent_disbursements','operator_percent','operator_name','recent_transactions','user','business','transactions','disbursements','success','failed','operators'));
        }else{
            Auth::logout();
            return redirect('/login');
        }

    }

    /**
     * @param \Illuminate\Support\Collection $months
     * @param \Illuminate\Support\Collection $monthlyFailedSums
     * @param \Illuminate\Support\Collection $monthlySums
     * @return array
     */
    public function extractedData(\Illuminate\Support\Collection $months, \Illuminate\Support\Collection $monthlyFailedSums, \Illuminate\Support\Collection $monthlySums): array
    {
        $results = $months->map(function ($month) use ($monthlyFailedSums, $monthlySums) {
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
        return array($results, $success, $failed);
    }
}
