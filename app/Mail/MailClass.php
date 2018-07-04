<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $theme;
    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $theme, $message)
    {
        $this->name= $name;
        $this->email= $email;
        $this->theme= $theme;
        $this->message= $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contacts.contact_mail')
            ->with([
                'name'=>$this->name,
                'email'=>$this->email,
                'theme'=>$this->theme,
                'message'=>$this->message,
            ])->subject( 'some_theme' );
    }
}
