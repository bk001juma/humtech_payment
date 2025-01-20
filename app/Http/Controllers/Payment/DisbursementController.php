<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Merchant\BusinessDisbursement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DisbursementController extends Controller
{
    public function store(Request $request)
    {
        $user = \Auth::user();
        $user->disbursements()->create($request->all());

        return redirect()->back();
    }

    public function approve($id): \Illuminate\Http\RedirectResponse
    {
        if (!\Auth::user()->hasRole('admin'))
            return redirect()->back()->with('danger', 'Disbursement Approved');

        $disbursement = BusinessDisbursement::findOrFail($id);
        $disbursement->status = 'success';
        $disbursement->approved_date = Carbon::now();
        $disbursement->approve_id = \Auth::user()->id;
        $disbursement->save();

        return redirect()->back();
    }

    public function reject($id): \Illuminate\Http\RedirectResponse
    {
        if (!\Auth::user()->hasRole('admin'))
            return redirect()->back()->with('danger', 'Disbursement Rejected');

        $disbursement = BusinessDisbursement::findOrFail($id);
        $disbursement->status = 'rejected';
        $disbursement->rejected_date = Carbon::now();
        $disbursement->approve_id = \Auth::user()->id;
        $disbursement->save();

        return redirect()->back();
    }
}
