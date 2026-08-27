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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BusinessLoginController extends Controller
{
    use AuthenticatesUsers;

    public function webLogin(Request $request)
    {
        $this->validateLogin($request);

        $user = User::with('business')->where('email', $request['email'])->first();

        if (isset($user->id)) {
            if (Hash::check($request['password'], $user->password)) {
                try {
                    $phone = $this->resendOTP($user);
                } catch (\Throwable $exception) {
                    Log::error('OTP SMS delivery failed.', [
                        'user_id' => $user->id,
                        'phone' => $this->maskPhoneForDisplay($this->resolveOtpPhoneForUser($user)),
                        'error' => $exception->getMessage(),
                    ]);

                    return redirect()->back()->withErrors(['message' => 'Failed to send OTP to your phone. Please try again.']);
                }

                return redirect()->route('web.verifyOTP', ['phone' => $this->otpPhoneSuffix($phone)]);
            } else {
                return $this->sendFailedLoginResponse($request);
            }
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function verifyOTP(Request $request)
    {
        $phone = $request['phone'];
        return view('auth.verify_otp', compact('phone'));
    }

    public function validateOTP(Request $request)
    {
        $data = $request->validate([
            'otp'        => 'required|min:6|max:6',
        ]);

        $OTP = TempOTP::where('otp', $request['otp'])->where('otp_session', Session::getId())->first();

        if (isset($OTP->id)) {

            if (Carbon::now() > $OTP->created_at->addMinutes(5)) {
                return redirect()->back()->withErrors(['message' => 'OTP has expired']);
            } else {

                $this->guard()->loginUsingId($OTP->user->id);

                return redirect('/home');
            }
        } else {
            return redirect()->back()->withErrors(['message' => 'Invalid OTP']);
        }
    }

    public function resendOTP(User $user): string
    {
        $business = $user->business;
        $phone = $this->resolveOtpPhoneForUser($user);

        if (!$phone) {
            throw new \RuntimeException('No phone number configured for OTP.');
        }

        $otp = TempOTP::create([
            'business_id' => $business?->id,
            'user_id' => $user->id,
            'otp' => random_int(100000, 999999),
            'phone' => $phone,
            'otp_session' => Session::getId(),
            'otp_expires_at' => Carbon::now()->addMinutes(5),
        ]);

        $smsTrait = new SMSTrait();
        $smsTrait->sendBEEMSMS($phone, "Your login OTP is {$otp->otp}. It expires in 5 minutes.");

        return $phone;
    }

    private function resolveOtpPhoneForUser(User $user): ?string
    {
        $fromUser = trim((string) ($user->phone ?? ''));
        if ($fromUser !== '') {
            return $fromUser;
        }

        $fromBusiness = trim((string) ($user->business?->phone ?? ''));

        return $fromBusiness !== '' ? $fromBusiness : null;
    }

    private function otpPhoneSuffix(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone);

        return $digits ? substr($digits, -3) : '';
    }

    private function maskPhoneForDisplay(?string $phone): string
    {
        $digits = preg_replace('/\D+/', '', (string) $phone);

        if (!$digits) {
            return 'unknown';
        }

        if (strlen($digits) <= 6) {
            return str_repeat('*', strlen($digits));
        }

        return substr($digits, 0, 3).str_repeat('*', strlen($digits) - 6).substr($digits, -3);
    }
}
