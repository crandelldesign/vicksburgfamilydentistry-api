<?php
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
 
class ContactThankYou extends Mailable {
 
    use Queueable,
        SerializesModels;

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
 
    //build the message.
    public function build() {
      return $this->view('emails.contact')->subject('Thank You for Contacting Vicksburg Family Dentistry')->replyTo('vicksburgfamilydentisty@gmail.com', 'Vicksburg Family Dentistry');
    }
}