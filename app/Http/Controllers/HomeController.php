<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactThankYou;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function submitForm(Request $request)
    {
        $this->validate($request, [
            'contactname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'token' => 'required|captcha'
        ]);

        Mail::to('vicksburgfamilydentistry@gmail.com')->bcc('matt@crandelldesign.com')->send(new ContactMail($request));
        //Mail::to('matt@crandelldesign.com')->send(new ContactMail($request));
        Mail::to($request->get('email'))->send(new ContactThankYou($request));
        return response()->json([
            'success_message' => 'Thank you for contacting us, we will get back to you as soon as possible.'
        ]);
    }
}
