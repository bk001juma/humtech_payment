<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TempOTP;
use App\Models\User;
use App\Traits\SMSTrait;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BusinessLoginController extends Controller
{
    use AuthenticatesUsers;

     public function webLogin(Request $request)
    {
        $this->validateLogin($request);

        $user = User::where('email',$request['email'])->first();



        if (isset($user->id)){
            if (Hash::check($request['password'], $user->password)) {
                $this->resendOTP($user);

                return redirect()->route('web.verifyOTP',['phone'=>substr($user->business->phone,7)]);
            }else{
                return $this->sendFailedLoginResponse($request);
            }

        }else{
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function verifyOTP(Request $request)
    {
        $phone = $request['phone'];
        return view('auth.verify_otp',compact('phone'));
    }

    public function validateOTP(Request $request)
    {
        $data = $request->validate([
            'otp'        => 'required|min:6|max:6',
        ]);

        $OTP = TempOTP::where('otp', $request['otp'])->where('otp_session', Session::getId())->first();

        if(isset($OTP->id)){

            if (isset($OTP->id)) {
                if (Carbon::now() > $OTP->created_at->addMinutes(5)){
                    return redirect()->back(201,['message'=>'Invalid OTP']);
                }else{

                    $this->guard()->loginUsingId($OTP->user->id);

                    return redirect('/home');
                }

            } else {
                return response(['state' => 'error', 'data' => 'Taarifa za uthibitisho huu hazipo au zimekwisha muda wake. Tafadhali rudi nyuma uweke numba ya simu tena.'],401);
            }

        }else{
            $request->validate([
                'otp'        => 'exists:users',
            ]);

            return redirect()->back(302)->with(['message'=>'Invalid OTP']);
        }


    }

    public function resendOTP($user)
    {
        $business = $user->business;
        $business->otp()->create(
            ['otp'=>rand(100000,999999),
                'otp_session'=>Session::getId(),
                'otp_expires_at'=>Carbon::now()->addMinutes(5),
                'phone'=>$business->phone,
                'user_id'=>$user->id,
                ]
        );

        $smsTrait = new SMSTrait();
        $smsTrait->sendBEEMSMS($business->phone,"Your PAPI OTP is ".$business->otp->otp);
    }

}
