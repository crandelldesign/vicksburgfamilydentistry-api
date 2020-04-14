<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
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
        Mail::to([$request->get('email')])->send(new Contact($request));
        return response()->json([
            'success_message' => 'Thank you for contacting us, we will get back to you as soon as possible.'
        ]);
    }
}
