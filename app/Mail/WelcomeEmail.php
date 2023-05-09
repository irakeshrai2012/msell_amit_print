<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
  
class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    public function __construct($request)
    {
       $this->user=$request;   
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
        return $this->view('emails.welcome')->subject('Onboarding on Amit Computers Graphics')->with(['data'=>$this->user]);
    }
}
