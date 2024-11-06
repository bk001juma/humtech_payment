<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Traits\SMSTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class SMSController extends Controller
{
    public function sendSMS(Request $request)
    {
        $phone = $request['phone'];
        $emil = $request['email'];
        $message = $request['msg'];

        $sms = "You have a new Contact Message.\n\nName: ".$request['f_name']." ".$request['f_name']."\nPhone: ".$phone."\nEmail: ".$emil."\nMessage: ".$message;

        $sensSMS = new SMSTrait;
        $sensSMS->sendBEEMSMS('255765204506',$sms );

        Http::post('https://hook.eu1.make.com/szjygyio7ugau4x8tsps2wj5ch1efpv5', [
            'Subject' => 'Website Contact Message',
            'message' => $sms,
        ]);

        Alert::success('Message Sent', 'Thank you for contacting'. config('app.name'));

        return redirect()->back();

    }

    public function bookCar(Request $request)
    {
        $car = $request['car'];
        $phone = $request['phone'];
        $emil = $request['email'];
        $start = $request['start'];
        $end = $request['end'];
        $message = $request['msg'];

        $sms = "You have a new Booking.\n\nCar: " .$car
            ."\nName: ".$request['name']
            ."\nPhone: ".$phone
            ."\nEmail: ".$emil
            ."\nStart: ".$start
            ."\nEnd: ".$end
            ."\nMessage: ".$message;

        $sensSMS = new SMSTrait;
        $sensSMS->sendBEEMSMS('255765204506', $sms
        );

        Http::post('https://hook.eu1.make.com/szjygyio7ugau4x8tsps2wj5ch1efpv5', [
            'Subject' => 'Website Car Booking',
            'message' => $sms,
        ]);


        Alert::success('Booking Sent', 'Thank you for riding with'. config('app.name'));

        return redirect()->back();
    }
}
