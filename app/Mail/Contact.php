<?php
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
 
class Contact extends Mailable {
 
    use Queueable,
        SerializesModels;

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
 
    //build the message.
    public function build() {
      return $this->view('emails.contact')->subject('You\'ve Been Contacted By the Vicksburg Family Dentistry Website by '. $this->request->contactname)->replyTo($this->request->email, $this->request->contactname);
    }
}